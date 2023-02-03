<?php

    // $server = 'localhost';
    // $username = 'ctnphrae_exam';
    // $password = 'ctnphrae_exam';
    // $dbname = 'ctnphrae_exam';
    
    $server = 'localhost';
    $username = 'root';
    $password = '25482548';
    $dbname = 'ctn_qui';

    $conn = new mysqli($server,$username,$password,$dbname);

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
?>