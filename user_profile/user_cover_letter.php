<?php
$user_cuisine_types = $user->get_user_meta( $user_id, "cuisine_types", true, true, $meta_opt_f );
$skills = $user->get_user_meta( $user_id, 'skills', true );
$passion = $user->get_user_meta( $user_id, 'passion', true );
$experience = $user->get_user_meta( $user_id, 'experience', true );
include_once FL_OPTIONS;

?>
<div class='col-md-12 tab_cover_letter tab_panel' style="display: block;">
    <div class='col-md-12 pane-inner-body'>
        <div>
            <label class="pv-top-letter-section__cuisine_headline">
                <a  data-toggle="collapse" data-target="#cover_letter11">
                    <h4>
                        My Cover Letter
                        <i class="fa fa-edit <?php echo $edit_class; ?>" data-show="show_cover_letter" data-edit="edit_cover_letter"></i>
                    </h4>
                </a>
            </label>
            <div id="cover_letter1" class="collapse in cover_letter1" >
                <div class="show_cover_letter">
                    <h4 class="pv-top-letter-section__cuisine_title"><?php echo $opt->get_option_value( 'cook', 'cuisine_types' ); ?></h4>
                    <div class="col-md-12 pv-top-letter-section__sub_heading">
                        <?php if( is_array( $user_cuisine_types ) ) {
                            foreach ($user_cuisine_types as $val_ct) { ?>                                
                                <div class="col-md-4 col-xs-12 col-sm-6">
                                    <h3 class="pv-top-letter-section__cuisine_type"><?php echo is_array( $val_ct ) ? $val_ct['st_field_value'] : $val_ct ; ?></h3>
                                </div>
                        <?php 
                            }
                        } else { ?>
                            <div class="col-md-9 col-xs-12 col-sm-6">
                                <h3 class="pv-top-letter-section__cuisine_type">No Cuisine Selected</h3>
                            </div>
                        <?php } ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding">
                            <h4 class="pv-top-letter-section__cuisine_title">Skills</h4>
                        </div>
                        <?php if( trim( $skills ) !== '' ){ ?>
                            <div class="col-md-9 col-xs-6 col-sm-6 overflow_scroll pro-text border-left">
                                <h4 class="pv-top-letter-section-text"><?php echo $skills; ?></h4>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding overflow_scroll">
                            <h4 class="pv-top-letter-section__cuisine_title">Passion</h4>
                        </div>
                        <?php if( trim( $passion ) !== '' ){ ?>
                            <div class="col-md-9 col-xs-6 col-sm-6 overflow_scroll pro-text border-left">
                                <h4 class="pv-top-letter-section-text"><?php echo $passion; ?></h4>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding overflow_scroll">
                            <h4 class="pv-top-letter-section__cuisine_title">Experience</h4>
                        </div>
                        <?php if( trim( $experience ) !== '' ){ ?>
                            <div class="col-md-9 col-xs-6 col-sm-6 overflow_scroll pro-text border-left">
                                <h4 class="pv-top-letter-section-text"><?php echo $experience; ?></h4>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="edit_cover_letter div-edit">
                    <form class="form-horizontal frm_usemeta" id="frm_cover_letter" action="#" method="post" data-show="show_cover_letter" >
                        <?php $opt->show_user_options( $user_id, 'cook', 'cuisine_types' ); ?>                        
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Skills</label>
                            <div class="col-md-9 col-xs-12">
                                <textarea class="form-control" rows="5" id="txt_skills" name="fields[skills]"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Passion</label>
                            <div class="col-md-9 col-xs-12">
                                <textarea class="form-control" rows="5" id="txt_passion" name="fields[passion]"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label">Experience</label>
                            <div class="col-md-9 col-xs-12">
                                <textarea class="form-control" rows="5" id="txt_experience" name="fields[experience]"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success pull-right">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>