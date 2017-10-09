<?php
$user_services_offered = $user->get_user_meta( $user_id, "services_offered", true, true, $meta_opt_f );
?>
<div class='col-md-12 tab_services_offered tab_panel'>
    <div class='col-md-12 pane-inner-body clearfix'>
        <div>
            <label class="pv-top-letter-section__cuisine_headline">
                <a data-target="#services_offered">
                    <h4>
                        <?php echo $opt->get_option_value( 'cook', 'services_offered' ); ?>
                        <!--<span class="glyphicon glyphicon-minus-sign" style="float:right;text-align: center;"></span>-->
                    </h4>

                </a>
            </label>
            <div id="services_offered" class="collapse in services_offered" >
                <div>
                    <?php if( is_array( $user_services_offered ) ) {
                        foreach ($user_services_offered as $val_so) { ?>
                            <div class="col-md-3 col-xs-6 col-sm-6 no-padding ">
                                <h3 class="pv-top-letter-section__cuisine_type"><?php echo is_array( $val_so ) ? $val_so['st_field_value'] : $val_so ; ?></h3>
                            </div>
                    <?php 
                        }
                    } else { ?>
                        <div class="col-md-3 col-xs-6 col-sm-6 no-padding ">
                            <h3 class="pv-top-letter-section__cuisine_type">No Services Offered</h3>
                        </div>
                    <?php } ?>
                </div>                
            </div>
        </div>
    </div>
</div>