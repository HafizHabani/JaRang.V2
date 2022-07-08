<?php
    include '../../koneksi.php';

    $id = $_GET['id'];
    $cek = mysqli_query($koneksi, "SELECT id from ceklist  WHERE id_barang = '$id'")->fetch_array();
    $cek = $cek['id'];
    $pemba = mysqli_query($koneksi, "SELECT id from pembayaran  WHERE id_ceklist = '$cek'")->fetch_array();
    $pemba = $pemba['id'];
    $penge = mysqli_query($koneksi, "SELECT id from pengemasan  WHERE id_pembayaran = '$pemba'")->fetch_array();
    $penge = $penge['id'];
    $deli = mysqli_query($koneksi, "SELECT id from delivery  WHERE id_pengemasan = '$penge'")->fetch_array();
    $deli = $deli['id'];
    mysqli_query($koneksi, "DELETE FROM delivery WHERE id = '$deli'");
    mysqli_query($koneksi, "DELETE FROM pengemasan WHERE id = '$penge'");
    mysqli_query($koneksi, "DELETE FROM pembayaran WHERE id = '$pemba'");
    mysqli_query($koneksi, "DELETE FROM ceklist WHERE id = '$cek'");
    mysqli_query($koneksi, "DELETE FROM barang WHERE id = '$id'");
    header('location: ../../admin.php');
?>
