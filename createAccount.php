<!DOCTYPE HTML>
<html>
<?php session_start(); $page = 'login';?>
<head>
  <title>MAKE ACCOUNT</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';
  $u_username = $u_password = $u_name = $u_address = $u_language = $u_age = $u_email = $u_phone = $gender = $userType = $pcontact= "";
  ?>

  <h2>Make An Account</h2>
  		<br>
  		<!--<p><span class="error">* required field.</span></p>-->
  		<form class="bookFormClass" action = "createAccount2.php" method="post" enctype="multipart/form-data">
  			Your Name: <input type="text" name="u_name" required value="<?php echo $u_name;?>" >
    		<br><br>
    		Username: <input type="text" name="u_username" required value="<?php echo $u_username;?>">
    		<br><br>
    		Password: <input type="text" name="u_password" required value="<?php echo $u_password;?>" >
  			<br><br>
        Address: <input type="text" name="u_address" required value="<?php echo $u_address;?>" >
  			<br><br>
        Preffered Language: <input type="text" name="u_language" required value="<?php echo $u_language;?>" >
  			<br><br>
        Age: <input type="number" name="u_age" min="1" max="150" required value="<?php echo $u_age;?>" >
  			<br><br>
        Email: <input type="text" name="u_email" required value="<?php echo $u_email;?>" >
  			<br><br>
        Phone Number (No dashes or parentheses): <input type="text" name="u_phone" required value="<?php echo $u_phone;?>" >
  			<br><br>
  			Profile Photo: <input type="file" name="fileToUpload" required id="fileToUpload">
    		<br><br>
  			Gender:
  			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked";?> required value="Female">Female
  			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked";?> required value="Male">Male
        <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked";?> required value="Other">Other
  			<br><br>
        User Type:
  			<input type="radio" name="userType" <?php if (isset($userType) && $userType=="Senior Citizen") echo "checked";?> required value="Senior Citizen">Senior Citizen
        <input type="radio" name="userType" <?php if (isset($userType) && $userType=="Volunteer") echo "checked";?> required value="Volunteer">Volunteer
  			<br><br>
        Preffered Contact:
        <input type="radio" name="pcontact" <?php if (isset($pcontact) && $pcontact=="Phone Number") echo "checked";?> required value="Phone Number">Phone Number
        <input type="radio" name="pcontact" <?php if (isset($pcontact) && $pcontact=="Email") echo "checked";?> required value="Email">Email
        <br><br>
  			<input id="button" type="submit" name="submit" value="Submit">
  		</form>

  <?php include 'footer.php';?>
</body>
</html>
