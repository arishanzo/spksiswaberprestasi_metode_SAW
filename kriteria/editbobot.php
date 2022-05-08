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
                        <h4>Updhate Data Bobot Kriteria</h4>
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
                                    $sql_user = mysqli_query($con, "SELECT * FROM `dt_kriteria` AS u INNER JOIN kriteria AS k ON  u.id_kriteria=k.id_kriteria where u.kd_kriteria = '$id' ") or die(mysqli_error($con));
                                    $data = mysqli_fetch_array($sql_user)
                                    ?>
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <div class="section-title mt-3">Pilih Kriteria</div>
                                            <div class="input-group mb-2">
                                                <select class="custom-select" id="kriteria" name="kriteria" required>
                                                    <option selected value="<?= $data['id_kriteria'] ?>"> <?= $data['nama_kriteria'] ?> </option>
                                                    <?php
                                                    $sql = mysqli_query($con, "select * from kriteria");
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                    ?>
                                                        <option value="<?= $row['id_kriteria'] ?>"><?= $row['nama_kriteria'] ?></option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="sifat">
                                                <div class="section-title mt-0"> Sifat </div>
                                            </label>
                                            <select class="custom-select" id="sifat" name="sifat">
                                                <option disableds><?= $data['sifat'] ?></option>
                                                <option value="1">Benefit</option>
                                                <option value="2">Cost</option>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <div class="section-title mt-0">Bobot</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="bobot" value="<?= $data['bobot'] ?>">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-primary mr-1" type="submit" name="submit">Simpan</button>

                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                        </div>
                                </div>
                                </form>
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
        $idkriteria = $_POST['kriteria'];
        $sifat = $_POST['sifat'];
        $bobot = $_POST['bobot'];



        $update1 = mysqli_query($con, "UPDATE dt_kriteria set id_kriteria = '$idkriteria', sifat='$sifat', bobot='$bobot' WHERE kd_kriteria = '$id'") or die(mysqli_error($con));

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