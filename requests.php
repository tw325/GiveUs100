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

    if ($requests && $requests->num_rows == 1){

      while($requests = $request ->fetch_assoc() ){

      }
    }
  }

  ?>

  <h1>Requests</h1>
  <table class="request">
    <tr class="request-post">
      <td>
        <a href=""><img class="requestPhoto" alt='user' src="img/kirk.jpg"></a>
        <h2>Kirk</h2>
      </td>
      <td><p>Request <br>
        I need xxxxxxxxxxxxxxxxx <br>
        Time:xxxxxxx <br>
        Location:xxxxxxx</p>
      </td>
    </tr>
    <tr class="request-comment">
      <td>
        <a href=""><img class="offerPhoto" alt="user" src="img/spock.jpg"></a>
        <p class="comment-name">Spock</p>
      </td>
      <td>
        <p>Offer to the Request</p>
        <p>I can xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
      </td>
    </tr>
    <tr class="request-comment">
      <td>
        <a href=""><img class="offerPhoto" alt="user" src="img/spock.jpg"></a>
        <p class="comment-name">Spock</p>
      </td>
      <td>
        <p>Offer to the Request</p>
        <p>I can xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
      </td>
    </tr>
    <tr>
      <td>
        <p>Respond:</p>
      </td>
      <td>
        <form method="post" class="sampleRespond" action="requests.php">
          <input type="text" name="descrption" required />
          <input type="submit" name="respondSubmit" value="Submit" />
        </form>
      </td>
    </tr>
  </table>

  <table class="request">
    <tr class="request-post">
      <td>
        <a href=""><img class="requestPhoto" alt="user" src="img/spock.jpg"></a>
        <h2>Spock</h2>
      </td>
      <td>
        <p>Request</p>
        <p>I need xxxxxxxxxxxxxxxxx for xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
        <p>Time:xxxxxxx</p>
        <p>Location:xxxxxxx</p>
      </td>
    </tr>
    <tr class="request-comment">
      <td>
        <a href=""><img class="offerPhoto" alt="user" src="img/spock.jpg"></a>
        <p class="comment-name">Spock</p>
      </td>
      <td>
        <p>Offer to the Request</p>
        <p>I can xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx</p>
      </td>
    </tr>
    <tr>
      <td>
        <p>Respond:</p>
      </td>
      <td>
        <form method="post" class="sampleRespond" action="requests.php">
          <input type="text" name="descrption" required />
          <input type="submit" name="respondSubmit" value="Submit" />
        </form>
      </td>
    </tr>
  </table>

  <?php
  include 'footer.php';
  ?>

</body>

</html>
