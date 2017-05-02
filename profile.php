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
  	<img src= img/tempProfile.jpg onerror = "this.src=\'http://i.imgur.com/hPYOVf9.jpg\';" alt="pic"/>
  </div>
</body>

</html>