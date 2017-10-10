<div class='col-md-12 side-section search-dist'>
    <form action="#" method="post" id="frm_search_location" name="frm_search_location">
        <div class='col-md-12 '>
            <div>
                <h4 class="dist">Your Location</h4>
                <div class="form-group clearfix">
                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding">
                        <input type="text" class="form-control select-drop" id="txt_location" name="txt_location" placeholder="Type Your Location Here" />
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-md-12 col-sm-12 col-xs-12 no-padding">
                        <h5 class="hd-5 sel-loc">Select Your Location</h5>
                        <div class="col-md-12 col-sm-12 col-xs-12 div-ctry">
                            <?php if( !function_exists( 'get_all_countries' ) ){
                                include_once FL_COUNTRY;
                            }
                            $all_countries = $country->get_all_countries();
                            foreach( $all_countries as $ctry ){ ?>                            
                            <a class="lnk-pink" data-country="<?php echo $ctry['in_country_id']; ?>" href="#">
                                <div class="col-md-6 col-sm-6 col-xs-6 no-padding" style="font-size: 1.1em;"><?php echo $ctry['st_country_name']; ?></div>
                            </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>