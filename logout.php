<?php session_start(); $page = 'logout';?>

<?php  
    session_start();   
    if (isset($_SESSION['logged_user'])) {   
        $olduser = $_SESSION['logged_user'];    
        unset( $_SESSION[ 'logged_user' ] );  
    } else {   
        $olduser = false;  
    } ?> 

<!DOCTYPE html>
<html>
<head>
  <title>LOGOUT</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  
    <?php include 'navbar.php';?>

    <?php  
        if ( $olduser ) {   
            print( "<h1>Thanks for using our page, $olduser!</h1>");   
            print( "<h2>Return to our <a href='login.php'>login page</a></h2>");  
        } else {   
            print( "<h1>You haven’t logged in.</h1>");   
            print( "<h2>Go to our <a href='login.php'>login page</a></h2>" );  
        }  ?> 
    
</body>
    
</html>