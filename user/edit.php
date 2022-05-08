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
                        <h4>Updhate Data User</h4>
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
                                    $sql_user = mysqli_query($con, "SELECT * FROM user WHERE id_user = '$id'") or die(mysqli_error($con));
                                    $data = mysqli_fetch_array($sql_user)
                                    ?>
                                    <form action="" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                            <div class="section-title mt-0">Id User</div>
                                            <div class="input-group mb-2">
                                                <input type="text" name="id" class="form-control" value="<?= $data['id_user'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Nama</div>
                                            <div class="input-group mb-2">
                                                <input type="text" name="nama" required autofocus class="form-control" value="<?= $data['nama'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="section-title mt-0">Username</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="username" value="<?= $data['username'] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="section-title mt-0">Ganti Password</div>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" name="password" placeholder="Masukan Password Baru">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="jabatan">
                                                <div class="section-title mt-0"> Jabatan </div>
                                            </label>

                                            <select class="custom-select" id="level" name="jabatan">
                                                <option value="<?= $data['jabatan'] ?>"><?= $data['jabatan'] ?></option>
                                                <option value="1">Wali Kelas</option>
                                                <option value="2">Petugas</option>
                                                <option value="3">Kepala Sekolah</option>
                                            </select>
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
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $level = $_POST['jabatan'];
        $password = $_POST['password'];
        $pass = md5($password);



        if ($password == '') {
            $update1 = mysqli_query($con, "UPDATE user set nama = '$nama', username='$username', jabatan='$level' WHERE id_user = '$id'") or die(mysqli_error($con));

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
        } else {

            $update1 = mysqli_query($con, "UPDATE user set nama = '$nama', username='$username', password='$pass', jabatan='$level' WHERE id_user = '$id'") or die(mysqli_error($con));
            echo "<script type='text/javascript'>
            setTimeout(function () { 
                swal({ 
                    title: 'Warning', 
                    text: 'Data Berhasil Di Updahte', 
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
    }


    ?>
    <?php include_once('footer.php'); ?>