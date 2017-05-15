<!DOCTYPE HTML>
<html>
<?php session_start(); $page = 'login';?>
<head>
  <title>MAKE ACCOUNT</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';
  require_once 'config.php';
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
  ?>
  <form method="post" action="profile.php">
    <input type="submit" name="submit" value="Countinue">
  </form>
  <?php
  if ($mysqli->connect_errno){
				printf("connect fail: %s\n", $mysqli->connect_error);
				exit();
			}
      $u_username = $_POST[ "u_username" ];
      $u_password = $_POST["u_password"];
      $u_name = $_POST["u_name"];
      $u_address = $_POST["u_address"];
      $u_language = $_POST["u_language"];
      $u_age = $_POST["u_age"];
      $u_email = $_POST["u_email"];
      $u_phone = $_POST["u_phone"];
      $gender = $_POST["gender"];
      $userType = $_POST["userType"];
      $pcontact = $_POST["u_pcontact"]

      $username = filter_input($u_username, FILTER_SANITIZE_STRING );
      $password = filter_input($u_password, FILTER_SANITIZE_STRING );
      $name = filter_input($u_name, FILTER_SANITIZE_STRING);
      $address = filter_input($u_address, FILTER_SANITIZE_STRING)
      $language = filter_input($u_language, FILTER_SANITIZE_STRING)
      $age = filter_input($u_age, FILTER_VALIDATE_INT)
      $email = filter_input($u_email, FILTER_VALIDATE_EMAIL)
      $phone = filter_input($u_phone, FILTER_SANITIZE_STRING)
      $pcontact = filter_input($u_pcontact, FILTER_SANITIZE_STRING)

      $target_dir = "images/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      // Allow certain file formats
      if(strcasecmp($imageFileType,"jpg") != 0 && strcasecmp($imageFileType,"png") != 0 && strcasecmp($imageFileType,"jpeg") != 0 && strcasecmp($imageFileType,"gif") != 0) {
	       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	        $uploadOk = 0;
        }

        if ($uploadOk == 0) {
	         echo "Sorry, your file was not uploaded.";

         } else {
	     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		       echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	        } else {
		   echo "Sorry, there was an error uploading your file.";
	    }
    }

    $location = basename( $_FILES["fileToUpload"]["name"]);


        $query = "SELECT COUNT(username) as username_count FROM users WHERE username = '$username' ";
        $result = $mysqli -> query($sql);
        if(!$result){
	      print('<p>error</p>');
	      print($mysqli->error);
	      exit();
        }
        while ( $row = $result->fetch_assoc() ){

        if ($row['username_count'] == 1) {
	         print "This username has alrealy been taken, please choose another username"
         }
        else {
          $sql = "INSERT INTO users (name, userType, gender, address, language, age, password, username, pictureURL, email, phone, prefferedContact) VALUES ('$name', '$userType', '$gender', '$address', '$language', '$age', '$password', '$username', '$pictureURL', '$email', '$phone', '$pcontact' );";
	         if( $mysqli->query( $sql ) ) {
		        $new_id = $mysqli->insert_id;
	         }
	          if ($mysqli->connect_errno){
		            printf("connect fail: %s\n", $mysqli->connect_error);
		              exit();
	           }
        }
      }


       ?>
  <?php include 'footer.php';?>
</body>
</html>
