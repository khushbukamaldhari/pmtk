var ERR_AJAX = "Something went wrong!!! Please try again...";
var ERR_BLANK_FORM = "Please Fill All the Required Fields...";
var SUBDIR = '/cook/';
var FRONT_URL = window.location.protocol + "//" + window.location.host + SUBDIR;
var loader_div = '<div id="loadingDiv"><img src="' + FRONT_URL + 'images/ajax-loader.gif" class="ajax-loader" alt="Loading..." /></div>';
var flag = true;

var SERVER = window.location.protocol + '//' + window.location.host;
var ADMIN_URL = SERVER + SUBDIR + "admin/";
var AJAX_URL = SERVER + SUBDIR + "admin/admin_ajax.php";
var USER_AJAX_URL = SERVER + SUBDIR + "user_ajax.php";

//var ADMIN_URL = "http://" + SERVER + "/wp-admin/admin-ajax.php";
function clear_element(element) {
    jQuery(element).attr('value', "");
}

function show_loader() {
    jQuery('#loader_placeholder').html(loader_div);
    jQuery('#loader_placeholder').show();
}
function hide_loader() {
    jQuery('#loader_placeholder').html("");    
    jQuery('#loader_placeholder').hide();
}

//Pass Only el Name
function is_selected(el)
{
    if (jQuery(el + " option:selected").index() == 0)
    {
        invalid_input(el, true);
        flag = false;
    } else
    {
        invalid_input(el, false);
    }
}

function validate_length(el, min, max)
{
    if (jQuery(el).val().length < min || jQuery(el).val().length > max)
    {
        invalid_input(el, true);
        flag = false;
    } else
    {
        invalid_input(el, false);
    }
}

function match_two_elements(el1, el2)
{
    //console.log(jQuery(el1).val() + ' - ' + jQuery(el2).val());
    if (jQuery(el1).val() != jQuery(el2).val())
    {
        invalid_input(el2, true);
        flag = false;
    } else
    {
        //console.log("hello");
        invalid_input(el2, false);
    }
    //console.log(flag);
}

//(function (jQuery) {
//To Reload current page
function reload_page() {
    window.location.reload();
    window.location.href = document.URL;
}

//To Redirect Page
function redirect_to_URL(REDIRECT_URL) {
    window.location.href = REDIRECT_URL;
}

//To Reset Form
function reset_form(formId) {
    jQuery('#' + formId)[0].reset();
}

//Remove Errors
function remove_form_errors(formId) {
    jQuery('#' + formId + ' input').css('box-shadow', '0');
    jQuery('#' + formId + ' select').css('box-shadow', '0');
    jQuery('#' + formId + ' textarea').css('box-shadow', '0');
}


//Apply CSS to Wrong Input
function invalid_input(el, vflag) {
    if (vflag) {
        jQuery(el).addClass("input-err");
    } else {
        jQuery(el).removeClass("input-err");
    }
}

//Check Validation On Blur
function err_on_blur(el, fn) {
    jQuery(el).blur(function () {
        fn(el);
    });
}
//Set Validation on Multiple IDs
function check_validation(arrlst, func) {
    jQuery.map(arrlst, function (val) {
        func(val);
    });
}
//Set Validation on Blur Event on Multiple IDs
function set_on_blur_validation(arrlst, func) {
    jQuery.map(arrlst, function (val) {
        err_on_blur(val, func);
    });
}
//Check Blank Text Field
function is_blank(el) {
    //console.log(jQuery(el).val());
    if (jQuery.trim(jQuery(el).val()) == "") {
        invalid_input(el, true);
        flag = false;
    } else {
        invalid_input(el, false);
    }
}
//Email Validation
function is_email(el) {
    if (jQuery.trim(jQuery(el).val()) != "") {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (!expr.test(jQuery.trim(jQuery(el).val()))) {
            invalid_input(el, true);
            flag = false;
        } else {
            invalid_input(el, false);
        }
    } else {
        invalid_input(el, true);
    }
}

function set_only_alphabets(el)
{
    jQuery(el).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != 32 && (e.which < 65 || e.which > 90) && (e.which < 97 || e.which > 122)) {
            return false;
        }
    });
}

function set_only_digits(el)
{
    jQuery(el).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
}
function set_only_price(el)
{
    jQuery(el).keypress(function (e) {
        if (e.which != 8 && e.which != 0 && e.which != 46 && (e.which < 48 || e.which > 57)) {
            return false;
            //if(jQuery(el).val())
        }
    });
}


jQuery.fn.set_toggle = function () {
    if (jQuery(this).attr('checked') == undefined) {
        jQuery(this).attr('checked', true);
    } else {
        jQuery(this).removeAttr('checked');
    }
};

function copyToClipboard(textToCopy) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(textToCopy).select();
    document.execCommand("copy");
    $temp.remove();
}
