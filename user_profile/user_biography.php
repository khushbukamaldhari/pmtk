<?php
if( !isset( $user_data ) || is_array( $user_data ) ){
    $user_data = $user->get_user_data( $user_id );    
}
$ethnicity = $user->get_user_meta( $user_id, 'ethnicity', true, true, $meta_opt_t );
$nationality = $user->get_user_meta( $user_id, 'nationality', true, true, $meta_opt_t );
$language = $user->get_user_meta( $user_id, 'language', true, true, $meta_opt_f );
$user_about_me = $user->get_user_meta( $user_id, "about_me", true );
?>
<div class='col-md-12 tab_biography tab_panel'>
    <div class='col-md-12 pane-inner-body'>
        <div>
            <label class="pv-top-letter-section__cuisine_headline">
                <a   data-target="#biography">
                    <h4>
                        My Biography
                    </h4>
                </a>
            </label>
            <div id="biography" class="collapse in biography">
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                        <h4 class="pv-top-letter-section__cuisine_title">Name</h4>
                    </div>
                    <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                        <h4 class="pv-top-letter-section-text"><?php echo $user_data['st_full_name']; ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                        <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'ethnicity' ); ?></h4>
                    </div>
                    <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                        <h4 class="pv-top-letter-section-text"><?php echo $ethnicity; ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                        <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'nationality' ); ?></h4>
                    </div>
                    <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                        <h4 class="pv-top-letter-section-text"><?php echo $nationality; ?></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                        <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'language' ); ?></h4>
                    </div>
                    <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                        <h4 class="pv-top-letter-section-text">
                        <?php
                            if( is_array( $language ) ){
                                $multi = '';
                                foreach( $language as $lang ){
                                    echo $multi . ( is_array( $lang ) ? $lang['st_field_value'] : $lang ) ;
                                    $multi = ', ';
                                }
                            }
                        ?>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                        <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'about_me' ); ?></h4>
                    </div>
                    <div class="col-md-9 col-xs-6 col-sm-6 border-left overflow_scroll">
                        <h4 class="pv-top-letter-section-text"><?php echo $user_about_me; ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>