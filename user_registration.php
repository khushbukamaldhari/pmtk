<?php
require_once 'config.php';
include_once FL_USER_HEADER;
include_once FL_OPTIONS;
include_once FL_AVAILABILITY;
include_once FL_COUNTRY;
?>
<style>
    .panel-title{
        width: 100%;
        text-align: center !important;
    }
    #upload-demo-i img {
        margin-left: 6px;
    }

    @media screen and (max-width: 775px){
        #cover{
            display: none ;
        }
        .form-group {
            margin-bottom: 5px;
        }
        .form-group:last-child {
            margin-bottom: 0px;
        }
    }

</style>
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>croppie.css" media="screen" />
<div class="page-content-wrap">
    <div class="col-sm-12 tmp">
        <div class="row" style=" max-width: 900px;margin: 0 auto;">
            <div class="col-md-12 clearfix no-padding">
                <div class="panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="width: 100%; text-align: center;">Sign Up</h3>
                    </div>
                    <div class="panel-body">

                        <!-- START WIZARD WITH VALIDATION -->
                        <div class="block">
                            <form action="#" role="form" class="form-horizontal" id="frm_cook_registration" name="frm_cook_registration" enctype="multipart/form-data" class="form-horizontal">
                                <div class="wizard show-submit frm_cook_registration wizard-validation">
                                    <ul>
                                        <li>
                                            <a href="#step-1">
                                                <span class="stepNumber">1</span>
                                                <span class="stepDesc">Information<br /><small>Personal Data</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-2">
                                                <span class="stepNumber">2</span>
                                                <span class="stepDesc">Additional<br /><small>Additional Details</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-3">
                                                <span class="stepNumber">3</span>
                                                <span class="stepDesc">Plan<br /><small>Select Plan</small></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#step-4">
                                                <span class="stepNumber">4</span>
                                                <span class="stepDesc">Media<br /><small>Media</small></span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div id="step-1">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="txt_username" name="txt_username" placeholder="Username" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Full Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="txt_full_name" name="txt_full_name" placeholder="Full Name" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">E-mail:</label>
                                            <div class="col-md-9">
                                                <input type="text" value="" id="txt_email" name="txt_email" placeholder="E-Mail" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" name="txt_password" placeholder="Password" id="txt_password" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Re-Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" name="txt_cpassword" placeholder="Re-Password" id="txt_cpassword" required/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Account Type</label>
                                            <div class="col-md-9 col-xs-12">
                                                <select class="form-control select" id="ddl_type" name="ddl_type" required>
                                                    <option value="cook">Cook / Chef</option>
                                                    <option value="taster">Taster</option>
                                                    <option value="delivery">Delivery Driver</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                            <div class="col-md-9 col-xs-12">
                                                <div class="col-md-3">
                                                    <label class="check">
                                                        <input type="radio" class="iradio" value="M" name="rdo_gender" checked /> Male
                                                    </label>
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="check">
                                                        <input type="radio" class="iradio" value="F" name="rdo_gender"/> Female
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Skills</label>
                                            <div class="col-md-9 col-xs-12">
                                                <textarea class="form-control" rows="5" id="txt_skills" name="fields[skills]"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Passion</label>
                                            <div class="col-md-9 col-xs-12">
                                                <textarea class="form-control" rows="5" id="txt_passion" name="fields[passion]"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Experience</label>
                                            <div class="col-md-9 col-xs-12">
                                                <textarea class="form-control" rows="5" id="txt_experience" name="fields[experience]"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="step-2">
                                        <?php
                                        $all_fields = $opt->get_options();
                                        $opt->show_options('cook');

                                        $str_avail_from = $avail->fill_availability('From');
                                        $str_avail_to = $avail->fill_availability('To');
                                        ?>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Availability</label>
                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-12 control-label">Monday</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-from avail1-from show-up" name="availability[availability_1][from]" data-avail="avail1-to">
                                                                <?php echo $str_avail_from; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-to avail1-to show-up" name="availability[availability_1][to]" data-avail="avail1-from">
                                                                <?php echo $str_avail_to; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-12 control-label">Tuesday</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-from avail2-from show-up" name="availability[availability_2][from]" data-avail="avail2-to">
                                                                <?php echo $str_avail_from; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-to avail2-to show-up" name="availability[availability_2][to]" data-avail="avail2-from">
                                                                <?php echo $str_avail_to; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-12 control-label">Wednesday</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-from avail3-from show-up" name="availability[availability_3][from]" data-avail="avail3-to">
                                                                <?php echo $str_avail_from; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-to avail3-to show-up" name="availability[availability_3][to]" data-avail="avail3-from">
                                                                <?php echo $str_avail_to; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-12 control-label">Thursday</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-from avail4-from show-up" name="availability[availability_4][from]" data-avail="avail4-to">
                                                                <?php echo $str_avail_from; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-to avail4-to show-up" name="availability[availability_4][to]" data-avail="avail4-from">
                                                                <?php echo $str_avail_to; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-12 control-label">Friday</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-from avail5-from show-up" name="availability[availability_5][from]" data-avail="avail5-to">
                                                                <?php echo $str_avail_from; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-to avail5-to show-up" name="availability[availability_5][to]" data-avail="avail5-from">
                                                                <?php echo $str_avail_to; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-12 control-label">Saturday</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-from avail6-from show-up" name="availability[availability_6][from]" data-avail="avail6-to">
                                                                <?php echo $str_avail_from; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-to avail6-to show-up" name="availability[availability_6][to]" data-avail="avail6-from">
                                                                <?php echo $str_avail_to; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-4 col-xs-12 control-label">Sunday</label>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-from avail7-from show-up" name="availability[availability_7][from]" data-avail="avail7-to">
                                                                <?php echo $str_avail_from; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-xs-12">
                                                        <div class="input-group">
                                                            <select class="form-control avail-to avail7-to show-up" name="availability[availability_7][to]" data-avail="avail7-from">
                                                                <?php echo $str_avail_to; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                                            <div class="col-md-9 col-xs-12">
                                                <div class="input-group">
                                                    <div style="width: 200px; margin-bottom: 10px;">
                                                        <select class="form-control select" id="ddl_phone_code" name="fields[contact_code]">
                                                            <?php echo $country->show_phone_codes(); ?>
                                                        </select>
                                                        <div class="" id="err_ddl_phone_code"></div>
                                                    </div>
                                                    <input type="text" class="form-control" id="txt_contact" name="fields[contact]" >
                                                    <div class="" id="err_txt_contact"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Country</label>
                                            <div class="col-md-9 col-xs-12">
                                                <select class="form-control select" id="ddl_country" name="fields[country]">
                                                    <?php echo $country->show_countries(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">State</label>
                                            <div class="col-md-9 col-xs-12">
                                                <select class="form-control select" id="ddl_state" name="fields[state]">
                                                    <option value="">-Select Country First-</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">City</label>
                                            <div class="col-md-9 col-xs-12">
                                                <input type="text" class="form-control" id="txt_city" name="fields[city]" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 col-xs-12 control-label">Zipcode</label>
                                            <div class="col-md-9 col-xs-12">
                                                <div class="input-group">
                                                    <input type="text" id="txt_zipcode" class="form-control" name="fields[zipcode]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-3">
                                        <div class="col-md-6">
                                            <div class="col-md-offset-2 col-md-8">
                                                <label class="check" for="rdo_plan_basic" style="width: 100%;">
                                                    <div class="panel panel-warning">
                                                        <div class="panel-body panel-body-pricing">
                                                            <h2>Basic Chef<br><small>$9.99</small></h2>                                
                                                            <p><span class="fa fa-caret-right"></span> Add Profiles</p>
                                                            <p><span class="fa fa-caret-right"></span> View contact details</p>
                                                            <p><span class="fa fa-caret-right"></span> Contact sellers</p>
                                                            <p><span class="fa fa-caret-right"></span> View pictures</p>
                                                            <p><span class="fa fa-caret-right"></span>Featured account</p>
                                                            <p><span class="fa fa-caret-right"></span> Request cuisine samples</p>
                                                            <p><span class="fa fa-caret-right"></span> Standard : Unlim</p>
                                                            <p><span class=""></span>
                                                                <input  value="basic" type="radio" id="rdo_plan_basic" class="iradio"  name="fields[membership]" checked/>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-offset-2 col-md-8">
                                                <label class="check" for="rdo_plan_premium" style="width: 100%;">
                                                    <div class="panel panel-danger">
                                                        <div class="panel-body panel-body-pricing">
                                                            <h2>Premium<br><small>Free</small></h2>                                
                                                            <p><span class="fa fa-caret-right"></span> Add Profiles</p>
                                                            <p><span class="fa fa-caret-right"></span> View contact details</p>
                                                            <p><span class="fa fa-caret-right"></span> Contact sellers</p>
                                                            <p><span class="fa fa-caret-right"></span> View pictures</p>
                                                            <p><span class="fa fa-caret-right"></span>Featured account</p>
                                                            <p><span class="fa fa-caret-right"></span> Request cuisine samples</p>
                                                            <p><span class="fa fa-caret-right"></span> Featured: of 1</p>
                                                            <p><span class=""></span> 
                                                                <input  value="premium" type="radio" id="rdo_plan_premium" class="iradio"  name="fields[membership]"/>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="step-4">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group" style="text-align: center;">
                                                <button class="btn btn-danger" type="button" id="profile">Profile Picture</button>
                                            </div>
                                            <!--<button style="display: none;" id="up_profile" name="up_profile" class="btn btn-success" value="up_profile">Upload</button>-->
                                        </div>
                                        <div class="col-md-6  col-sm-6 col-xs-6">
                                            <div class="form-group"  style="text-align: center;">
                                                <button class="btn btn-danger" id="cover">Cover Picture</button>
                                            </div>
                                            <!--<button style="display: none;" id="up_cover" name="up_cover" class="btn btn-success" value="up_cover">Upload</button>-->
                                        </div>
                                        <!--<button style="display: none;" id="up_profile" name="up_profile" class="btn btn-success" value="up_profile">Upload</button>-->
                                        <!--</div>-->
                                        <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="min-height: 320px;background: #fff;" id="profile_image_display">
                                            <div class="form-group">
                                                <h3 style="text-align: center;">Profile Pic</h3>
                                                <div class="row">
                                                    <div class="col-md-7 text-center">
                                                        <div id="upload-demo_profile"></div>
                                                        <div class="col-md-12">
                                                            <span class="col-md-1"></span>
                                                            <a href="#" class=" col-md-3 brn btn-danger" style="margin-left: 7px;padding: 8px; font-size: 13px;text-align: center;" onclick="document.getElementById('upload_profile').click(); return false;" />Browse</a>
                                                            <button class="btn btn-success upload-result_profile col-md-3" style="margin: 0px 20px;padding: 7px 0px;" id="crop_img_profile">Crop Image</button>
                                                            <input  style="visibility: hidden;" title="" type="file" value="choose file" id="upload_profile">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5" style="">
                                                        <div id="upload-demo-profile"  style="background:#e1e1e1;width:270px;padding:10px;height:270px;margin-top:30px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button style="display: none;" id="up_cover" name="up_cover" class="btn btn-success" value="up_cover">Upload</button>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12" style="min-height: 320px;background: #fff;" id="cover_image_display">
                                            <div class="form-group">
                                                <h3 style="text-align: center;">Cover Pic</h3>
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        <div id="upload-demo" style="margin: 0 auto;"></div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <span class="col-md-1"></span>
                                                        <a href="#" class=" col-md-2 brn btn-danger" style="padding: 8px; font-size: 13px;text-align: center;" onclick="document.getElementById('upload').click(); return false;" />Browse</a>

                                                        <button class="btn btn-success upload-result col-md-2" style="margin: 0px 20px;padding: 7px 0px;"  id="crop_img">Crop Image</button>
                                                        <input  style="visibility: hidden;" type="file" id="upload">
                                                    </div>
                                                    <div class="col-md-12" style="">
                                                        <div id="upload-demo-i"  style="margin: 0 auto;background:#e1e1e1;width:750px;padding:10px;height:225px;margin-top:30px"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button style="display: none;" id="up_cover" name="up_cover" class="btn btn-success" value="up_cover">Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- END WIZARD WITH VALIDATION -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
include_once FL_USER_FOOTER_INCLUDE;
?>

<script type='text/javascript' src='<?php echo ADMIN_JS_PLUGINS_PATH; ?>icheck/icheck.min.js'></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>bootstrap/bootstrap-select.js"></script>

<script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>smartwizard/jquery.smartWizard-2.0.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>jquery-validation/jquery.validate.js"></script>
<script type='text/javascript' src='<?php echo ADMIN_JS_PLUGINS_PATH; ?>maskedinput/jquery.maskedinput.min.js'></script>
<script type='text/javascript' src='<?php echo ADMIN_JS_PLUGINS_PATH; ?>jQuery-Mask-Plugin-master/jquery.mask.js'></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>summernote/summernote.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>fileinput/fileinput.min.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>user.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>croppie.js"></script>
<script>
    (function ($) {
        var reg_validator = $("#frm_cook_registration").validate({
            onsubmit: true,
            rules: {
                txt_username: {
                    required: true,
                    minlength: 3,
                    maxlength: 15
                },
                txt_full_name: {
                    required: true
                },
                txt_password: {
                    required: true,
                    minlength: 5,
                    maxlength: 16
                },
                txt_cpassword: {
                    required: true,
                    minlength: 5,
                    maxlength: 16,
                    equalTo: "#txt_password"
                },
                txt_email: {
                    required: true,
                    email: true
                }
            }
        });
        var reg_validator2 = $("#frm_cook_registration").validate({
            onsubmit: true,
        });

        set_only_digits('#txt_contact');
        set_only_alphabets('#txt_full_name');

        if ($(".frm_cook_registration").length > 0) {

    //Check count of steps in each wizard
            $(".frm_cook_registration > ul").each(function () {
                $(this).addClass("steps_" + $(this).children("li").length);
            });//end

    // This par of code used for example

            $(".frm_cook_registration").smartWizard({
                // This part of code can be removed FROM
                onLeaveStep: function leaveAStepCallback(obj) {
                    var wizard = obj.parents(".frm_cook_registration");
                    var step = obj.attr('rel');
                    console.log(step);
                    if (wizard.hasClass("wizard-validation")) {

                        var valid = true;

                        $('input,textarea', $(obj.attr("href"))).each(function (i, v) {
                            if (step == 1) {
                                valid = reg_validator.element(v) && valid;
                            } else if (step == 2) {
                                //valid = reg_validator2.element(v) && valid;
                            }
                        });
                        var valid_data = true;

                        if (!valid) {
                            wizard.find(".stepContainer").removeAttr("style");
                            if (step == 1) {
                                reg_validator.focusInvalid();
                            } else if (step == 2) {
                                //reg_validator2.focusInvalid();
                            }
                            return false;
                        } else {
                            if (step == 1) {
                                show_loader();
                                check_valid_email();
                                var str = '&action=check_user_exist&username=' + $("#txt_username").val() + '&email=' + $("#txt_email").val();
                                $.ajax({
                                    type: "POST",
                                    dataType: "html",
                                    url: AJAX_URL,
                                    data: str,
                                    async: false,
                                    success: function (data) {
                                        console.log(data);
                                        var decode_data = JSON.parse(data);
    //                                        $("#txt_username").removeClass('error');
    //                                        $("#txt_email").removeClass('error');
                                        if (decode_data['success_flag'] == true) {
                                        } else {
                                            valid_data = false;
                                            if (decode_data.data.invalid == 'username') {
                                                reg_validator.showErrors({
                                                    "txt_username": decode_data['message']
                                                });
                                            } else if (decode_data.data.invalid == 'email') {
                                                reg_validator.showErrors({
                                                    "txt_email": decode_data['message']
                                                });
                                            }
                                        }
                                    },
                                    error: function (jqXHR, textStatus, errorThrown) {
                                        console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                                    }
                                });
                                hide_loader();
                            }
                            if (valid_data == false) {
                                return false;
                            } else {
                                if (step == 2) {
                                    return check_contact();
                                }
                                return true;
                            }
                        }
                    }

                    return true;
                }, // <-- TO

                //This is important part of wizard init
                onShowStep: function (obj) {
                    var wizard = obj.parents(".frm_cook_registration");
                    var step = obj.attr('rel');
                    if (wizard.hasClass("show-submit")) {

                        var step_num = obj.attr('rel');
                        var step_max = obj.parents(".anchor").find("li").length;

                        if (step_num == step_max) {
                            obj.parents(".frm_cook_registration").find(".actionBar .btn-primary").css("display", "block");
                        }
                    }
                    if (step == 2) {
                        if ($(window).width() < 400) {
                            $(".stepContainer").height(2250);

                        }
                    }
                    if (step == 1) {
                            $(".actionBar .btn-default.pull-left").css('display','none');
                    }
                    else{
                          $(".actionBar .btn-default.pull-left").css('display','block');
                    }
                    return true;
                }//End

            });
        }

        function check_valid_email() {
            var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            if (!expr.test($.trim($("#txt_email").val())) && $.trim($("#txt_email").val()) != '') {
                reg_validator.showErrors({
                    "txt_email": "Please enter a valid email address."
                });
            }
        }

        $('#ddl_country').change(function () {
            show_loader();
            str = '&state_id=' + $(this).val() + '&action=get_states'
            $.ajax({
                type: "POST",
                dataType: "html",
                url: AJAX_URL,
                data: str,
                async: false,
                success: function (data) {
                    var decode_data = JSON.parse(data);
                    console.log(decode_data['data']);
                    $('#ddl_state').html('<option value="">- Select State -</option>');
                    if (decode_data['success_flag'] == true) {
                        $('#ddl_state').html(decode_data['data']);
                        $('#ddl_state').selectpicker('refresh');
                    } else {
                        $('#ddl_state').html('<option value="">- Select State -</option>');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                }
            });
            hide_loader();
        });
        $('#txt_email').blur(function () {
            check_valid_email();
        });
        $('#txt_contact').blur(function () {
            check_contact();
        });
        function check_contact() {
            if (($('#txt_contact').val().length > 0 && ($('#txt_contact').val().length < 15 || $('#txt_contact').val().length > 15))) {
                if ($("#ddl_phone_code").val() == '') {
                    $('#ddl_phone_code').next('.select').css('border-color', '#b64645');
                    $("#err_ddl_phone_code").html('<label id="ddl_phone_code-error" class="error" for="txt_contact">Please select country code.</label>');
                    $('#ddl_phone_code').next('.select').focus();
                } else {
                    $('#ddl_phone_code').next('.select').css('border-color', '#95b75d');
                    $("#ddl_phone_code-error").remove();
                    $('#txt_contact').css('border-color', '#b64645');
                    $("#err_txt_contact").html('<label id="txt_contact-error" class="error" for="txt_contact">Please enter valid contact number.</label>');
                    $('#txt_contact').focus();
                }
                return false;
            } else {
                if ($('#txt_contact').val().length > 0 && $("#ddl_phone_code").val() == '') {
                    $('#ddl_phone_code').next('.select').css('border-color', '#b64645');
                    $("#err_ddl_phone_code").html('<label id="ddl_phone_code-error" class="error" for="txt_contact">Please select country code.</label>');
                    $('#ddl_phone_code').next('.select').focus();
                    return false;
                } else {
                    $('#ddl_phone_code').next('.select').css('border-color', '#95b75d');
                    $("#ddl_phone_code-error").remove();
                    $('#txt_contact').css('border-color', '#95b75d');
                    $("#txt_contact-error").remove();
                    return true;
                }
            }
        }
        $("#txt_contact").mask('(000)-000-00-00', {placeholder: '(000)-000-00-00'});

    })(jQuery);
    $uploadCrop = $('#upload-demo').croppie({
        enableExif: true,
        viewport: {
            width: 715,
            height: 205,
            type: 'square'
        },
        boundary: {
            width: 735,
            height: 225
        }
    });
    $uploadCrop_profile = $('#upload-demo_profile').croppie({
        enableExif: true,
        viewport: {
            height: 250,
            width: 250,
            type: 'square'
        },
        boundary: {
            width: 270,
            height: 270
        }
    });

    $('#upload').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);
    });
    $('#upload_profile').on('change', function () {
        var reader = new FileReader();
        reader.onload = function (e) {
            $uploadCrop_profile.croppie('bind', {
                url: e.target.result
            }).then(function () {
                console.log('jQuery bind complete');
            });

        }
        reader.readAsDataURL(this.files[0]);
    });

    $('.upload-result').on('click', function (ev) {
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
                    console.log(data);
                }
            });
        });
    });
    $('.upload-result_profile').on('click', function (ev) {
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
                    console.log(data);
                }
            });
        });
    });

</script>

<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>plugins.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>actions.js"></script>
<?php
include_once FL_USER_FOOTER;
?>