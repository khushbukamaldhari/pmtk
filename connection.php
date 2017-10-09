<?php
$GLOBALS['mydb'] = new connection();
$GLOBALS['mydb']->prefix = DBPREFIX;

class connection {
    function connect() {
        $con = mysqli_connect(HOSTNAME, DBUSERNAME, DBPASSWORD, DBNAME);
        if (mysqli_connect_errno()) {
            echo "Failed to Connect with Database: " . mysqli_connect_error();
        } else {
            $this->con = $con;
            return $con;
        }
    }
    function __construct(){
        $this->connect();
    }
    function query( $query ) {
        $result = mysqli_query($this->con, $query) or die(mysqli_error($this->con));
        if ($result->num_rows > 0) {
            if( $result->num_rows == 1 ){
                return mysqli_fetch_assoc($result);            
            } else {
                $final = array();
                
                while( $row = $result->fetch_assoc() ){
                    $final[] = $row;
                }
                return $final;
                //return mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        } else {
            return 0;
        }
    }
    function insert( $table, $data ){
        global $mydb;
        $insert_table = $mydb->prefix . $table;
        $arr_fields = array();
        $arr_data = array();
        foreach ( $data as $key => $value ){
            $arr_fields[] = $key;
            if( !is_array( $value ) ){
                if( trim( $value ) !== '' ){
                    $value = trim( $value );
                }
            } else if( is_array( $value ) ){
                $value = json_encode( $value );
            }
            $arr_data[] = mysqli_real_escape_string($this->con, $value);
        }        
        $str_insert = 'INSERT INTO ' . $insert_table . ' (' . implode(',', $arr_fields) . ')
                        VALUES ("' . implode('","', $arr_data) . '")';
        if ($this->con->query($str_insert) === TRUE) {
            $last_id = $this->con->insert_id;
            return $last_id;
        } else {
            return 0;
        }
    }
    function update( $table, $data, $where ){
        global $mydb;
        $update_table = $mydb->prefix . $table;
        $arr_data = array();
        $str_set = ' SET ';
        $seperator = '';
        $str_where = ' WHERE ';
        foreach ( $data as $key => $value ){
            if( !is_array( $value ) ){
                if( trim( $value ) !== '' ){
                    $value = trim( $value );
                }
            } else if( is_array( $value ) ){
                $value = json_encode( $value );
            }
            $str_set .= $seperator . $key . ' = "' . mysqli_real_escape_string($this->con, $value) . '" ';
            $seperator = ',';
        }
        
        $seperator = '';
        if( is_array( $where ) ){
            foreach ( $where as $wk => $wv ){                
                if( trim( $wk ) !== '' && trim( $wv ) !== '' ){
                    $wv = trim( $wv );
                }
                $str_where .= $seperator . $wk . ' = "' . $wv . '" ';
                $seperator = ' AND ';
            }
        } else if( trim( $where ) !== '' ){
            $str_where = ' ' . $where . ' ';
        } else {
            $str_where = '';
        }
        
        $str_update = 'UPDATE ' . $update_table . $str_set . $str_where;
        
        if ($this->con->query($str_update) === TRUE) {
            $last_id = $this->con->insert_id;
            return $last_id;
        } else {
            return 0;
        }
    }
}

?>
