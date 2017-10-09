(function ($) {
    $("#frm_admin_login").submit(function (e) {
        e.preventDefault();
        var str = '&action=admin_login';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: AJAX_URL,
            data: $("#frm_admin_login").serialize() + str,
            async: false,
            success: function (data) {
                console.log(data);
                var decode_data = JSON.parse(data);
                if (decode_data['success_flag'] == true) {
                    $("#err_wrong").text("");
                    redirect_to_URL(decode_data['redirect']);
                } else {
                    $("#err_wrong").text(decode_data['message']);
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
                    redirect_to_URL( ADMIN_URL );
                } else {
                    alert(decode_data['message']);
                }
            }
        });
        return false;
    });
})(jQuery);