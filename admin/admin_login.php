<?php
require_once '../config.php';
?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Admin Login</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Log In</strong> to your account</div>
                    <form action="#" class="form-horizontal" method="post" id="frm_admin_login" name="frm_admin_login">
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
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    <div class="login-or">OR</div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-twitter"><span class="fa fa-twitter"></span> Twitter</button>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block btn-facebook"><span class="fa fa-facebook"></span> Facebook</button>
                        </div>
                        <div class="col-md-4">                            
                            <button class="btn btn-info btn-block btn-google"><span class="fa fa-google-plus"></span> Google</button>
                        </div>
                    </div>
                    <div class="login-subtitle">
                        Don't have an account yet? <a href="#">Create an account</a>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2014 AppName
                    </div>
                    <div class="pull-right">
                        <a href="#">About</a> |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>            
        </div>
        <script type="text/javascript" src="<?php echo ADMIN_JS_PLUGINS_PATH; ?>jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>common.js"></script>
        <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>admin.js"></script>
    </body>
</html>






