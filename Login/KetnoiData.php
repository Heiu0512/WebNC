<?php
$connect = mysqli_connect('localhost', 'root', '', 'nguyenhuuhieu');

if ($connect === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
} else {
    echo 'Kết nối DB thành công! <br>';
}
