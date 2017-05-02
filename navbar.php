<h1>seniorcitizenconnect</h1>

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
			echo '<li><a href="login.php">Log out</a></li>';
            
		}
 		else {
 			echo '<li><a href="login.php">Log in</a></li>';
 		}

		?>
	</ul>
</div>
<div id="menubar">
	<ul id="menu">
		<li><a <?php echo ($page == 'home') ? 'class="active"' : '';?> href="index.php">Home</a></li>
		<li><a <?php echo ($page == 'profile') ? 'class="active"' : '';?> href="profile.php">Profile</a></li>
		<li><a <?php echo ($page == 'forum') ? 'class="active"' : '';?> href="forum.php">Forum</a></li>
		<li><a <?php echo ($page == 'requests') ? 'class="active"' : '';?> href="requests.php">Requests</a></li>
		<li><a <?php echo ($page == 'offers') ? 'class="active"' : '';?> href="offers.php">Offers</a></li>
        
        <?php
        
        if ( isset( $_SESSION[ 'logged_user' ] ) ) {
			$username = $_SESSION[ 'logged_user' ];
            
            #connect to the database
            require_once 'config.php'; 
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
            
            #get the user type
            $userType = $mysqli->query("SELECT userType FROM Users WHERE username=$username")->fetch_assoc()['userType'];
            
        if ($userType == 'senior') {
        
        ?>
            <li><a <?php echo ($page == 'requests') ? 'class="active"' : '';?> href="makeRequest.php">Make a Request</a></li>
		
        <?php } 
        
        if ($userType == 'volunteer' or ($userType == 'career')){ ?>
 			<li><a <?php echo ($page == 'offers') ? 'class="active"' : '';?> href="makeOffer.php">Make an Offer</a></li>
 		
        <?php }
        
        }
        ?>
        
	</ul>
</div>

<div id="footerbar">
	<ul id="footer">
		<li><a <?php echo ($page == 'contact') ? 'class="active"' : '';?> href="contact.php">Contact Us</a></li>
		<li><a <?php echo ($page == 'help') ? 'class="active"' : '';?> href="help.php">Help</a></li>
		<li><a <?php echo ($page == 'about') ? 'class="active"' : '';?> href="about.php">About Us</a></li>
    <li style="float:right">&copy; 2017 Senior Citizen Connect</li>
	</ul>
</div>
