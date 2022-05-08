<?php
require_once "../config/config.php";
include_once("index.php");


$id = @$_GET['id'];
$del1 = mysqli_query($con, "DELETE FROM siswa_berprestasi WHERE id_berprestasi='$id'");


echo "<script type='text/javascript'>
    setTimeout(function () { 
        swal({ 
            title: 'BERHASIL', 
            text:  'HAPUS DATA BERHASIL',
            type: 'success',
            timer: 1000,
            ConfirmButton: 'OK',
            showConfirmButton: true});
    },10);  
    window.setTimeout(function(){ 
      window.location.replace('index.php');
    } ,1000); 
    </script>";
