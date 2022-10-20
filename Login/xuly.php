<?php
// 1 kết nối database
// lấy thông tin người nhập vào
//var_dump($_POST);

// $email = addslashes($_POST['email']);
// $password = addslashes($_POST['password']);

$email = trim($_POST['email']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$CCCD = trim($_POST['CCCD']);

// $admin = $_POST['admin'];
// so sánh dữ liệu có trùng với database không
include('KetnoiData.php');

// 2 xử lý dữ liệu
$sql = "SELECT * FROM quanly WHERE email = '$email'";
$result = $connect->query($sql)->fetch_assoc();

if ($result['password']  === $password) {
    if ($result['admin']  == 1) {
        header('Location: admin/admin.php');
    } else {
        header('Location: User/themmoi.php');
    }
} else {
    echo 'Đăng nhập sai thông tin';
}
if (!$email || !$password || !$CCCD) {
    echo "Vui lòng nhập đầy đủ thông tin";
    exit;
}

// Kiểm tra username hoặc email có bị trùng hay không
$query = "SELECT * FROM quanly WHERE email='$email' AND CCCD='$CCCD' AND username='$username'";

// Thực thi câu truy vấn
$result = mysqli_query($connect, $query);

if (mysqli_num_rows($result) > 0) {
    // Dừng chương trình
    die();
} else {
    $sql = "INSERT INTO quanly (email, password, CCCD, username) VALUES ('$email','$password','$CCCD','$username')";
    if (mysqli_query($connect, $sql)) {
        header("Location: login.php");
    } else {
    }
}
$conn->close();


