<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Service Providers</title>
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
        $careers = $mysqli->query("SELECT * FROM careers");


    #iterate and format the way data would display on the website
        if ($careers){
            while($careers = $career ->fetch_assoc() ){

            }
        }
    }

    ?>

    <table class="serviceProvider">
        <tr>
            <td>
                <a href=""><img class="careerPhoto" src="images/user1.jpg"></a>
            </td>
            <td>
                <div>
                    <p>Kirk</p>
                    <p>Services provided:xxxxxxxxxxxxxxxxxxxxxxxx </p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>

    <table class="serviceProvider">
        <tr>
            <td>
                <a href=""><img class="careerPhoto" src="images/user2.jpg"></a>
            </td>
            <td>
                <div>
                    <p>Spock</p>
                    <p>Services provided:xxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>

  <?php include 'footer.php';?>
</body>

</html>>
