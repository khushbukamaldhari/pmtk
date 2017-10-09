(function ($) {
    $("#frm_user_login").submit( function (e){
        show_loader();
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
        hide_loader();
        return false;
    });
    
     $("#crop_img").click(function () {
        $uploadCrop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {

            $.ajax({
                url: FRONT_URL + "js/plugins/upload_crop/ajaxpro.php",
                type: "POST",
                data: {"cover_image": resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    $("#upload-demo-i").html(html);
                }
            });
        });
        return false;
    });
     $("#crop_img_profile").click(function () {
        $uploadCrop_profile.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (resp) {

            $.ajax({
                url: FRONT_URL + "js/plugins/upload_crop/ajaxpro.php",
                type: "POST",
                data: {"image_profile": resp},
                success: function (data) {
                    html = '<img src="' + resp + '" />';
                    $("#upload-demo-profile").html(html);
                }
            });
        });
        return false;
    });
    
   $("#frm_cook_registration").submit(function (e) {
//        $(".summernote").each( function(){
//            console.log( $(this).summernote( 'code' ) );
//        });
//        $.each( editor, function( index, value ) {
//            $( "#" + value ).val( $( "#" + value ).code() );
//        });
        //console.log( $(".summernote").code() );
        show_loader();
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
                    //$('#up_profile').click();
                    //$('#up_cover').click();
                    redirect_to_URL(FRONT_URL + 'user_login.php');
                } else {
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        hide_loader();
        return false;
    });

    $("#file_profile").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
    
    $('#up_profile').on('click', function () {
        if( $('#file_profile').val() != '' && $('#file_profile').val() != "undefined" ){
            show_loader();
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
            hide_loader();
        }
        return false;
    });

    $("#file_cover").fileinput({
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-danger",
        fileType: "any"
    });
    
    $('#up_cover').on('click', function () {
        if( $('#file_cover').val() != '' && $('#file_cover').val() != "undefined" ){
            show_loader();
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
            hide_loader();
        }
        redirect_to_URL( FRONT_URL + 'user_login.php' );
        return false;
    });
    
    $(".avail-from").change( function(){
        //alert( $( "." + $(this).data('avail') ).val() );
        var cur_val = parseFloat( $(this).val() );
        console.log(cur_val);
        var c_to = $(this).data('avail');
        var $change_to = $( "." + c_to );
        if( $change_to.val() == 'NA' || parseFloat( $change_to.val() ) < cur_val ){
            $change_to.val( cur_val );
        }
        $("." + c_to + " > option").each(function() {
            if( this.value == 'NA' || parseFloat(this.value) < cur_val ){
                $(this).attr("disabled", true);
            } else {
                $(this).removeAttr("disabled");
            }
        });
    });
    $(".avail-to").change( function(){
        //alert( $( "." + $(this).data('avail') ).val() );
        var cur_val = parseFloat( $(this).val() );
        console.log(cur_val);
        var c_from = $(this).data('avail');
        var $change_to = $( "." + c_from );
        if( $change_to.val() == 'NA' || parseFloat( $change_to.val() ) > cur_val ){
            $change_to.val( cur_val );
        }
        $("." + c_from + " > option").each(function() {
            if( this.value == 'NA' || parseFloat(this.value) > cur_val ){
                $(this).attr("disabled", true);
            } else {
                $(this).removeAttr("disabled");
            }
        });
    });
    $("#profile_image_display").hide();
    $("#cover_image_display").hide();
    $("#profile").click(function () {
        $(".stepContainer").height(450);
        if ($(window).width() < 775) {
            $(".stepContainer").height(875);
        }
        $("#profile_image_display").show();
        $("#cover_image_display").hide();
        return false;
    });
    $("#cover").click(function () {
        $(".stepContainer").height(750);
        $("#cover_image_display").show();
        $("#profile_image_display").hide();
        return false;
    });
})(jQuery);