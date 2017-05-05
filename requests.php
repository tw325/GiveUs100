<?php session_start(); $page = 'requests';?>

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
    $requests = $mysqli->query("SELECT * FROM requests");

    if ($requests && requests->num_rows == 1){

      while($requests = $request ->fetch_assoc() ){

      }
    }
  }

  ?>

  <h2>Request</h2>
    <table class="request">
      <tr>
        <td>
          <a href=""><img class="requestPhoto" src="images/user1.jpg"></a>
          <p>Name: Kirk</p>
        </td>
        <td>
          <div>
            <p>Request</p>
            <p>I need xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
            <p>Time:xxxxxxx</p>
            <p>Location:xxxxxxx</p>
          </div>
        </td>
      </tr><br>
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

    <h2>Respondent Offers</h2>
    <table class="offer">
      <tr>
        <td>
          <a href=""><img class="offerPhoto" src="images/user2.jpg"></a>
          <p>Name: Spock</p>
        </td>
        <td>
          <div>
            <p>Offer to the Request</p>
            <p>I can xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
          </div>
        </td>
      </tr>
    </table>

    <table class="offer">
      <tr>
        <td>
          <a href=""><img class="offerPhoto" src="images/user2.jpg"></a>
          <p>Name: Spock</p>
        </td>
        <td>
          <div>
            <p>Offer to the Request</p>
            <p>I can xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
          </div>
        </td>
      </tr>
    </table>

    <h2>Request</h2>
    <table class="request">
      <tr>
        <td>
          <a href=""><img class="requestPhoto" src="images/user2.jpg"></a>
          <p>Name: Spock</p>
        </td>
        <td>
          <div>
            <p>Request</p>
            <p>I need xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
            <p>Time:xxxxxxx</p>
            <p>Location:xxxxxxx</p>
          </div>
        </td><br>
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

    <h2>Respondent Offers</h2>
    <table class="offer">
      <tr>
        <td>
          <a href=""><img class="offerPhoto" src="images/user1.jpg"></a>
          <p>Name: Kirk</p>
        </td>
        <td>
          <div>
            <p>Donation Request</p>
            <p>I can xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
          </div>
        </td>
      </tr>
    </table>
</td></tr></table>
</div>
  <?php include 'footer.php';?>

</body>

</html>
