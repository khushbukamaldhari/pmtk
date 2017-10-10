<?php
//header("location:user_registration.php");
//exit;
require_once 'config.php';
include_once FL_USER_HEADER;
include_once FL_USER;
include_once FL_COUNTRY;
$featured_m = $user->get_featured_cook( 'M' );
$featured_f = $user->get_featured_cook( 'F' );
?>

<!-- page content -->
<div class="page-content">
    <div class="container main-container">
        <div class="row">
            <div class="col-lg-8 col-md-8  col-xs-12 col-sm-12">
                <div class='col-md-12'>
                    <div class='col-md-12 pv-profile-section pv-top-card-section artdeco-container-card profile_pic_bg'>
                        <div class="featured">
                            <h3 class="border-img">Featured Men</h3>
                            <ul class="row featured clearfix with-pictures" style="padding-left: 0px;">
                                <?php
                                if ( !empty( $featured_m ) ) {
                                    if( isset( $featured_m[0] ) ){
                                        foreach ( $featured_m as $men ) {
                                            $profile = $user->get_user_images( $men['in_user_id'], 'profile' );
                                            ?>
                                            <li  class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                                <a title="<?php echo $men['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $men['in_user_id']; ?>">
                                                    <!--<img alt="<?php echo $men['st_full_name']; ?>" src="<?php echo $profile; ?>">-->
                                                    <div class="user-profile" style="background: url('<?php echo $profile; ?>');" ></div> 
                                                </a>
                                                <a class="link" title="<?php echo $men['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $men['in_user_id']; ?>"><?php echo $men['st_full_name']; ?>
                                                </a>
                                            </li>
                                            <?php
                                        }  
                                    } else {
                                        $men = $featured_m;
                                        $profile = $user->get_user_images( $men['in_user_id'], 'profile' );
                                        ?>
                                        <li  class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <a title="<?php echo $men['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $men['in_user_id']; ?>">
                                                <div class="user-profile" style="background: url('<?php echo $profile; ?>');" ></div> 
                                            </a>
                                            <a class="link" title="<?php echo $men['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $men['in_user_id']; ?>"><?php echo $men['st_full_name']; ?>
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
                <div class='col-md-12'>
                    <div class='col-md-12 pv-profile-section pv-top-card-section artdeco-container-card profile_pic_bg'>
                        <div class="featured">
                            <h3 class="border-img">Featured Women</h3>
                            <ul class="row featured clearfix with-pictures" style="padding-left: 0px;">
                                <?php
                                if ( !empty( $featured_f ) ) {
                                    if( isset( $featured_f[0] ) ){
                                        foreach ( $featured_f as $women ) {
                                            $profile = $user->get_user_images( $women['in_user_id'], 'profile' );
                                            ?>
                                            <li  class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                                <a title="<?php echo $women['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $women['in_user_id']; ?>">
                                                    <div class="user-profile" style="background: url('<?php echo $profile; ?>');" ></div> 
                                                </a>
                                                <a class="link" title="<?php echo $women['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $women['in_user_id']; ?>"><?php echo $women['st_full_name']; ?>
                                                </a>
                                            </li>
                                            <?php
                                        }  
                                    } else {
                                        $women = $featured_f;
                                        $profile = $user->get_user_images( $women['in_user_id'], 'profile' );
                                        ?>
                                        <li  class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                                            <a title="<?php echo $women['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $women['in_user_id']; ?>">
                                                <div class="user-profile" style="background: url('<?php echo $profile; ?>');" ></div>
                                            </a>
                                            <a class="link" title="<?php echo $women['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $women['in_user_id']; ?>"><?php echo $women['st_full_name']; ?>
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