<?php
    include '../../koneksi.php';

    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];

    mysqli_query($koneksi, "UPDATE penerima SET nama = '$nama', alamat = '$alamat', hp = '$hp' WHERE id = '$id'");
    header('location: ../../admin.php');
?>