<?php
require_once "../config/config.php";

if (isset($_POST['pdf'])) {
?>
    <center>
        <h1>Data Siswa Berprestasi Tahun <?= date("Y",  strtotime(@$_POST['tahun'])); ?> <br /> SMK NU LAMONGAN </h1>
        <table border="2">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas </th>
                    <th>Jurusan </th>
                    <th>Nilai</th>
                    <th>Tahun</th>

                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../config/config.php";
                $tahun = @$_POST['tahun'];
                $Sql = mysqli_query($con, "SELECT * FROM `dt_siswa` as s INNER JOIN siswa_berprestasi as b INNER JOIN hasil as n ON n.kd_siswa=s.kd_siswa WHERE s.kd_siswa=b.kd_siswa && b.Tgl='$tahun'");
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

                        </tr>
                <?php
                    }
                } else {
                }
                ?>
            </tbody>
        </table>
    </center>
    <script>
        window.print();
    </script>

<?php

} else if (isset($_POST['excel'])) {
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Datasiswaberprestasi.xls");
?>
    <center>
        <h3>Data Siswa Berprestasi Tahun <?= date("Y",  strtotime(@$_POST['tahun'])); ?> <br /> SMK NU LAMONGAN </h3>

        <table border="5">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas </th>
                    <th>Jurusan </th>
                    <th>Nilai</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../config/config.php";
                $tahun = @$_POST['tahun'];
                $Sql = mysqli_query($con, "SELECT * FROM `dt_siswa` as s INNER JOIN siswa_berprestasi as b INNER JOIN hasil as n ON n.kd_siswa=s.kd_siswa WHERE s.kd_siswa=b.kd_siswa && b.Tgl='$tahun'");
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

                        </tr>
                <?php
                    }
                } else {
                }
                ?>
            </tbody>
        </table>
    </center>

<?php
}
?>