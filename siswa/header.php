<?php
require_once "../config/config.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>SPK SELEKSI SISWA BERPRESTASI</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <link rel="stylesheet" href="../css/datatables.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link rel="stylesheet" href="../css/sweetalert.css" type="text/css">

    <link rel=" stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

</head>


<style>
    .bg {
        background-image: url(images/img-1.jpg);
        background-repeat: no-repeat;
        background-size: 100%;
    }
</style>

<body>
    <div class="card-body bg-success">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-white text-center mb-2 ml-3 ">
                    <br>
                    <H3>Sistem Pendukung Keputusan Seleksi </H3>

                    <H5>Siswa Berprestasi Di SMK NU LAMONGAN<H5>

                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="index.html">SPK</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item "><a href="<?= base_url() ?>/dashboard/index.php" class="nav-link">Home</a></li>
                    <li class="nav-item "><a href="<?= base_url() ?>/user/index.php" class="nav-link">Data User</a></li>
                    <li class="nav-item active"><a href="<?= base_url() ?>/siswa/index.php" class="nav-link">Data siswa</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>/kriteria/index.php" class="nav-link">Data Kriteria</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>/hitung/index.php" class="nav-link">Perhitungan Kriteria</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>/laporan/index.php" class="nav-link">Laporan</a></li>
                    <li class="nav-item"><a href="<?= base_url() ?>/auth/logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>



    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/datatables.js"></script>
    <script src="../js/sweetalert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.15.2/dist/sweetalert2.all.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>