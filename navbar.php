<h1>seniorcitizenconnect</h1>
<div id="topbar">
	<ul id="header">
		<?php echo '<li><a href="'.$_SERVER['REQUEST_URI'].'">'.$page.'<a></li>'; 
		echo '<li><input type="text" name="search" placeholder="Search..."></li>';
		if ( isset( $_SESSION[ 'logged_user' ] ) ) {
			$username = $_SESSION[ 'logged_user' ];
			echo '<li><a href="login.php">Log out</a></li>';
		}
		else {
			echo '<li><a href="login.php">Log in</a></li>';
		}

		?>
	</ul>
</div>
<div id="sidebar">
	<ul id="menu">
		<li><a <?php echo ($page == 'home') ? 'class="active"' : '';?> href="home.php">Home</a></li>
		<li><a <?php echo ($page == 'profile') ? 'class="active"' : '';?> href="profile.php">Profile</a></li>
		<li><a <?php echo ($page == 'forum') ? 'class="active"' : '';?> href="forum.php">Forum</a></li>
		<li><a <?php echo ($page == 'requests') ? 'class="active"' : '';?> href="requests.php">Requests</a></li>
		<li><a <?php echo ($page == 'offers') ? 'class="active"' : '';?> href="offers.php">Offers</a></li>
	</ul>
</div>


