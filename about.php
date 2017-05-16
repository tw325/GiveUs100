<?php session_start(); $page = 'about';?>

<!DOCTYPE html>
<html>
<head>
  <title>ABOUT</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <?php include 'navbar.php';?>
  <div class="content">
    <h1> ABOUT THIS PROJECT: </h1>
    <a href="downloads/FinalProjectDesignJourneyPart1Spring2017.docx">Part 1</a><br>
    <a href="downloads/FinalProjectPhase2.docx">Part 2</a><br>
    <a href="downloads/WebsiteLayout.pptx">Website Layout</a>
  </div>
  <?php include 'footer.php';?>
</body>

</html>

 <li><a onclick="toggle('requestSub')" <?php echo ($page == 'requests') ? 'id="active"' : '';?> href="requests.php">Requests</a></li>
        <li class="requestSub" <?php if ($page == 'requests'){ print("style = 'display: block'");} else{ print("style = 'display: none'");} ?> ><a <?php echo ($page == 'volunteer requests') ? 'id="active"' : '';?> href="displayVolunteerRequests.php">Volunteer Requests</a></li>
        <li class="requestSub" <?php if ($page == 'requests'){ print("style = 'display: block'");} else{ print("style = 'display: none'");} ?>><a <?php echo ($page == 'donation requests') ? 'id="active"' : '';?> href="displayDonationRequests.php">Donation Requests</a></li>

        <li><a onclick="toggle('offerSub')" <?php echo ($page == 'offers') ? 'id="active"' : '';?> href="offers.php">Offers</a></li>
          
        <li class="offerSub" <?php if ($page == 'offers'){ print("style = 'display: block'");} else{ print("style = 'display: none'");} ?> ><a <?php echo ($page == 'volunteer offers') ? 'id="active"' : '';?> href="displayVolunteerOffers.php">Volunteer Offers</a></li>
        <li class="offerSub" <?php if ($page == 'offers'){ print("style = 'display: block'");} else{ print("style = 'display: none'");} ?> ><a <?php echo ($page == 'donation offers') ? 'id="active"' : '';?> href="displayDonationOffers.php">Donation Offers</a></li>