<?php

/* Cố gắng kết nối với cơ sở dữ liệu MySQL */
$mysqli = new mysqli('localhost', 'root', '', 'nguyenhuuhieu');
 
// Kiểm tra kết nối
if($mysqli === false){
    die("ERROR: Không thể kết nối. " . $mysqli->connect_error);
}
?>