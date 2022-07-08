<?php
    include '../../koneksi.php';

    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM penerima WHERE id = '$id'");
    header('location: ../../admin.php');
    ?>