<?php
include_once('header.php');
require_once "../config/config.php";
include_once('index.php');
$kdsiswa = @$_GET['kd_siswa'];
$id_user = $_SESSION['id_user'];

$tgl = date('Y');

$save = mysqli_query($con, "INSERT INTO siswa_berprestasi VALUES ('', '$id_user', '$kdsiswa', '$tgl')") or die(mysqli_error($con));

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
  window.location.replace('hitung.php');
} ,3000); 
</script>";
