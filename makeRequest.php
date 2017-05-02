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
    
    <form method="post" id="sampleMakeRequest" action="makeRequest.php"> 
        <table>
            <tr>
                <td><label>Name of Person Who Request:</label></td>
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
        <input type="submit" name="requestSubmit" value="Submit" />
    </form>
    
    <?php 
    
    } else {
        echo "Please <a href='login.php'>Login</a> to make a request";
        
    }
    ?>
    
    <h2>Make a request</h2>
    
    <form method="post" id="sampleMakeRequest" action="makeRequest.php"> 
        <table>
            <tr>
                <td><label>Name of Person Who Request:</label></td>
                <td><input type="text" name="name" required /></td>
            </tr>
            <tr>
                <td><label>Request Type: </label></td>
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
        <input type="submit" name="requestSubmit" value="Submit" />
    </form>


</body>

</html>