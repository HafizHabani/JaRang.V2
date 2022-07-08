<?php
    include '../../koneksi.php';

    $id = $_GET['id'];
    $status = $_POST['status'];

    mysqli_query($koneksi, "UPDATE ceklist SET status = '$status', WHERE id = '$id'");
    header('location: ../../admin.php');
?>