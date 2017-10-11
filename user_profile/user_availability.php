<?php 
    include_once FL_AVAILABILITY;
    $avail->fill_availability();
?>

<div class='col-md-12 tab_availability tab_panel'>
    <div class='col-md-12 pane-inner-body'>
<!--        <label class="pv-top-letter-section__cuisine_headline">
            <a  data-target="#availability">
                <h4>
                    Availability
                </h4>
            </a>
        </label>-->
        <?php 
            $user_avail = $user->get_user_availability( $user_id );
            $arr_avail_label = $avail->fill_availability( '', true );
            $arr_days = $avail->get_days();
        ?>
        <div id="availability" class="collapse in availability">
            <ul class="user-pro-list">
                <?php foreach( $user_avail as $avl ){ ?>
                    <li class="clearfix">
                        <?php
                        if( $avl['fl_from'] == 0 && $avl['fl_to'] == 0 ){
                            //$avail_label = 'Not Available';
                        } else {
                            $avail_label = '<div class="auto-width">' . $arr_avail_label[$avl['fl_from']] . ' - </div><div class="auto-width">' . $arr_avail_label[$avl['fl_to']] . '</div>';
                            ?>
                            <div class="col-md-3 col-xs-6 col-sm-6 list-cell no-padding">
                                <h4 class="pv-top-letter-section__cuisine_title"><?php echo $arr_days[$avl['st_day']]; ?></h4>
                            </div>
                            <div class="col-md-9 col-xs-6 col-sm-6 list-cell">
                                <h4 class="pv-top-letter-section-text"><?php echo $avail_label; ?></h4>
                            </div>
                            <?php
                        }
                        ?>
                    </li> 
                <?php } ?>
            </ul>      
        </div>
    </div>
</div>