<?php

$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$CCCD = trim($_POST['CCCD']);

include('KetnoiData.php');

// Kiểm tra username hoặc email có bị trùng hay không
$query = "SELECT * FROM product WHERE email='$email' AND CCCD='$CCCD' AND username='$username'";

// Thực thi câu truy vấn
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    // Dừng chương trình
    die();
} else {
    $sql = "INSERT INTO product (email, password, CCCD, username) VALUES ('$email','$password','$CCCD','$username')";
    if (mysqli_query($connect, $sql)) {
        header("Location: login.php");
    } else {
    }
}
$conn->close();


