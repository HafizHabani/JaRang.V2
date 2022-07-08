<?php
    include '../../koneksi.php';

    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM pengirim WHERE id = '$id'");
    header('location: ../../admin.php');
    ?>