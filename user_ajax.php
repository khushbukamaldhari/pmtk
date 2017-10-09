<?php
require_once 'config.php';
$ajax = new user_ajax();

if( isset( $_POST['action'] ) && trim( $_POST['action'] ) !== '' ){
    //$common->sanitize_input();
    switch ($_POST['action']){
        case 'user_login' :
            if( isset( $_POST['txt_email'] ) && trim( $_POST['txt_email'] ) !== '' && isset( $_POST['txt_password'] ) && trim( $_POST['txt_password'] ) !== ''){                
                $ajax->user_login( $_POST['txt_email'], $_POST['txt_password'] );
            }
            break;
        case 'edit_usermeta' :            
                $ajax->edit_usermeta( $_POST );
            break;
        default :
            die(0);
    }
}

class user_ajax {
    public function __construct() {
        $this->result['success_flag'] = false;
        $this->result['message'] = '';
        $this->result['data'] = '';
    }
    
    public function user_login( $id, $password ){
        global $mydb;
        $str_query = 'SELECT in_user_id, st_user_type FROM ' . $mydb->prefix . 'user WHERE st_email_id = "' . $id . '" AND st_password = "' . md5( $password ) . '" LIMIT 1';
        $response = $mydb->query( $str_query );
        if( $response != 0 && count( $response ) > 0 ){
            session_start();
            $_SESSION['user_id'] = $response['in_user_id'];
            $_SESSION['user_type'] = $response['st_user_type'];
            $this->result['success_flag'] = true;
            $this->result['redirect'] = BASE_URL . 'user_profile.php';
        } else {
            $this->result['success_flag'] = false;
            $this->result['message'] = 'Wrong Email ID or Password...';
        }
        die( json_encode( $this->result ) );
    }
    
    public function edit_usermeta( $data ){
        session_start();
        if( isset( $_SESSION['user_id'] ) && $_SESSION['user_id'] > 0 ){
            include_once FL_USER;
            $user = new user();
            foreach ($data['fields'] as $key => $value) {
                if( is_array( $value ) ){
                    $value = json_encode( $value );
                }
                $update_id = $user->update_usermeta( $_SESSION['user_id'], $key, $value );
                if( $update_id >= 0 ){
                    $this->result['success_flag'] = true;
                }
            }
            if( $data['getdata'] == 1 ){
                $this->result['data']['display'] = '';
                include_once FL_OPTIONS;
                $opt = new options();
                foreach ($data['fields'] as $key => $value) {
                    $this->result['data']['display'] .= $opt->show_user_options( $_SESSION['user_id'], 'cook', $key );
                }
            }
        }
        
        die(json_encode( $this->result ) );
    }
}