<?php
require_once 'config.php';
include_once FL_USER_HEADER;
?>
<style>
    .form-control{
        height: 30px !important;
        font-size: 12px !important;
        line-height: 18px !important;
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        -webkit-appearance: none !important;
        border: 1px solid #E5E5E5 !important;
        background: #F9F9F9 !important;
        color: #000000 !important;
    }
</style>
<div class="login-container">

    <div class="login-box animated fadeInDown">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><div class="login-title">Log In</div></h3>
                </div>
                <div class="panel-body">

                    <div class="login-body">                    
                        <form action="#" class="form-horizontal" method="post" id="frm_user_login" name="frm_user_login">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" placeholder="E-mail" id="txt_email" name="txt_email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" placeholder="Password" id="txt_password" name="txt_password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p class="text-warning" id="err_wrong"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-danger btn-block">Log In</button>
                                </div>
                            </div>

                            <div class="login-subtitle">
                                Don't have an account yet? <a href="<?php echo BASE_URL . 'user_registration.php' ?>">Create an account</a>
                            </div>
                        </form>
                    </div>
                    <div class="login-footer" style="display: none;">
                        <div class="pull-left">
                            Pay Me to Cook
                        </div>
                    </div>

                </div>
            </div>

        </div>            
    </div>
</div>
<script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>jquery/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>common.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH; ?>user.js"></script>
<script>
//            $(".login-container").css( 'min-height', $(window).height() - 100 );
    $(".login-container").css('min-height', 'auto');
</script>

<?php
include_once FL_USER_FOOTER_INCLUDE;
include_once FL_USER_FOOTER;
?>
