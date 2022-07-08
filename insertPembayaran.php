<?php
    include 'koneksi.php';

    $jumlahpengemasan = $_POST['jumlahpengemasan'];
    $beratpengemasan = $_POST['beratpengemasan'];

    $alamatdelivery = $_POST['alamatdelivery'];
    $tanggaldelivery = $_POST['tanggaldelivery'];

    $kwitansipembayaran = $_POST['kwitansipembayaran'];
    $totalpembayaran = $_POST['totalpembayaran'];
    $statuscek = $_POST['statuscek'];
    $statuspem =$_POST['statuspem'];
    
    if(mysqli_query($koneksi, "INSERT INTO ceklist(id_barang, id_pengirim, id_penerima, statuscek) VALUES('$kwitansipembayaran', '$kwitansipembayaran', '$kwitansipembayaran', '$statuscek')")) {
        $id_ceklist = mysqli_insert_id($koneksi);

        if(mysqli_query($koneksi, "INSERT INTO pembayaran(id_ceklist,kwitansi, harga, statuspem) VALUES('$id_ceklist','$totalpembayaran','$kwitansipembayaran', '$statuspem')")) {
            $id_pembayaran = mysqli_insert_id($koneksi);

            if(mysqli_query($koneksi, "INSERT INTO pengemasan(id_pembayaran, jumlah, berat) VALUES('$id_pembayaran','$jumlahpengemasan','$beratpengemasan')")) {
                $id_pengemasan = mysqli_insert_id($koneksi);
                mysqli_query($koneksi, "INSERT INTO delivery(alamat, tanggal, id_pengemasan, id_penerima) VALUES('$alamatdelivery','$tanggaldelivery', '$id_pengemasan', '$kwitansipembayaran')");

                header("location:index.php");
            }
        }
    }
