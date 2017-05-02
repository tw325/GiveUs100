<?php session_start(); $page = 'profile';?>

<!DOCTYPE html>
<html>
<head>
  <title>HOME</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';?>
  <div id="profile">
	<div class="name"> Name McNamey </div><br>
  	<img src= img/tempProfile.jpg onerror = "this.src=\'http://i.imgur.com/hPYOVf9.jpg\';" alt="pic"/><br>
  	<div class="description">description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description description </div>
  	<div class="groups"><br><b>Groups:</b> Senior Citizen, Volunteer</div>
  	<div class="pastPosts">
  		<br><br>
  		<a href="profile.php">Previous Posts</a></li>
  		<a href="profile.php">Previous Requests</a></li>
  		<a href="profile.php">Previous Offers</a></li>
  	</div>

  </div>
</body>

</html>