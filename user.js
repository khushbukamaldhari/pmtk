(function ($) {
    $("#frm_user_login").submit( function (e){
        e.preventDefault();
        var str = '&action=user_login';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: USER_AJAX_URL,
            data: $("#frm_user_login").serialize() + str,
            async: false,
            success: function (data) {
                var decode_data = JSON.parse(data);
                if( decode_data['success_flag'] == true ){
                    $("#err_wrong").text( "" );
                    redirect_to_URL( decode_data['redirect'] );
                } else {
                    $("#err_wrong").text( decode_data['message'] );
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;
    });
    
    
    $("#frm_cook_registration").submit(function (e) {
        e.preventDefault();
        var str = '&action=cook_registration';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: AJAX_URL,
            data: $("#frm_cook_registration").serialize() + str,
            async: false,
            success: function (data) {
                console.log(data);
                var decode_data = JSON.parse(data);
                if( decode_data['success_flag'] == true ){
                    $('#up_profile').click();
                    $('#up_cover').click();
                    
                } else {
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        return false;
    });


    $("#file_profile").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
    
    $('#up_profile').on('click', function () {
        var file_data = $('#file_profile').prop('files')[0];
        file_data.action = 'profile';
        var form_data = new FormData();
        form_data.append('file_profile', file_data);
        console.log(file_data);
        $.ajax({
            url: AJAX_URL, // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                //alert(data); // display response from the PHP script, if any
                console.log(data);
                var decode_data = JSON.parse(data);
                if (decode_data['success_flag'] == true) {
                    //alert("Uploaded...");
                } else {
                    alert(decode_data['message']);
                }
            }
        });
        return false;
    });

    $("#file_cover").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
    
    $('#up_cover').on('click', function () {
        var file_data = $('#file_cover').prop('files')[0];
        file_data.action = 'cover';
        var form_data = new FormData();
        form_data.append('file_cover', file_data);
        console.log(file_data);
        $.ajax({
            url: AJAX_URL, // point to server-side PHP script 
            dataType: 'text', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (data) {
                //alert(data); // display response from the PHP script, if any
                console.log(data);
                var decode_data = JSON.parse(data);
                if (decode_data['success_flag'] == true) {
                    //alert("Uploaded...");
                    redirect_to_URL( FRONT_URL + 'user_login.php' );
                } else {
                    alert(decode_data['message']);
                }
            }
        });
        return false;
    });
    $("#btn_show_more").click(function () {
        if ($(this).val() === "less") {
            $(this).val('more');
            $("#btn_show_more").text("Show More");
        } else {
            $(this).val('less');
            $("#btn_show_more").text("Show Less");
        }
    });
    $('.collapse').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");

    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");

    });
})(jQuery);