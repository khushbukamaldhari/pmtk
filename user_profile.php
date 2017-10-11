<?php
require_once 'config.php';
$meta_opt_t = array(
    'option_type' => 'cook',
    'single' => true
);
$meta_opt_f = array(
    'option_type' => 'cook',
    'single' => false
);

session_start();
$own_profile = 0;
$edit_class = '';
if( isset( $_REQUEST['user_id'] ) && $_REQUEST['user_id'] > 0 ){
    $user_id = $_REQUEST['user_id'];
} else if( isset( $_SESSION['user_id'] ) && $_SESSION['user_id'] > 0 ){
    $user_id = $_SESSION['user_id'];
    if( $_SESSION['user_id'] == $user_id ){
        $own_profile = 1;
        $edit_class = 'btn-edit';
    }
} else {
    header( "location:" . BASE_URL . "user_login.php" );
    exit;
}

include_once FL_USER_HEADER;
include_once FL_USER;
include_once FL_OPTIONS;
$user_data = $user->get_user_data( $user_id );
$user_membership = $user_city = $user->get_user_meta( $user_id, 'membership', true );
//echo $user_id;
?>
<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9  col-xs-12 col-sm-12 no-padding" id="user_main_blocks" style="margin: 20px 0px;">
                <?php
                    include_once USER_PRO_DETAIL;
                ?>
                <div class='col-md-12' id="user_desktop">
                    <div class='col-md-12 pv-profile-section pv-top-card-section artdeco-container-card profile_pic_bg'>
                        <div>
                            <label class="pv-top-letter-section__cuisine_headline" style="margin-bottom: 0;">
                                <a data-toggle="collapse" data-target="#my_profile1">
                                    <h3 class="lbl-profile">
                                        My Cover Letter
<!--                                        <span class="glyphicon glyphicon-minus-sign" style="float:right;text-align: center;"></span>-->
                                    </h3>
                                </a>
                            </label>
                            <div id="my_profile" class="collapse in my_profile" >
                                <div class="pane-about">
                                    <div class="pane-left-heading col-md-3 no-padding">
                                        <a href="#" class="lnk_tab active" data-tab="tab_speciality"><h5>My Cooking Speciality</h5></a>
                                        <a href="#" class="lnk_tab" data-tab="tab_availability"><h5>Availability</h5></a>
                                        <a href="#" class="lnk_tab" data-tab="tab_biography"><h5>Biography</h5></a>
                                        <a href="#" class="lnk_tab" data-tab="tab_contact"><h5>Contact Details</h5></a>
                                        <a href="#" class="lnk_tab" data-tab="tab_services_offered"><h5>Services Offered</h5></a>
                                    </div>
                                    <div class="pane-body col-md-9" id="user_inner_blocks">
                                        <div class="col-md-12" id="user_blocks">
                                            <?php
                                                include_once USER_PRO_SPECIALITY;                        
                                                include_once USER_PRO_AVAILABILITY;                       
                                                include_once USER_PRO_BIOGRAPHY;
                                                include_once USER_PRO_CONTACT;
                                                include_once USER_PRO_SERVICES;
                                            ?>
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class='col-md-12 pv-profile-section pv-top-card-section artdeco-container-card profile_pic_bg'>
                        <div>
                            <label class="pv-top-letter-section__cuisine_headline" style="margin-bottom: 0;">
                                <a data-target="#my_portfolio">
                                    <h3 class="lbl-profile">
                                        Portfolio
                                        <!--<span class="glyphicon glyphicon-minus-sign" style="float:right;text-align: center;"></span>-->
                                    </h3>
                                </a>
                            </label>
                            <div id="my_portfolio" class="collapse in my_portfolio" >
                                <div class="pane-about">
                                    <div class="pane-left-heading col-md-3 no-padding">
                                        <a href="#" class="lnk_tab_pf active" data-tab="tab_dishes"><h5>My Dishes</h5></a>
                                        <a href="#" class="lnk_tab_pf" data-tab="tab_cuisine"><h5>My Cuisine</h5></a>
                                    </div>
                                    <div class="pane-body col-md-9" id="user_inner_blocks_pf">
                                        <div class="col-md-12" id="user_blocks_pf">
                                            
                                        </div>
                                    </div>                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    
<!--                    <div class='col-md-12 pv-profile-section pv-top-card-section artdeco-container-card profile_pic_bg'>
                        <div>
                            <label class="pv-top-letter-section__cuisine_headline" style="margin-bottom: 0;">
                                <a  data-target="#my_membership">
                                    <h4 class="color_blue">
                                        Membership
                                        <span class="glyphicon glyphicon-minus-sign" style="float:right;text-align: center;"></span>
                                    </h4>
                                </a>
                            </label>
                            <div id="my_membership" class="collapse in my_membership" >
                                <div class="pane-about" style="padding-top: 24px;">                                    
                                    <div class="col-md-12" id="user_inner_blocks_member">
                                        <div class="col-md-12 no-padding" id="user_blocks_member">
                                            <?php if( $user_membership == 'basic' ){ ?>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-warning">
                                                        <div class="panel-body panel-body-pricing">
                                                            <h2>Basic Chef<br><small>Free</small></h2>                                
                                                            <p><span class="fa fa-caret-right"></span> Add Profiles</p>
                                                            <p><span class="fa fa-caret-right"></span> View contact details</p>
                                                            <p><span class="fa fa-caret-right"></span> Contact sellers</p>
                                                            <p><span class="fa fa-caret-right"></span> View pictures</p>
                                                            <p><span class="fa fa-caret-right"></span>Featured account</p>
                                                            <p><span class="fa fa-caret-right"></span> Request cuisine samples</p>
                                                            <p><span class="fa fa-caret-right"></span> Standard : Unlim</p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } else if( $user_membership == 'premium' ){ ?>
                                                <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="panel panel-danger">
                                                        <div class="panel-body panel-body-pricing">
                                                            <h2>Premium<br><small>$9.99</small></h2>                                
                                                            <p><span class="fa fa-caret-right"></span> Add Profiles</p>
                                                            <p><span class="fa fa-caret-right"></span> View contact details</p>
                                                            <p><span class="fa fa-caret-right"></span> Contact sellers</p>
                                                            <p><span class="fa fa-caret-right"></span> View pictures</p>
                                                            <p><span class="fa fa-caret-right"></span>Featured account</p>
                                                            <p><span class="fa fa-caret-right"></span> Request cuisine samples</p>
                                                            <p><span class="fa fa-caret-right"></span> Featured: of 1</p>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>

<!--                        <div  id="show_more" class="collapse">

                    </div>-->
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 my-pro-side" style="margin: 20px 0px">
                <div>
                    <div>
                        <button class="col-md-12 col-sm-12 col-lg-12 btn btn-info pv-top-letter-section__sidebar_button">Edit Your Profile</button>
                    </div>
                    <div>
                        <button class="col-md-12 col-sm-12 col-lg-12 btn btn-info pv-top-letter-section__sidebar_button">Add Photo Gallery</button>
                    </div>
                </div>
            </div>
<!--                <div class="col-md-offset-4 col-md-4 col-sm-offset-4 col-sm-4 ">
                <button data-toggle="collapse" id="btn_show_more" value="more" data-target="#show_more" class="btn btn-info  pv-top-letter-section__show_more">Show More</button>
            </div>-->
        </div>
    </div>
</div>
<!-- ./page content -->
<?php
include_once FL_USER_FOOTER_INCLUDE;
?>
<script type='text/javascript' src='<?php echo ADMIN_JS_PLUGINS_PATH; ?>icheck/icheck.min.js'></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>myprofile.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>plugins.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>actions.js"></script>
<?php
include_once FL_USER_FOOTER;
?>
<script>

    (function ($) {
        //var height = document.getElementById('about_me').style.height;
        var about_me = parseInt( $("#about_me").height() );
        console.log( about_me + " - " );
        if(about_me > 43){
            //alert(about_me);
            //$("#about_me").height();
            $("#about_me").addClass('showmore');
            $("#show_more").click(function () {
                if ($(this).val() == "more") {
                    $(this).val('less');
                    $("#show_more").text('Show Less');
                    $("#about_me").removeClass("showmore");
                    $("#about_me").addClass("showless");
                } else {
                    $(this).val('more');
                    $("#show_more").text('Show More');
                    $("#about_me").addClass("showmore");
                    $("#about_me").removeClass("showless");
                }
            });
        }
        else{
            $("#show_more").css("display","none");
        }
    })(jQuery);
</script>
<?php