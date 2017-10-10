<div class='col-md-12 side-section'>
    <form action="#" method="post" id="frm_search_distance" name="frm_search_distance">
        <div class='col-md-12 '>
            <div>
                <h4 class="">Search by Distance</h4>
                <div class="form-group clearfix">
                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding">
                        <select class="btn-group bootstrap-select form-control select open dropup " id="ddl_country" name="ddl_country">
                            <?php echo $country->show_countries(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-md-4 col-sm-6 col-xs-12 no-padding padding-r-10">
                        <select class="btn-group bootstrap-select form-control select open dropup " id="ddl_distance" name="ddl_distance">
                            <option value="5">5 Mi</option>
                            <option value="10">10 Mi</option>
                            <option value="20">20 Mi</option>
                            <option value="30">30 Mi</option>
                            <option value="50">50 Mi</option>
                            <option value="100">100 Mi</option>
                        </select>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12 no-padding">
                        <input type="text" class="form-control" id="txt_location" name="txt_location" placeholder="Within Zip or Location" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>