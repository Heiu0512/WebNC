<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
    
<body>

    <section class="vh-100" style="background-color: #508bfc;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-5">
                                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist" style="font-size: 20px;">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">Login</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="DangKy.php" role="tab" aria-controls="pills-register" aria-selected="false">Register</a>
                                    </li>
                                </ul>
                            </div>


                            <form action="xuly.php" method="post">
                                <div class="form-outline mb-4">
                                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="email" placeholder="Nhập Email" required="" />
                                    <label class="form-label" for="typeEmailX-2"></label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" placeholder="Nhập Password" required="" />
                                    <label class="form-label" for="typePasswordX-2"></label>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block " type="submit">Login</button>

                            </form>

                            <hr class="my-4">

                            <button class="btn btn-lg btn-block btn-primary" style="background-color: #dd4b39;" type="button"><i class="fab fa-google me-2"></i> Sign in with google</button>
                            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color: #3b5998;" type="button"><i class="fab fa-facebook-f me-2"></i>Sign in with facebook</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>