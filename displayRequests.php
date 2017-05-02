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

        $requests = $mysqli->query("SELECT * FROM requests");

        if ($requests){
            while($requests = $request ->fetch_assoc() ){

            }
        }
    }

    ?>

     <table class="request">
        <tr>
            <td>
                <a href=""><img class="requestPhoto" src="images/user1.jpg"></a>
                <p>Name: Kirk</p>
            </td>
            <td>
                <div>
                    <p>Request</p>
                    <p>Type:xxxxxxxxxxxx</p>
                    <p>Date:xxxxxxxxxxxx</p>
                    <p>Location:xxxxxxxxxxxx</p>
                    <p>I need xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>

    <table class="request">
        <tr>
            <td>
                <a href=""><img class="requestPhoto" src="images/user2.jpg"></a>
                <p>Name: Spock</p>
            </td>
            <td>
                <div>
                    <p>Request</p>
                    <p>Type:xxxxxxxxxxxx</p>
                    <p>Date:xxxxxxxxxxxx</p>
                    <p>Location:xxxxxxxxxxxx</p>
                    <p>I need xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>

  <?php include 'footer.php';?>
</body>
</html>
