<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Profile</title>
</head>
<body>
    <?php
    session_start();
    require_once 'koneksi.php';

    if (!isset($_SESSION['user_email']) || !isset($_SESSION['user_name'])) {
        header('Location: error.php');
        exit;
    }

    $sql = "DELETE FROM user_form WHERE email = '{$_SESSION['user_email']}'";

    if (mysqli_query($koneksi, $sql)) {
        session_destroy();
        echo '<p>Your profile has been deleted. <a href="login.php">Log in again</a></p>';
    } else {
        header('Location: error.php');
    }
    ?>
</body>
</html>