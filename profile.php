<?php session_start(); $page = 'profile';?>

<!DOCTYPE html>
<html>
<head>
  <title>HOME</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';?>
  <?php

  if ( isset( $_SESSION[ 'logged_user' ] ) ) {

    #connect to the database
    require_once 'config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


    if (isset($_GET['userID'])) {
      $userID = $_GET[ 'userID' ];
      $result = $mysqli->query("SELECT * FROM users WHERE userID='$userID'");
    }
    else {
      $username = $_SESSION[ 'logged_user' ];
      $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");
    }




    if ($result && $result->num_rows == 1) {
      $row = $result->fetch_assoc();

      $name = $row['name'];
      $userType = $row['userType'];
      $address = $row['address'];
      $language = $row['language'];
      $age = $row['age'];
      $username = $row['username'];
      $pictureURL = $row['pictureURL'];
      $email = $row['email'];
      $phone = $row['phone'];
      $preferredContact = $row['preferredContact'];


      print("<div id=\"profile\">
        <div class=\"name\">$name</div><br>
        <img src=$pictureURL alt=\"pic\"/><br>
        $userType<br>
        $address<br>
        $language<br>
        $age<br>
        $email<br>
        $phone<br>
        $preferredContact<br>"
      );
      if ($_SESSION[ 'logged_user' ] == $username) {
        echo '<table>
            <tr>
              <td>
                <div class="pastPosts">
                  <ul>
                    <li><a href="accountEdit.php"> EDIT YOUR PROFILE </a></li>
                  </ul>
                </div>
              </td>
            </tr>
          </table>
        </div>';
        echo '';
      }
    }
  }
  else {
    echo 'You must be loggin in to view profiles.';
  }
  ?>

  <?php
  include 'footer.php';
  ?>
</body>

</html>
