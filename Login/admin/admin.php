<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper {
            width: 650px;
            margin: 0 auto;
        }

        .page-header h2 {
            margin-top: 0;
        }

        table tr td:last-child a {
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="wrapper" style="width:50%; float:left;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Employees Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                    </div>
                    <?php
                    // Include file config.php
                    require_once "config.php";

                    // Cố gắng thực thi truy vấn
                    $sql = "SELECT * FROM quanly";
                    if ($result = $mysqli->query($sql)) {
                        if ($result->num_rows > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Email</th>";
                            echo "<th>Username</th>";
                            echo "<th>Password</th>";
                            echo "<th>Căn Cước Công Dân</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch_array()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['email'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['password'] . "</td>";
                                echo "<td>" . $row['CCCD'] . "</td>";
                                echo "<td>";
                                echo "<a href='read.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='update.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='delete.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Giải phóng bộ nhớ
                            $result->free();
                        } else {
                            echo "<p class='lead'><em>Không tìm thấy bản ghi.</em></p>";
                        }
                    } else {
                        echo "ERROR: Không thể thực thi $sql. " . $mysqli->error;
                    }

                    // Đóng kết nối
                    $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div style="width: 50%; float:left;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Products Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add New Products</a>
                    </div>
                    <?php
                    // Include file config.php
                    require_once "config.php";

                    // Cố gắng thực thi truy vấn
                    $sqlSP = "SELECT * FROM product";
                    if ($result1 = $mysqli->query($sqlSP)) {
                        if ($result1->num_rows2 > 0) {
                            echo "<table class='table table-bordered table-striped'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Tên Sản Phẩm</th>";
                            echo "<th>img</th>";
                            echo "<th>Color</th>";
                            echo "<th>Quantity</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row1 = $result1->fetch_array()) {
                                echo "<tr>";
                                echo "<td>" . $row1['id'] . "</td>";
                                echo "<td>" . $row1['TenSP'] . "</td>";
                                echo "<td>" . $row1['img'] . "</td>";
                                echo "<td>" . $row1['Color'] . "</td>";
                                echo "<td>" . $row1['Quantity'] . "</td>";
                                echo "<td>";
                                echo "<a href='read.php?id=" . $row1['id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='update.php?id=" . $row1['id'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='delete.php?id=" . $row1['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            echo "</table>";
                            // Giải phóng bộ nhớ
                            $result1->free();
                        } else {
                            echo "<p class='lead'><em>Không tìm thấy bản ghi.</em></p>";
                        }
                    } else {
                        echo "ERROR: Không thể thực thi $sql. " . $mysqli->error;
                    }

                    // Đóng kết nối
                    $mysqli->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>