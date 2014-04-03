<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<?php

/*
	The lines below assign both cookies to variables and then removes them
	by adjusting the time of the cookies to be an hour into the past.
	Information found on stackoverflow and the php manual
*/
	
	$perm = $_COOKIE['GG'];
	$temp = $_COOKIE['Temp'];

	if(isset($_COOKIE['GG'])){
		setcookie('GG', $perm, time()-3600);
		setcookie('Temp', $temp, time()-3600, '/');
		header('Location: GGHome.php');
	}

?>

<div class="Reghome">
	<a href="Login.php">Return to Login</a><br />
	<br />
	<a href="GGHome.php">Return Home</a>
</div>

</div>

<?php include './Call/Footer.php'; ?>