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
      
    <table>
        <tr>
            <td>
                <div class="pastPosts">
                    <ul>
  		                <li><a href="profile.php">Previous Posts</a></li>
  		                <li><a href="profile.php">Previous Requests</a></li>
  		                <li><a href="profile.php">Previous Offers</a></li>                        
                    </ul>
  	             </div>
            </td>
            <td>
                <div class="pastPosts">
                    <ul>
  		                <li><a href="profile.php">Tagged Posts</a></li>
  		                <li><a href="profile.php">Tagged Requests</a></li>
  		                <li><a href="profile.php">Tagged Offers</a></li>                        
                    </ul>
  	             </div>
            </td>
        </tr>
      </table>

  </div>
    <?php include 'footer.php';?>
</body>

</html>
