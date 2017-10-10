<?php
require_once '../config.php';
$ajax = new admin_ajax();

if( isset( $_POST['action'] ) && trim( $_POST['action'] ) !== '' ){
    //$common->sanitize_input();
    switch ($_POST['action']){
        case 'admin_login' :
            if( isset( $_POST['txt_email'] ) && trim( $_POST['txt_email'] ) !== '' && isset( $_POST['txt_password'] ) && trim( $_POST['txt_password'] ) !== ''){                
                $ajax->admin_login( $_POST['txt_email'], $_POST['txt_password'] );
            }
            break;
        case 'cook_registration' :
            $ajax->cook_registration( $_POST );
            break;
        case 'check_user_exist' :
            $ajax->check_user_exist( $_POST );
            break;
        case 'get_states' :
            $ajax->get_states( $_POST );
            break;
        default :
            die(0);
    }
} else if( !empty( $_FILES ) ){
    if( isset( $_FILES["file_profile"] ) && $_FILES["file_profile"] != '' ){
        $ajax->upload_file( 'profile', 'file_profile' );
    } else if( isset( $_FILES["file_cover"] ) && $_FILES["file_cover"] != '' ){        
        $ajax->upload_file( 'cover', 'file_cover' );
    }
}

class admin_ajax {
    public function __construct() {
        $this->result['success_flag'] = false;
        $this->result['message'] = '';
        $this->result['data'] = '';
    }
    
    public function admin_login( $id, $password ){
        global $mydb;
        $str_query = 'SELECT in_user_id, st_user_type FROM ' . $mydb->prefix . TBL_USER . ' WHERE st_email_id = "' . $id . '" AND st_password = "' . md5( $password ) . '" LIMIT 1';
        $response = $mydb->query( $str_query );
        if( $response != 0 && count( $response ) > 0 ){
            session_start();
            $_SESSION['user_id'] = $response['in_user_id'];
            $_SESSION['user_type'] = $response['st_user_type'];
            $this->result['success_flag'] = true;
            $this->result['redirect'] = ADMIN_URL;
        } else {
            $this->result['success_flag'] = false;
            $this->result['message'] = 'Wrong Email ID or Password...';
        }
        die( json_encode( $this->result ) );
    }
    
      public function cook_registration($data) {
        $exist_data['username'] = $data['txt_username'];
        $exist_data['email'] = $data['txt_email'];
        global $mydb;
        include FL_USER;
        //$exist = json_decode($this->check_user_exist( $exist_data ));
//        if( $exist['success_flag'] == false ){
//            $this->result['success_flag'] = false;
//            $this->result['message'] = 'User Already Exist...';
        $insert_user = $user->add_user($data);
        //echo $insert_user;
        if ($insert_user > 0) {
            session_start();
            $session_id = session_id();
            $files = glob( TMP_UPLOADS . $session_id . DIR_SEPERATOR . "*.*" );
            $user_folder = $insert_user;
            if ( !file_exists(UPLOAD_PATH . $user_folder ) ) {
                mkdir(UPLOAD_PATH . $user_folder, 0777, true);
            }
            //$target_dir = UPLOAD_PATH . $user_folder;
            foreach($files as $file){
                $file_upload = explode('/', $file);
                $file_up = end($file_upload);
                $file_upload_url = TMP_UPLOADS  . $session_id . DIR_SEPERATOR . $file_up;
                $target_dir = UPLOAD_PATH . $user_folder .DIR_SEPERATOR . $file_up;
                rename($file_upload_url,$target_dir);
               
                //file_put_contents($target_dir . DIR_SEPERATOR , file_get_contents($file_upload_url));
            }
            $files1 = glob( TMP_UPLOADS . $session_id . DIR_SEPERATOR . "*.*" );
              
            if ( count($files1) < 1 && file_exists( TMP_UPLOADS . $session_id ) ) {
                $file_upload_url = TMP_UPLOADS  . $session_id ;
                rmdir($file_upload_url);
            }
            $_SESSION['last_added_cook'] = $insert_user;
            $this->result['success_flag'] = true;
        } else {
            $this->result['success_flag'] = false;
        }
//        }
        die(json_encode($this->result));
    }
    
    public function get_states( $data ){
        $state_id = $data['state_id'];
        include FL_COUNTRY;
        $states = $country->show_states( $state_id );
            
        if( count( $states ) > 0 ){
            $this->result['success_flag'] = true;
            $this->result['data'] = $states;
        } else {
            $this->result['success_flag'] = false;
        }
        die( json_encode( $this->result ) );
    }
    
    public function tmp( $data ){
        global $mydb;
        print_r( $data );
    }
    
    public function check_user_exist( $data ){
        global $mydb;
        $where = '';
        $str_query = 'SELECT in_user_id, st_user_type FROM ' . $mydb->prefix . TBL_USER . ' WHERE st_username = "' . $data['username'] . '" ' . $where;
        $response = $mydb->query( $str_query );
        if( $response != 0 && count( $response ) > 0 ){
            $this->result['success_flag'] = false;
            $this->result['message'] = 'Username Already Exist';
            $this->result['data']['invalid'] = 'username';
        } else {            
            $str_query = 'SELECT in_user_id, st_user_type FROM ' . $mydb->prefix . TBL_USER . ' WHERE st_email_id = "' . $data['email'] . '"';
            $response = $mydb->query( $str_query );
            if( $response != 0 && count( $response ) > 0 ){
                $this->result['success_flag'] = false;
                $this->result['message'] = 'Email ID Already Exist';
                $this->result['data']['invalid'] = 'email';
            } else {
                $this->result['success_flag'] = true;
                $this->result['message'] = '';                
            }            
        }
        die( json_encode( $this->result ) );
    }
    
    public function upload_file( $filename = 'profile', $var = 'file' ){
        session_start();
        $target_dir = UPLOAD_PATH;
        if( isset( $_SESSION['last_added_cook'] ) && $_SESSION['last_added_cook'] > 0 ){
            $user_folder = $_SESSION['last_added_cook'];
            if ( !file_exists( UPLOAD_PATH . $user_folder ) ) {
                mkdir( UPLOAD_PATH . $user_folder, 0777, true );
                $target_dir = UPLOAD_PATH . $user_folder;
            }
            $target_file = UPLOAD_DIR . DIR_SEPERATOR . $user_folder . DIR_SEPERATOR . basename($_FILES[$var]["name"]);
            //$target_file = $target_dir . basename($_FILES[$var]["name"]);
            //echo UPLOAD_PATH . $user_folder;
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
            $target_file_name = $filename . '.' . $imageFileType;
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES[$var]["tmp_name"]);
                if($check !== false) {
                    $this->result['message'] = "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    $this->result['message'] = "File is not an image.";
                    $uploadOk = 0;
                }
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                $this->result['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $this->result['message'] = "Sorry, your file was not uploaded.";

            // if everything is ok, try to upload file
            } else {
                $this->result['success_flag'] = true;
                $this->result['message'] = '';
                move_uploaded_file($_FILES[$var]["tmp_name"], UPLOAD_PATH . $user_folder . DIRECTORY_SEPARATOR . $target_file_name);
            }
        }
        die(json_encode( $this->result ) );
    }
}