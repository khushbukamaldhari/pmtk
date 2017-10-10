<?php
$opt = new options();

class options {
    function __construct(){
    }
    
    function get_options( $type = '', $key = '' ) {
        global $mydb;
        $where = '';
        if( trim( $type ) !== '' ){
            $where = ' st_type = "' . $type . '" AND ';
        }
        if( trim( $key ) !== '' ){
            $where .= ' st_key = "' . $key . '" AND ';
        }
        $str_query = 'SELECT * FROM ' . $mydb->prefix . TBL_OPTIONS . ' WHERE ' . $where . ' in_is_active = 1';
        
        $response = $mydb->query( $str_query );
        if( $response != 0 && count( $response ) > 0 ){
            $fields = array();
            if( !isset( $response[0] ) ){
                $tmp_response = $response;
                $response = array();
                $response[0] = $tmp_response;
            }
            foreach( $response as $field ) {
                if( !isset( $fields[$field['st_key']]['field_type'] ) ){
                    $fields[$field['st_key']]['field_type'] = $field['st_field_type'];
                }
                if( !isset( $fields[$field['st_key']]['st_display_key'] ) ){
                    $fields[$field['st_key']]['display_key'] = $field['st_display_key'];
                }
                $arr_field['field_key'] = $field['st_field_key'];
                $arr_field['field_value'] = $field['st_field_value'];
                $fields[$field['st_key']]['field_data'][] = $arr_field;
            }
            return( $fields );
        } else {
        }
    }
        
    function show_options( $type = '', $key = '', $return = FALSE ) {        
        $all_fields = $this->get_options( $type, $key );
        $editor = array();
        //print_r($all_fields);
        if( $return == FALSE ){
            foreach ( $all_fields as $key => $field ) {
                switch ( $field['field_type'] ) {
                    case 'select':
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                            <div class="col-md-9 col-xs-12">
                                <select class="form-control select" id="ddl_<?php echo $key; ?>" name="fields[<?php echo $key; ?>]">
                                    <?php foreach ($field['field_data'] as $f_val) { ?>
                                        <option value="<?php echo $f_val['field_key'] ?>" ><?php echo $f_val['field_value'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'checkbox':
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                            <div class="col-md-9 col-xs-12">
                                <?php foreach ($field['field_data'] as $f_val) { ?>
                                    <label class="check"><input type="checkbox" class="icheckbox"  name="fields[<?php echo $key; ?>][]" value="<?php echo $f_val['field_key']; ?>"/> <?php echo $f_val['field_value']; ?></label>

                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'text':
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <input type="text" class="form-control" required name="fields[<?php echo $field['field_data'][0]['field_key']; ?>]">
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'editor':
                        $editor[] = $field['field_data'][0]['field_key'];
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                            <div class="col-md-9 col-xs-12">
                                <div class="input-group">
                                    <div class="block">
                                        <textarea class="summernote" id="<?php echo $field['field_data'][0]['field_key']; ?>" name="fields[<?php echo $field['field_data'][0]['field_key']; ?>]"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'textarea':
                        ?>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                            <div class="col-md-9 col-xs-12">
                                <textarea class="form-control" rows="5" id="<?php echo $field['field_data'][0]['field_key']; ?>" name="fields[<?php echo $field['field_data'][0]['field_key']; ?>]"></textarea>                                
                            </div>
                        </div>
                        <?php
                        break;
                    default :
                        break;
                }
            }
            if( !empty( $editor ) && is_array( $editor ) ){
                echo '<script>'
                . 'var editor = [];';
                foreach( $editor as $ed ){
                    echo 'editor.push("' . $ed . '")';
                }
                echo '</script>';
            }
        }
    }
        
    function show_user_options( $user_id = '', $type = '', $key = '' ) {        
        $all_fields = $this->get_options( $type, $key );
        $editor = array();
        $selector = array();
        $user = new user();
        $usermeta = $user->get_user_meta( $user_id, $key );
//        if( count( $usermeta ) > 1 ){
//            $usermeta_tmp = array();
//            foreach( $usermeta as $um ){
//                $usermeta_tmp[$um['st_meta_key']] = $um['st_meta_value'];
//            }
//            $usermeta = $usermeta_tmp;
//        }
//        print_r($all_fields);
//        print_r($usermeta);
        foreach ( $all_fields as $key => $field ) {
            if( isset( $field['field_type'] ) && !empty( $field['field_type'] ) ){
                $switch_var = $field['field_type'];
            } else {
                $switch_var = '';
            }
            switch ( $field['field_type'] ) {
                case 'select':
                    $selector['ddl_' . $key] = $usermeta[$key];
                    ?>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                        <div class="col-md-9 col-xs-12">
                            <select class="form-control select" id="ddl_<?php echo $key; ?>" name="fields[<?php echo $key; ?>]">
                                <?php foreach ($field['field_data'] as $f_val) { ?>
                                    <option value="<?php echo $f_val['field_key'] ?>" ><?php echo $f_val['field_value'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <?php
                    break;
                case 'checkbox':
                    $checked = json_decode( $usermeta['st_meta_value'] );
                    ?>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                        <div class="col-md-9 col-xs-12">
                            <?php foreach ($field['field_data'] as $f_val) {
                                $chk = '';
                                if(in_array( $f_val['field_key'], $checked) ){
                                    $chk = 'checked';
                                }
                            ?>
                                <label class="check"><input type="checkbox" class="icheckbox" <?php echo $chk; ?> name="fields[<?php echo $key; ?>][]" value="<?php echo $f_val['field_key']; ?>"/> <?php echo $f_val['field_value']; ?></label>
                            <?php } ?>
                        </div>
                    </div>
                    <?php
                    break;
                case 'text':
                    ?>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <input type="text" class="form-control" value="<?php echo $usermeta['st_meta_value']; ?>" name="fields[<?php echo $field['field_data'][0]['field_key']; ?>]">
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'editor':
                    $editor[] = $field['field_data'][0]['field_key'];
                    ?>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                        <div class="col-md-9 col-xs-12">
                            <div class="input-group">
                                <div class="block">
                                    <textarea class="summernote" id="<?php echo $field['field_data'][0]['field_key']; ?>" name="fields[<?php echo $field['field_data'][0]['field_key']; ?>]"><?php echo $usermeta['st_meta_value']; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    break;
                case 'textarea':
                    ?>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label"><?php echo $field['display_key']; ?></label>
                        <div class="col-md-9 col-xs-12">
                            <textarea class="form-control" rows="5" id="<?php echo $field['field_data'][0]['field_key']; ?>" name="fields[<?php echo $field['field_data'][0]['field_key']; ?>]"><?php echo $usermeta['st_meta_value']; ?></textarea>                                
                        </div>
                    </div>
                    <?php
                    break;
                default :
                    break;
            }
        }
        if( !empty( $editor ) && is_array( $editor ) ){
            echo '<script>'
            . 'var editor = [];';
            foreach( $editor as $ed ){
                echo 'editor.push("' . $ed . '")';
            }
            echo '</script>';
        }
    }
    
    function get_option_value( $type = '', $key = '', $field_key = '', $single = FALSE ) {
        global $mydb;
        $select = '*';
        $where = '';
        $return_field = '*';
        $limit = '';
        if( trim( $type ) !== '' ){
            $where = ' st_type = "' . $type . '" AND ';
            if( trim( $key ) !== '' ){
                $select = ' st_display_key ';
                $where .= ' st_key = "' . $key . '" AND ';
                $return_field = 'st_display_key';
            }
            if( trim( $field_key ) !== '' ){
                $select = ' st_field_value ';
                if( is_array( json_decode( $field_key ) ) ){
                    $arr_field_key = json_decode( $field_key );
                    $fields = implode( '", "', $arr_field_key );
                    $where .= ' st_field_key IN ("' . $fields . '") AND ';
                } else {
                    $where .= ' st_field_key = "' . $field_key . '" AND ';
                }
                $return_field = 'st_field_value';
            } else {
                $single = TRUE;
            }
            if( $single == TRUE ){
                $limit = ' LIMIT 1 ';
            }
            $str_query = 'SELECT ' . $select . ' FROM ' . $mydb->prefix . TBL_OPTIONS . ' WHERE ' . $where . ' in_is_active = 1' . $limit;
            //echo $str_query;
            $response = $mydb->query( $str_query );
            //echo '<pre>'; print_r($response); echo '</pre>';
            if( $response != 0 && count( $response ) > 0 ){
                if( $single == FALSE ){
                    return $response;
                } else {
                    if( isset( $response[$return_field] ) ){
                        return $response[$return_field];
                    } else {
                        return $response[0][$return_field];
                    }
                }
            } else {
                return '';
            }
        }
    }
}