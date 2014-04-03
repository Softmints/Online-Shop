<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<?php

/*
	The variables below collect the information submitted by the Login.php page and assign them to variables.
	The $EncryptPass variable changes the $Password variable to have md5 encryption. This is needed as md5
	encryption is applied by the registeration proccess. For the SQL query to correctly select the row the
	passwords need to match exactly so the encryption has to be applied during the login proccess also.
*/

	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$EncryptPass = md5($Password);
	$temp = $_COOKIE['Temp'];

	$query = "SELECT * FROM Register WHERE Username='$Username' AND Password='$EncryptPass'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	$Check = mysqli_num_rows($result);

/*
	The lines below check if the results of the query exist in the table. If it does it applies a
	second cookie to accompany the Temp cookie assigned on the homepage. The 'GG' cookie is used throughout the
	site to check if the user is logged in and to associate any information to that 'account'. The user is then
	sent back to the homepage.
*/

	if($Check == 1) {

		setcookie('GG', $Username);

		header('Location: GGHome.php');
		
	}

/*
	The lines below check if the login fails then an error is shown and the user is given naviagtion options.
*/

	else {
		echo "<p id=\"Thankreg\"> Login Failed!</p>";
		echo "<div class=Reghome>";
		echo "<a href=Register.php>Haven't Registered?</a><br />";
		echo "<br />";
		echo "<a href=Login.php>Return to Login</a><br />";
		echo "<br />";
		echo "<a href=GGHome.php>Return Home</a>";
		echo "</div>";
	}
?>

</div>

<?php include './Call/Footer.php'; ?>