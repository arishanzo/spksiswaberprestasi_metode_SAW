<?php
require_once "../config/config.php";

require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

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
                            <h4>Data Siswa</h4>
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
                                                <th>Jenis Kelamin</th>
                                                <th>Jurusan</th>
                                                <th>Kelas</th>
                                                <th>Alamat</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $SqlQuery = mysqli_query($con, "select * from dt_siswa");
                                            $no = 1;
                                            if (mysqli_num_rows($SqlQuery) > 0) {
                                                while ($row = mysqli_fetch_array($SqlQuery)) {
                                            ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama_siswa'] ?></td>
                                                        <td><?= $row['jenis_kelamin'] ?></td>
                                                        <td><?= $row['jurusan'] ?></td>
                                                        <td><?= $row['kelas'] ?></td>
                                                        <td><?= $row['alamat'] ?></td>
                                                        <td>
                                                            <center>
                                                                <a href="edit.php?id=<?= $row['kd_siswa'] ?>" class="btn btn-primary btn-xs btn-action mr-1" title="Edit"><i class="fa fa-pencil"></i></a>

                                                                <a href="delete.php?id=<?= $row['kd_siswa'] ?>" class="btn btn-danger btn-xs delete-data mr-1" title="hapus"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                        </center>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                                echo "<tr><td colspan=\"9\" align=\"center\">data tidak ada</td></tr>";
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
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="" method="POST" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <div class="section-title">Upload File Excel</div>
                                                        <div class="custom-file">
                                                            <input type="file" name="namafile">
                                                            <button class="btn btn-primary mr-1" type="submit" name="upload">Upload Excel</button>
                                                        </div>
                                                    </div>
                                                    <hr>

                                                    <?php
                                                    // mengambil data barang dengan kode paling besar
                                                    $query = mysqli_query($con, "SELECT max(kd_siswa) as maxKode FROM dt_siswa");
                                                    $data = mysqli_fetch_array($query);
                                                    $kd_siswa = $data['maxKode'];

                                                    // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                                    // dan diubah ke integer dengan (int)
                                                    $urutan = (int) substr($kd_siswa, 3, 3);

                                                    $urutan++;
                                                    $huruf = "SWS";
                                                    $kd_siswa = $huruf . sprintf("%03s", $urutan);
                                                    ?>

                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Nama Siswa</div>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" name="nama">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jenis_Kelamin">
                                                            <div class="section-title mt-0"> Jenis Kelamin </div>
                                                        </label>
                                                        <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
                                                            <option>Pilih</option>
                                                            <option value="Laki-Laki">Laki-Laki</option>
                                                            <option value="Perempuan">Perempuan</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="jurusan">
                                                            <div class="section-title mt-0"> Pilih Jurusan </div>
                                                        </label>
                                                        <select class="custom-select" id="jurusan" name="jurusan">
                                                            <option>Pilih</option>
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
                                                            <input type="text" class="form-control" name="kelas">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="section-title mt-0">Alamat</div>
                                                        <div class="input-group mb-2">
                                                            <input type="text" class="form-control" name="alamat">
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

                                $namasiswa = $_POST['nama'];
                                $jeniskelamin = $_POST['jenis_kelamin'];
                                $jurusan = $_POST['jurusan'];
                                $kelas = $_POST['kelas'];
                                $alamat = $_POST['alamat'];
                                $save = mysqli_query($con, "INSERT INTO dt_siswa VALUES ('$kd_siswa',  '$namasiswa', '$jeniskelamin', '$jurusan', '$kelas', '$alamat' )") or die(mysqli_error($con));

                                echo "<script type='text/javascript'>
                                     setTimeout(function () { 
                                        swal({ 
                                            title: 'Suksess', 
                                            text: 'Data Berhasil Disimpan $namasiswa', 
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

                            <?php
                            if (isset($_POST['upload'])) {
                                $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

                                if (isset($_FILES['namafile']['name']) && in_array($_FILES['namafile']['type'], $file_mimes)) {

                                    $arr_file = explode('.', $_FILES['namafile']['name']);
                                    $extension = end($arr_file);

                                    if ('csv' == $extension) {
                                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                                    } else {
                                        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                                    }

                                    $spreadsheet = $reader->load($_FILES['namafile']['tmp_name']);

                                    $sheetData = $spreadsheet->getActiveSheet()->toArray();
                                    for ($i = 3; $i < count($sheetData); $i++) {

                                        $query = mysqli_query($con, "SELECT max(kd_siswa) as maxKode FROM dt_siswa");
                                        $data = mysqli_fetch_array($query);
                                        $kd_siswa = $data['maxKode'];

                                        // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                                        // dan diubah ke integer dengan (int)
                                        $urutan = (int) substr($kd_siswa, 3, 3);

                                        $urutan++;
                                        $huruf = "SWS";
                                        $kd_siswa = $huruf . sprintf("%03s", $urutan);

                                        $namasiswa    = $sheetData[$i]['1'];
                                        $jeniskelamin   = $sheetData[$i]['2'];
                                        $jurusan  = $sheetData[$i]['3'];
                                        $kelas = $sheetData[$i]['4'];
                                        $alamat = $sheetData[$i]['5'];
                                        $save = mysqli_query($con, "INSERT INTO dt_siswa VALUES ('$kd_siswa',  '$namasiswa', '$jeniskelamin', '$jurusan', '$kelas', '$alamat' )") or die(mysqli_error($con));
                                    }
                                    echo "<script type='text/javascript'>
                                    setTimeout(function () { 
                                       swal({ 
                                           title: 'Suksess', 
                                           text: 'Data Berhasil Disimpan', 
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

    ?>