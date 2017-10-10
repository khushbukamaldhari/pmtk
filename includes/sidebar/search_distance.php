<div class='col-md-12 side-section search-dist'>
    <form action="#" method="post" id="frm_search_distance" name="frm_search_distance">
        <div class='col-md-12'>
            <div>
                <h3 class="dist">Search by Distance</h3>
                <div class="form-group clearfix">
                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding">
                        <select class="btn-group bootstrap-select form-control select open dropup select-drop" id="ddl_country" name="ddl_country">
                            <?php echo $country->show_countries(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-md-4 col-sm-6 col-xs-12 no-padding padding-r-10">
                        <select class="btn-group bootstrap-select form-control select open dropup select-drop" id="ddl_distance" name="ddl_distance">
                            <option value="5">5 Mi</option>
                            <option value="10">10 Mi</option>
                            <option value="20">20 Mi</option>
                            <option value="30">30 Mi</option>
                            <option value="50">50 Mi</option>
                            <option value="100">100 Mi</option>
                        </select>
                    </div>
                    <div class="col-md-8 col-sm-6 col-xs-12 no-padding select-drop">
                        <input type="text" class="form-control" style="height:35px" id="txt_location" name="txt_location" placeholder="Within Zip or Location" />
                    </div>
                </div>
                <div class="form-group clearfix">
                    <div class="col-md-6 col-sm-6 col-xs-12 no-padding btn-div btn-top">
                        <div><input type="button" class="btn search-btn sub-search" name="search" value="Search"/></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>