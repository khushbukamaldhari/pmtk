<?php
$user = new user();

class user {
    public $flag_err = FALSE;
    function __construct(){
        $this->flag_err = FALSE;
    }
    
    function add_user( $data ) {
        if( isset( $data ) && is_array( $data ) ){
            $username = ( isset( $data['txt_username'] ) && trim( $data['txt_username'] ) !== '' ) ? trim( $data['txt_username'] ) : '';
            $fullname = ( isset( $data['txt_full_name'] ) && trim( $data['txt_full_name'] ) !== '' ) ? trim( $data['txt_full_name'] ) : '';
            $email = ( isset( $data['txt_email'] ) && trim( $data['txt_email'] ) !== '' ) ? trim( $data['txt_email'] ) : '';
            $password = ( isset( $data['txt_password'] ) &&  $data['txt_password'] !== '' ) ? md5( $data['txt_password'] ) : '';
            $user_type = ( isset( $data['ddl_type'] ) && trim( $data['ddl_type'] ) !== '' ) ? trim( $data['ddl_type'] ) : '';
            $gender = ( isset( $data['rdo_gender'] ) && trim( $data['rdo_gender'] ) !== '' ) ? trim( $data['rdo_gender'] ) : '';
            $skills = ( isset( $data['txt_skills'] ) && trim( $data['txt_skills'] ) !== '' ) ? trim( $data['txt_skills'] ) : '';
            $passion = ( isset( $data['txt_passion'] ) && trim( $data['txt_passion'] ) !== '' ) ? trim( $data['txt_passion'] ) : '';
            global $mydb;
            $arr_data = array(
                'st_username' => $username,
                'st_full_name' => $fullname,
                'st_email_id' => $email,
                'st_password' => $password,
                'st_user_type' => $user_type,
                'st_gender' => $gender
            );
            $insert_id = $mydb->insert( TBL_USER, $arr_data );
            if( $insert_id !== '' && $insert_id > 0 ){
                foreach($data['fields'] as $key => $value) {
                    $this->add_user_meta( $insert_id, $key, $value );
                }
                include_once FL_AVAILABILITY;
                $avail->add_availability( $insert_id, $data['availability'] );
                if( $this->flag_err == FALSE ){
                    return $insert_id;
                } else {
                    return FALSE;
                }
            } else {
                $this->flag_err = TRUE;
            }
        }
    }
    
    function add_user_meta( $user_id = 0, $key = '', $value = '' ) {
        if( $user_id > 0 && trim( $key ) !== '' ){
            global $mydb;            
            $arr_data = array(
                'in_user_id' => $user_id,
                'st_meta_key' => $key,
                'st_meta_value' => $value
            );
            $insert_id = $mydb->insert( TBL_USERMETA, $arr_data );            
            if( $insert_id != 0 && $insert_id > 0 ){
                return( $insert_id );
            } else {
                return 0;
            }
        }
    }
    function update_usermeta( $user_id = 0, $key = '', $value = '' ) {
        if( $user_id > 0 && trim( $key ) !== '' ){
            global $mydb;            
            $arr_data = array(
                'st_meta_value' => $value
            );
            $where = array(                
                'in_user_id' => $user_id,
                'st_meta_key' => $key
            );
            $update_id = $mydb->update( TBL_USERMETA, $arr_data, $where );            
            if( $update_id != 0 && $update_id > 0 ){
                return( $update_id );
            } else {
                return 0;
            }
        }
    }
    
    function get_user_data( $user_id ) {
        if( $user_id > 0 ){
            global $mydb;
            $str_query = 'SELECT in_user_id, st_username, st_full_name, st_email_id, st_user_type, st_gender, dt_created_at FROM ' . $mydb->prefix . TBL_USER . ' WHERE in_user_id = "' . $user_id . '" AND in_is_active = 1 LIMIT 1';
            $response = $mydb->query( $str_query );
            if ($response != 0 && count($response) > 0) {
                return $response;
            }
        }
    }
    
    function get_user_meta( $user_id, $meta_key = '', $single = FALSE, $is_option = FALSE, $options = array(  ) ) {
        global $mydb;
        if( $user_id > 0 ){
            $where = '';
            $select = 'st_meta_value';
            if( trim( $meta_key ) == '' ){
                $select = 'st_meta_key, st_meta_value';
            }
            if( trim( $meta_key ) !== '' ){
                $where .= ' AND st_meta_key = "' . $meta_key . '"';
            }
            $str_query = 'SELECT ' . $select . ' FROM ' . $mydb->prefix . TBL_USERMETA . ' WHERE  in_user_id = ' . $user_id . $where;        
            //echo $str_query;
            $response = $mydb->query($str_query);
            //echo '<pre>'; print_r($response); echo '</pre>';
            if ($response != 0 && count($response) > 0) { 
                if( $is_option == TRUE && !empty( $options ) ){                    
                    include_once FL_OPTIONS;
                    $opt_meta = new options();
                    $option_value = $opt_meta->get_option_value( $options['option_type'], $meta_key, $response['st_meta_value'], $options['single'] );
                    return $option_value;
                }
                if( $single == FALSE ){
                    return $response;
                } else {                    
                    return $response['st_meta_value'];
                }
            }
        }
    }
    
    function get_user_images( $user_id, $image_type = '' ) {
        if( $user_id > 0 && trim( $image_type ) !== '' ){
            switch ( $image_type ){
                case 'profile':
                    $files = glob( UPLOAD_PATH . $user_id . DIR_SEPERATOR . "profile.*" );
                    $img_url = DEFAULT_IMAGE_URL . 'default_user_f.png';
                    if( !empty( $files ) ){
                        //$img = end( explode( '/', $files ) );
                        $file = explode( '/', $files[0] );
                        $img = end( $file );
                        $img_url = UPLOAD_URL . $user_id . '/' . $img;
                    }
                    return $img_url;
                    break;
                case 'cover':
                    $files = glob( UPLOAD_PATH . $user_id . DIR_SEPERATOR . "cover.*" );
                    $img_url = DEFAULT_IMAGE_URL . 'cover.jpg';
                    if( !empty( $files ) ){
                        $file = explode( '/', $files[0] );
                        $img = end( $file );
                        $img_url = UPLOAD_URL . $user_id . '/' . $img;
                    }                   
                    return $img_url;
                    break;
                default :
                    break;
            }
        }
    }
        
    function get_user_availability( $user_id ) {
        if( $user_id > 0 ){
            global $mydb;
            $str_query = 'SELECT * FROM ' . $mydb->prefix . TBL_USER_AVAILABILITY . ' WHERE in_user_id = ' . $user_id;
            $response = $mydb->query($str_query);
            if ($response != 0 && count($response) > 0) {
                return $response;
            }
        }
    }
//    
//    function get_feature_cook( $user_type ,$user_meta_key , $premium) {
//        if( $user_type != "" && $premium !="" ){
//            global $mydb;
//            $str_query = 'SELECT user.in_user_id, user.st_username, user.st_full_name, user.st_email_id, user.st_user_type, user.st_gender, user.dt_created_at FROM ' . $mydb->prefix . TBL_USER  . ' user , '. $mydb->prefix  . TBL_USERMETA . ' user_meta WHERE user.st_user_type = "' . $user_type . '" AND user_meta.st_meta_value like "'. $premium .'" AND user_meta.st_meta_key  like "'.$user_meta_key.'"AND user.in_user_id = user_meta.in_user_id AND user.in_is_active = 1 LIMIT 0,30';
//            echo $str_query;
//            $response = $mydb->query($str_query);
//            if ($response != 0 && count($response) > 0) {
//                return $response;
//            }
//        }
//    }
    
    function get_cook( $gender = '' ) {
        $where = '';
        if( trim( $gender ) !== '' ){
            $where = ' user.st_gender = "' . $gender . '" AND ';
        }
        global $mydb;
        $str_query = 'SELECT user.in_user_id, user.st_username, user.st_full_name, user.st_email_id, user.st_user_type, user.st_gender, user.dt_created_at FROM ' . $mydb->prefix . TBL_USER  . ' user '                
                . 'WHERE user.st_user_type = "cook" AND ' . $where . ' user.in_is_active = 1 LIMIT 0,30';
        //echo $str_query;
        $response = $mydb->query( $str_query );
        if ($response != 0 && count($response) > 0) {
            return $response;
        }
    }
    function get_featured_cook( $gender ) {
        if( trim( $gender ) !== '' ){
            global $mydb;
            $str_query = 'SELECT user.in_user_id, user.st_username, user.st_full_name, user.st_email_id, user.st_user_type, user.st_gender, user.dt_created_at FROM ' . $mydb->prefix . TBL_USER  . ' user '
                    . ' JOIN '. $mydb->prefix  . TBL_USERMETA . ' user_meta ON user.in_user_id = user_meta.in_user_id AND user_meta.st_meta_key = "membership" AND user_meta.st_meta_value = "premium" '
                    . 'WHERE user.st_user_type = "cook" AND user.st_gender = "' . $gender . '" AND user.in_is_active = 1 LIMIT 0,30';
            //echo $str_query;
            $response = $mydb->query( $str_query );
            if ($response != 0 && count($response) > 0) {
                return $response;
            }
        }
    }
}