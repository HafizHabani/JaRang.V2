

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile</title>
</head>

<body>
   <h1>Welcome,
      <?php echo $_SESSION['user_name']; ?>!
   </h1>
   <p><a href="update_profile.php">Update Profile</a> | <a href="delete_profile.php">Delete Profile</a> | <a
         href="logout.php">Logout</a></p>
</body>

</html>