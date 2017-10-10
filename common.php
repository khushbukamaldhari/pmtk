<?php
class common {
    function __construct(){
        //error_reporting(0);
    }
    
    function redirect( $location ){
        header( "location:" . $location );
        exit;
    }
    
    function check_admin_login(){        
        if( null !== session_id() ){
            session_start();
            if( !isset( $_SESSION['user_id'] ) || $_SESSION['user_id'] < 1 || !isset( $_SESSION['user_type'] ) || $_SESSION['user_type'] !== 'admin' ){
                $this->redirect(ADMIN_URL . 'admin_login.php');
            }
        } else {
            $this->redirect(ADMIN_URL);
        }
    }
    function check_user_login(){
        session_start();
        if( null !== session_id() ){
            if( !isset( $_SESSION['user_id'] ) || $_SESSION['user_id'] < 1 ){
                //$this->redirect( BASE_URL . 'user_login.php' );
                return 0;
            } else {
                return 1;
            }
        }
    }
    
    function sanitize_input() {
        foreach ($_POST as $key => $value) {
            $_POST[$key] = mysqli_real_escape_string( trim( $value ) );
        }
    }
}