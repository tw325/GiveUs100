<!DOCTYPE HTML>
<html>
<?php session_start();
$page = 'login'; ?>

<head>
	<title>MAKE ACCOUNT</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<?php include 'navbar.php';
require_once 'config.php';
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); ?>

	<?php if ($mysqli->connect_errno) {
    printf("connect fail: %s\n", $mysqli->connect_error);
    exit();
}
$u_username = $_POST["u_username"];
$u_password = $_POST["u_password"];
$u_name = $_POST["u_name"];
$u_address = $_POST["u_address"];
$u_language = $_POST["u_language"];
$u_age = $_POST["u_age"];
$u_email = $_POST["u_email"];
$u_phone = $_POST["u_phone"];
$gender = $_POST["gender"];
$userType = $_POST["userType"];
$pcontact = $_POST["pcontact"];

$username = filter_var($u_username, FILTER_SANITIZE_STRING);
$password = filter_var($u_password, FILTER_SANITIZE_STRING);
$name = filter_var($u_name, FILTER_SANITIZE_STRING);
$address = filter_var($u_address, FILTER_SANITIZE_STRING);
$language = filter_var($u_language, FILTER_SANITIZE_STRING);
$age = filter_var($u_age, FILTER_VALIDATE_INT);
$email = filter_var($u_email, FILTER_VALIDATE_EMAIL);
$phone = filter_var($u_phone, FILTER_SANITIZE_STRING);


$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Allow certain file formats
if (strcasecmp($imageFileType, "jpg") != 0 && strcasecmp($imageFileType, "png") != 0 && strcasecmp($imageFileType, "jpeg") != 0 && strcasecmp($imageFileType, "gif") != 0) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$location = basename($_FILES["fileToUpload"]["name"]);

$sql = "SELECT COUNT(username) as username_count FROM users WHERE username = '$username' ";
$result = $mysqli->query($sql);
if (!$result) {
    print ('<p>error</p>');
    print ($mysqli->error);
    exit();
}
while ($row = $result->fetch_assoc()) {
    if ($row['username_count'] == 0) {
      ?>
      <form method="post" action="profile.php">
        <input type="submit" name="submit" value="Countinue to see your profile">
      </form>
      <?php
        $sql = "INSERT INTO users (name, userType, gender, address, language, age, password, username, pictureURL, email, phone, profileURL, preferredContact) VALUES ('$name', '$userType', '$gender', '$address', '$language', '$age', '$password', '$username', '$location', '$email', '$phone', '', '$pcontact' );";
        if ($mysqli->query($sql)) {
            $new_id = $mysqli->insert_id;
        }
        if ($mysqli->connect_errno) {
            printf("connect fail: %s\n", $mysqli->connect_error);
            exit();
        }
    }
    else {
      print "This username has alrealy been taken, please choose another username";
      ?>
      <form method="post" action="createAccount.php">
    		<input type="submit" name="submit" value="Return to form">
    	</form>
      <?php

    }
}
include 'footer.php'; ?>
</body>
</html>
