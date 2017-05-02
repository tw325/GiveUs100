<?php session_start(); ?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Requests</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>   
    <?php 
        
    include 'navbar.php';
    
    #connect to the database
    require_once 'config.php'; 
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
    
    if ( isset( $_SESSION[ 'logged_user' ] ) ) {   
        $logged_user = $_SESSION[ 'logged_user' ];  
        
        $requests = $mysqli->query("SELECT * FROM Requests")
        
        if ($requests){
            while($requests = $request ->fetch_assoc() ){
                
            }
        }
    
    ?>
    

</body>
</html>