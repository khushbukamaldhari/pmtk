<?php
require_once '../config.php';
$common->check_admin_login();
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
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

<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-mail-forward"></span> File Input</h3>
                                    <p>Add class <code>file</code> to file input to get Bootstrap FileInput plugin</p>                                    
                                    <form enctype="multipart/form-data" class="form-horizontal">                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Simple</label><br/>
                                                <input type="file" multiple id="file-simple" />
                                            </div>                                            
                                        </div>
                                        <button id="up" name="up" value="up">Upload</button>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                    
                </div>
    </div>


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

<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>plugins.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>actions.js"></script>

        <script>
            $(function(){
                $("#file-simple").fileinput({
                        showUpload: false,
                        showCaption: false,
                        browseClass: "btn btn-danger",
                        fileType: "jpeg",
                });
                $('#up').on('click', function() {
                    var file_data = $('#file-simple').prop('files')[0];   
                    var form_data = new FormData();                  
                    form_data.append('file', file_data);
                    alert(form_data);                             
                    $.ajax({
                                url: 'test.php', // point to server-side PHP script 
                                dataType: 'text',  // what to expect back from the PHP script, if anything
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,                         
                                type: 'post',
                                success: function(php_script_response){
                                    alert(php_script_response); // display response from the PHP script, if any
                                }
                     });
                     return false;
                });
            });            
        </script>
<?php
$load_js = FALSE;
include_once 'includes/footer.php';
?>
