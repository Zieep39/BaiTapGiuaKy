<?php

 $server = 'localhost';
 $user = 'root';
 $pass = '';
 $database = 'qlsv_vuthibachdiep';

 $conn = new mysqli($server, $user, $pass, $database);

 if($conn){
    mysqli_query($conn, "SET NAMES 'utf8' ");
    echo '';
 }

 else{
    echo 'Kết nối không thành công';
 }

?>