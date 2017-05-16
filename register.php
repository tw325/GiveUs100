<?php session_start(); $page = 'register';?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';?>

  <?php

      if (!isset($_POST["submit"])) {
        ?>
        <h1> Register </h1>
        <form method="post" enctype="multipart/form-data">
          <table>
              <tr><td>Username:</td> <td><input type="text" name="username" required></td>
              <tr><td>Name:</td> <td><input type="text" name="name" required></td>
              <tr><td>Address:</td> <td><input type="text" name="address" required></td>
              <tr><td>Language:</td> <td><input type="text" name="language" required></td>
              <tr><td>Age:</td> <td><input type="text" name="age" required></td>
              <tr><td>Email:</td> <td><input type="text" name="email" required></td>
              <tr><td>Phone number (xxxxxxxxxx):</td> <td><input type="text" name="phone" required></td>
              <tr><td>Gender:</td> <td><select name="gender">
                <option selected value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option></select></td>
              <tr><td>Preferred Contact:</td> <td><select name="pref">
                <option selected value="email">Email</option>
                <option value="phone">Phone</option></select></td>
              <tr><td>userType:</td> <td><select name="userType">
                <option selected value="senior">Senior</option>
                <option value="volunteer">Volunteer</option></select></td>
              <tr><td>Password: </td> <td><input type="password" name="password" required></td>
              <tr><td>Profile Picture: <input type="file" name="photo" required></td>
          </table>
          <br><input type="submit" name="submit" value="Add">
        </form>
        <?php
      } else {
        $valid = true;

        $name = $_POST['name'];
        $userType = $_POST['userType'];
        $gender = $_POST['gender'];
        $address = $_POST['address'];
        $language = $_POST['language'];
        $age = intval($_POST['age']);
        $password = $_POST['password'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = intval($_POST['phone']);
        $preferredContact = $_POST['pref'];

        //Handle photo
        $newFile = $_FILES['photo'];
        $fileName = $newFile['name'];
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if (!strcmp(strtoupper($ext), "JPG") && !strcmp(strtoupper($ext), "PNG")) {
          echo 'Error: Please only use jpg or png';
          $valid = false;
        }

        //Validate
        if (!preg_match("/^[a-zA-Z0-9 _]+$/", $name) || strlen($name) > 50) {
          $valid = false; 
          echo 'Invalid entries. Please only use letters, numbers, underscores, and spaces for name';
        }
        if (!preg_match("/^[a-zA-Z0-9 _]+$/", $username) || strlen($username) > 50) {
          $valid = false; 
          echo 'Invalid entries. Please only use letters, numbers, underscores, and spaces for username';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $valid = false; 
          echo 'Invalid email';
        }
        if ($age==0 || $age > 100) {
          $valid = false; 
          echo 'Invalid age';
        }
        if ($phone==0 ) {
          $valid = false; 
          echo 'Invalid phone number. Please use format (xxxxxxxxxx)';
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $pictureUrl = "img/".$username.".".$ext;

        if ($valid) {
          require_once 'config.php';
          $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
          $query = "SELECT * FROM users WHERE username = '$username'";
          $result = $mysqli->query($query);
          if ($result && $result->num_rows == 1) {
              echo 'Username taken';
              $valid = false;
          } 
        }
        if ($valid) {
          $rel = "INSERT INTO users (name, userType, gender, address, language, age, password, username, pictureURL, email, phone, preferredContact, profileURL) 
            VALUES ('$name', '$userType', '$gender', '$address', '$language', '$age', '$hashed_password', '$username', '$pictureUrl', '$email', '$phone', '$preferredContact', '')";
          if ($mysqli->query($rel) === TRUE) {
            if ($newFile['error'] == 0) {
              $tempName = $newFile['tmp_name'];
              move_uploaded_file($tempName, $pictureUrl );
            }
              echo 'Account created!';
          } else {
              echo "Error: " . $rel . "<br>" . $mysqli->error;
          }

        }


        
        


      }

       ?>
  <?php include 'footer.php';?>
</body>

</html>
