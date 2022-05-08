<?php
require_once "../config/config.php";

include_once('header.php');
// 
?>

<div class="card">
    <!-- <img src="images/img-1.jpg" class="img-fluid"> -->
    <div class="card-body">
        <div class="row ">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Updhate Data Kriteria</h4>
                        <div class="card-header-action text-right">
                            <a href="index.php" class="btn btn-primary btn-action btn-xs mr-1" title="kembali"><span>Kembali</span></a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="card-body">
                                    <?php
                                    $id = @$_GET['id'];
                                    $sql_user = mysqli_query($con, "SELECT * FROM penilaian AS p INNER JOIN kriteria AS k ON p.id_kriteria=k.id_kriteria where kd_penilaian = '$id'") or die(mysqli_error($con));
                                    $data = mysqli_fetch_array($sql_user)
                                    ?>
                                    <form action="" enctype="multipart/form-data" method="post">

                                        <div class="form-group">
                                            <div class="section-title mt-0">Kriteria</div>
                                            <div class="input-group mb-2">
                                                <select class="custom-select" id="kriteria" name="kriteria" required>
                                                    <option selected value="<?= $data['id_kriteria'] ?>"> <?= $data['nama_kriteria'] ?> </option>
                                                    <?php
                                                    $sql = mysqli_query($con, "select * from kriteria");
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $data['id_kriteria'] ?>"><?= $data['nama_kriteria'] ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="section-title mt-0">Keterangan Kriteria</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="ketkriteria" value="<?= $data['keterangan'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Nilai</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="nilai" value="<?= $data['penilaian'] ?>">
                                            </div>
                                        </div>

                                        <div class="card-footer text-right">
                                            <button class="btn btn-primary mr-1" type="submit" name="submit">Submit</button>
                                            <button class="btn btn-danger" type="reset">Reset</button>
                                        </div>
                                        </from>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </section>
        <?php
        if (isset($_POST['submit'])) {
            $kriteria = $_POST['kriteria'];
            $keterangan = $_POST['ketkriteria'];
            $nilai = $_POST['nilai'];



            $update1 = mysqli_query($con, "UPDATE penilaian set id_kriteria = '$kriteria' , keterangan = '$keterangan', penilaian = '$nilai' WHERE kd_penilaian = '$id'") or die(mysqli_error($con));

            echo "<script type='text/javascript'>
                        setTimeout(function () { 
                            swal({ 
                                title: 'success', 
                                text: 'Berhasil Di Update', 
                                type: 'success',
                                icon: 'success',
                                 timer: 3000,
                                  buttons: false });
                        },10);  
                        window.setTimeout(function(){ 
                          window.location.replace('index.php');
                        } ,3000); 
                        </script>";
        }


        ?>
        <?php include_once('footer.php'); ?>