<?php
$user_cuisine_types = $user->get_user_meta( $user_id, "cuisine_types", true, true, $meta_opt_f );
include_once FL_OPTIONS;

?>
<div class='col-md-12 tab_speciality tab_panel'>
    <div class='col-md-12 pane-inner-body clearfix'>
        <label class="pv-top-letter-section__cuisine_headline">
            <a  data-toggle="collapse" data-target="#cover_letter11">
                <h4>
                    My Cooking Speciality
                    <i class="fa fa-edit <?php echo $edit_class; ?>" data-show="show_cover_letter" data-edit="edit_cover_letter"></i>
                </h4>
            </a>
        </label>
        <div id="cover_letter1" class="collapse in cover_letter1" >
            <div class="show_cover_letter">
                <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'cuisine_types' ); ?></h4>
                <div class="col-md-12 no-padding">
                    <?php if( is_array( $user_cuisine_types ) ) {
                        foreach ($user_cuisine_types as $val_ct) { ?>
                            <div class="col-md-4 col-xs-12 col-sm-6 no-padding">                                    
                                <h3 class="pv-top-letter-section__cuisine_type">
                                    <i class="fa fa-check sym-check"></i>
                                    <?php echo is_array( $val_ct ) ? $val_ct['st_field_value'] : $val_ct ; ?></h3>
                            </div>
                    <?php 
                        }
                    } else { ?>
                        <div class="col-md-9 col-xs-12 col-sm-6">
                            <h3 class="pv-top-letter-section__cuisine_type">No Cuisine Selected</h3>
                        </div>
                    <?php } ?>
                </div>

            </div>

            <div class="edit_cover_letter div-edit">
                <form class="form-horizontal frm_usemeta" id="frm_cover_letter" action="#" method="post" data-show="show_cover_letter" >
                    <?php $opt->show_user_options( $user_id, 'cook', 'cuisine_types' ); ?>
                    <button type="submit" class="btn btn-success pull-right">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>