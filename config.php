<?php

define('BASE_DIR', 'cook');
define('CORE_DIR', 'core');
define('ADMIN_DIR', 'admin');
define('DIR_SEPERATOR', '/');
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'] . DIR_SEPERATOR . BASE_DIR);
define('BASE_URL', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http' . '://' . $_SERVER['SERVER_NAME'] . DIR_SEPERATOR . BASE_DIR . DIR_SEPERATOR );
define('ADMIN_URL', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http' . '://' . $_SERVER['SERVER_NAME'] . DIR_SEPERATOR . BASE_DIR . DIR_SEPERATOR . ADMIN_DIR . DIR_SEPERATOR );
define('JS_PATH', BASE_URL . DIR_SEPERATOR . 'js' . DIR_SEPERATOR);
define('UPLOAD_DIR', 'uploads');
define('UPLOAD_PATH', BASE_PATH . DIR_SEPERATOR . UPLOAD_DIR . DIR_SEPERATOR);
define('UPLOAD_URL', BASE_URL . UPLOAD_DIR . DIR_SEPERATOR);
define('JS_PLUGINS_PATH', BASE_URL . DIR_SEPERATOR . 'js' . DIR_SEPERATOR . 'plugins' . DIR_SEPERATOR);
define('CSS_PATH', BASE_URL . DIR_SEPERATOR . 'css' . DIR_SEPERATOR);
define('IMAGE_PATH', BASE_URL . DIR_SEPERATOR . 'img' . DIR_SEPERATOR);
define('DEFAULT_IMAGE_URL', BASE_URL . DIR_SEPERATOR . 'images' . DIR_SEPERATOR);
define('ASSETS_PATH', BASE_URL . DIR_SEPERATOR . 'assets' . DIR_SEPERATOR);
define('ADMIN_JS_PATH', ADMIN_URL . DIR_SEPERATOR . 'js' . DIR_SEPERATOR);
define('ADMIN_JS_PLUGINS_PATH', ADMIN_URL . DIR_SEPERATOR . 'js' . DIR_SEPERATOR . 'plugins' . DIR_SEPERATOR);
define('ADMIN_CSS_PATH', ADMIN_URL . DIR_SEPERATOR . 'css' . DIR_SEPERATOR);
define('ADMIN_IMAGE_PATH', ADMIN_URL . DIR_SEPERATOR . 'img' . DIR_SEPERATOR);
define('ADMIN_ASSETS_PATH', ADMIN_URL . DIR_SEPERATOR . 'assets' . DIR_SEPERATOR);
define('USER_AJAXPRO', ADMIN_JS_PLUGINS_PATH . 'upload_crop' . 'ajaxpro.php');
define('TMP_UPLOADS', BASE_PATH . DIR_SEPERATOR . 'tmp_uploads' . DIR_SEPERATOR);
define('TMP_UPLOADS_URL', BASE_URL . DIR_SEPERATOR . 'tmp_uploads' . DIR_SEPERATOR);
define('SIDEBAR_URL', BASE_PATH . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'sidebar' . DIR_SEPERATOR);
define('FL_SEARCH_DISTANCE', SIDEBAR_URL . 'search_distance.php');
define('FL_SEARCH_LOCATION', SIDEBAR_URL . 'search_location.php');
define('FL_SEARCH_ADVANCED', SIDEBAR_URL . 'search_advanced.php');

/*Uttam Jain 07-10-17*/
define('FL_SEARCH_COOK', SIDEBAR_URL . 'search_cook.php');
define('FL_FAQ', SIDEBAR_URL . 'search_faq.php');
define('FL_TESTIMONIALS', SIDEBAR_URL . 'search_test.php');
define('FL_NEWSLETTER', SIDEBAR_URL . 'search_news.php');
/*End of code Uttam Jain 07-10-17*/

/*Uttam Jain 09-10-17*/
define('FL_FEATURED_COOK', SIDEBAR_URL . 'search_featured_cook.php');
/*End of code Uttam Jain 09-10-17*/

/*Uttam Jain 10-10-17*/
define('FL_COMMENT', SIDEBAR_URL . 'search_comment.php');
define('FL_FEATURED_CUSTOMER', SIDEBAR_URL . 'search_customer.php');
/*End of code Uttam Jain 10-10-17*/


//Database
define('HOSTNAME', 'localhost');
define('DBUSERNAME', 'root');
define('DBPASSWORD', '');
define('DBNAME', 'db_cook');
define('DBPREFIX', 'cook_');

//Table Names
define('TBL_OPTIONS', 'options');
define('TBL_COUNTRY', 'country');
define('TBL_STATE', 'states');
define('TBL_USER', 'user');
define('TBL_USERMETA', 'usermeta');
define('TBL_USER_AVAILABILITY', 'user_availability');

//File Includes

define('USER_PRO_DIR', 'user_profile');
define('USER_PROFILE', BASE_PATH . DIR_SEPERATOR . 'user_profile.php');
define('USER_PRO_DETAIL', BASE_PATH . DIR_SEPERATOR . USER_PRO_DIR . DIR_SEPERATOR . 'user_detail.php');
define('USER_PRO_COVER_LETTER', BASE_PATH . DIR_SEPERATOR . USER_PRO_DIR . DIR_SEPERATOR . 'user_cover_letter.php');
define('USER_PRO_AVAILABILITY', BASE_PATH . DIR_SEPERATOR . USER_PRO_DIR . DIR_SEPERATOR . 'user_availability.php');
define('USER_PRO_BIOGRAPHY', BASE_PATH . DIR_SEPERATOR . USER_PRO_DIR . DIR_SEPERATOR . 'user_biography.php');
define('USER_PRO_CONTACT', BASE_PATH . DIR_SEPERATOR . USER_PRO_DIR . DIR_SEPERATOR . 'user_contact_detail.php');
define('USER_PRO_SERVICES', BASE_PATH . DIR_SEPERATOR . USER_PRO_DIR . DIR_SEPERATOR . 'user_services.php');


define('FL_USER', BASE_PATH . DIR_SEPERATOR . CORE_DIR . DIR_SEPERATOR . 'user.php');
define('FL_USER_HEADER', BASE_PATH . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'header.php');
define('FL_USER_HEADER_INCLUDE', BASE_PATH . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'header_includes.php');
define('FL_USER_FOOTER', BASE_PATH . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'footer.php');
define('FL_USER_FOOTER_INCLUDE', BASE_PATH . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'footer_includes.php');

define('FL_ADMIN_HEADER', BASE_PATH . DIR_SEPERATOR . ADMIN_DIR . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'header.php');
define('FL_ADMIN_HEADER_INCLUDE', BASE_PATH . DIR_SEPERATOR . ADMIN_DIR . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'header_includes.php');
define('FL_ADMIN_FOOTER', BASE_PATH . DIR_SEPERATOR . ADMIN_DIR . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'footer.php');
define('FL_ADMIN_FOOTER_INCLUDE', BASE_PATH . DIR_SEPERATOR . ADMIN_DIR . DIR_SEPERATOR . 'includes' . DIR_SEPERATOR . 'footer_includes.php');

define('FL_CONNECTION', BASE_PATH . DIR_SEPERATOR . 'connection.php');
define('FL_COMMON', BASE_PATH . DIR_SEPERATOR . 'common.php');
define('FL_AVAILABILITY', BASE_PATH . DIR_SEPERATOR . CORE_DIR . DIR_SEPERATOR . 'availability.php');
define('FL_OPTIONS', BASE_PATH . DIR_SEPERATOR . CORE_DIR . DIR_SEPERATOR . 'options.php');
define('FL_COUNTRY', BASE_PATH . DIR_SEPERATOR . CORE_DIR . DIR_SEPERATOR . 'country.php');

error_reporting(0);

require_once FL_CONNECTION;
require_once FL_COMMON;
$common = new common();
