<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title><?php echo isset($page_title) ? $page_title : 'Pay Me to Cook'; ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
        <meta http-equiv="pragma" content="no-cache" />
        <!-- END META SECTION -->
        <?php require_once FL_USER_HEADER_INCLUDE; ?>
    </head>
    <body>
        <div id="loader_placeholder"></div>
        <!-- page container -->
        <div class="page-container">

            <!-- page header -->
            <div class="page-header">

                <div class='col-md-12 header-up'>
                    <div class='col-md-12 pv-profile-section pv-top-card-section header-top '>
                        <div class="container" style="margin: 13px auto;"> 
                            <!-- page logo -->
                            <div class="logo">
                                <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL . 'img/logo.png' ?>" alt="Pay Me to Cook" /> </a>
                            </div>
                            <!-- ./page logo -->
                            <!-- navigation -->
                            <ul class="navigation">


                                <?php if ($common->check_user_login() == 1) { ?>
                                    <li>
                                        <a href="<?php echo BASE_URL . 'user_profile.php'; ?>"><button class="btn btn-custom" ><span class="fa fa-user" style="color: #bd7abf;font-size: 17px;padding: 2px;"></span>My Profile</button></a>

                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL . 'logout.php'; ?>"><button class="btn btn-custom"  >Logout</button></a>
                                    </li>
                                <?php } else { ?>
                                    <li>
                                        <a style="color:#fff;" href="<?php echo BASE_URL . 'user_registration.php'; ?>"> <button  class="btn btn-custom sign_up" ><span style="color: #fff;font-size: 20px;" class="fa fa-lock"></span>Sign up</button></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo BASE_URL . 'user_login.php'; ?>"> <button class="btn btn-custom" ><span style="color: #bd7abf;font-size: 13px;padding: 2px 12px;background: url(img/gallary.png) 0 -744px no-repeat;"></span>Sign in</button> </a>               
                                    </li>
                                    
                                    <li>
                                        <a  href="#" data-toggle="dropdown"> <button class="btn btn-custom" >English<span style="color: #bd7abf;font-size: 13px;padding: 2px 18px;background: url(img/gallary.png) 0 -1433px no-repeat;"></span></button></a>
                                        <ul class="dropdown-menu" style="min-width:127px;" role="menu">
                                            <li>Deutsch</li>
                                            <li>Ελληνικά</li>
                                            <li>Italiano</li>
                                            <li>Español</li>
                                        </ul>
                                    </li>
                                <?php } ?>

                            </ul>
                            <!-- ./navigation --> 

                        </div>
                    </div>
                </div>
                <!-- page header holder -->
                <div class="page-header-holder">

                    <!-- page logo -->
                    <div class="logo logo1">
                        <a href="<?php echo BASE_URL; ?>"><img src="<?php echo BASE_URL . 'img/logo.png' ?>" alt="Pay Me to Cook" /> </a>
                    </div>
                    <!-- ./page logo -->

                    <!-- search -->
                    <div class="search" style="display:none;">
                        <div class="search-button"><span class="fa fa-search"></span></div>
                        <div class="search-container animated fadeInDown">
                            <form action="#" method="post">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search..."/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- ./search -->

                    <!-- nav mobile bars -->
                    <div class="navigation-toggle">
                        <div class="navigation-toggle-user" ><span class="fa fa-user"></span></div>
                        <div class="navigation-toggle-button"><span class="fa fa-bars"></span></div>
                    </div>
                    <!-- ./nav mobile bars -->
                    <!-- navigation -->
                    <ul class="navigation_user  fadeout">


                        <?php if ($common->check_user_login() == 1) { ?>
                            <li>
                                <a href="<?php echo BASE_URL . 'user_profile.php'; ?>"><button class="btn btn-custom1" >My Profile</button></a>

                            </li>
                            <li>
                                <a href="<?php echo BASE_URL . 'logout.php'; ?>"><button class="btn btn-custom1"  >Logout</button></a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a href="<?php echo BASE_URL . 'user_login.php'; ?>"> <button class="btn btn-custom1" >Sign In</button> </a>               
                            </li>
                            <li>
                                <a href="<?php echo BASE_URL . 'user_registration.php'; ?>"> <button class="btn btn-custom1" >Sign Up</button></a>
                            </li>
                        <?php } ?>

                    </ul>
                    <ul class="navigation  fadeout">
                        <li>
                            <a class="btn" href="<?php echo BASE_URL; ?>">Home</a>
                        </li>
                        <li>
                            <a class="btn" href="<?php echo BASE_URL . 'cook.php?cook=men'; ?>">Men</a>
                        </li>
                        <li>
                            <a class="btn" href="<?php echo BASE_URL . 'cook.php?cook=women'; ?>">Women</a>
                        </li>
                        <li>
                            <a class="btn" href="#">Cuisine</a>
                        </li>
                    </ul>
                    <!-- ./navigation -->


                </div>
                <!-- ./page header holder -->

            </div>

