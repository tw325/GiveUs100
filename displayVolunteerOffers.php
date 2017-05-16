<?php session_start(); $page = 'volunteer offers';?>

<!DOCTYPE html>
<html>
<head>
  <title>VOLUNTEER OFFERS</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/main.js"></script>
</head>
<body>

  <?php

  include 'navbar.php';

  #connect to the database
  require_once 'config.php';
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['respondSubmit'])){
    if ( isset( $_SESSION[ 'logged_user' ] ) ) {

      $username = $_SESSION['logged_user'];

      $user = $mysqli->query("SELECT * FROM users WHERE username='$username'");

      if ($user && $user->num_rows === 1){

        $id = $user->fetch_assoc()['userID'];

        if (isset($_POST['offerID']) && isset($_POST['description']) && trim($_POST['description'])!='' && trim($_POST['offerID'])!=''){
          $description=filter_var(trim($_POST['description']),FILTER_SANITIZE_STRING);
          $offID = filter_var(trim($_POST['offerID']), FILTER_VALIDATE_INT);

          $offs = $mysqli->query("SELECT * FROM offer INNER JOIN users ON offer.userID=users.userID WHERE offer.offerID='$offID'");

          if ($offs && $offs->num_rows === 1){

            $off=$offs->fetch_assoc();

            $offUser=$off['name'];

            $offTitle=$off['offerTitle'];

            $sql = "INSERT INTO respondentrequests (userID, offerID, resRequestDescription) VALUES ('$id','$offID','$description')";

            if ($mysqli->query($sql) === TRUE) {
              echo "Your response to $offTitle made by $offUser is submitted successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $mysqli->error;
            }
          }
        }

      }
    }
  }

  #code for retreiving informatin from the database and format the way data displays on the website

  $type = 'Volunteer';

  $offers = $mysqli->query("SELECT * FROM offer INNER JOIN users ON offer.userID=users.userID WHERE offer.offerType='$type'");


  if ($offers && $offers->num_rows >= 1 ){

    while($offer = $offers->fetch_assoc()){
      $offerID=$offer['offerID'];
      $offerName=$offer['name'];

      $profileURL=$offer['profileURL'];
      $pictureURL=$offer['pictureURL'];

      if ($offer['preferredContact'] ==='phone'){
        $contact=$offer['phone'];
      } else if ($offer['preferredContact'] === 'email'){
        $contact=$offer['email'];
      } else {
        $contact='Visit profile page';
      }

      $offerTitle=$offer['offerTitle'];
      $offerDescription=$offer['offerDescription'];
      $offerClosed=$offer['offerClosed'];
      $offerTime=$offer['offerTime'];
      $offerLocation=$offer['offerLocation'];
      $offerTimeStamp=$offer['offerTimeStamp'];

      print("<table class='offer'>");
      print("<tbody>");
      print("<tr>");
      print("<td>");
      print("<a href='$profileURL'><img class='offerPhoto' alt='userPhoto' src='$pictureURL'></a>");
      print("<h2>$offerName</h2>");
      print("</td>");
      print("<td>");
      print("<div>");
      print("<p><b>$offerTitle</b></p>");
      print("<p>$offerTime</p>");
      print("<p>$offerLocation</p>");
      print("<p>$offerDescription</p>");
      print("<p>Contact: $contact</p>");
      print("<p>Status: $offerClosed</p>");
      print("<p>$offerTimeStamp</p>");
      print("</div>");
      print("</td>");
      print("</tr>");

      #display respondent requests to one offer
      $responses = $mysqli->query("SELECT * FROM respondentrequests INNER JOIN offer ON respondentrequests.offerID=offer.offerID INNER JOIN users ON respondentrequests.userID=users.userID WHERE respondentrequests.offerID=$offerID");

      if ($responses && $responses->num_rows >= 1){
        while($response = $responses ->fetch_assoc() ){
          $requestName=$response['name'];
          $requestProfileURL=$response['profileURL'];
          $requestPictureURL=$response['pictureURL'];

          if ($response['preferredContact']==='phone'){
            $resContact=$response['phone'];
          } else if ($response['preferredContact']==='email'){
            $resContact=$response['email'];
          } else {
            $resContact='Visit profile page';
          }

          $resRequestDescription=$response['resRequestDescription'];
          $resRequestTimeStamp=$response['resRequestTimeStamp'];

          print("<tr>");
          print("<td>");
          print("<a href='$requestProfileURL'><img class='requestPhoto' alt='userPhoto' src='$requestPictureURL'></a>");
          print("<p class=\"comment-name\">$requestName</p>");
          print("</td>");
          print("<td>");
          print("<p>$resRequestDescription</p>");
          print("<p>Contact: $resContact</p>");
          print("<p>$resRequestTimeStamp</p>");
          print("</td>");
          print("</tr>");

        }
      }

      #check if the user is login
      if ( isset( $_SESSION[ 'logged_user' ] ) ) {

        require_once 'config.php';
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");

        if ($result && $result->num_rows == 1) {
          $row = $result->fetch_assoc();
          $pictureURL = $row['pictureURL'];

          print("<tr>");
          print("<td>");
          print("<p><a href='profile.php'><img class='requestPhoto' alt='userPhoto' src='$pictureURL'></a></p>");
          print("</td>");
          print("<td>");
          print("<form method='post' class='respondentRequests' action='displayDonationOffers.php'>");
          print("<input type='text' name='description' required>");
          print("<input type='hidden' name='offerID' value='$offerID' required>");
          print(" <input type='submit' name='respondSubmit' value='Submit'>");
          print("</form>");
          print("</td>");
          print("</tr>");
        }
      } else {
        print("<tr>");
        print("<td>");
        print("<p>Notice: </p>");
        print("</td>");
        print("<td>");
        print("<p>Please <a href='login.php'>login</a> to respond to offers</p>");
        print("</td>");
        print("</tr>");
      }

      print("</tbody>");
      print("</table>");

    }
  }



  include 'footer.php';

  ?>

</body>

</html>
