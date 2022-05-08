<?php
require_once "../config/config.php";
$id = @$_GET['id'];


$del1 = mysqli_query($con, "DELETE FROM nilai_normalisasi ");
$del2 = mysqli_query($con, "DELETE FROM hasil");

$sqlbenefit = mysqli_query($con, "SELECT * FROM `nilai` as n INNER JOIN dt_kriteria as dt ON n.id_kriteria=dt.id_kriteria WHERE dt.sifat='BENEFIT'");
while ($row = mysqli_fetch_array($sqlbenefit)) {
    $kdsiswa = $row['kd_siswa'];
    $idkriteria = $row['id_kriteria'];
    $bobot = $row['bobot'];

    $sqlnilai = mysqli_query($con, "SELECT max(nilai) as nilaimax FROM nilai as n inner JOIN kriteria as k ON n.id_kriteria=k.id_kriteria WHERE k.id_kriteria= '$idkriteria'");
    $row1 = mysqli_fetch_array($sqlnilai);
    $nilaimax = $row1['nilaimax'];

    $nilai = $row['nilai'];
    $hitung = $nilai / $nilaimax;
    $hitungbobot = $hitung * $bobot;


    $save = mysqli_query($con, "INSERT INTO nilai_normalisasi VALUES ('','$kdsiswa', '$idkriteria', '$hitung','$hitungbobot')") or die(mysqli_error($con));
}

$sqlcost = mysqli_query($con, "SELECT * FROM `nilai` as n INNER JOIN dt_kriteria as dt ON n.id_kriteria=dt.id_kriteria WHERE dt.sifat='COST'");
while ($row = mysqli_fetch_array($sqlcost)) {
    $kdsiswa = $row['kd_siswa'];
    $idkriteria = $row['id_kriteria'];
    $bobot = $row['bobot'];

    $sqlnilai = mysqli_query($con, "SELECT min(nilai) as minKode FROM nilai");
    $row1 = mysqli_fetch_array($sqlnilai);
    $nilaimin = $row1['minKode'];

    $nilai = $row['nilai'];
    $hitung =  $nilaimin / $nilai;

    $hitungbobot = $hitung * $bobot;

    $save = mysqli_query($con, "INSERT INTO nilai_normalisasi VALUES ('','$kdsiswa', '$idkriteria', '$hitung','$hitungbobot')") or die(mysqli_error($con));
}

$sqlsiswa = mysqli_query($con, "SELECT * FROM dt_siswa");
while ($row = mysqli_fetch_array($sqlsiswa)) {
    $kdsiswa = $row['kd_siswa'];
    $sqljumlah = mysqli_query($con, "SELECT SUM(hitung) FROM nilai_normalisasi where kd_siswa='$kdsiswa'");
    $rowjumlah = mysqli_fetch_array($sqljumlah);

    $hitung = $rowjumlah['SUM(hitung)'];

    $save = mysqli_query($con, "INSERT INTO hasil VALUES ('','$kdsiswa','$hitung')") or die(mysqli_error($con));
}

?>

<?php include_once('header.php');
require_once "../config/config.php";
?>

<div class="card">
    <!-- <img src="images/img-1.jpg" class="img-fluid"> -->
    <div class="card-body">
        <div class="row ">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Hasil Normalisasi</h4>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <?php
                $SqlQuery = mysqli_query($con, "SELECT * FROM `dt_kriteria` AS u INNER JOIN kriteria AS k ON u.id_kriteria=k.id_kriteria");
                $no = 1;
                if (mysqli_num_rows($SqlQuery) > 0) {
                    while ($row = mysqli_fetch_array($SqlQuery)) {
                        $namakriteria = $row['nama_kriteria']
                ?>
                        </h5 class="mt-3 "><strong><?= $row['nama_kriteria'] ?></strong></h5>
                        <div class="table-responsive mt-3">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0 admin" id="admin">
                                    <thead>
                                        <tr>
                                            <CENTER>
                                                <th>No</th>
                                                <th> Nama Siswa</th>
                                                <th> id Kriteria </th>
                                                <th>Nilai</th>

                                            </CENTER>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $Sqlkriteria = mysqli_query($con, "SELECT * FROM nilai_normalisasi as n INNER JOIN dt_siswa as w  INNER JOIN kriteria as k ON n.id_kriteria=k.id_kriteria && n.kd_siswa=w.kd_siswa  WHERE w.kd_siswa=n.kd_siswa && k.nama_kriteria='$namakriteria'");
                                        $no = 1;
                                        if (mysqli_num_rows($Sqlkriteria) > 0) {
                                            while ($row = mysqli_fetch_array($Sqlkriteria)) {
                                        ?>
                                                <td><?= $no++ ?></td>
                                                <td><?= $row['nama_siswa'] ?></td>
                                                <td><?= $row['id_kriteria'] ?></td>

                                                <td><?= $row['nilai_normalisasi'] ?></td>

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
                }
                ?>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card mt-3">
                    <div class="card-header bg-danger">
                        <h4 class="text-white">Hasil Perangkingan</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0 admin" id="admin">
                                    <thead>
                                        <tr>
                                            <CENTER>
                                                <th>No</th>
                                                <th>Nama Siswa</th>
                                                <th>Nilai Akhir</th>
                                                <th>Rekomendasi</th>
                                                <th>Alasan</th>
                                                <th>Keterangan</th>
                                                <th>Tambahkan</th>
                                            </CENTER>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php

                                        $Sqlkriteria = mysqli_query($con, "SELECT * FROM `hasil` as h INNER JOIN dt_siswa as w ON h.kd_siswa=W.kd_siswa  ORDER BY `h`.`nilai` DESC ,  w.nama_siswa Asc");
                                        $Sqlseleksi = mysqli_query($con, "SELECT * FROM `hasil` as h INNER JOIN dt_siswa as w ON h.kd_siswa=W.kd_siswa WHERE `h`.nilai='0.7999999970197678' ORDER BY w.nama_siswa asc LIMIT 1");
                                        $rowseleksi = mysqli_fetch_array($Sqlseleksi);
                                        $no = 1;
                                        if (mysqli_num_rows($Sqlkriteria) > 0) {
                                            while ($row = mysqli_fetch_array($Sqlkriteria)) {
                                                if ($row['nama_siswa'] == $rowseleksi['nama_siswa']) {
                                        ?>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row['nama_siswa'] ?></td>
                                                    <td><?= round($row['nilai'], 6) ?></td>
                                                    <td>Siswa Berprestasi</td>
                                                    <td>Nilai Terpenuhi</td>
                                                    <td>Nilai 0.8 Berdasarkan Ascending</td>
                                                    <td>
                                                        <a href="rekomendasi.php?kd_siswa=<?= $row['kd_siswa'] ?>" class="btn btn-primary btn-xs btn-action mr-1" title="Rekomendasi Siswa Berprestasi">Rekomendasikan</i></a>
                                                    </td>

                                                    </tr>
                                                <?php
                                                } else {
                                                ?>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $row['nama_siswa'] ?></td>

                                                    <td><?= round($row['nilai'], 6) ?></td>

                                                    <?php
                                                    if (round($row['nilai'], 6) > '0.8') {
                                                    ?>
                                                        <td>Siswa Berprestasi</td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>Siswa Tidak Berprestasi</td>

                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (round($row['nilai'], 6) > '0.8') {
                                                    ?>
                                                        <td>Nilai Terpenuhi</td>
                                                    <?php
                                                    } elseif (round($row['nilai'], 6) == '0.8') {
                                                    ?>
                                                        <td>Nilai Terpenuhi</td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>Nilai Tidak Terpenuhi</td>

                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (round($row['nilai'], 6) > '0.8') {
                                                    ?>
                                                        <td>Nilai Melebih 0.8</td>
                                                    <?php
                                                    } elseif (round($row['nilai'], 6) == '0.8') {
                                                    ?>
                                                        <td>Nilai Terpenuhi Tapi Dipilih Secara Ascending</td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>Nilai Kurang Dari 0.8</td>

                                                    <?php
                                                    }
                                                    ?>
                                                    <?php
                                                    if (round($row['nilai'], 6) > '0.8') {
                                                    ?>
                                                        <td>
                                                            <a href="rekomendasi.php?kd_siswa=<?= $row['kd_siswa'] ?>" class="btn btn-primary btn-xs btn-action mr-1" title="Rekomendasi Siswa Berprestasi">Rekomendasikan</i></a>
                                                        </td>
                                                    <?php
                                                    } elseif (round($row['nilai'], 6) == '0.8') {
                                                    ?>
                                                        <td>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>
                                                    </tr>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            </section>
                        </div>

                    </div>
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
    </script>
    <?php

    include_once('footer.php');
    // 
    ?>