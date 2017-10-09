<?php
require_once '../config.php';
$common->check_admin_login();
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
include_once '../core/options.php';
include_once '../core/availablity.php';

if (isset($_REQUEST['type']) && trim($_REQUEST['type']) !== '') {
    ?>

    <!-- PAGE CONTENT -->
    <div class="page-content">

        <!-- START X-NAVIGATION VERTICAL -->
        <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
            <!-- TOGGLE NAVIGATION -->
            <li class="xn-icon-button">
                <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
            </li>
            <!-- END TOGGLE NAVIGATION -->
        </ul>
        <!-- END X-NAVIGATION VERTICAL -->

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="#">Link</a></li>
            <li class="active">Active</li>
        </ul>
        <!-- END BREADCRUMB -->

        <div class="page-title">
            <h2><span class="fa fa-arrow-circle-o-left"></span> Manage Users</h2>
        </div>
        <?php if ($_REQUEST['type'] == 'cook') { ?>
            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><?php echo ucfirst($_REQUEST['type']); ?></h3>
                            </div>
                            <div class="panel-body">


                                <!-- START WIZARD WITH VALIDATION -->
                                <div class="block">
                                    <h4>Cook Sign Up</h4>
                                    <form action="#" role="form" class="form-horizontal" id="frm_cook_registration" name="frm_cook_registration" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="wizard show-submit frm_cook_registration wizard-validation">
                                            <ul>
                                                <li>
                                                    <a href="#step-1">
                                                        <span class="stepNumber">1</span>
                                                        <span class="stepDesc">Information<br /><small>Personal Data</small></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-2">
                                                        <span class="stepNumber">2</span>
                                                        <span class="stepDesc">Additional<br /><small>Additional Details</small></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-3">
                                                        <span class="stepNumber">3</span>
                                                        <span class="stepDesc">Package<br /><small>Select Package</small></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#step-4">
                                                        <span class="stepNumber">4</span>
                                                        <span class="stepDesc">Media<br /><small>Media</small></span>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div id="step-1">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Username</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txt_username" name="txt_username" placeholder="Username" required/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Full Name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" class="form-control" id="txt_full_name" name="txt_full_name" placeholder="Full Name" required/>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">E-mail:</label>
                                                    <div class="col-md-9">
                                                        <input type="text" value="" id="txt_email" name="txt_email" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" name="txt_password" placeholder="Password" id="txt_password" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label">Re-Password</label>
                                                    <div class="col-md-9">
                                                        <input type="password" class="form-control" name="txt_cpassword" placeholder="Re-Password" id="txt_cpassword" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Account Type</label>
                                                    <div class="col-md-9 col-xs-12">
                                                        <select class="form-control select" id="ddl_type" name="ddl_type" required>
                                                            <option value="cook">Cook / Chef</option>
                                                            <option value="taster">Taster</option>
                                                            <option value="delivery">Delivery Driver</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                                    <div class="col-md-9 col-xs-12">
                                                        <div class="col-md-3">
                                                            <label class="check">
                                                                <input type="radio" class="iradio" value="M" name="rdo_gender" checked /> Male
                                                            </label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="check">
                                                                <input type="radio" class="iradio" value="F" name="rdo_gender"/> Female
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

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

                                            </div>

                                            <div id="step-2">
                                                <?php
                                                $all_fields = $opt->get_options();
                                                $opt->show_options('cook');

                                                $str_avail_from = $avail->fill_availability('From');
                                                $str_avail_to = $avail->fill_availability('To');
                                                ?>

                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Availability</label>
                                                    <div class="col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label class="col-md-4 col-xs-12 control-label">Monday</label>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_1][from]">
                                                                        <?php echo $str_avail_from; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_1][to]">
                                                                        <?php echo $str_avail_to; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 col-xs-12 control-label">Tuesday</label>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_2][from]">
                                                                        <?php echo $str_avail_from; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_2][to]">
                                                                        <?php echo $str_avail_to; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 col-xs-12 control-label">Wednesday</label>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_3][from]">
                                                                        <?php echo $str_avail_from; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_3][to]">
                                                                        <?php echo $str_avail_to; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 col-xs-12 control-label">Thursday</label>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_4][from]">
                                                                        <?php echo $str_avail_from; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_4][to]">
                                                                        <?php echo $str_avail_to; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 col-xs-12 control-label">Friday</label>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_5][from]">
                                                                        <?php echo $str_avail_from; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_5][to]">
                                                                        <?php echo $str_avail_to; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 col-xs-12 control-label">Saturday</label>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_6][from]">
                                                                        <?php echo $str_avail_from; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_6][to]">
                                                                        <?php echo $str_avail_to; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 col-xs-12 control-label">Sunday</label>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_7][from]">
                                                                        <?php echo $str_avail_from; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-xs-12">
                                                                <div class="input-group">
                                                                    <select class="form-control select show-up" name="availability[availability_7][to]">
                                                                        <?php echo $str_avail_to; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Contact Number</label>
                                                    <div class="col-md-9 col-xs-12">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="fields[contact]">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Country</label>
                                                    <div class="col-md-9 col-xs-12">
                                                        <select class="form-control select" name="fields[country]">
                                                            <option value="us">United States</option>
                                                            <option value="uk">United Kingdom</option>
                                                            <option value="in">India</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">State</label>
                                                    <div class="col-md-9 col-xs-12">
                                                        <select class="form-control select" name="fields[state]">
                                                            <option value="new_york">New York</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">City</label>
                                                    <div class="col-md-9 col-xs-12">
                                                        <select class="form-control select" name="fields[city]">
                                                            <option value="new_york">New York</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 col-xs-12 control-label">Zipcode</label>
                                                    <div class="col-md-9 col-xs-12">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="fields[zipcode]">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-3">
                                                <div class="col-md-6">
                                                    <div class="col-md-offset-2 col-md-8">
                                                        <label class="check" for="rdo_plan_basic" style="width: 100%;">
                                                            <div class="panel panel-warning">
                                                                <div class="panel-body panel-body-pricing">
                                                                    <h2>Basic Chef<br><small>$9.99</small></h2>                                
                                                                    <p><span class="fa fa-caret-right"></span>Add Profiles</p>
                                                                    <p><span class="fa fa-caret-right"></span> View contact details</p>
                                                                    <p><span class="fa fa-caret-right"></span> Contact sellers</p>
                                                                    <p><span class="fa fa-caret-right"></span> View pictures</p>
                                                                    <p><span class="fa fa-caret-right"></span>Featured account</p>
                                                                    <p><span class="fa fa-caret-right"></span> Request cuisine samples</p>
                                                                    <p><span class="fa fa-caret-right"></span> Standard : Unlim</p>
                                                                    <p><span class=""></span>
                                                                        <input  value="basic" type="radio" id="rdo_plan_basic" class="iradio"  name="fields[membership]"/>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="col-md-offset-2 col-md-8">
                                                        <label class="check" for="rdo_plan_premium" style="width: 100%;">
                                                            <div class="panel panel-danger">
                                                                <div class="panel-body panel-body-pricing">
                                                                    <h2>Premium<br><small>Free</small></h2>                                
                                                                    <p><span class="fa fa-caret-right"></span>Add Profiles</p>
                                                                    <p><span class="fa fa-caret-right"></span> View contact details</p>
                                                                    <p><span class="fa fa-caret-right"></span> Contact sellers</p>
                                                                    <p><span class="fa fa-caret-right"></span> View pictures</p>
                                                                    <p><span class="fa fa-caret-right"></span>Featured account</p>
                                                                    <p><span class="fa fa-caret-right"></span> Request cuisine samples</p>
                                                                    <p><span class="fa fa-caret-right"></span> Featured: of 1</p>
                                                                    <p><span class=""></span> 
                                                                            <input  value="primium" type="radio" id="rdo_plan_premium" class="iradio"  name="fields[membership]"/>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="step-4">
                                                <div class="col-md-4 col-sm-6 col-xs-12" style="min-height: 320px;">
                                                    <div class="form-group">
                                                        <label>Profile Picture</label><br/>
                                                        <input type="file" multiple id="file_profile" />
                                                    </div>
                                                    <button style="display: none;" id="up_profile" name="up_profile" class="btn btn-success" value="up_profile">Upload</button>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-xs-12" style="min-height: 320px;">
                                                    <div class="form-group">
                                                        <label>Cover Picture</label><br/>
                                                        <input type="file" multiple id="file_cover" />
                                                    </div>
                                                    <button style="display: none;" id="up_cover" name="up_cover" class="btn btn-success" value="up_cover">Upload</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- END WIZARD WITH VALIDATION -->

                                <!-- START DATATABLE EXPORT -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">DataTable Export</h3>
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'json', escape: 'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'json', escape: 'false', ignoreColumn: '[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'json', escape: 'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'xml', escape: 'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'csv', escape: 'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'txt', escape: 'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'excel', escape: 'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'doc', escape: 'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'powerpoint', escape: 'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'png', escape: 'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                                                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'pdf', escape: 'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="panel-body">
                                        <table id="customers2" class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Office</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tiger Nixon</td>
                                                    <td>System Architect</td>
                                                    <td>Edinburgh</td>
                                                    <td>61</td>
                                                    <td>2011/04/25</td>
                                                    <td>$320,800</td>
                                                </tr>
                                                <tr>
                                                    <td>Garrett Winters</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>63</td>
                                                    <td>2011/07/25</td>
                                                    <td>$170,750</td>
                                                </tr>
                                                <tr>
                                                    <td>Ashton Cox</td>
                                                    <td>Junior Technical Author</td>
                                                    <td>San Francisco</td>
                                                    <td>66</td>
                                                    <td>2009/01/12</td>
                                                    <td>$86,000</td>
                                                </tr>
                                                <tr>
                                                    <td>Cedric Kelly</td>
                                                    <td>Senior Javascript Developer</td>
                                                    <td>Edinburgh</td>
                                                    <td>22</td>
                                                    <td>2012/03/29</td>
                                                    <td>$433,060</td>
                                                </tr>
                                                <tr>
                                                    <td>Airi Satou</td>
                                                    <td>Accountant</td>
                                                    <td>Tokyo</td>
                                                    <td>33</td>
                                                    <td>2008/11/28</td>
                                                    <td>$162,700</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                                <!-- END DATATABLE EXPORT -->
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <!-- END PAGE CONTENT WRAPPER -->
        <?php } ?>
    </div>
    <!-- END PAGE CONTENT -->

    <?php
    require_once 'includes/footer_includes.php';
    ?>
    <!-- START THIS PAGE PLUGINS-->
    <script type='text/javascript' src='<?php echo ADMIN_JS_PLUGINS_PATH; ?>icheck/icheck.min.js'></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>tableexport/tableExport.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>tableexport/jquery.base64.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>tableexport/html2canvas.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>tableexport/jspdf/libs/sprintf.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>tableexport/jspdf/jspdf.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>tableexport/jspdf/libs/base64.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>bootstrap/bootstrap-file-input.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>bootstrap/bootstrap-select.js"></script>

    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>fileinput/fileinput.min.js"></script>

    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>smartwizard/jquery.smartWizard-2.0.min.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>jquery-validation/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>summernote/summernote.js"></script>

    <!-- END PAGE PLUGINS -->

    <script type="text/javascript">

        (function ($) {
            var reg_validator = $("#frm_cook_registration").validate({
                onsubmit: true,
                rules: {
                    txt_username: {
                        required: true,
                        minlength: 3,
                        maxlength: 15
                    },
                    txt_full_name: {
                        required: true
                    },
                    txt_password: {
                        required: true,
                        minlength: 5,
                        maxlength: 16
                    },
                    txt_cpassword: {
                        required: true,
                        minlength: 5,
                        maxlength: 16,
                        equalTo: "#txt_password"
                    },
                    txt_email: {
                        required: true,
                        email: true
                    }
                }
            });
            var reg_validator2 = $("#frm_cook_registration").validate({
                onsubmit: true,
            });

            if ($(".frm_cook_registration").length > 0) {

                //Check count of steps in each wizard
                $(".frm_cook_registration > ul").each(function () {
                    $(this).addClass("steps_" + $(this).children("li").length);
                });//end

                // This par of code used for example

                $(".frm_cook_registration").smartWizard({
                    // This part of code can be removed FROM
                    onLeaveStep: function leaveAStepCallback(obj) {
                        var wizard = obj.parents(".frm_cook_registration");
                        var step = obj.attr('rel');
                        console.log(step);
                        if (wizard.hasClass("wizard-validation")) {

                            var valid = true;

                            $('input,textarea', $(obj.attr("href"))).each(function (i, v) {
                                if (step == 1) {
                                    valid = reg_validator.element(v) && valid;
                                } else if (step == 3) {
                                    //valid = reg_validator2.element(v) && valid;
                                }
                            });
                            var valid_data = true;

                            if (!valid) {
                                wizard.find(".stepContainer").removeAttr("style");
                                if (step == 1) {
                                   reg_validator.focusInvalid();
                                } else if (step == 3) {
                                    //reg_validator2.focusInvalid();
                                }
                                return false;
                            } else {
                                if (step == 1) {
                                    var str = '&action=check_user_exist&username=' + $("#txt_username").val() + '&email=' + $("#txt_email").val();
                                    $.ajax({
                                        type: "POST",
                                        dataType: "html",
                                        url: AJAX_URL,
                                        data: str,
                                        async: false,
                                        success: function (data) {
                                            console.log(data);
                                            var decode_data = JSON.parse(data);
//                                        $("#txt_username").removeClass('error');
//                                        $("#txt_email").removeClass('error');
                                            if (decode_data['success_flag'] == true) {
                                            } else {
                                                valid_data = false;
                                                if (decode_data.data.invalid == 'username') {
                                                    reg_validator.showErrors({
                                                        "txt_username": decode_data['message']
                                                    });
                                                } else if (decode_data.data.invalid == 'email') {
                                                    reg_validator.showErrors({
                                                        "txt_email": decode_data['message']
                                                    });
                                                }
                                            }
                                        },
                                        error: function (jqXHR, textStatus, errorThrown) {
                                            console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                                        }
                                    });
                                }
                                if (valid_data == false) {
                                    return false;
                                } else {
                                    if( step == 3 ){
                                        //$("#frm_cook_registration").submit();
                                    }
                                    return true;
                                }
                            }
                        }

                        return true;
                    }, // <-- TO

                    //This is important part of wizard init
                    onShowStep: function (obj) {
                        var step = obj.attr('rel');
                        var wizard = obj.parents(".frm_cook_registration");

                        if (wizard.hasClass("show-submit")) {

                            var step_num = obj.attr('rel');
                            var step_max = obj.parents(".anchor").find("li").length;

                            if (step_num == step_max) {
                                obj.parents(".frm_cook_registration").find(".actionBar .btn-primary").css("display", "block");
                            }
                        }
                        if( step == 4 ){
                            
                            $(".stepContainer").height(315);
                        }
                        return true;
                    }//End
                });
            }
            function onFinishCallback(){
                //alert("Final");
            } 
        })(jQuery);
    </script>


    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>plugins.js"></script>
    <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>actions.js"></script>
    <?php
    $load_js = FALSE;
    include_once 'includes/footer.php';
}
?>
