<?php session_start(); $page = 'volunteer requests';?>

<!DOCTYPE html>
<html>
<head>
  <title>VOLUNTEER REQUESTS</title>
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

        if (isset($_POST['requestID']) && isset($_POST['description']) && trim($_POST['description'])!='' && trim($_POST['requestID'])!=''){
          $description=filter_var(trim($_POST['description']),FILTER_SANITIZE_STRING);
          $reqID = filter_var(trim($_POST['requestID']), FILTER_VALIDATE_INT);

          $reqs = $mysqli->query("SELECT * FROM request INNER JOIN users ON request.userID=users.userID WHERE request.requestID='$reqID'");

          if ($reqs && $reqs->num_rows === 1){

            $req=$reqs->fetch_assoc();

            $reqUser=$req['name'];

            $reqTitle=$req['requestTitle'];

            $sql = "INSERT INTO respondentoffers (userID, requestID, resOfferDescription) VALUES ('$id','$reqID','$description')";
            if ($mysqli->query($sql) === TRUE) {
              echo "<div class='successNotice'><h2>Your response to $reqTitle made by $reqUser is submitted successfully</h2></div>";
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

  $requests = $mysqli->query("SELECT * FROM request INNER JOIN users ON request.userID=users.userID WHERE request.requestType='$type'");


  if ($requests && $requests->num_rows >= 1){

    while($request = $requests->fetch_assoc() ){
      $requestID=$request['requestID'];
      $requestName=$request['name'];

      $profileURL=$request['profileURL'];
      $pictureURL=$request['pictureURL'];

      if ($request['preferredContact']==='phone'){
        $contact=$request['phone'];
      } else if ($request['preferredContact']==='email'){
        $contact=$request['email'];
      } else {
        $contact='Visit profile page';
      }

      $requestTitle=$request['requestTitle'];
      $requestDescription=$request['requestDescription'];
      $requestClosed=$request['requestClosed'];
      $requestTime=$request['requestTime'];
      $requestLocation=$request['requestLocation'];
      $requestTimeStamp=$request['requestTimeStamp'];

      print("<table class='request'>");
      print("<tr class=\"request-post\">");
      print("<td>");
      print("<a href='$profileURL'><img class='requestPhoto' alt='userPhoto' src='$pictureURL'></a>");
      print("<h2>$requestName</h2>");
      print("</td>");
      print("<td>");
      print("<p><b>$requestTitle</b></p>");
      print("<p>$requestTime</p>");
      print("<p>$requestLocation</p>");
      print("<p>$requestDescription</p>");
      print("<p>Contact: $contact</p>");
      print("<p>Status: $requestClosed</p>");
      print("<p>$requestTimeStamp</p>");
      print("</td>");
      print("</tr>");

      #display respondent offers to one request
      $responses = $mysqli->query("SELECT * FROM respondentoffers INNER JOIN request ON respondentoffers.requestID = request.requestID INNER JOIN users ON respondentoffers.userID=users.userID WHERE respondentoffers.requestID=$requestID");

      if ($responses && $responses->num_rows >= 1){
        while($response = $responses ->fetch_assoc() ){
          $offerName=$response['name'];
          $offerProfileURL=$response['profileURL'];
          $offerPictureURL=$response['pictureURL'];

          if ($response['preferredContact']==='phone'){
            $resContact=$response['phone'];
          } else if ($response['preferredContact']==='email'){
            $resContact=$response['email'];
          } else {
            $resContact='Visit profile page';
          }

          $resOfferDescription=$response['resOfferDescription'];
          $resOfferTimeStamp=$response['resOfferTimeStamp'];

          print("<tr class=\"request-comment\">");
          print("<td>");
          print("<a href='$offerProfileURL'><img class='offerPhoto' alt='userPhoto' src='$offerPictureURL'></a>");
          print("<p class=\"comment-name\">$offerName</p>");
          print("</td>");
          print("<td>");
          print("<p>$resOfferDescription</p>");
          print("<p>Contact: $resContact</p>");
          print("<p>$resOfferTimeStamp</p>");
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
          print("<form method='post' class='respondentOffers' action='displayVolunteerRequests.php'>");
          print("<input type='text' name='description' required> ");
          print("<input type='hidden' name='requestID' value='$requestID' required>");
          print("<input type='submit' name='respondSubmit' value='Submit'>");
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
        print("<p>Please <a href='login.php'>login</a> to respond to requests</p>");
        print("</td>");
        print("</tr>");
      }
      print("</table>");
    }
  }


  include 'footer.php';

  ?>

</body>

</html>
