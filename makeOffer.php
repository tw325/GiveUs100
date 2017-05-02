<?php session_start();?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Make Requests</title>
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
    ?>   
        <form method="post" id="sampleMakeOffer" action="makeOffer.php"> 
        <table>
            <tr>
                <td><label>Name of Volunteer:</label></td>
                <td><input type="text" name="name" required /></td>
            </tr>
            <tr>
                <td><label>Type: </label></td>
                <td><input type="text" name="type" required /></td>
            </tr>
            <tr>
                <td><label>Description: </label></td> 
                <td><input type="text" name="descrption" required /></td>
            </tr>
            <tr>
                <td><label>Time: </label></td> 
                <td><input type="datetime" name="time" required / ></td>
            </tr>
            <tr>
                <td><label>Location: </label></td> 
                <td><input type="text" name="descrption" required /></td>
            </tr>
        </table><br>
        <input type="submit" name="offerSubmit" value="Submit" />
    </form>
    
    <?php 
    
    } else {
        print "Please <a href='login.php'>Login</a> to make an offer";
        
        
    }
    ?>
    
    <h2>Make an offer</h2>
    
    <form method="post" id="sampleMakeOffer" action="makeOffer.php"> 
        <table>
            <tr>
                <td><label>Name of Volunteer:</label></td>
                <td><input type="text" name="name" required /></td>
            </tr>
            <tr>
                <td><label>Offer Type: </label></td>
                <td><input type="text" name="type" required /></td>
            </tr>
            <tr>
                <td><label>Description: </label></td> 
                <td><input type="text" name="descrption" required /></td>
            </tr>
            <tr>
                <td><label>Time: </label></td> 
                <td><input type="datetime" name="time" required / ></td>
            </tr>
            <tr>
                <td><label>Location: </label></td> 
                <td><input type="text" name="descrption" required /></td>
            </tr>
        </table><br>
        <input type="submit" name="offerSubmit" value="Submit" />
    </form>



</body>

</html>