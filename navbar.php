<div id="topbar-padding">
  <div id="topbar">
    <ul id="header">
      <?php
      echo '<li><a href="index.php"><img alt="Home" src="img/home.png" width="20" height="20">seniorcitizenconnect</a></li>';
      echo '<li><input type="text" name="search"> <input type="submit" value="GO"></li>';

      if ( isset( $_SESSION[ 'logged_user' ] ) ) {
        $username = $_SESSION[ 'logged_user' ];

        print ("<span class='user'><a href='profile.php'>Hello, $username</a></span>");
        echo '<li><a href="logout.php">log out</a></li>';

      }
      else {
        echo '<li><a href="login.php">log in</a></li>';
      }

      ?>
    </ul>
  </div>
</div>

<div class="content">
  <table>
    <tr><td class="twincols">
      <ul class="menu">
        <li><a <?php echo ($page == 'home') ? 'id="active"' : '';?> href="index.php">Home</a></li>
        <li><a <?php echo ($page == 'profile') ? 'id="active"' : '';?> href="profile.php">Profile</a></li>
        <li><a <?php echo ($page == 'requests') ? 'id="active"' : '';?> href="requests.php">Requests</a></li>
        <li><a <?php echo ($page == 'offers') ? 'id="active"' : '';?> href="offers.php">Offers</a></li>
        <li><a <?php echo ($page == 'help') ? 'id="active"' : '';?> href="help.php">Help</a></li>

        <?php

        if ( isset( $_SESSION[ 'logged_user' ] ) ) {
          $username = $_SESSION[ 'logged_user' ];

          #connect to the database
          require_once 'config.php';
          $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

          #get the user type
          $result = $mysqli->query("SELECT userType FROM users WHERE username='$username'");

          if ($result && $result->num_rows == 1) {

            $userType = $result->fetch_assoc()['userType'];


            if ($userType == 'senior') {

              ?>
              <li><a <?php echo ($page == 'requests') ? 'class="active"' : '';?> href="makeRequest.php">Make a Request</a></li>

              <?php }

              if ($userType == 'volunteer' or $userType == 'career'){ ?>
                <li><a <?php echo ($page == 'offers') ? 'class="active"' : '';?> href="makeOffer.php">Make an Offer</a></li>

                <?php }

              }
            }
            ?>

          </ul>
        </td>
        <td>
