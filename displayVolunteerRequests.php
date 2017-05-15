<?php session_start(); $page = 'Volunteer Requests';?>

<!DOCTYPE html>
<html>
<head>
  <title>VOLUNTEER REQUESTS</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="js/main.js"></script>
</head>
<body>
    
    <h1>CODE IMPLEMENTATION BASICALLY FINISHED</h1>
    
    <?php

    include 'navbar.php';
    #connect to the database
    require_once 'config.php';
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if (isset($_POST['respondSubmit'])){
        if ( isset( $_SESSION[ 'logged_user' ] ) ) {
            $username = $_SESSION['logged_user'];
            
            $user = $mysqli->query("SELECT * FROM users WHERE username=$username");
            
            if ($user && $user->num_rows >= 1){
                $id = $user->fetch_assoc()['userID'];
        
                if (isset($_POST['timeStamp']) && isset($_POST['requestID']) && isset($_POST['description']) && trim($_POST['description'])!='' && trim($_POST['requestID'])!='' && trim($_POST['timeStamp'])!=''){
                    $description=filter_var(trim($_POST['description']),FILTER_SANITIZE_STRING);
                    $reqID = filter_var(trim($_POST['requestID']), FILTER_VALIDATE_INT);
                    $timeStamp = filter_var(trim($_POST['timeStamp']),FILTER_SANITIZE_STRING);
                    
                    $req = $mysqli->query("SELECT * FROM requests INNER JOIN users ON request.userID=users.userID WHERE requestID=$reqID");
                    
                    if ($req && $req->num_rows >= 1){
                        
                        $reqUser=$req['name'];
                        
                        $reqTitle=$req['requestTitle'];
                    
                        $sql = "INSERT INTO respondentoffers (userID, requestID, resOfferDescription, resOfferTimeStamp) VALUES ('$id','$reqID','$description','$timeStamp')";
                        if ($mysqli->query($sql) === TRUE) {
                            echo "Your response to $reqTitle made by $reqUser is submitted successfully";
                        } else {
                            echo "Error: " . $sql . "<br>" . $mysqli->error;
                        }
                    }
                }
            
            }
        }
    }
    
    #code for retreiving informatin from the database and format the way data displays on the website
      
    $type = 'volunteer';
        
    $requests = $mysqli->query("SELECT * FROM requests INNER JOIN users ON requests.userID=users.userID WHERE requestType=$type");
      

    if ($requests && $requests->num_rows == 1){

      while($requests = $request ->fetch_assoc() ){
          $requestID=$request['requestID'];
          $requestName=$request['name'];
          
          $profileURL=$request['profileURL'];
          $pictureURL=$request['pictureURL'];
          
          if ($request['preferredContact']=='phone'){
              $contact=$request['phone'];
          } else if ($request['preferredContact']=='email'){
              $contact=$request['email'];
          }
          
          $requestTitle=$request['requestTitle'];
          $requestDescription=$request['requestDescription'];
          $requestClosed=$request['requestClosed'];
          $requestTime=$request['requestTime'];
          $requestLocation=$request['requestLocation'];
          $requestTimeStamp=$request['requestTimeStamp'];
          
          print("<table class='request'>");
          print("<tbody>");
          print("<tr>");
          print("<td>");
          print("<a href='$profileURL'><img class='requestPhoto' alt='userPhoto' src='$pictureURL'></a>");
          print("<p>Name: $requestName</p>");
          print("</td>");
          print("<td>");
          print("<div>");
          print("<h3>$requestTitle</h3>");
          print("<p>$requestTime</p>");
          print("<p>$requestLocation</p>");
          print("<p>$requestDescription</p>");
          print("<p>Contact: $contact</p>");
          print("<p>$requestTimeStamp</p>");
          print("</div>");
          print("</td>");
          print("</tr>");
          
          #check if the user is login
          if ( isset( $_SESSION[ 'logged_user' ] ) ) {
              print("<tr>");
              print("<td>");
              print("<p>Respond to this request:</p>");
              print("</td>");
              print("<td>");
              print("<form method='post' class='responddentOffers' action='requests.php'>");
              print("Description: <input type='text' name='descrption' required>");
              print("<input class='hidden' type='text' name='requestID' value='$requstID' required>");
              print("<input id='volunteerResOfferDate' class='hidden' type='text' name='timeStamp' required>");
              print("<input type='submit' name='respondSubmit' value='Submit'>");
              print("</form>");
              print("</td>");
              print("</tr>");
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
          
          print("</tbody>");
          print("</table>");
          
          #display respondent offers to one request
          $responses = $mysqli->query("SELECT * FROM respondentoffers INNER JOIN requests ON respondentoffers.requestID INNER JOIN requests.requestID INNER JOIN users ON respondentoffers.userID=users.userID WHERE requests.requestID=$requestID");
          
          if ($responses && $responses->num_rows >= 1){
              while($responses = $response ->fetch_assoc() ){
                  $offerName=$response['name'];
                  $offerProfileURL=$response['profileURL'];
                  $offerPictureURL=$response['pictureURL'];
          
                  if ($response['preferredContact']=='phone'){
                      $resContact=$response['phone'];
                  } else if ($response['preferredContact']=='email'){
                      $resContact=$response['email'];
                  }
          
                  $resOfferDescription=$response['resOfferDescription'];
                  $resOfferTimeStamp=$response['resOfferTimeStamp'];
          
                  print("<table class='resOffer'>");
                  print("<tbody>");
                  print("<tr>");
                  print("<td>");
                  print("<a href='$offerProfileURL'><img class='requestPhoto' alt='userPhoto' src='$offerPictureURL'></a>");
                  print("<p>Name: $offerName</p>");
                  print("</td>");
                  print("<td>");
                  print("<div>");
                  print("<p>$resOfferDescription</p>");
                  print("<p>Contact: $resContact</p>");
                  print("<p>$resOfferTimeStamp</p>");
                  print("</div>");
                  print("</td>");
                  print("</tr>");
                  print("</tbody>");
                  print("</table>");
              
            }
          }
        }
    }

  
        include 'footer.php';
    
?>

</body>

</html>
