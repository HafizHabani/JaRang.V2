<?php

include 'koneksi.php';

session_start();

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
}

echo "Session user ID: " . $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>user page</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <h1 class="title"> <span>user</span> profile page </h1>

    <section class="profile-container">

        <?php
        $select_profile = $koneksi->prepare("SELECT * FROM `users` WHERE id = ?");
        $select_profile->bind_param("i", $_SESSION['user_id']); // Bind parameter integer
        $select_profile->execute();
        $result = $select_profile->get_result();

        if ($result->num_rows > 0) {
            $fetch_profile = $result->fetch_assoc(); // Mengambil data profil dari hasil query
            ?>
            <div class="profile">
                <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
                <h3>
                    <?= $fetch_profile['name']; ?>
                </h3>
                <a href="user_profile_update.php" class="btn">update profile</a>
                <a href="logout.php" class="delete-btn">logout</a>
                <div class="flex-btn">
                    <a href="login.php" class="option-btn">login</a>
                    <a href="register.php" class="option-btn">register</a>
                </div>
            </div>
            <?php
        } else {
            echo "Data profil tidak ditemukan!";
        }
        ?>


    </section>

</body>

</html>