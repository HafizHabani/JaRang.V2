<?php
    include '../../koneksi.php';

    $id = $_GET['id'];
    $nama = $_POST['nama'];
    $jumlah = $_POST['jumlah'];
    $kondisi = $_POST['kondisi'];

    mysqli_query($koneksi, "UPDATE barang SET nama = '$nama', jumlah = '$jumlah', kondisi = '$kondisi' WHERE id = '$id'");
    header('location: ../../admin.php');
?>