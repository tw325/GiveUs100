<h1>seniorcitizenconnect</h1>
<div id="menubar">
	<ul id="menu">
		<li><a <?php echo ($page == 'home') ? 'class="active"' : '';?> href="home.php">Home</a></li>
		<li><a <?php echo ($page == 'forum') ? 'class="active"' : '';?> href="forum.php">Forum</a></li>
		<li><a <?php echo ($page == 'requests') ? 'class="active"' : '';?> href="requests.php">Requests</a></li>
		<li><a <?php echo ($page == 'offers') ? 'class="active"' : '';?> href="offers.php">Offers</a></li>
		<li><input type="text" name="search" placeholder="Search...">
		<?php
		if ( isset( $_SESSION[ 'logged_user' ] ) ) {
			$username = $_SESSION[ 'logged_user' ];
			print ("<li class='user'>Hello, $username</li>");
		}

		?>

	</ul>
</div>