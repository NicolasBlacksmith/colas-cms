var nickname_ok = false;
var email_ok    = false;
var old_pw_ok   = false;

$(function() {

	$('.authority_approver').on('ifChecked', function(event){
    	var id = $(this).val();
    	click_approver(true,id);
	});
	$('.authority_approver').on('ifUnchecked', function(event){
    	var id = $(this).val();
    	click_approver(false,id);
	});
	$('.authority_creator').on('ifChecked', function(event){
    	var id = $(this).val();
    	click_creator(true,id);
	});
	$('.authority_creator').on('ifUnchecked', function(event){
    	var id = $(this).val();
    	click_creator(false,id);
	});

	$('.authority_site').on('ifChecked', function(event){
    	var id = $(this).val();
    	click_site(true,id);
	});
	$('.authority_site').on('ifUnchecked', function(event){
    	var id = $(this).val();
    	console.log("fdasfdsa");
    	click_site(false,id);
	});
        
        /*
         * custom parsley function demo
        $('#settings').parsley({
            validators: {
                teszt: function() {
                    return {
                        validate: function(value, requirement) {
                            return false;
                        },
                        priority: 32
                    };
                }
            },
            messages: {
                teszt: "Teszt validator hibat talalt"
            }
        });
        */
       
    $("#settings").parsley();
    
    $("#nickname").parsley().updateConstraint("required", "true");
    $("#nickname").parsley().updateConstraint("minlength", "3");
    $("#nickname").attr("parsley-remote", "");
    $('#nickname').parsley().addAsyncValidator("check_unique_nickname", function(xhr) { return (xhr.status === 200 && xhr.responseJSON.response === "ok" && xhr.responseJSON.is_unique === true); }, "users/check_unique_nickname");
    $("#nickname").attr("parsley-remote-validator", "check_unique_nickname");
    $("#nickname").attr("parsley-remote-options", '{ "type": "POST", "dataType": "json", "data": { "user_id": ' + $("input[name='user_id']").val() + ' } }');
    $("#nickname").attr("parsley-remote-message", "This is a registered nickname");

    if ($("input[name='user_id']").val() == "0") {
        $("#first_password").parsley().updateConstraint("required", true);
        $("#second_password").parsley().updateConstraint("required", true);
    }

    $("#first_password").parsley().updateConstraint("minlength", 4);
    $("#second_password").parsley().updateConstraint("minlength", 4);
    $("#second_password").attr("parsley-equalto", "#first_password");
    
    $("#second_password").parsley().subscribe("parsley:field:validate", function() {
        if ($("input[name='user_id']").val() != "0" && $("#first_password").val() == "") {
            $("#second_password").parsley().updateConstraint("required", false);
        }
        else {
            $("#second_password").parsley().updateConstraint("required", true);
        }
    });

    if ($("#old_password").length !== 0) {
        $("#old_password").parsley().subscribe("parsley:field:validate", validate_old_pw);
        
        $("#old_password").parsley().subscribe("parsley:field:success", function(fieldInstance) {
            old_pw_ok = true;
        });

        $("#old_password").parsley().subscribe("parsley:field:error", function(fieldInstance) {
            old_pw_ok = false;
        });
    }
    
    $("#email").parsley().updateConstraint("required", "true");
    $("#email").parsley().updateConstraint("type", "email");
    $("#email").attr("parsley-remote", "");
    $('#email').parsley().addAsyncValidator("check_unique_email", function(xhr) { return (xhr.status === 200 && xhr.responseJSON.response === "ok" && xhr.responseJSON.is_unique === true); }, "users/check_unique_email");
    $("#email").attr("parsley-remote-validator", "check_unique_email");
    $("#email").attr("parsley-remote-options", '{ "type": "POST", "dataType": "json", "data": { "user_id": ' + $("input[name='user_id']").val() + ' } }');
    $("#email").attr("parsley-remote-message", "This is a registered e-mail address");
    
    $("#nickname").parsley().subscribe("parsley:field:success", function(fieldInstance) {
        nickname_ok = true;
    });
    
    $("#nickname").parsley().subscribe("parsley:field:error", function(fieldInstance) {
        nickname_ok = false;
    });
    
    $("#email").parsley().subscribe("parsley:field:success", function(fieldInstance) {
        email_ok = true;
    });
    
    $("#email").parsley().subscribe("parsley:field:error", function(fieldInstance) {
        email_ok = false;
    });
    
    $("#settings").parsley().subscribe("parsley:form:validated", function(formInstance) {
        if (formInstance.isValid() && nickname_ok && email_ok && (old_pw_ok || $("#old_password").length == 0) && $("table#rights-table").length !== 0 && !is_right_set()) {
            formInstance.submitEvent.preventDefault();
            $("#rights_tab").click();
        }
    });
});

function click_creator(state,id){
	console.log("creator "+id+" "+state);
	if (!state) {
		$('#approver_'+id).iCheck('uncheck');
		$('.authority_site_'+id).each(function() {
			$(this).iCheck('uncheck');
		});	
	}	
}
function click_approver(state,id){
	console.log("approver "+id+" "+state);
	if (state) {
			$('#creator_'+id).iCheck('check');
	}else{
		$('.authority_site_'+id).each(function() {
			$(this).iCheck('uncheck');
		});	
	}
}

function click_site(state,id){
	console.log("site "+id+" "+state);
	if (state) {
		$('#creator_'+id).iCheck('check');
		$('#approver_'+id).iCheck('check');
	}
}

function is_right_set() {
    var ret = false;

    $("table#rights-table input[type='checkbox']").each(function() {
        if ($(this).prop("checked") === true) {
            ret = true;

            // break out from $.each
            return false;
        }
    });

    return ret;
}

function validate_old_pw() {
    if ($("#first_password").val() == "") {
        $("#old_password").parsley().updateConstraint("required", false);
        
        $("#old_password").removeAttr("parsley-remote");
        $("#old_password").removeAttr("parsley-remote-validator");
        $("#old_password").removeAttr("parsley-remote-options");
        $("#old_password").removeAttr("parsley-remote-message");
    }
    else {
        $("#old_password").parsley().updateConstraint("required", true);
        
        $("#old_password").attr("parsley-remote", "");
        $('#old_password').parsley().addAsyncValidator("check_password", function(xhr) { return (xhr.status === 200 && xhr.responseJSON.response === "ok" && xhr.responseJSON.correct_pw === true); }, "users/check_password");
        $("#old_password").attr("parsley-remote-validator", "check_password");
        $("#old_password").attr("parsley-remote-options", '{ "type": "POST", "dataType": "json", "data": { "user_id": ' + $("input[name='user_id']").val() + ' } }');
        $("#old_password").attr("parsley-remote-message", "Incorrect old password");
    }
}
