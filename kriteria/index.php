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
                            <h4>Data Kriteria</h4>
                            <div class="card-header-action text-right">
                                <button class="btn btn-primary btn-action btn-xs mr-1" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="Tambah Kriteria"><span>Tambah Data</span></button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0 admin" id="admin">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Kriteria</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $SqlQuery = mysqli_query($con, "select * from kriteria");
                                            $no = 1;
                                            if (mysqli_num_rows($SqlQuery) > 0) {
                                                while ($row = mysqli_fetch_array($SqlQuery)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama_kriteria'] ?></td>
                                                        <td>
                                                            <center>
                                                                <a href="edit.php?id=<?= $row['id_kriteria'] ?>" class="btn btn-primary btn-xs btn-action mr-1" title="Edit"><i class="fa fa-pencil"></i></a>

                                                                <a href="delete.php?id=<?= $row['id_kriteria'] ?>" class="btn btn-danger btn-xs delete-data mr-1" title="hapus"><i class="fa fa-trash"></i></a>
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
                                                    $query = mysqli_query($con, "SELECT max(id_kriteria) as maxKode FROM kriteria");
                                                    $data = mysqli_fetch_array($query);
                                                    $id_kriteria = $data['maxKode'];

                                                    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                                    // dan diubah ke integer dengan (int)
                                                    $urutan = (int) substr($id_kriteria, 3, 3);

                                                    $urutan++;
                                                    $huruf = "C";
                                                    $id_kriteria = $huruf . sprintf("%03s", $urutan);
                                                    ?>
                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Id User</div>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" name="idkriteria" value="<?php echo $id_kriteria ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Nama Kriteria</div>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" name="namakriteria">
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

                            <?php
                            if (isset($_POST['submit'])) {
                                $id_kriteria = $_POST['idkriteria'];
                                $namakriteria = $_POST['namakriteria'];


                                $save = mysqli_query($con, "INSERT INTO kriteria VALUES ('$id_kriteria', '$namakriteria')") or die(mysqli_error($con));

                                echo "<script type='text/javascript'>
                    setTimeout(function () { 
                        swal({ 
                            title: 'Suksess', 
                            text: 'Data Berhasil Disimpan $namakriteria', 
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


                        </div>
                    </div>

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Bobot Kriteria</h4>
                                    <div class="card-header-action text-right">
                                        <button class="btn btn-primary btn-action btn-xs mr-1" data-toggle="modal" data-target="#exampleModal2" data-toggle="tooltip" title="Tambah Bobot"><span>Tambah Data</span></button>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0 admin" id="admin">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kriteria</th>
                                                        <th>Sifat</th>
                                                        <th>Bobot</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $SqlQuery = mysqli_query($con, "SELECT * FROM `dt_kriteria` AS u INNER JOIN kriteria AS k ON  u.id_kriteria=k.id_kriteria ");
                                                    $no = 1;
                                                    if (mysqli_num_rows($SqlQuery) > 0) {
                                                        while ($row = mysqli_fetch_array($SqlQuery)) {
                                                    ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $row['nama_kriteria'] ?></td>
                                                                <td><?= $row['sifat'] ?></td>
                                                                <td><?= $row['bobot'] ?></td>
                                                                <td>
                                                                    <center>
                                                                        <a href="editbobot.php?id=<?= $row['kd_kriteria'] ?>" class="btn btn-primary btn-xs btn-action mr-1" title="Edit"><i class="fa fa-pencil"></i></a>

                                                                        <a href="deletebobot.php?id=<?= $row['kd_kriteria'] ?>" class="btn btn-danger btn-xs delete-data mr-1" title="hapus"><i class="fa fa-trash"></i></a>
                                                                </td>
                                                                </center>
                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan=\"5\" align=\"center\">data tidak ada</td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- MODAL -->

                            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Tambah Bobot</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <div class="section-title mt-0">Pilih Kriteria</div>
                                                    <div class="input-group mb-2">
                                                        <select class="custom-select" id="kriteria" name="kriteria" required>
                                                            <option disabled selected> Pilih kriteria </option>
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
                                                        <option disableds>Pilih</option>
                                                        <option value="1">Benefit</option>
                                                        <option value="2">Cost</option>
                                                    </select>
                                                </div>



                                                <div class="form-group">
                                                    <div class="section-title mt-0">Bobot</div>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control" name="bobot">
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button class="btn btn-primary mr-1" type="submit" name="submit2">Simpan</button>

                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                                </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    if (isset($_POST['submit2'])) {
                        $kriteria = $_POST['kriteria'];
                        $sifat = $_POST['sifat'];
                        $bobot = $_POST['bobot'];


                        $save = mysqli_query($con, "INSERT INTO dt_kriteria VALUES ('','$kriteria', '$sifat', '$bobot')") or die(mysqli_error($con));

                        echo "<script type='text/javascript'>
                    setTimeout(function () { 
                        swal({ 
                            title: 'Suksess', 
                            text: 'Data Berhasil Disimpan $kriteria', 
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

                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Data Bobot Nilai Kriteria</h4>
                                    <div class="card-header-action text-right">
                                        <button class="btn btn-primary btn-action btn-xs mr-1" data-toggle="modal" data-target="#exampleModal3" data-toggle="tooltip" title="Tambah Bobot"><span>Tambah Data</span></button>

                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0 admin" id="admin">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th> Kode Kriteria</th>
                                                        <th> Nama Kriteria</th>
                                                        <th>Keterangan</th>
                                                        <th>Nilai</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $SqlQuery = mysqli_query($con, "SELECT * FROM penilaian AS p INNER JOIN kriteria AS k ON p.id_kriteria=k.id_kriteria");
                                                    $no = 1;
                                                    if (mysqli_num_rows($SqlQuery) > 0) {
                                                        while ($row = mysqli_fetch_array($SqlQuery)) {
                                                    ?>
                                                            <tr>
                                                                <td><?= $no++ ?></td>
                                                                <td><?= $row['id_kriteria'] ?></td>
                                                                <td><?= $row['nama_kriteria'] ?></td>
                                                                <td><?= $row['keterangan'] ?></td>
                                                                <td><?= $row['penilaian'] ?></td>

                                                                <td>
                                                                    <a href="editpenilaian.php?id=<?= $row['kd_penilaian'] ?>" class="btn btn-primary btn-action mr-1" title="Edit"><i class="fa fa-pencil"></i></a>
                                                                    <a href="deletenilai.php?id=<?= $row['kd_penilaian'] ?>" class="btn btn-danger btn-xs delete-data" title="hapus"><i class="fa fa-trash"></i></a>
                                                                </td>

                                                            </tr>
                                                    <?php
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan=\"10\" align=\"center\">data tidak ada</td></tr>";
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- MODAL -->

                <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Penilaian Kriteria</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">

                                    <div class="form-group">
                                        <div class="section-title mt-0">Kriteria</div>
                                        <div class="input-group mb-2">
                                            <select class="custom-select" id="kriteria" name="kriteria" required>
                                                <option disabled selected> Pilih Kriteria </option>
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
                                        <div class="section-title mt-0">Keterangan Kriteria</div>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="ketkriteria">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="section-title mt-0">Nilai</div>
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="nilai">
                                        </div>
                                    </div>



                                    <div class="modal-footer">
                                        <button class="btn btn-primary mr-1" type="submit" name="submit3">Simpan</button>

                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST['submit3'])) {
                $kriteria = $_POST['kriteria'];
                $ketkriteria = $_POST['ketkriteria'];
                $nilai = $_POST['nilai'];


                $save = mysqli_query($con, "INSERT INTO penilaian VALUES ('', '$kriteria','$ketkriteria','$nilai' )") or die(mysqli_error($con));

                echo "<script type='text/javascript'>
    setTimeout(function () { 
        swal({ 
            title: 'Suksess', 
            text: 'Penilain Berhasil Disimpan', 
            type: 'success',
            icon: 'success',
             timer: 3000,
              showConfirmButton: false });
    },10);  
    window.setTimeout(function(){ 
      window.location.replace('index.php');
    } ,3000); 
    </script>";
            }
            ?>




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

                // swall
                $('.delete-data2').on('click', function(e) {
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

                // swall
                $('.delete-data3').on('click', function(e) {
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
    <?php


    include_once('footer.php');
} else {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}


    ?>