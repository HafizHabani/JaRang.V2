<?php

include 'koneksi.php';

if (isset($_POST['submit'])) {
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);
   $pass = trim($_POST['pass']);
   $pass = filter_var($pass, FILTER_SANITIZE_STRING);
   $cpass = trim($_POST['cpass']);
   $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);
   $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
   $cpass_hash = password_hash($cpass, PASSWORD_DEFAULT);

   // Debugging output
   echo "Hash of Password: " . $pass_hash . "<br>";
   echo "Hash of Confirm Password: " . $cpass_hash . "<br>";

   $image = $_FILES['image']['name'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_size = $_FILES['image']['size'];
   $image_folder = 'uploaded_img/' . $image;

   $select = $koneksi->prepare("SELECT * FROM `users` WHERE email = ?");
   $select->execute([$email]);
   $select->store_result();

   if ($select->num_rows > 0) {
      $message[] = 'User already exists!';
   } else {
      if ($pass != $cpass) {
         $message[] = 'Confirm password does not match!';
      } elseif ($image_size > 2000000) {
         $message[] = 'Image size is too large!';
      } else {
         $insert = $koneksi->prepare("INSERT INTO `users`(name, email, password, image) VALUES(?,?,?,?)");
         $insert->execute([$name, $email, $cpass, $image]); // Inserting hashed password
         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'Registered successfully!';
            header('location:login.php');
         }
      }
   }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

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
         <h3>register now</h3>
         <input type="text" required placeholder="enter your username" class="box" name="name">
         <input type="email" required placeholder="enter your email" class="box" name="email">
         <input type="password" required placeholder="enter your password" class="box" name="pass">
         <input type="password" required placeholder="confirm your password" class="box" name="cpass">
         <input type="file" name="image" required class="box" accept="image/jpg, image/png, image/jpeg">
         <p>already have an account? <a href="login.php">login now</a></p>
         <input type="submit" value="register now" class="btn" name="submit">
      </form>

   </section>

</body>

</html>