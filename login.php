<?php session_start(); $page = 'login';?>

<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';?>
  <h1> Log In </h1>
  <form action="index.php" method="post">
    <table>
        <tr><td>Username:</td> <td><input type="text" name="username"></td>
        <tr><td>Password: </td> <td><input type="password" name="password"></td>
    </table>
    <br><input type="submit" value="Submit">
  </form>
</body>

</html>
