function init_switch_toggle(object, callback) {
    if (object == null) {
        return;
    }
    
    object.each(function() {

        $(this).on("switchChange.bootstrapSwitch", function(event, data) {
            callback(data.value, data.el.val(), data);
        });

    });
}

function show_notification(message, callback) {
    if (callback === undefined) {
        show_info_notification(message);
    }
    else {
        callback(message, {
            HorizontalPosition: "center",
            VerticalPosition: "top",
            ShowOverlay: true,
            TimeShown: 1000,
            OpacityOverlay: 0.5,
            MinWidth: 250
        });
    }
}

function show_info_notification(message) {
    message = "<i class='fa fa-info-circle' style='color:#00A2D9;padding-right:8px'></i>" + message;
    
    show_notification(message, jNotify);
}

function show_success_notification(message) {
    message = "<i class='fa fa-check-square-o' style='padding-right:6px'></i>" + message;
    
    show_notification(message, jSuccess);
}

function show_error_notification(message) {
    message = "<i class='fa fa-frown-o' style='padding-right:6px'></i>" + message;
    
    show_notification(message, jError);
}

function string_to_slug(src, target, ajax_validator, id, site_id) {
    
    if (src.length == 0 || target.length == 0) {
        return;
    }
    
    src.on("blur", function() {
        
        if (src.val() === "" || target.val() !== "") {
            return;
        }
        
        var str = src.val();
        
        str = str.replace(/^\s+|\s+$/g, ''); // trim
        str = str.toLowerCase();
  
        // remove accents, swap ñ for n, etc
        var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;űő";
        var to   = "aaaaeeeeiiiioooouuuunc------uo";
        for (var i=0, l=from.length ; i<l ; i++) {
            str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
        }

        str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
            .replace(/\s+/g, '-') // collapse whitespace and replace by -
            .replace(/-+/g, '-'); // collapse dashes
    
        if (ajax_validator) {
            
            $.ajax({
                url: ajax_validator,
                type: "POST",
                data: {
                    slug: str,
                    id: (id) ? id : 0,
                    site_id: $("#current_site_id").val()
                },
                dataType: "json",
                success: function(responseJSON) {
                    if (responseJSON.response === "ok") {
                        target.val(responseJSON.slug);
                    }
                }
            });
            
        }
        else {
            target.val(str);
        }

    });
    
}

function count_characters(src, target) {
    target.html(src.val().length);
    
    src.on("keyup blur", function() {
        target.html(src.val().length);
    });
}

/* ***********************************************************
*  cikk publikálásra irányítás
*/
function publish(article_id, site_id){
    $.post("heartbeat/save_redirect_location",{location:window.location.pathname},function(data){
        if (data.success) {
            if (site_id!=undefined) {
                location.href="publish/editor/"+article_id+"/"+site_id;
            }else{
                location.href="publish/editor/"+article_id;
            }
        }
    },"json");
}

/*************************************************************
* Cikk korrektúrázásra irányítás
*/
function correction(approved_id){
    $.post("heartbeat/save_redirect_location",{location:window.location.pathname},function(data){
         if (data.success) {
            location.href="article_editor/correction/"+approved_id;
         }   
    },"json");
}

/* ***********************************************************
*  approved cikk preview
*/

function approved_article_preview(approved_article_id){
    $.post("publish/approved_article_preview",{approved_article_id:approved_article_id},function(data){
        if (data.success) {
            $("body").append(data.modal);
            $("#modal-read-article-"+approved_article_id).modal("show");
            $("#modal-read-article-"+approved_article_id).on("hidden.bs.modal",function(event){
                $("#modal-read-article-"+approved_article_id).remove();
            });
        }
    },"json");
}


/************************************************************
* StockPhotoPicker felnyitás
*/
function open_stock_photo_picker(obj){
       console.log("open stock photo"); 
      
      //Stockphoto hidden   
       var stockphoto_hidden = $(obj).parent().parent().find("#stockphoto_picker_stockphoto_id");
       stockphoto_id=$(stockphoto_hidden).val();

       console.log(stockphoto_id);
      // Picker felnyitás
      $.post("ckeditor/stockphoto_picker",{stockphoto_id:stockphoto_id},function(data){
            if (data.success) {
                $("body").prepend(data.html);
                $("#modal-stockphoto-picker").modal("show");
                $("#modal-stockphoto-picker").on("hidden.bs.modal",function(event){
                    var selected_stockphoto_id=$("#selected_stockphoto_id").val();
                    console.log(selected_stockphoto_id);
                    $.post("ckeditor/stockphoto_detail",{selected_stockphoto_id:selected_stockphoto_id},function(data){
                        if (data.success) {
                            $(obj).parent().parent().parent().html(data.html);
                        }
                        $("#modal-stockphoto-picker").remove();    
                    },"json");
                });
            }
      },"json");
}







$(function() {
  
  $(".torles_link").click(function(e) {
    e.preventDefault();
    
    // ajax kérés a törlésre
    $.getJSON($(this).attr("href"), {
      "id": $(this).data("delete_id")
    }, function(data) {
      if (data.success) {
        $("#attachment_" + data.html).remove();
      }
    });
    
    // sikeres válasz esetén html elem törlése
    // TODO TAMAS
  });
  
});