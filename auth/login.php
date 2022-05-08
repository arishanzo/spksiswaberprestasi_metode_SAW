<?php
require_once "../config/config.php";
if (isset($_SESSION['username'])) {
    echo "<script>window.location='" . base_url() . "';</script>";
} else {
?>
    <!doctype html>
    <html lang="en">

    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="../css/style.css">

        <link rel="stylesheet" href="../css/bootstrap.min.css">


    </head>


    <!-- <style>
        .bg {
            background-image: url(../images/Untitled-1.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }
    </style> -->

    <body class="bg">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 ">LOGIN</h1>

                                    </div>

                                    <form method="POST" action="#" class="needs-validation" novalidate="">
                                        <?php
                                        if (isset($_POST['login'])) {
                                            $user = trim(mysqli_real_escape_string($con, $_POST['username']));
                                            $pass = md5(mysqli_real_escape_string($con, $_POST['password']));
                                            $sql_login = mysqli_query($con, "SELECT * FROM user WHERE username ='$user' AND password = '$pass'") or die(mysqli_error($con));
                                            if ($row = mysqli_fetch_array($sql_login)) {
                                                $_SESSION['id_user'] = $row['id_user'];
                                                $_SESSION['nama'] = $row['nama'];
                                                $_SESSION['username'] = $user;
                                                $_SESSION['jabatan'] = $row['jabatan'];

                                                echo "<script>window.location='" . base_url('dashboard/index.php') . "';</script>";
                                            } else { ?>
                                                <div class="mt-3">
                                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                                        <center>
                                                            <strong>Login Gagal</strong> <br>
                                                            Username Dan Password salah
                                                        </center>
                                                    </div>
                                                </div>

                                        <?php
                                            }
                                        }

                                        ?>
                                        <div class="form-group">

                                            <label for="username">Username</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i> </span>
                                                </div>
                                                <input id="text" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                                <div class="invalid-feedback">
                                                    Masukan Username terlebih dahulu
                                                </div>
                                            </div>

                                            <div class="form-group mt-3">
                                                <div class="d-block">
                                                    <label for="password" class="control-label">Password</label>
                                                    <!-- <div class="float-right">
                                                        <a href="auth-forgot-password.html" class="text-small">
                                                            Lupa Password
                                                        </a>
                                                    </div> -->
                                                </div>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                                    </div>
                                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                                    <div class="invalid-feedback">
                                                        Masukan Password terlebih dahulu
                                                    </div>
                                                </div>

                                                <!-- <div class="form-group mt-3">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                                        <label class="custom-control-label" for="remember-me">Ingatkan Saya</label>
                                                    </div>
                                                </div> -->

                                                <div class="form-group">
                                                    <button type="submit" name="login" class="btn btn-success btn-lg btn-block mt-5" tabindex="4">
                                                        Login
                                                    </button>
                                                </div>
                                    </form>

                                    <!-- <div class="mt-5 text-muted text-center">
                                Don't have an account? <a href="auth-register.html">Create One</a>
                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                </section>
            </div>



            <script src="../js/jquery.min.js"></script>
            <script src="../js/popper.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/main.js"></script>
        <?php
    }

        ?>