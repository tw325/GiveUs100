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
        <h1> Edit account </h1>
        <form method="post" enctype="multipart/form-data">
          <table>
              <tr><td>Name:</td> <td><input type="text" name="name" ></td>
              <tr><td>Address:</td> <td><input type="text" name="address"></td>
              <tr><td>Language:</td> <td><input type="text" name="language" ></td>
              <tr><td>Age:</td> <td><input type="text" name="age" ></td>
              <tr><td>Email:</td> <td><input type="text" name="email" ></td>
              <tr><td>Phone number (xxxxxxxxxx):</td> <td><input type="text" name="phone" ></td>
              <tr><td>Gender:</td> <td><select name="gender">
                <option value="nochange">No Change</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option></select></td>
              <tr><td>Preferred Contact:</td> <td><select name="pref">
                <option value="nochange">No Change</option>
                <option value="email">Email</option>
                <option value="phone">Phone</option></select></td>
              <tr><td>User Type:</td> <td><select name="userType">
                <option value="nochange">No Change</option>
                <option value="senior">Senior</option>
                <option value="volunteer">Volunteer</option></select></td>
              <tr><td>Password: </td> <td><input type="password" name="password"></td>
              <tr><td>Profile Picture: <input type="file" name="photo" ></td>
          </table>
          <br><input type="submit" name="submit" value="Commit changes">
        </form>
        <?php
      } else {
        $valid = true;
        $rel = "UPDATE users SET ";

        $name = filter_input( INPUT_POST, 'name', FILTER_SANITIZE_STRING );
        $password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
        $userType = filter_input( INPUT_POST, 'userType', FILTER_SANITIZE_STRING );
        $gender = filter_input( INPUT_POST, 'gender', FILTER_SANITIZE_STRING );
        $address = filter_input( INPUT_POST, 'address', FILTER_SANITIZE_STRING );
        $language = filter_input( INPUT_POST, 'language', FILTER_SANITIZE_STRING );
        $email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_STRING );
        $pref = filter_input( INPUT_POST, 'pref', FILTER_SANITIZE_STRING );
        $age = filter_input( INPUT_POST, 'age', FILTER_SANITIZE_STRING );
        $phone = filter_input( INPUT_POST, 'phone', FILTER_SANITIZE_STRING );

        if (!empty($name)) {
          if (!preg_match("/^[a-zA-Z0-9 _]+$/", $name) || strlen($name) > 50) {
            $valid = false; 
            echo 'Invalid entries. Please only use letters, numbers, underscores, and spaces for name $name';
          }
          $rel = $rel."name='$name', ";
        }
        if (!empty($userType) || $userType="nochange") {
          $rel = $rel."userType='$userType', ";
        }
        if (!empty($gender) || $gender="nochange") {
          $rel = $rel."gender='$gender', ";
        }
        if (!empty($address)) {
          $rel = $rel."address='$address', ";
        }
        if (!empty($language)) {
          $rel = $rel."language='$language', ";
        }
        if (!empty($age)) {
          $ageval = intval($age);
          if ($ageval==0 || $ageval > 100) {
            $valid = false; 
            echo 'Invalid age';
          }
          $rel = $rel."age='$ageval', ";
        }
        if (!empty($password)) {
          $hashed_password = password_hash($password, PASSWORD_DEFAULT);
          $rel = $rel."password='$hashed_password', ";
        }
        if (!empty($email)) {
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $valid = false; 
            echo 'Invalid email';
            $rel = $rel."email='$email', ";
          }
        }
        if (!empty($phone)) {
          $phone = intval($phone);
          echo 'phone: $phone';
          if ($phone==0 ) {
            $valid = false; 
            echo 'Invalid phone number. Please use format (xxxxxxxxxx)';
            $rel = $rel."phone='$phone', ";
          }
        }
        if (!empty($pref) || $pref="nochange") {
          $pref = $_POST['pref'];
          $rel = $rel."preferredContact='$pref', ";
        }
        $picChanged = false;
        //Handle photo
        if(!isset($_FILES['photo']) || $_FILES['photo']['error'] == UPLOAD_ERR_NO_FILE) {
          echo ""; 
        } else {
          $newFile = $_FILES['photo'];
          $fileName = $newFile['name'];
          $ext = pathinfo($fileName, PATHINFO_EXTENSION);
          if (!strcmp(strtoupper($ext), "JPG") && !strcmp(strtoupper($ext), "PNG") && !strcmp(strtoupper($ext), "JPEG")) {
            echo 'Error: Please only use jpg or png\n';
            $valid = false;
          }

          $pictureUrl = "img/".$username.".".$ext;
          $rel = $rel."pictureURL='$pictureUrl', ";
          $picChanged = true;
        }
        

        $username = $_SESSION[ 'logged_user' ];
        $rel = substr($rel, 0, -2);
        $rel = $rel." WHERE username='$username'";

        if ($valid) {
          if ($mysqli->query($rel) === TRUE) {
              echo 'Account edited!';
          } else {
              echo "Error: " . $rel . "<br>" . $mysqli->error;
          }
          if ($newFile['error'] == 0) {
            $tempName = $newFile['tmp_name'];
            if (file_exists($pictureUrl)) {
                unlink($pictureUrl);
            }
            move_uploaded_file($tempName, $pictureUrl);
          }

        }


        
        


      }

       ?>
  <?php include 'footer.php';?>
</body>

</html>
