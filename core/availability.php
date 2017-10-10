<?php
$avail = new availability();

class availability {
    function __construct(){
    }    
    function fill_availability( $label_from_to = '', $only_val = false ) {
        $hrs = 0;
        $arr_avail = array();
        $time_type = 'am';
        $time = 12;
        $half = FALSE;
        for( $i = 1; $i <= 48; $i++ ){
            if( $i == 25 ){
                $time_type = 'pm';
            }
            if( $time == 13 && $half == FALSE ){
                $time = 1;
            }
            $time = sprintf("%02d", $time);
            $arr_make = array();
            if( $half == TRUE ){
                $lbl = $label_from_to . ' ' . $time . ':30 ' . $time_type;
                $half = FALSE;
                $time++;
            } else {
                $lbl = $label_from_to . ' ' . $time . ':00 ' . $time_type;
                $half = TRUE;
            }
            $arr_make['value'] = $hrs;
            $arr_make['label'] = $lbl;
            $arr_avail[] = $arr_make;
            $hrs += 0.5;         
        }
        
        if( $only_val == TRUE ){
            $arr_avail_label = array();
            foreach ( $arr_avail as $time_avail ){
                $key = (string)$time_avail['value'];
                $arr_avail_label[$key] = $time_avail['label'];
            }
            return $arr_avail_label;
        } else {
            $str_options = '<option value="NA">NA</option>';
            foreach ( $arr_avail as $time_avail ){
                $str_options .= '<option value="' . $time_avail['value'] . '">' . $time_avail['label'] . '</option>';
            }
            return $str_options;            
        }        
    }
    
    function add_availability( $user_id, $availability ){
        global $mydb;
        foreach($availability as $key => $value) {
            $arr_data = array(
                'in_user_id' => $user_id,
                'st_day' => $key,
                'fl_from' => $value['from'],
                'fl_to' => $value['to']
            );
            $insert_avail_id = $mydb->insert( TBL_USER_AVAILABILITY, $arr_data );
        }
        return 1;
    }
    
    function get_days(){
        $arr_days = array(
            'availability_1' => 'Monday',
            'availability_2' => 'Tuesday',
            'availability_3' => 'Wednesday',
            'availability_4' => 'Thursday',
            'availability_5' => 'Friday',
            'availability_6' => 'Saturday',
            'availability_7' => 'Sunday'
        );
        return $arr_days;
    }
}