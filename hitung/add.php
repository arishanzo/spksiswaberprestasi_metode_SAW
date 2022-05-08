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
                        <h4>Tambah Data Penilaian</h4>
                        <div class="card-header-action text-right">
                            <a href="index.php" class="btn btn-primary btn-action btn-xs mr-1" title="kembali"><span>Kembali</span></a>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="card-body">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <div class="form-group">
                                            <div class="section-title mt-3">Nama</div>
                                            <div class="input-group mb-2">
                                                <select class="selectpicker form-control" data-live-search="true" id="kdsiswa" name="kdsiswa" required>
                                                    <option disabled selected> Pilih siswa</option>
                                                    <?php

                                                    $sqlsiswa = mysqli_query($con, "select * from dt_siswa ");
                                                    while ($row2 = mysqli_fetch_array($sqlsiswa)) {
                                                    ?>
                                                        <option value="<?= $row2['kd_siswa'] ?>"><?= $row2['nama_siswa'] ?></option>

                                                    <?php


                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <?php
                                        $sql = mysqli_query($con, "SELECT * FROM `dt_kriteria` AS u INNER JOIN kriteria AS k ON  u.id_kriteria=k.id_kriteria");
                                        $i = 1;
                                        while ($row = mysqli_fetch_array($sql)) {
                                            $idkriteria =  $row['id_kriteria'];
                                            $i++

                                        ?>

                                            <div class="form-group" hidden>
                                                <div class="section-title mt-0">id_kriteria</div>
                                                <div class="input-group mb-2">
                                                    <input type="text" name="idkriteria-<?= $i ?>" class="form-control" readonly value="<?php echo $idkriteria ?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <!-- <?php
                                                        // $sqljumlah = mysqli_query($con, "SELECT COUNT(kd_kriteria) FROM `dt_kriteria` AS u INNER JOIN bantuan AS b INNER JOIN kriteria AS k ON u.kd_bantuan='$kodebantuan' && u.id_kriteria=k.id_kriteria WHERE B.kd_bantuan='$kodebantuan'");
                                                        // $row1 = mysqli_fetch_array($sqljumlah);
                                                        // $jumlah = $row1['COUNT(kd_kriteria)'];

                                                        // for ($i = 1; $i <= $jumlah; $i++) {
                                                        // 
                                                        ?> -->
                                                <div class="section-title mt-3"><?= $row['nama_kriteria'] ?></div>

                                                <div class="input-group mb-2">

                                                    <select class="custom-select" id="nilai" name="nilai-<?= $i ?>" required>

                                                        <option disabled selected> Pilih Keterangan</option>
                                                        <?php
                                                        $nilai = array($_POST['nilai']);
                                                        $sql2 = mysqli_query($con, "SELECT * FROM kriteria AS k INNER JOIN penilaian AS P ON K.id_kriteria='$idkriteria' && P.id_kriteria='$idkriteria'");
                                                        while ($row2 = mysqli_fetch_array($sql2)) {
                                                        ?>
                                                            <option value="<?= $row2['penilaian'] ?>"><?= $row2['keterangan'] ?></option>
                                                        <?php
                                                        }

                                                        ?>
                                                    </select>
                                                    <?php
                                                    // }
                                                    ?>

                                                </div>
                                            <?php


                                        }
                                            ?>
                                            </div>

                                            <div class="form-group">
                                                <input type="submit" name="simpan" class="btn btn-info btn-lg" value="Pilih">
                                            </div>

                                    </form>

                                </div>
                            </div>


                            <?php

                            if (isset($_POST['simpan'])) {
                                $kdsiswa = $_POST['kdsiswa'];

                                $sqlnilai = mysqli_query($con, "SELECT * FROM nilai where kd_siswa ='$kdsiswa'");
                                // $rownilai = mysqli_fetch_array($Sqlkriteria);
                                if (mysqli_num_rows($sqlnilai) > 0) {
                                    echo "<script type='text/javascript'>
        setTimeout(function () { 
            swal({ 
                title: 'Warnning', 
                text: 'Data sudah Ada Mohon Isi Kembali, 
                type: 'warning',
                icon: 'warning',
                 timer: 3000,
                  showConfirmButton: false });
        },10);  
        window.setTimeout(function(){ 
          window.location.replace('index.php');
        } ,3000); 
        </script>";
                                } else {
                                    $sql = mysqli_query($con, "SELECT * FROM `dt_kriteria` AS u INNER JOIN kriteria AS k ON u.id_kriteria=k.id_kriteria ");
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $i++;
                                        $nilai = $_POST['nilai-' . $i];
                                        $idkriteria = $_POST['idkriteria-' . $i];
                                        $save = mysqli_query($con, "INSERT INTO nilai VALUES ('','$kdsiswa', '$idkriteria', '$nilai')") or die(mysqli_error($con));
                                    }

                                    echo "<script type='text/javascript'>
setTimeout(function () { 
    swal({ 
        title: 'success', 
        text: 'Berhasil Di Simpan', 
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
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>


<script>
    const searchInputDropdown = document.getElementById('search-input-dropdown');
    const dropdownOptions = document.querySelectorAll('.input-group-dropdown-item');

    searchInputDropdown.addEventListener('input', () => {
        const filter = searchInputDropdown.value.toLowerCase();
        showOptions();
        const valueExist = !!filter.length;

        if (valueExist) {
            dropdownOptions.forEach((el) => {
                const elText = el.textContent.trim().toLowerCase();
                const isIncluded = elText.includes(filter);
                if (!isIncluded) {
                    el.style.display = 'none';
                }
            });
        }
    });

    const showOptions = () => {
        dropdownOptions.forEach((el) => {
            el.style.display = 'flex';
        })
    }
</script>

<?php

include_once('footer.php');
// 
?>