<?php
//header("location:user_registration.php");
//exit;
require_once 'config.php';
include_once FL_USER_HEADER;
include_once FL_USER;
include_once FL_COUNTRY;

$cook_cat = 'Cook';
if( isset( $_REQUEST['cook'] ) && trim( $_REQUEST['cook'] ) !== '' ){
    if( $_REQUEST['cook'] == 'men' ){
        $cook_cat = 'Men';
        $cook = $user->get_cook( 'M' );
    } else if( $_REQUEST['cook'] == 'women' ){
        $cook_cat = 'Women';
        $cook = $user->get_cook( 'F' );
    } else {
        $cook = $user->get_cook();
    }
} else {
    $cook = $user->get_cook();
}
?>

<!-- page content -->
<div class="page-content">
    <div class="container main-container">
        <div class="row">
            <div class="col-lg-8 col-md-8  col-xs-12 col-sm-12">
                <div class='col-md-12'>
                    <div class='col-md-12 pv-profile-section pv-top-card-section artdeco-container-card profile_pic_bg'>
                        <div class="featured">
                            <h3 class="border-img"><?php echo $cook_cat; ?></h3>
                            <ul class="row featured clearfix with-pictures" style="padding-left: 0px;">
                                <?php
                                if ( !empty( $cook ) ) {
                                    if( isset( $cook[0] ) ){
                                        foreach ( $cook as $c ) {
                                            $profile = $user->get_user_images( $c['in_user_id'], 'profile' );
                                            ?>
                                            <li  class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                                <a title="<?php echo $c['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $c['in_user_id']; ?>">
                                                    <!--<img alt="<?php echo $c['st_full_name']; ?>" src="<?php echo $profile; ?>">-->
                                                    <div class="user-profile" style="background: url('<?php echo $profile; ?>');" ></div> 
                                                </a>
                                                <a class="link" title="<?php echo $c['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $c['in_user_id']; ?>"><?php echo $c['st_full_name']; ?>
                                                </a>
                                            </li>
                                            <?php
                                        }  
                                    } else {
                                        $c = $cook;
                                        $profile = $user->get_user_images( $c['in_user_id'], 'profile' );
                                        ?>
                                        <li  class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <a title="<?php echo $c['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $women['in_user_id']; ?>">
                                                <div class="user-profile" style="background: url('<?php echo $profile; ?>');" ></div> 
                                            </a>
                                            <a class="link" title="<?php echo $c['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $women['in_user_id']; ?>"><?php echo $c['st_full_name']; ?>
                                            </a>
                                        </li>
                                        <?php
                                    }                          
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 sidebar">
                <?php include_once FL_SEARCH_DISTANCE; ?>
                <?php include_once FL_SEARCH_LOCATION; ?>
                <?php // include_once FL_SEARCH_ADVANCED; ?>                
            </div>
        </div>
    </div>
</div>
<!-- ./page content -->
<?php
include_once FL_USER_FOOTER_INCLUDE;
include_once FL_USER_FOOTER;
?>