<div>
    <div class="col-md-12 no-padding">        
        <div id="user_cover" class="Elevation-2dp profile-background-image profile-background-image--loading">
            <img src="<?php echo $user->get_user_images( $user_id, 'cover' ); ?>" alt="" />
        </div>
<!--        <script>
            <?php echo 'var cover_image= "' . $user->get_user_images( $user_id, 'cover' ) . '";' ?>
            $("#user_cover").css( "background", "url(" + cover_image + ") center/cover" );
        </script>-->
        <div >
            <div  class="col-md-12  pv-profile-section pv-top-card-section artdeco-container-card ember-view">
                <div class="pv-top-card-section__profile-photo-container">
                    <div class="pv-top-card-section__photo-wrapper EntityPhoto-circle-8">
                        <!---->
                        <label for="member-photo-edit-upload-input" class="visually-hidden">
                            Profile Photo
                        </label>

                        <div id="ember1449" class="pv-top-card-section__edit-photo profile-photo-edit ember-view">
                            <?php  ?>
                            <!--<div class="profile-photo-edit__camera-plus"></div>-->
                            <img src='<?php echo $user->get_user_images( $user_id, 'profile' ); ?>' class='img img-thumbnail img-rounded profile_pic'/>
                            <!--<input type="file" id="member-photo-edit-upload-input" accept="image/*" class="profile-photo-edit__file-upload-input">-->
                        </div>
                    </div>
                </div>
                <div>
                    <div class="display-flex align-items-center justify-center">
                        <h1 class="pv-top-card-section__name "><?php echo $user_data['st_full_name']; ?></h1>
                    </div>
                    <h2 class="pv-top-card-section__headline"><?php echo $user_data['st_user_type']; ?></h2>
                    <h3 class="pv-top-card-section__account_type"><a href=""><?php echo BASE_URL.$user_data['st_username']; ?></a></h3>
                </div>
                <div class="border_top">
                    <?php
                    $user_about_me = $user->get_user_meta($user_id, "about_me", true);
                    ?>
                    <div id="about_me" class=""> <span><?php echo $user_about_me; ?></span></div>
                </div>
                <div style="text-align: center;">
                    <button class="btn-pink" value="more" id="show_more">Show More</button>
                </div>
                
            </div>
        </div>
    </div>
</div>