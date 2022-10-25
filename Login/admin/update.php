<?php
// Include file config.php
require_once "config.php";
 
// Xác định các biến và khởi tạo với các giá trị trống
$email = $username = $password = $CCCD = "";
$email_err = $username_err = $password_err = $CCCD_err = "";
 
// Xử lý dữ liệu biểu mẫu khi biểu mẫu được gửi
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Lấy dữ liệu đầu vào
    $id = $_POST["id"];
    
     // Xác thực email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a name.";
    } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $email_err = "Please enter a valid name.";
    } else{
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
    $input_password = $_POST["password"];
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
        // Chuẩn bị câu lệnh Update
        $sql = "UPDATE quanly SET email={$email}, username=?, password=?, CCCD=? WHERE id=?";
 
        if($stmt = $mysqli->prepare($sql)){
            // Liên kết các biến với câu lệnh đã chuẩn bị
            $stmt->bind_param("sssi", $param_email, $param_username, $param_password, $param_CCCD, $param_id);
            
            // Thiết lập tham số
            $param_email = $email;
            $param_username = $username;
            $param_password = $password;
            $param_CCCD = $CCCD;
            $param_id = $id;
            
            // Cố gắng thực thi câu lệnh đã chuẩn bị
            if($stmt->execute()){
                // Update bản ghi thành công. Chuyển hướng đến trang đích
                header("location: admin.php");
                exit();
            } else{
                echo "Oh, no. Có gì đó sai sai. Vui lòng thử lại.";
            }
        }
         
        // Đóng câu lệnh
        $stmt->close();
    }
    
    // Đóng kết nối
    $mysqli->close();
} else{
    // Kiểm tra sự tồn tại của tham số id trước khi xử lý thêm
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Lấy tham số URL
        $id =  trim($_GET["id"]);
        
        // Chuẩn bị câu lệnh Select
        $sql = "SELECT * FROM quanly WHERE id = ?";
        if($stmt = $mysqli->prepare($sql)){
            // Liên kết các biến với câu lệnh đã chuẩn bị
            $stmt->bind_param("i", $param_id);
            
            // Thiết lập tham số
            $param_id = $id;
            
            // Cố gắng thực thi câu lệnh đã chuẩn bị
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    /* Lấy hàng kết quả dưới dạng một mảng kết hợp. Vì tập kết quả chỉ chứa một hàng, chúng tôi không cần sử dụng vòng lặp while */
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    
                    // Lấy giá trị trường riêng lẻ
                    $email = $row["email"];
                    $username = $row["username"];
                    $password = $row["password"];
                    $CCCD = $row["CCCD"];
                } else{
                    // URL không chứa id hợp lệ. Chuyển hướng đến trang error
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oh, no. Có gì đó sai sai. Vui lòng thử lại";
            }
        }
        
        // Đóng câu lệnh
        $stmt->close();
        
        // Đóng kết nối
        $mysqli->close();
    }  else{
        // URL không chứa tham số id. Chuyển hướng đến trang error
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>Email</label>
                            <input type="email" name="Email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username</label>
                            <textarea name="Username" class="form-control"><?php echo $username; ?></textarea>
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($CCCD_err)) ? 'has-error' : ''; ?>">
                            <label>Căn Cước Công Dân</label>
                            <input type="text" name="CCCD" class="form-control" value="<?php echo $CCCD; ?>">
                            <span class="help-block"><?php echo $CCCD_err;?></span>
                        </div>

                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="/login/admin/admin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>