<?php
if( !isset( $user_data ) || is_array( $user_data ) ){
    $user_data = $user->get_user_data( $user_id );    
}
$ethnicity = $user->get_user_meta( $user_id, 'ethnicity', true, true, $meta_opt_t );
$nationality = $user->get_user_meta( $user_id, 'nationality', true, true, $meta_opt_t );
$lnguage = $user->get_user_meta( $user_id, 'language', true, true, $meta_opt_f );
$user_about_me = $user->get_user_meta( $user_id, "about_me", true );
?>
<div class='col-md-12 tab_biography tab_panel'>
    <div class='col-md-12 pane-inner-body clearfix'>
        <div>
            <label class="pv-top-letter-section__cuisine_headline">
                <a   data-target="#biography">
                    <h4>
                        My Biography
                    </h4>
                </a>
            </label>
            <div id="biography" class="collapse in biography">
                <ul class="user-pro-list">                    
                    <li class="clearfix">                    
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'ethnicity' ); ?> :</h4>
                        </div>
                        <div class="col-md-9 col-xs-6 col-sm-6">
                            <h4 class="pv-top-letter-section-text"><?php echo $ethnicity; ?></h4>
                        </div>
                    </li>
                    <li class="clearfix">                    
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'nationality' ); ?> :</h4>
                        </div>
                        <div class="col-md-9 col-xs-6 col-sm-6">
                            <h4 class="pv-top-letter-section-text"><?php echo $nationality; ?></h4>
                        </div>
                    </li>
                    <li class="clearfix">                    
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'language' ); ?> :</h4>
                        </div>
                        <div class="col-md-9 col-xs-6 col-sm-6">
                            <h4 class="pv-top-letter-section-text">
                            <?php
                                if( is_array( $lnguage ) ){
                                    $multi = '';
                                    foreach( $lnguage as $lng ){
                                        echo $multi . ( is_array( $lng ) ? $lng['st_field_value'] : $lng ) ;
                                        $multi = ', ';
                                    }
                                }
                            ?>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>