<?php
    include_once FL_COUNTRY;
    $user_country_id = $user->get_user_meta( $user_id, 'country', true );
    $user_country = $country->get_country( $user_country_id, 'st_country_name', true );
    $user_state_id = $user->get_user_meta( $user_id, 'state', true );
    $user_state = $country->get_state( $user_state_id, 'st_state_name', true );
    $user_city = $user->get_user_meta( $user_id, 'city', true );
     $contact= $user->get_user_meta( $user_id, 'contact', true );
    if(trim($contact) != ""){
    $user_contact = '<div class="auto-width">+'.$user->get_user_meta( $user_id, 'contact_code', true )
            . '</div> <div class="auto-width">' . $user->get_user_meta( $user_id, 'contact', true ) . '</div>';
    }
    else{
        $user_contact = '<div class="auto-width">Not available.</div>';
    }
?>
<div class='col-md-12 tab_contact tab_panel'>
    <div class='col-md-12 pane-inner-body'>
        <div>
<!--            <label class="pv-top-letter-section__cuisine_headline">
                <a   data-target="#contact11">
                    <h4>
                        Contact Details
                    </h4>
                </a>
            </label>-->
            <div id="contact11" class="">
                <ul class="user-pro-list">
                    <li class="clearfix">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title">Country :</h4>
                        </div>
                        <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                            <h4 class="pv-top-letter-section-text"><?php echo $user_country; ?></h4>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title">State :</h4>
                        </div>
                        <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                            <h4 class="pv-top-letter-section-text"><?php echo $user_state; ?></h4>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title">City :</h4>
                        </div>
                        <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                            <h4 class="pv-top-letter-section-text"><?php echo $user_city; ?></h4>
                        </div>
                    </li>
                    <li class="clearfix">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title">Contact :</h4>
                        </div>
                        <div class="col-md-9 col-xs-6 col-sm-6 border-left">
                            <h4 class="pv-top-letter-section-text"><?php echo $user_contact; ?></h4>
                        </div>
                    </li>
            </div>
        </div>
    </div>
</div>