<?php session_start(); $page = 'login';?>

<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';?>

  <?php
      $username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
      $password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
      if ( isset($_SESSION['logged_user']) ) {
        $username = $_SESSION['logged_user'];
        print ("<h1> Welcome back, $username</h1>");

      } else if ( empty( $username ) || empty( $password ) ){
        ?>
        <h1> Log In </h1>
        <form action="login.php" method="post">
          <table>
              <tr><td>Username:</td> <td><input type="text" name="username"></td>
              <tr><td>Password: </td> <td><input type="password" name="password"></td>
          </table>
          <br><input type="submit" value="Submit">
        </form>
        <form method="post" action="register.php">
	      <input type="submit" name="submit" value="Create an Account">
	      </form>
        <?php
      } else{
        require_once 'config.php';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
        $query = "SELECT * FROM users WHERE username = '$username'";
        $result = $mysqli->query($query);
        if ($result && $result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $db_hash_password = $row[ 'password' ];
          if( password_verify($password, $db_hash_password) ) {
            $_SESSION['logged_user'] = $username;
            header( "refresh:0;url=index.php" );
          }
          else {
            echo '<h1>You did not login successfully.</h1>';
            echo '<h2>Please <a href="login.php">login</a></h2>';
          }
        }
        else {
          echo '<h1>You did not login successfully.</h1>';
          echo '<h2>Please <a href="login.php">login</a></h2>';
        }
      }

       ?>
  <?php include 'footer.php';?>
</body>

</html>
