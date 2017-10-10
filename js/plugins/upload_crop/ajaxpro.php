<?php

require_once '../../../config.php';
if (isset($_POST['cover_image'])) {
    $data = $_POST['cover_image'];
    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    session_start();

    $session_id = session_id();
    if (!file_exists(TMP_UPLOADS . $session_id)) {
        mkdir(TMP_UPLOADS . $session_id, 0777, true);
    }
    $target_dir = TMP_UPLOADS . $session_id;
    $data = base64_decode($data);
    $imageName = 'cover' . '.png';
    file_put_contents($target_dir . DIR_SEPERATOR . $imageName, $data);
}

if (isset($_POST['image_profile'])) {
    $data_profile = $_POST['image_profile'];
    list($type1, $data_profile) = explode(';', $data_profile);
    list(, $data_profile) = explode(',', $data_profile);
    session_start();
    $session_id = session_id();
    if (!file_exists(TMP_UPLOADS . $session_id)) {
        mkdir(TMP_UPLOADS . $session_id, 0777, true);
    }
    $target_dir = TMP_UPLOADS . $session_id;
    $data_profile = base64_decode( $data_profile );
    $image_profile = 'profile' . '.png';
    file_put_contents( $target_dir . DIR_SEPERATOR . $image_profile, $data_profile );
}
echo 'done';
?>