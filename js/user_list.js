function active_changed(is_checked, value, obj) {
        
        // console.debug(value + ": " + is_checked);

        $.ajax({
            url: "users/set_active",
            type: "POST",
            data: {
                user_id: value,
                is_active: is_checked
            },
            dataType: "json",
            /*
            complete: function(jqXHR, status) {
                console.debug("Status: " + status);
            },
            */
            success: function(data) {
                // console.debug(data);

                if (data.response == "success") {
                    // console.debug("[OK] " + data.details);

                    show_success_notification(data.details);
                }
                else {
                    // console.debug("[ERROR] " + data.details);

                    show_error_notification(data.details);
                }
            }
        });
    
}

$(function() {
    
    init_switch_toggle($("input.switch.is_user_active"), active_changed);

});