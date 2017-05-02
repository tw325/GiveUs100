<?php session_start(); $page = 'index';?>

<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'header.php';?>
  <?php
  if (isset ($_POST['logout'])) {
    unset( $_SESSION[ 'logged_user' ] );
    header( "refresh:0;url=index.php" );
  }
  ?>
  <div class="content">
    <div class="container">
      <?php
      $username = filter_input( INPUT_POST, 'username', FILTER_SANITIZE_STRING );
      $password = filter_input( INPUT_POST, 'password', FILTER_SANITIZE_STRING );
      if ( isset($_SESSION['logged_user']) ) {
        $username = $_SESSION['logged_user'];
        print ("<h1> Welcome back, $username</h1>");

        require_once 'config.php';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
        print ('<div class="container">');
        $result =  $mysqli->query("SELECT albumID FROM ImgInAlbum ORDER BY RAND() LIMIT 1");
        $row = $result -> fetch_assoc();
        $id = $row['albumID'];
        $result = $mysqli->query("SELECT * FROM ImgInAlbum INNER JOIN Images ON ImgInAlbum.imageID=Images.imageID INNER JOIN Albums ON ImgInAlbum.albumID=$id WHERE Albums.albumID = $id");
        print('<table class="imgtable"><tbody>');
        $counter = 1;
        while ( $row = $result->fetch_assoc() ) {
          $imageID = $row[ 'imageID' ];
          $name = $row[ 'name' ];
          $file_name = $row[ 'file_name' ];
          $date = $row[ 'date' ];
          if ($counter == 1){
            print( '<tr>' );
          }
          print( "<td>
          <a href='image.php?imageID=".$imageID."'><img src='$file_name' class = 'icon'></a>
          <p><b>$name</b><br>
          $date
          </p>
          </td>" );
          if ($counter == 4){
            print( '</tr>' );
            $counter=1;
          } else {
            $counter+=1;
          }
        }
        print( "</tbody></table>" );
        $mysqli->close();

        print ('<form action="index.php" method="post">
        <input type="submit" name="logout" value="Log Out"></form>
        ');
      } else if ( empty( $username ) || empty( $password ) ){
        ?>
        <h1> Log In </h1>
        <form action="index.php" method="post">
          <table>
              <tr><td>Username:</td> <td><input type="text" name="username"></td>
              <tr><td>Password: </td> <td><input type="password" name="password"></td>
          </table>
          <br><input type="submit" value="Submit">
        </form>
        <?php
      } else{
        require_once 'config.php';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
        $query = "SELECT * FROM Users WHERE username = '$username'";
        $result = $mysqli->query($query);
        if ($result && $result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $db_hash_password = $row[ 'hashpassword' ];
          if( password_verify($password, $db_hash_password) ) {
            $_SESSION['logged_user'] = $username;
            header( "refresh:0;url=index.php" );
          }
          else {
            echo '<h1>You did not login successfully.</h1>';
            echo '<p>Please <a href="index.php">login</a></p>';
          }
        }
      }
       ?>

    </div>
  </div>


</body>

</html>
