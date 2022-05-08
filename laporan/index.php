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
                            <h4>Laporan</h4>
                            <div class="card-header-action">
                                <button class="btn btn-primary btn-action btn-xs mr-1" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="CETAK"><span>CETAK</span></button>

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
                                                <th>Kelas </th>
                                                <th>Jurusan </th>
                                                <th>Nilai</th>
                                                <th>Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $Sql = mysqli_query($con, "SELECT * FROM `dt_siswa` as s INNER JOIN siswa_berprestasi as b INNER JOIN hasil as n ON n.kd_siswa=s.kd_siswa WHERE s.kd_siswa=b.kd_siswa");
                                            $no = 1;
                                            if (mysqli_num_rows($Sql) > 0) {
                                                while ($row = mysqli_fetch_array($Sql)) {
                                            ?>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row['nama_siswa'] ?></td>
                                                    <td><?= $row['kelas'] ?></td>
                                                    <td><?= $row['jurusan'] ?></td>
                                                    <td><?= round($row['nilai'], 6) ?></td>
                                                    <td><?= date("Y",  strtotime($row["Tgl"])); ?></td>
                                                    <td>
                                                        <a href="delete.php?id=<?= $row['id_berprestasi'] ?>" class="btn btn-danger btn-xs delete-data mr-1" title="hapus"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                    </tr>
                                            <?php
                                                }
                                            } else {
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- MODAL -->

                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">CETAK LAPORAN</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url() ?>//laporan/cetak.php" method="POST">
                                    <div class="form-group">
                                        <div class="section-title mt-0">Pilih Tahun</div>
                                        <div class="input-group mb-2">
                                            <select class="custom-select" id="tahun" name="tahun" required>
                                                <option disabled selected> Pilih Tahun </option>
                                                <?php
                                                $sql = mysqli_query($con, "select * from siswa_berprestasi");
                                                while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <option value="<?= ($row["Tgl"]); ?>"><?= date("Y",  strtotime($row["Tgl"])); ?></option>
                                                <?php
                                                }

                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-danger mr-1" type="submit" name="pdf">PDF</button>

                                        <button type="submit" class="btn btn-success" name="excel">EXCEL</button>

                                    </div>
                            </div>
                            </form>
                        </div>
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