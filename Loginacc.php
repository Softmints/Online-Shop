<!--
	This page was created to proccess information from the Loginex.php form.
	The page is identical to the Logininfo.php page but offers
	different navigation options and sends the user back to the account page instead
	of the homepage.
-->

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<?php
	
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$EncryptPass = md5($Password);
	$temp = $_COOKIE['Temp'];

	$query = "SELECT * FROM Register WHERE Username='$Username' AND Password='$EncryptPass'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$Check = mysqli_num_rows($result);

	if($Check == 1) {

		setcookie('GG', $Username);

		header('Location: ./Account.php');
		
	}

	else {
		echo "<p id=\"Thankreg\"> Login Failed!</p>";
		echo "<div class=Reghome>";
		echo "<a href=Register.php>Haven't Registered?</a><br />";
		echo "<br />";
		echo "<a href=Loginex.php>Return to Login</a><br />";
		echo "<br />";
		echo "<a href=Account.php>Return to Account Page</a><br />";
		echo "<br />";
		echo "<a href=GGHome.php>Return Home</a>";
		echo "</div>";
	}
?>

</div>

<?php include './Call/Footer.php'; ?>