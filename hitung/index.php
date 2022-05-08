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
                            <h4 class="mt-3">Hitung Untuk Menyeleksi Siswa</h4>
                            <div class="card-header-action">
                                <a href="add.php" class="btn btn-primary btn-action btn-xs mr-1" data-toggle="tooltip" title="Tambah Data"><span>Tambah Penilaian</span></a>
                                <a href="hitung.php" class="btn btn-info btn-action btn-xs mr-1" data-toggle="tooltip" title="Hitung Data"><span>Hitung</span></a>

                            </div>

                        </div>


                        <div class="card-body">
                            <?php
                            $SqlQuery = mysqli_query($con, "SELECT * FROM `dt_kriteria` AS u INNER JOIN kriteria AS k ON u.id_kriteria=k.id_kriteria ");
                            $no = 1;
                            if (mysqli_num_rows($SqlQuery) > 0) {
                                while ($row = mysqli_fetch_array($SqlQuery)) {
                                    $namakriteria = $row['nama_kriteria']
                            ?>
                                    </h5 class="mt-3 "><strong> <?= $row['nama_kriteria'] ?></strong></h5>
                                    <div class="table-responsive mt-3">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0 admin" id="admin">
                                                <thead>
                                                    <tr>
                                                        <CENTER>
                                                            <th>No</th>
                                                            <th> Nama Siswa</th>
                                                            <th> Kriteria </th>
                                                            <th> keterangan </th>
                                                            <th>Nilai</th>

                                                            <th>Action</th>
                                                        </CENTER>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    $Sqlkriteria = mysqli_query($con, "SELECT * FROM nilai as n INNER JOIN dt_siswa as w  INNER JOIN penilaian as p INNER JOIN kriteria as k ON n.id_kriteria=k.id_kriteria && n.kd_siswa=w.kd_siswa && n.id_kriteria=p.id_kriteria  && p.penilaian=n.nilai WHERE w.kd_siswa=n.kd_siswa && k.nama_kriteria='$namakriteria'");
                                                    $no = 1;
                                                    if (mysqli_num_rows($Sqlkriteria) > 0) {
                                                        while ($row = mysqli_fetch_array($Sqlkriteria)) {
                                                    ?>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $row['nama_siswa'] ?></td>
                                                            <td><?= $row['nama_kriteria'] ?></td>
                                                            <td><?= $row['keterangan'] ?></td>
                                                            <td><?= $row['nilai'] ?></td>
                                                            <td>
                                                                <center>
                                                                    <a href="edit.php?id=<?= $row['kd_nilai'] ?>" class="btn btn-primary btn-action mr-1" title="Edit"><i class="fa fa-pencil"></i></a>

                                                                    <a href="delete.php?id=<?= $row['kd_nilai'] ?>" class="btn btn-danger btn-xs delete-data" title="hapus"><i class="fa fa-trash"></i></a>
                                                                </center>
                                                            </td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }

                                                    ?>
                                                </tbody>

                                            </table>

                                        </div>

                                    </div>
                                <?php
                                }
                                ?>
                        </div>
                    </div>
                <?php
                            } else { ?>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header bg-danger">
                                    <div class="card-body mt-3">

                                        <h4 class="text-white">Data Bobot Belum Di Tentukan</h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                            }

            ?>


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

<?php
    include_once "footer.php";
} else {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}
?>