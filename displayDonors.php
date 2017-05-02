<?php session_start();?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Donars</title>
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

        $donors = $mysqli->query("SELECT * FROM donors");

        if ($requests){
            while($donors = $donor ->fetch_assoc() ){

            }
        }
    }
    ?>

    <h2>sample format</h2>

    <table class="donor">
        <tr>
            <td>
                <a href=""><img class="donorPhoto" src="images/user1.jpg"></a>
            </td>
            <td>
                <div>
                    <p>Donor: Kirk</p>
                    <p>Focus:xxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>

    <table class="donorsr">
        <tr>
            <td>
                <a href=""><img class="donorPhoto" src="images/user2.jpg"></a>
            </td>
            <td>
                <div>
                    <p>Donor: Spock</p>
                    <p>Focus:xxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <a heref="">Contact</a>
                </div>
            </td>
        </tr>
    </table>


  <?php include 'footer.php';?>
</body>

</html>
