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
                        <h4>Updhate Data Siswa</h4>
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
                                    $sql_user = mysqli_query($con, "SELECT * FROM dt_siswa WHERE kd_siswa = '$id'") or die(mysqli_error($con));
                                    $data = mysqli_fetch_array($sql_user)
                                    ?>
                                    <form action="" enctype="multipart/form-data" method="post">

                                        <div class="form-group">
                                            <div class="section-title mt-0">Nama Siswa</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="nama" value="<?= $data['nama_siswa'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="jenis_Kelamin">
                                                <div class="section-title mt-0"> Jenis Kelamin </div>
                                            </label>
                                            <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                                <option><?= $data['jenis_kelamin'] ?></option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="jurusan">
                                                <div class="section-title mt-0"> Pilih Jurusan </div>
                                            </label>
                                            <select class="custom-select" id="jurusan" name="jurusan">
                                                <option><?= $data['jurusan'] ?>"</option>
                                                <option value="Akuntansi Kuangan Lembaga">Akuntansi Kuangan Lembaga</option>
                                                <option value="Otomatisasi dan Tata Kelola Perkantoran">Otomatisasi dan Tata Kelola Perkantoran</option>
                                                <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                                                <option value="Multimedia">Multimedia</option>
                                                <option value="Teknik dan Bisnis Sepeda Motor">Teknik dan Bisnis Sepeda Motor</option>
                                                <option value="Farmasi Klinis dan Komunitas">Farmasi Klinis dan Komunitas</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Kelas</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="kelas" value="<?= $data['kelas'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Alamat</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>">
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
            $namasiswa = $_POST['nama'];
            $jeniskelamin = $_POST['jenis_kelamin'];
            $jurusan = $_POST['jurusan'];
            $kelas = $_POST['kelas'];
            $alamat = $_POST['alamat'];


            $update1 = mysqli_query($con, "UPDATE dt_siswa set nama_siswa='$namasiswa', jenis_kelamin='$jeniskelamin', jurusan='$jurusan', kelas='$kelas', alamat='$alamat' WHERE kd_siswa = '$id'") or die(mysqli_error($con));

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