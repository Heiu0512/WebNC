<?php
// Include file config.php
require_once "config.php";

// Xác định các biến và khởi tạo các giá trị trống
$email = $username = $password = $CCCD = "";
$email_err = $username_err = $password_err = $CCCD_err = "";

// Xử lý dữ liệu biểu mẫu khi biểu mẫu được gửi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Xác thực email
    $input_email = trim($_POST['email']);
    if (empty($input_email)) {
        $email_err = "Please enter a email.";
    } elseif (!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $email_err = "Please enter a valid email.";
    } else {
        $email = $input_email;
    }

    // Xác thực email 
    $input_username = trim($_POST['username']);
    if (empty($input_username)) {
        $username_err = "Please enter an username.";
    } else {
        $username = $input_username;
    }

    // Xác thực mật khẩu
    $input_password = trim($_POST["password"]);
    if (empty($input_password)) {
        $password_err = "Please enter the password amount.";
    } elseif (!ctype_digit($input_password)) {
        $password_err = "Please enter a positive integer value.";
    } else {
        $password = $input_password;
    }

    // Xác thực Căn cước công dân
    $input_CCCD = trim($_POST['CCCD']);
    if (empty($input_CCCD)) {
        $CCCD_err = "Please enter the CCCD amount.";
    } elseif (!ctype_digit($input_CCCD)) {
        $CCCD_err = "Please enter a positive integer value.";
    } else {
        $CCCD = $input_CCCD;
    }

    // Kiểm tra lỗi đầu vào trước khi chèn vào cơ sở dữ liệu
    if (empty($email_err) && empty($username_err) && empty($password_err) && empty($CCCD_err)) {
        // Chuẩn bị một câu lệnh insert
        $sql = "INSERT INTO quanly (email, username, password, CCCD) VALUES (?, ?, ?, ?)";

        if ($stmt = $mysqli->prepare($sql)) {
            // Liên kết các biến với câu lệnh đã chuẩn bị
            $stmt->bind_param("sss", $param_email, $param_username, $param_password, $param_CCCD);

            // Thiết lập tham số
            $param_email = $email;
            $param_username = $username;
            $param_password = $password;
            $param_CCCD = $CCCD;
            // Cố gắng thực thi câu lệnh đã chuẩn bị
            if ($stmt->execute()) {
                // Tạo bản ghi thành công. Chuyển hướng đến trang đích
                header("location: admin.php");
                exit();
            } else {
                echo "Oh, no. Có gì đó sai sai. Vui lòng thử lại.";
            }
        }

        // Đóng câu lệnh
        $stmt->close();
    }

    // Đóng kết nối
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="name" class="form-control" required="" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <textarea name="address" class="form-control" required=""><?php echo $username; ?></textarea>
                            <span class="help-block"><?php echo $username_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="salary" class="form-control" required="" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err; ?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CCCD_err)) ? 'has-error' : ''; ?>">
                            <label>Căn Cước Công Dân</label>
                            <input type="int" name="salary" class="form-control" required="" value="<?php echo $CCCD; ?>">
                            <span class="help-block"><?php echo $CCCD_err; ?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="/login/admin/admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>