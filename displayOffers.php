<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Volunteer Offers</title>
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

    #retreive data from the database
        $offers = $mysqli->query("SELECT * FROM offers");


    #iterate and format the way data would display on the website
        if ($requests){
            while($offers = $offer ->fetch_assoc() ){

            }
        }
    }

    ?>

    <table class="offer">
        <tr>
            <td>
                <a href=""><img class="offerPhoto" src="images/user1.jpg"></a>
            </td>
            <td>
                <div>
                    <p>Volunteer: Kirk</p>
                    <p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>

    <table class="offer">
        <tr>
            <td>
                <a href=""><img class="offerPhoto" src="images/user2.jpg"></a>
            </td>
            <td>
                <div>
                    <p>Volunteer: Spock</p>
                    <p>xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>

  <?php include 'footer.php';?>
</body>

</html>
