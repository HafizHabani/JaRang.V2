<?php
    include 'koneksi.php';

    $jumlahpengemasan = $_POST['jumlahpengemasan'];
    $beratpengemasan = $_POST['beratpengemasan'];

    $alamatdelivery = $_POST['alamatdelivery'];
    $tanggaldelivery = $_POST['tanggaldelivery'];

    $kwitansipembayaran = $_POST['kwitansipembayaran'];
    $totalpembayaran = $_POST['totalpembayaran'];

    $status = $_POST['status'];
    
    if(mysqli_query($koneksi, "INSERT INTO ceklist(id_barang, id_pengirim, status) VALUES('$kwitansipembayaran', '$kwitansipembayaran', '$status')")) {
        $id_ceklist = mysqli_insert_id($koneksi);

        if(mysqli_query($koneksi, "INSERT INTO pembayaran(id_ceklist,kwitansi, harga,status) VALUES('$id_ceklist','$totalpembayaran','$kwitansipembayaran', '$status')")) {
            $id_pembayaran = mysqli_insert_id($koneksi);

            if(mysqli_query($koneksi, "INSERT INTO pengemasan(id_pembayaran, jumlah, berat) VALUES('$id_pembayaran','$jumlahpengemasan','$beratpengemasan')")) {
                $id_pengemasan = mysqli_insert_id($koneksi);
                mysqli_query($koneksi, "INSERT INTO delivery(alamat, tanggal, id_pengemasan, id_penerima) VALUES('$alamatdelivery','$tanggaldelivery', '$id_pengemasan', '$kwitansipembayaran')");

                header("location:index.php");
            }
        }
    }
