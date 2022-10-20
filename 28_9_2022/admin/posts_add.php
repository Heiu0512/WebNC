<!DOCTYPE html>
<html>

<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Thêm bài viết</title>
</head>

<body>
    <form action="posts_add.php" enctype="multipart/form-data" method="post" class="form">
        <table width="600" border="1" cellspacing="5" cellpadding="5">
            <tr>
                <td width="230">Tiêu đề </td>
                <td width="329"><input type="text" name="title" /></td>
            </tr>
            <tr>
                <td>URL </td>
                <td><input type="text" name="url" /></td>
            </tr>
            <tr>
                <td>Content </td>
                <td><textarea name="content" id="content" placeholder="Đây là nội dung..." class="noidung" rows="10" cols="80"></textarea></td>
            </tr>
            <tr>
                <td>Ảnh </td>
                <td><input type="hidden" name="size" value="1000000">
                    <input type="file" name="image" class="hinhanh"><br /><br />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" value="Save Data" /></td>
            </tr>
        </table>
    </form>
    
    <h2>Nội dung trong Database</h2>
    <?php require 'posts_xuly.php'; ?>
</body>

</html>