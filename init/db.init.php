<?php
    $dvb_host = 'localhost'; // 127.0.01
    $db_name = 'meymey';
    $db_user = 'root';
    $db_pass = '';
    $db_port = 3306;

    $db = new mysqli($dvb_host,$db_user,$db_pass,$db_name,$db_port);
    if($db->connect_error){
        echo $db->connect_errno;
        die();
    }
?>