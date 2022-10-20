<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <h3 class="mb-5">Register</h3>

                            <form action="xuly.php" method="post">
                                <div class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" placeholder="Nhập Email" required="" />
                                    <label class="form-label" for="typeEmailX-2"></label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="typePasswordX-2" class="form-control form-control-lg" name="username" placeholder="Nhập Username" required="" />
                                    <label class="form-label" for="typePasswordX-2"></label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" placeholder="Nhập Password" required="" />
                                    <label class="form-label" for="typePasswordX-2"></label>
                                </div>
                                
                                <div class="form-outline mb-4">
                                    <input type="text" id="typePasswordX-2" class="form-control form-control-lg" name="CCCD" placeholder="Nhập CCCD" required="" />
                                    <label class="form-label" for="typePasswordX-2"></label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    <a style="color : white; text-decoration: none;">Register</a>
                                </button>
                            </form>   

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>