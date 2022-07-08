<?php
    include '../../koneksi.php';

    $id = $_GET['id'];
    $nama_k = $_POST['nama_k'];
    $alamat_k = $_POST['alamat_k'];
    $hp_k = $_POST['hp_k'];

    mysqli_query($koneksi, "UPDATE pengirim SET nama_k = '$nama_k', alamat_k = '$alamat_k', hp_k = '$hp_k' WHERE id = '$id'");
    header('location: ../../admin.php');
?>