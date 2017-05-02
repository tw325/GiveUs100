<?php session_start();?>

<!DOCTYPE HTML> 
<html>
<head>
  <title>Donation Requests</title>
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
        
        $donatinoRequests = $mysqli->query("SELECT * FROM donation");
        
        if ($requests){
            
            while($donatinoRequests = $donatinoRequest ->fetch_assoc() ){
                
            }
        }
    }
    
    ?>
    
    <table class="donationRequest">
        <tr>
            <td>
                <a href=""><img class="donateRequestPhoto" src="images/user1.jpg"></a>
                <p>Name: Kirk</p>
            </td>
            <td>
                <div>
                    <p>Donation Request</p>
                    <p>I need xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Donate using paypal</a>
                </div>
            </td>
        </tr>
    </table>
    
    <table class="donationRequest">
        <tr>
            <td>
                <a href=""><img class="donateRequestPhoto" src="images/user2.jpg"></a>
                <p>Name: Spock</p>
            </td>
            <td>
                <div>
                    <p>Donation Request</p>
                    <p>I need xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Donate using paypal</a>
                </div>
            </td>
        </tr>
    </table>

</body>
</html>