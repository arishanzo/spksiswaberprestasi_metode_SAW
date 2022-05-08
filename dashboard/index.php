<?php
require_once "../config/config.php";


if (isset($_SESSION['username'])) {

    include_once('header.php');
    // 
?>

    <div class="card">
        <!-- <img src="images/img-1.jpg" class="img-fluid"> -->
        <div class="card-body">
            <div class="row ">

                <div class="grey-bg container-fluid">
                    <section id="minimal-statistics">
                        <div class="row">
                            <div class="col-12 mt-3 mb-1">
                                <h4 class="text-uppercase">Selamat Datang, <?= $_SESSION['nama'] ?></h4>
                                <p>Jabatan : <?= $_SESSION['jabatan'] ?>.</p>
                            </div>
                        </div>

                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

                        <div class="col-md-12 ">
                            <div class="row ">
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-cherry bg-danger">
                                        <div class="card-statistic-3 p-4">
                                            <div class="mb-4">
                                                <h5 class="card-title text-center mb-0">Data User</h5>
                                            </div>
                                            <div class="mb-4">
                                                <?php
                                                $SqlQuery = mysqli_query($con, "select * from user");
                                                $row = mysqli_num_rows($SqlQuery)
                                                ?>
                                                <h3 class="card-title text-center mb-0"><?php echo $row ?></h3>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-cherry bg-info">
                                        <div class="card-statistic-3 p-4">
                                            <div class="mb-4">
                                                <h5 class="card-title text-center mb-0">Data siswa</h5>
                                            </div>
                                            <div class="mb-4">
                                                <?php
                                                $SqlQuery = mysqli_query($con, "select * from dt_siswa");
                                                $row = mysqli_num_rows($SqlQuery)
                                                ?>
                                                <h3 class="card-title text-center mb-0"><?php echo $row ?></h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-cherry bg-warning">
                                        <div class="card-statistic-3 p-4">
                                            <div class="mb-4">
                                                <h5 class="card-title text-center mb-0">Data Kriteria</h5>
                                            </div>
                                            <div class="mb-4">
                                                <?php
                                                $SqlQuery = mysqli_query($con, "select * from dt_kriteria");
                                                $row = mysqli_num_rows($SqlQuery)
                                                ?>
                                                <h3 class="card-title text-center mb-0"><?php echo $row ?></h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-6">
                                    <div class="card l-bg-cherry bg-success">
                                        <div class="card-statistic-3 p-4">
                                            <div class="mb-4">
                                                <h5 class="card-title text-center mb-0">Online</h5>
                                            </div>
                                            <div class="mb-4">
                                                <h3 class="card-title text-center mb-0">1</h3>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

<?php

    include_once('footer.php');
} else {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}


// 
?>
</section>