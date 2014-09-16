function active_changed(is_checked, value, obj) {
        
        // console.debug(value + ": " + is_checked);

        $.ajax({
            url: "dashboard/set_lecktor",
            type: "POST",
            data: {
                experiment_id: value,
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

                    if (!is_checked) {
                        $("#"+value+"_lecktor_name").html("");
                        $("#"+value+"_lecktor_date").html("");
                    }else{
                        $("#"+value+"_lecktor_name").html(data.lector_name);
                        $("#"+value+"_lecktor_date").html("Most");
                    }


                }
                else {
                    // console.debug("[ERROR] " + data.details);

                    show_error_notification(data.details);
                }
            }
        });
    
}

function create_new_experiment(){
    $("#modal-responsive").modal("show");


}


$(function() {
    
    init_switch_toggle($("input.switch.is_experiment_leckotred"), active_changed);

});


