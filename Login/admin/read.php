<?php
// Kiểm tra sự tồn tại của tham số id trước khi xử lý thêm
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include file config.php
    require_once "config.php";

    // Chuẩn bị câu lệnh Select
    $sql = "SELECT * FROM quanly WHERE id = ?";

    if ($stmt = $mysqli->prepare($sql)) {
        // Liên kết các biến với câu lệnh đã chuẩn bị
        $stmt->bind_param("i", $param_id);

        // Thiết lập tham số
        $param_id = trim($_GET["id"]);

        // Cố gắng thực thi câu lệnh đã chuẩn bị
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                /* Lấy hàng kết quả dưới dạng một mảng kết hợp. Vì tập kết quả chỉ chứa một hàng, chúng tôi không cần sử dụng vòng lặp while */
                $row = $result->fetch_array(MYSQLI_ASSOC);

                // Lấy giá trị trường riêng lẻ
                $email = $row['email'];
                $username = $row['username'];
                $password = $row['password'];
                $CCCD = $row['CCCD'];
            } else {
                // URL không chứa tham số id hợp lệ. Chuyển hướng đến trang error
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oh, no. Có gì đó sai sai. Vui lòng thử lại.";
        }
    }

    // Đóng câu lệnh
    $stmt->close();

    // Đóng kết nối
    $mysqli->close();
} else {
    // URL không chứa tham số id. Chuyển hướng đến trang error
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <p class="form-control-static"><?php echo $row["email"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <p class="form-control-static"><?php echo $row["username"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <p class="form-control-static"><?php echo $row["password"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Căn Cước Công Dân</label>
                        <p class="form-control-static"><?php echo $row["CCCD"]; ?></p>
                    </div>
                    <p><a href=" /login/admin/admin.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>