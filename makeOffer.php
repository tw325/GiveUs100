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
    
    
    #check if the user is logged in 
    if ( isset( $_SESSION[ 'logged_user' ] ) ) {   
        $logged_user = $_SESSION[ 'logged_user' ];  
    ?>   
        <?php #if the user has logged in, displays the form to make an offer.?>
    
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
    
    
     #check if the information is submited via the form
    
    
    
    #filter the input
    
    
    
    #assgin the input information to variables
    
    
    
    #insert new entries into the database with error checking
    
    
    
    #close the database and inform the user if the submission succeeds
    
    
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