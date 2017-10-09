<?php
$country = new country();

class country {
    function __construct(){
    }
    
    function get_all_countries() {
        global $mydb;
        $str_query = 'SELECT * FROM ' . $mydb->prefix . TBL_COUNTRY . ' WHERE in_is_active = 1';
        $response = $mydb->query( $str_query );
        if( $response != 0 && count( $response ) > 0 ){
            return $response;
        } else {
            return 0;
        }
    }
        
    function show_countries() {        
        $all_fields = $this->get_all_countries();
        $options = '<option value="">- Select Country -</option>';
        //$options = '';
        foreach ($all_fields as $key => $field) {
            $options .= '<option value="' . $field['in_country_id'] . '">' . $field['st_country_name'] . '</option>';        
        }
        return $options;
    }
    
    function show_states( $country_id = '' ) {
        global $mydb;
        error_reporting(0);
        if( $country_id > 0 ){
            $str_query = 'SELECT * FROM ' . $mydb->prefix . TBL_STATE . ' WHERE in_country_id =' . $country_id . ' AND in_is_active = 1';
            //echo $str_query;
            $response = $mydb->query( $str_query );
            if( $response != 0 ){
                $options = '<option value="">- Select State -</option>';
                //$options = '';
                foreach ($response as $key => $field) {
                    $options .= '<option value="' . $field['in_state_id'] . '">' . $field['st_state_name'] . '</option>';        
                }
                return $options;
            }
        }
    }
    
    function show_phone_codes( $type = '' ) {
        global $mydb;        
        $str_query = 'SELECT in_country_phone_code, st_country_name FROM ' . $mydb->prefix . TBL_COUNTRY . ' WHERE in_is_active = 1';
        $response = $mydb->query( $str_query );
        if( $response != 0 && count( $response ) > 0 ){ 
            $all_fields = $this->get_all_countries();
            $options = '<option value="">- Select Phone Code -</option>';
            //$options = '';
            foreach ($all_fields as $key => $field) {
                $options .= '<option value="' . $field['in_country_phone_code'] . '">' . $field['st_country_name'] . ' (' . $field['in_country_phone_code'] . ')</option>';        
            }
            return $options;
        } else {
            return '';
        }
    }
    function get_country( $country_id, $field = '*', $single = FALSE ) {
        if( $country_id !== '' && $country_id >= 0 ){
            global $mydb;            
            $str_query = 'SELECT ' . $field . ' FROM ' . $mydb->prefix . TBL_COUNTRY . ' WHERE in_country_id = ' . $country_id;            
            $response = $mydb->query( $str_query );
            if( $response != 0 && count( $response ) > 0 ){
                if( $single == FALSE ){
                    return $response;
                } else {
                    return $response[$field];
                }
            } else {
                return '';
            }
        }
    }
    function get_state( $state_id, $field = '*', $single = FALSE ) {
        if( $state_id !== '' && $state_id >= 0 ){
            global $mydb;            
            $str_query = 'SELECT ' . $field . ' FROM ' . $mydb->prefix . TBL_STATE . ' WHERE in_state_id = ' . $state_id;            
            $response = $mydb->query( $str_query );
            if( $response != 0 && count( $response ) > 0 ){
                if( $single == FALSE ){
                    return $response;
                } else {
                    return $response[$field];
                }
            } else {
                return '';
            }
        }
    }
}