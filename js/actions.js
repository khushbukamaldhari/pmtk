$(document).ready(function () {

    // click outside spy
    $("html").on("click", function () {
        $(".search").removeClass("active");
    });// end click outside spy

    // toggle search 
    $(".search .search-button").on("click", function (e) {
        $(this).parent(".search").toggleClass("active");
        e.stopPropagation();
    });
    $(".search .search-container").on("click", function (e) {
        e.stopPropagation();
    });// end toggle search

    // MixItUp
    if ($(".mix-grid").length > 0)
        $(".mix-grid").mixItUp();
    // end MixItUp

    // animate on scroll
    $(".this-animate").each(function () {
        $(this).appear(function () {
            $(this).addClass("animated").addClass($(this).data("animate")).addClass("this-animated");
        });
    });
    // end animate on scroll

});

$(function () {
    onPageResize();
    navController();
});

$(window).scroll(function () {
    if ($(window).scrollTop() > 40) {
        $(".page-container").addClass("page-header-fixed");

        if ($(window).scrollTop() < 40)
            $(".page-container .page-content").css("padding-top", $(window).scrollTop());
    } else {
        $(".page-container").removeClass("page-header-fixed");
        $(".page-container .page-content").css("padding-top", "");
    }
});

$(window).resize(function () {
    onPageResize();
});

// on page resize actions
function onPageResize() {

    var pageWidth = window.innerWidth || $(document).width();

    if (pageWidth <= 1100) {
        $(".page-header .navigation").addClass("navigation-mobile");
        $(".page-header .navigation_user").addClass("navigation-mobile");
    } else {
        $(".page-header .navigation").removeClass("navigation-mobile,active").find("li").removeClass("open");
        $(".page-header .navigation_user").removeClass("navigation-mobile,active").find("li").removeClass("open");
    }

}// end on page resize actions

// navigation controller 
function navController() {

    // toggle navigation
    // toggle navigation
    $(".navigation-toggle-button").on("click", function () {
        if ($(".navigation").hasClass("fadeout"))
            $(".navigation").removeClass("fadeout").addClass("fadein");
        else
            $(".navigation").removeClass("fadein").addClass("fadeout");
        
        $(".page-header .navigation_user").removeClass("active");
        $(".page-header .navigation").toggleClass("active");
    });
    $(".navigation-toggle-user").on("click", function () {
         if ($(".navigation_user").hasClass("fadeout"))
            $(".navigation_user").removeClass("fadeout").addClass("fadein");
        else
            $(".navigation_user").removeClass("fadein").addClass("fadeout");
        
        $(".page-header .navigation").removeClass("active");
        $(".page-header .navigation_user").toggleClass("active");
    });
    // end toggle navigation

    $(".page-header-holder").on("click", ".navigation-mobile li > a", function (e) {

        var li = $(this).parent("li");

        if (li.children("ul").length > 0) {
            li.toggleClass("open");
        }

    });
}// end navigation controller 