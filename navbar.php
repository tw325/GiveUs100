<h1>seniorcitizenconnect</h1>
<div class="content">
  <div id="topbar">
    <ul id="header">
      <?php
      echo '<li><a href="index.php"><img alt="Home" src="img/home.png" width="20" height="20"></a></li>';
      echo '<li><a href="'.$_SERVER['REQUEST_URI'].'">'.$page.'</a></li>';
      echo '<li><input type="text" name="search" placeholder="Search..."></li>';
      echo '<li><input type="submit" value="Search"></li>';

      if ( isset( $_SESSION[ 'logged_user' ] ) ) {
        $username = $_SESSION[ 'logged_user' ];

        print ("<span class='user'><a href='profile.php'>Hello, $username</a></span>");
        echo '<li><a href="logout.php">Log out</a></li>';

      }
      else {
        echo '<li><a href="login.php">Log in</a></li>';
      }

      ?>
    </ul>
  </div>

  <table>
    <tr><td class="twincols">
      <ul id="menu">
        <li><a <?php echo ($page == 'home') ? 'class="active"' : '';?> href="index.php">Home</a></li>
        <li><a <?php echo ($page == 'profile') ? 'class="active"' : '';?> href="profile.php">Profile</a></li>
        <li><a <?php echo ($page == 'forum') ? 'class="active"' : '';?> href="forum.php">Forum</a></li>
        <li><a <?php echo ($page == 'requests') ? 'class="active"' : '';?> href="requests.php">Requests</a></li>
        <li><a <?php echo ($page == 'offers') ? 'class="active"' : '';?> href="offers.php">Offers</a></li>
        <li><a <?php echo ($page == 'help') ? 'class="active"' : '';?> href="help.php">Help</a></li>
        
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
