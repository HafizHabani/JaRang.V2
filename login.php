<?php

include 'koneksi.php';

session_start();

if (isset($_POST['submit'])) {
   $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
   $pass = $_POST['pass']; // Tidak perlu disanitasi karena akan di-hash

   $select = $koneksi->prepare("SELECT id, password, user_type FROM users WHERE email = ?");
   $select->bind_param("s", $email);
   $select->execute();
   $result = $select->get_result();

   if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $stored_password = $row['password'];

      if (password_verify($pass, $stored_password)) {
         // Password cocok, atur session user_id
         if ($row['user_type'] == 'admin') {
            $_SESSION['admin_id'] = $row['id'];
            header('location:admin_page.php');
            exit();
         } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_id'] = $row['id'];
            header('location:user_page.php');
            exit();
         } else {
            $message[] = 'Unknown user type!';
         }
      } else {
         $message[] = 'Incorrect password!';
      }
   } else {
      $message[] = 'Email not found!';
   }

   echo "Password: $pass <br>";
   echo "Stored Password from DB: " . $row['password'] . "<br>";
}


echo "Session user ID: " . $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="loginsystem/css/style.css">

</head>

<body>

   <?php
   if (isset($message)) {
      foreach ($message as $message) {
         echo '
         <div class="message">
            <span>' . $message . '</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
   ?>

   <section class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>login now</h3>
         <input type="email" required placeholder="enter your email" class="box" name="email">
         <input type="password" required placeholder="enter your password" class="box" name="pass">
         <p>don't have an account? <a href="register.php">register now</a></p>
         <input type="submit" value="login now" class="btn" name="submit">
      </form>

   </section>

</body>

</html>