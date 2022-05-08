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
                                    $Sqlkriteria = mysqli_query($con, "SELECT * FROM nilai as n INNER JOIN dt_siswa as w  INNER JOIN penilaian as p INNER JOIN kriteria as k ON n.id_kriteria=k.id_kriteria && n.kd_siswa=w.kd_siswa && n.id_kriteria=p.id_kriteria  && p.penilaian=n.nilai WHERE w.kd_siswa=n.kd_siswa && n.kd_nilai = '$id'");
                                    $data = mysqli_fetch_array($Sqlkriteria)
                                    ?>
                                    <form action="" enctype="multipart/form-data" method="post">

                                        <div class="form-group">
                                            <div class="section-title mt-0">Nama Siswa</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="id_siswa" value="<?= $data['kd_siswa'] ?>" hidden>
                                                <input type="text" class="form-control" name="nama" value="<?= $data['nama_siswa'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group" hidden>
                                            <div class="section-title mt-0">id kriteria</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="id_kriteria" value="<?= $data['id_kriteria'] ?>" hidden>
                                            </div>
                                        </div>

                                        <div class="section-title mt-0"> Kriteria <?= $data['nama_kriteria']  ?></div>
                                        <div class="input-group mb-2">
                                            <select class="custom-select" id="nilai" name="nilai" required>

                                                <option disabled selected> <?= $data['keterangan'] ?></option>
                                                <?php
                                                $sql2 = mysqli_query($con, "SELECT * FROM kriteria AS k INNER JOIN penilaian AS P ON K.id_kriteria='$data[id_kriteria]' && P.id_kriteria='$data[id_kriteria]'");
                                                while ($row2 = mysqli_fetch_array($sql2)) {
                                                ?>
                                                    <option value="<?= $row2['penilaian'] ?>"><?= $row2['keterangan'] ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                            <?php
                                            // }
                                            ?>

                                        </div>

                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary mr-1" type="submit" name="submit">Edit</button>
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
        $kd_nilai = $_POST['nilai'];
        $nilai = $_POST['nilai'];


        $update1 = mysqli_query($con, "UPDATE nilai set nilai = '$nilai' WHERE kd_nilai = '$id'") or die(mysqli_error($con));

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