<?php session_start(); $page = 'offers';?>

<!DOCTYPE html>
<html>
<head>
  <title>SAMPLE OFFERS</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php

    include 'navbar.php';

    #connect to the database
    require_once 'config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    #check if the user is login
    if ( isset( $_SESSION[ 'logged_user' ] ) ) {
        $logged_user = $_SESSION[ 'logged_user' ];

        #code for retreiving informatin from the database and format the way data displays on the website
        $offers = $mysqli->query("SELECT * FROM offers");

        if ($offers && $offerss->num_rows == 1){

            while($offers = $offer ->fetch_assoc() ){

            }
        }
    }

    ?>

    <h1>Sample Offer</h1>
    <table class="offer">
        <tr>
            <td>
                <a href=""><img class="offerPhoto" alt="user" src="img/kirk.jpg"></a>
                <h2>Kirk</h2>
            </td>
            <td>
                <div>
                    <p>Offer</p>
                    <p>I can xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                    <p>Time:xxxxxxx</p>
                    <p>Location:xxxxxxx</p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <a href=""><img class="offerPhoto" alt="user" src="img/kirk.jpg"></a>
                <p>Kirk</p>
            </td>
            <td>
                <div>
                    <p>Response</p>
                    <p>I would like xxxxxxxxxxxxxxxxx x</p>
                    <p>Time:xxxxxxx</p>
                    <p>Location:xxxxxxx</p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <p>Respond:</p>
            </td>
            <td>
                <form method="post" id="sampleRespond" action="requests.php">
                    <input type="text" name="descrption" required />
                    <input type="submit" name="respondSubmit" value="Submit" />
                </form>
            </td>
        </tr>
    </table>

<?php
echo'</td></tr></table>
</div>';

  include 'footer.php';

?>

</body>

</html>
