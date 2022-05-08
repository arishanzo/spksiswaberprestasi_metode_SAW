<?php
require_once "../config/config.php";

if (isset($_SESSION['username'])) {
    include_once('header.php');

?>

    <div class="card">
        <!-- <img src="images/img-1.jpg" class="img-fluid"> -->
        <div class="card-body">
            <div class="row ">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data User</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary btn-action btn-xs mr-1" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="Tambah Data"><span>Tambah Data</span></button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0 admin" id="admin">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Username</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $SqlQuery = mysqli_query($con, "select * from user");
                                            $no = 1;
                                            if (mysqli_num_rows($SqlQuery) > 0) {
                                                while ($row = mysqli_fetch_array($SqlQuery)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['username'] ?></td>
                                                        <td><?= $row['jabatan'] ?></td>
                                                        <td>
                                                            <center>
                                                                <a href="edit.php?id=<?= $row['id_user'] ?>" class="btn btn-primary btn-xs btn-action mr-1" title="Edit"><i class="fa fa-pencil"></i></a>

                                                                <a href="delete.php?id=<?= $row['id_user'] ?>" class="btn btn-danger btn-xs delete-data mr-1" title="hapus"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                        </center>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan=\"4\" align=\"center\">data tidak ada</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- MODAL -->

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST">
                                                    <?php
                                                    // mengambil data barang dengan kode paling besar
                                                    $query = mysqli_query($con, "SELECT max(id_user) as maxKode FROM user");
                                                    $data = mysqli_fetch_array($query);
                                                    $id_user = $data['maxKode'];

                                                    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                                    // dan diubah ke integer dengan (int)
                                                    $urutan = (int) substr($id_user, 3, 3);

                                                    $urutan++;
                                                    $huruf = "USR";
                                                    $id_user = $huruf . sprintf("%03s", $urutan);
                                                    ?>
                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Id User</div>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" name="iduser" value="<?php echo $id_user ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Nama</div>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" name="nama">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Username</div>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" name="username">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Password</div>
                                                        <div class="input-group mb-2">
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="jabatan">
                                                            <div class="section-title mt-0"> Jabatan </div>
                                                        </label>
                                                        <select class="custom-select" id="jabatan" name="jabatan">
                                                            <option>Pilih Jabatan</option>
                                                            <option value="1">Wali Kelas</option>
                                                            <option value="2">Petugas</option>
                                                            <option value="3">Kepala Sekolah</option>
                                                        </select>
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

                            <?php
                            if (isset($_POST['submit'])) {
                                $id_user = $_POST['iduser'];
                                $nama = $_POST['nama'];
                                $username = $_POST['username'];
                                $password = $_POST['password'];
                                $pass_enskripsi = md5($password);
                                $jabatan = $_POST['jabatan'];


                                $save = mysqli_query($con, "INSERT INTO user VALUES ('$id_user', '$nama', '$username', '$pass_enskripsi', '$jabatan' )") or die(mysqli_error($con));

                                echo "<script type='text/javascript'>
                    setTimeout(function () { 
                        swal({ 
                            title: 'Suksess', 
                            text: 'Data Berhasil Disimpan $nama', 
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

                            </section>
                        </div>

                    </div>
                </div>

                <script>
                    // datatables
                    $(document).ready(function() {
                        $('.admin').DataTable({
                            "paging": true,

                        });

                    });
                    // swall
                    $('.delete-data').on('click', function(e) {
                        e.preventDefault();
                        var getLink = $(this).attr('href');

                        Swal.fire({
                            title: 'Apa Anda Yakin?',
                            text: "Data akan dihapus permanen",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Hapus'
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = getLink;
                            }
                        })
                    });
                </script>
            </div>
        </div>
    <?php

    include_once('footer.php');
} else {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}

// 
    ?>