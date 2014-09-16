var heartbeatTime = 2000;
var timer_id      = false;

$(function() {

	chatSidebar();
	heartBeat();

	$('body').append('<div class="modal fade" id="session-timeout" tabindex="-1" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-blue"><h4 class="modal-title" id="myModalLabel">Your session is about to expire</h4></div><div class="modal-body">The screen will be locked in <span id="idle-timeout-counter" class="w-700"></span> seconds.</p><p>Do you want to stay connected?</p></div><div class="modal-footer"><button id="idle-timeout-dialog-logout" type="button" class="btn btn-default">No, Logout</button><button id="idle-timeout-dialog-keepalive" type="button" class="btn btn-blue" data-dismiss="modal">Yes, Keep Working</button></div></div></div></div>');

});


function heartBeat(){
	
	var chat_time=$("#chat_time").val();
    var last_path=window.location.pathname;
	//Session check
	$.post("heartbeat/manager",{chat_time:chat_time, last_path:last_path},function(data){
		
		evaluateSession(data.session);
		evaluateMessages(data.messages);

		$("#chat_time").val(data.time);

	},"json");


	setTimeout('heartBeat();',heartbeatTime);
}

function evaluateSession(data){
	if (data.go_login) {
		window.location.assign(data.site_base_url + "/login/index");
	}
	if (data.go_lock) {
		window.location.assign(data.site_base_url + "/login/lockscreen");
	}

	console.log("last activity: "+data.last_activity+" remaining: "+data.remaining_time);

	if ( (data.session_exp-data.remaining_time)<(data.alert_time+data.lock_time) && timer_id === false ) {
        $('#session-timeout').modal({ "backdrop": "static", "keyboard": false });
		$('#session-timeout').modal('show');
                update_remaining_time(data.alert_time);


		 $('#idle-timeout-dialog-keepalive').on('click', function () {
                
                $.post("heartbeat/user_keep_alive",{},function(data){
					$('#session-timeout').modal('hide');
                                        if (timer_id !== false) {
                                            clearTimeout(timer_id);
                                            timer_id = false;
                                        }
				},"json");
         });

         $('#idle-timeout-dialog-logout').on('click', function () {
                $('#session-timeout').modal('hide');
                window.location.assign(data.site_base_url + "/login/lockscreen");   
          });


	}

	if ((data.session_exp-data.remaining_time)<data.lock_time) {

        //article editor 
        if (typeof autosave_article == 'function') { 
            autosave_article(); 
        }else{
             console.log("nincs auto save");
        }

		window.location.assign(data.site_base_url + "/login/lockscreen");
	}
    
    // ha idokozben szuksegtelen mar a visszaszamlalas es a figyelmezteto modal (pl. egyik tabon Keep workingre kattintottak)
    // akkor az aktuális tabon is meg kell szakitani
    if ( (data.session_exp-data.remaining_time)>=(data.alert_time+data.lock_time) && timer_id !== false ) {
      console.debug("stop countdown");
      $('#session-timeout').modal('hide');
      clearTimeout(timer_id);
      timer_id = false;
    }
}

function evaluateMessages(data){
	var popup_html="";

	$.each(data, function(index, value) {
  		console.log(index+" "+value.message);
  		var avatar_id=$("#user_"+value.from_user_id).attr("avatarid");
  		var message=getMessageHTML(avatar_id,value.message,false);
  		var ninckname=$("#user_"+value.from_user_id).attr("nickname");
  		$(message).hide().appendTo($("#messages_user_"+value.from_user_id)).fadeIn();
  		$("#messages_user_"+value.from_user_id).scrollTop($("#messages_user_"+value.from_user_id)[0].scrollHeight);

  		popup_html+=showChatPopUp(avatar_id,ninckname ,value.message);	
  		
		var badge=$("#user_"+value.from_user_id).find(".badge-danger");
		var badge_num=badge.html();
		badge_num++;
		badge.html(badge_num);
		badge.removeClass('hide').addClass('animated bounceIn');

	});
//	if (!$('nav#menu-right').hasClass('mm-opened') && popup_html!="") {
	if ( popup_html!="") {
		console.log("show popup");
  		$(".chat-popup-inner").html(popup_html);
		$('#chat-popup').show();
  		$('#chat-popup').removeClass('hide animated fadeOut').addClass('animated fadeIn');

  		setTimeout(function () {
        	$('#chat-popup').removeClass('animated fadeIn').addClass('animated fadeOut').delay(800).hide(0);
    	}, 2000);
  	}
}


//CHAT
function chatSidebar() {

    /* Manage the right sidebar */
    if ($.fn.mmenu) {
        var $menu = $('nav#menu-right');
        $menu.mmenu({
            position: 'right',
            dragOpen: true,
            counters: true,
            searchfield: {
                add: true,
                search: true,
                showLinksOnly: false
            }
        });
    }
    var popupp_lenght=$(".chat-popup-inner").children().size();
    if (	popupp_lenght>0 ) {
    	setTimeout(function () {
	        $('#chat-notification').removeClass('hide').addClass('animated bounceIn');
	        $('#chat-popup').removeClass('hide').addClass('animated fadeIn');
    	}, 1000);
    	setTimeout(function () {
        	$('#chat-popup').removeClass('animated fadeIn').addClass('animated fadeOut').delay(800).hide(0);
    	}, 3000);
    }
   
    /* Open / Close right sidebar */
    $('#chat-toggle').on('click', function () {
        $menu.hasClass('mm-opened') ? $menu.trigger("close") : $menu.trigger("open");
        console.log("toogle-menu");
        $('#chat-notification, #chat-popup').hide();
        setTimeout(function () {
            $('.mm-panel .badge-danger').each(function () {
            	if ($(this).html()!=0) {
                	$(this).removeClass('hide').addClass('animated bounceIn');
                }	
            });
        }, 1000);
    });

    /* Remove current message when opening */
    $('.have-message').on('click', function () {
        $(this).removeClass('have-message');
        $(this).find('.badge-danger').fadeOut();
    });

    $('.img.no-arrow').on('click',function(){
    	console.log("open submenu");
    	var user_id=$(this).attr('userid');
    	$("#messages_user_"+user_id).scrollTop($("#messages_user_"+user_id)[0].scrollHeight);
    	$(this).find(".badge-danger").html(0);
    	$(this).find(".badge-danger").addClass("hide");
    	$.post("heartbeat/read_chat_message",{user_id:user_id }, function(data){

    	},"json");	
    });

    /* Send messages */
    $('.send-message').keypress(function (e) {
        if (e.keyCode == 13) {
        	if($(this).val().trim()!=""){
	        	var user_id=$(this).attr('userid');
	        	var avatar_id=$(this).attr('avatarid');
	        	var input=$(this);
	        	$.post("heartbeat/send_chat_message",{message: input.val(), user_id:user_id }, function(data){
					if (data.succes) {
					
						var chat_message=getMessageHTML(avatar_id,input.val(),true);

						$(chat_message).hide().appendTo(input.parent().parent()).fadeIn();
						input.val("");
						$("#messages_user_"+user_id).scrollTop($("#messages_user_"+user_id)[0].scrollHeight);
					}	
				},"json");
            }else{
            	console.log("ures uzenet");
            }
        }
    });
}



function getMessageHTML(avatarid,message,isright){
	var divclass="";
	if (isright) {
		divclass="chat-right";
	}

	var chat_message = '<li class="img">' +
						                '<span>' +
						                '<div class="chat-detail '+divclass+'">' +
						                '<img src="assets/img/avatars/avatar'+avatarid+'.png" data-retina-src="assets/img/avatars/avatar'+avatarid+'_2x.png"/>' +
						                '<div class="chat-detail">' +
						                '<div class="chat-bubble">' +
						                message +
						                '</div>' +
						                '</div>' +
						                '</div>' +
						                '</span>' +
						                '</li>';
	return chat_message;					                
}

function showChatPopUp(avatar_id,nickname,message){

	var popup='<div><div class="clearfix w-600">'+
                    '<img src="assets/img/avatars/avatar'+avatar_id+'.png" alt="avatar '+avatar_id+'" width="30" class="pull-left img-circle p-r-5">'+nickname+''+
                    '</div><div class="message m-t-5">'+message+'</div>'+
              '</div>';
    return popup;          
}


function update_remaining_time(sec) {
    $("#idle-timeout-counter").html(sec);
    console.debug("még hátra van: " + sec);

    if (sec > 0) {
        timer_id = setTimeout(function() {
            update_remaining_time(--sec);
        }, 1000);
    }
}
