<?php
$user_cuisine_types = $user->get_user_meta( $user_id, "cuisine_types", true, true, $meta_opt_f );
include_once FL_OPTIONS;

?>
<div class='col-md-12 tab_speciality tab_panel'>
    <div class='col-md-12 pane-inner-body clearfix'>
        <label class="pv-top-letter-section__cuisine_headline">
            <a  data-toggle="collapse" data-target="#cover_letter11">
                <h4>
                    My Dishes
                    <i class="fa fa-edit <?php echo $edit_class; ?>" data-show="show_cover_letter" data-edit="edit_cover_letter"></i>
                </h4>
            </a>
        </label>
        <div id="cover_letter1" class="collapse in cover_letter1" >
            <div class="show_cover_letter">
                <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'cuisine_types' ); ?></h4>
                <div class="col-md-12 no-padding">
                    
                </div>

            </div>
        </div>
    </div>
</div>