<!-- Uttam Jain Dt: 10-10-15 -->

<?php include_once FL_USER;
    $new_user = $user->get_cook('', 5);
?>

<div class='col-md-12 side-section search-dist'>
    <form action="#" method="post" id="frm_search_distance" name="frm_search_distance">
        <div class='col-md-12'>
            <div>
                <h4 class="dist">Featured Chef/Cook</h4>
                <div class="form-group clearfix div-img">
                    <?php
                    if ( !empty( $new_user ) ) {
                        if( isset( $new_user[0] ) ){
                            foreach ( $new_user as $n ) {
                                $profile = $user->get_user_images( $n['in_user_id'], 'profile' );
                                ?>
                                    <a title="<?php echo $n['st_full_name'];?>"  href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $n['in_user_id']; ?>">
                                       <div class="col-md-12 col-sm-6 col-xs-12 no-padding div-left">
                                           <img class="feature-img" src="<?php echo $profile;?>"></img><br/>
                                           <a class="link link-name link-img" title="<?php echo $n['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $n['in_user_id']; ?>"><?php echo $n['st_full_name']; ?>
                                           </a>
                                       </div>
                                    </a>

                                <?php
                            }
                        } else {
                            $n = $new_user;
                            $profile = $user->get_user_images( $n['in_user_id'], 'profile' );
                            ?>
                                <a title="<?php echo $n['st_full_name'];?>"  href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $n['in_user_id']; ?>">
                                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding div-left" style="left:55px;">
                                        <img class="feature-img" src="<?php echo $profile;?>"></img><br/>
                                        <a class="link link-name link-img" title="<?php echo $n['st_full_name']; ?>" href="<?php echo BASE_URL . 'user_profile.php?user_id=' . $n['in_user_id']; ?>"><?php echo $n['st_full_name']; ?>
                                        </a>
                                    </div>
                                </a>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </form>
</div>

<!--End of code Uttam Jain Dt: 10-10-15  -->