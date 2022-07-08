<?php
    include 'koneksi.php';

    //Pengirim
    $namapengirim = $_POST['namapengirim'];
    $alamatpengirim = $_POST['alamatpengirim'];
    $hppengirim = $_POST['hppengirim'];

    //Penerima
    $namapenerima = $_POST['namapenerima'];
    $alamatpenerima = $_POST['alamatpenerima'];
    $hppenerima = $_POST['hppenerima'];

    //barang
    $namabarang = $_POST['namabarang'];
    $jumlahbarang = $_POST['jumlahbarang'];
    $kondisibarang = $_POST['kondisibarang'];
    $berat = $_POST['berat'];

    $id = date("Ymd") . uniqid();

    mysqli_query($koneksi, "INSERT INTO pengirim(id, nama_k, alamat_k, hp_k) VALUES('$id','$namapengirim','$alamatpengirim','$hppengirim')");
    mysqli_query($koneksi, "INSERT INTO penerima(id, nama, alamat, hp) VALUES('$id','$namapenerima','$alamatpenerima','$hppenerima')");
    mysqli_query($koneksi, "INSERT INTO barang(id, nama, jumlah, kondisi, berat) VALUES('$id','$namabarang','$jumlahbarang','$kondisibarang','$berat')");

    header("location:forms-konfirmasi.php?id=$id");
?>