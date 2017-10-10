$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='password'],input[type='email'],input[type='url'],select,textarea"),
                isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');



    });

    $('div.setup-panel div a.btn-primary').trigger('click');

    // This par of code used for example

    if ($("#register-validation").length > 0) {

        var validator = $("#register-validation").validate({
            rules: {
                uname: {
                    required: true,
                    minlength: 2,
                    maxlength: 8
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 10
                },
                con_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 10,
                    equalTo: "#register_password"
                },
                email: {
                    required: true,
                    email: true
                },
                account_type: {
                    required: true,
                },
                skill: {
                    required: true
                },
                passion: {
                    required: true
                }

            }
        });

    }// End of example
    $("#sex").hide();
    $("#individual").hide();
    $("select[name=account_type]").change(function () {
        var account_type = $(this).val();
        if (account_type == "cook" || account_type == "delivery") {
            $("#sex").show();
            $("#individual").show();
        } else {
            $("#sex").hide();
            $("#individual").hide();
        }
    });

});