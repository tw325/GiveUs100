<?php session_start(); $page = 'offers';?>

<!DOCTYPE html>
<html>
<head>
  <title>REQUESTS</title>
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

    <h2>Offer</h2>
    <table class="offer">
        <tr>
            <td>
                <a href=""><img class="offerPhoto" alt="user" src="images/user1.jpg"></a>
                <p>Name: Kirk</p>
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

    <h2>Respondent Requests</h2>
    <table class="rquest">
        <tr>
            <td>
                <a href=""><img class="requestPhoto" alt="user" src="images/user2.jpg"></a>
                <p>Name: Spock</p>
            </td>
            <td>
                <div>
                    <p>Request for help</p>
                    <p>I hope you can help xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                </div>
            </td>
        </tr>
    </table>

    <table class="request">
        <tr>
            <td>
                <a href=""><img class="offerPhoto" alt="user" src="images/user2.jpg"></a>
                <p>Name: Spock</p>
            </td>
            <td>
                <div>
                    <p>Rquest for help</p>
                    <p>I hope you can help xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
                </div>
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
