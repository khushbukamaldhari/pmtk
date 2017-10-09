(function ($) {
    $("#btn_show_more").click(function () {
        if ($(this).val() === "less") {
            $(this).val('more');
            $("#btn_show_more").text("Show More");
        } else {
            $(this).val('less');
            $("#btn_show_more").text("Show Less");
        }
    });
//    $('.cover_letter').on('shown.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
//
//    }).on('hidden.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
//
//    });
//    $('.availability').on('shown.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
//
//    }).on('hidden.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
//
//    });
//    $('.contact').on('shown.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
//
//    }).on('hidden.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
//
//    });
//    $('.biography').on('shown.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");
//
//    }).on('hidden.bs.collapse', function () {
//        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
//    });

    $('.my_profile').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");

    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
    });
    $('.my_portfolio').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");

    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
    });
    $('.my_membership').on('shown.bs.collapse', function () {
        $(this).parent().find(".glyphicon-plus-sign").removeClass("glyphicon-plus-sign").addClass("glyphicon-minus-sign");

    }).on('hidden.bs.collapse', function () {
        $(this).parent().find(".glyphicon-minus-sign").removeClass("glyphicon-minus-sign").addClass("glyphicon-plus-sign");
    });
    
    $( ".btn-edit" ).click( function(){
        $( "." + $( this ).data( 'show' ) ).slideToggle( 'fast' );
        $( "." + $( this ).data( 'edit' ) ).slideToggle( 'fast' );
    });
    
    $( ".frm_usemeta" ).submit( function(e) {
        show_loader();
        e.preventDefault();
        var str = '&action=edit_usermeta&getdata=1';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: USER_AJAX_URL,
            data: $( this ).serialize() + str,
            async: false,
            success: function (data) {
                console.log( data );
//                var decode_data = JSON.parse(data);
//                if( decode_data['success_flag'] == true ){
//                    $( ".btn-edit" ).click();
////                    $("#err_wrong").text( "" );
//                } else {
////                    $("#err_wrong").text( decode_data['message'] );
//                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
        });
        hide_loader();
        return false;
    });
    
    
    
    $( window ).resize(function(){
        if( $( window ).width() < 769 ){
            $(".tab_panel").show();
            $("#user_blocks").appendTo("#user_main_blocks");
            $("#user_blocks_pf").appendTo("#user_main_blocks");
            $("#user_blocks_member").appendTo("#user_main_blocks");
        } else {
            $(".tab_panel").hide().first().show();
            $("#user_blocks").appendTo("#user_inner_blocks");
            $("#user_blocks_pf").appendTo("#user_inner_blocks_pf");
            $("#user_blocks_member").appendTo("#user_inner_blocks_member");          
        }
        $(".pane-body").css( "min-height", $(".pane-left-heading").height() );
    });
    
    $(".lnk_tab").click(function(){
        var tab = $(this).data('tab');
        $(".tab_panel").hide();
        $("." + tab).show();
        $(".lnk_tab").removeClass('active');
        $(this).addClass('active');
        return false;
    });
    $( window ).resize();
})(jQuery);