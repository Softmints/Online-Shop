<!--
	Lines 5-9 call the connect and header pages into this page
-->

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<?php
	
	$Password = $_POST['Password'];
	$Conf_Pass = $_POST['Conf_Pass'];
	$EncryptPass = md5($Password);
	$EncryptConf = md5($Conf_Pass);
	$perm = $_COOKIE['GG'];

/*
	The lines below check if the passwords entered match. If they do not then
	the user is shown an error and navigation options
*/

	if($Password != $Conf_Pass) {
		echo "<p id=\"Thankreg\"> Passwords do not match!</p>";
		echo "<div class=Reghome>";
		echo "<a href=Account.php>Return to Account Page</a><br />";
		echo "<br />";
		echo "<a href=GGHome.php>Return Home</a>";
		echo "</div>";
	}

/*
	If the passwords match then the lines below perform an SQL query to
	find the user based on the cookie value.
*/

	else{

		$query = "SELECT * FROM Register WHERE Username='$perm'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$Check = mysqli_num_rows($result);

/*
	The below lines check if there is a row with the result of the above query exiting in the table.
	If the user exists then an SQL query is run to update the users password and password comfirmation
	to the new passwords entered
*/

		if($Check == 1){

			$query = "UPDATE Register SET Password='$EncryptPass', Conf_Pass='$EncryptConf' WHERE Username='$perm'";
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

			echo "<p id=\"Thankreg\"> Your Password Has Been Changed! </p>";
			echo "<div class=Reghome>";
			echo "<a href=Account.php>Return to Account Page</a><br />";
			echo "<br />";
			echo "<a href=GGHome.php>Return Home</a>";
			echo "</div>";
			
		}

/*
	If the user does not exist then the password change fails and will
	display an error with naviagtion options
*/

		else{
			echo "<p id=\"Thankreg\"> Password Change Failed!</p>";
			echo "<div class=Reghome>";
			echo "<a href=Account.php>Return to Account Page</a><br />";
			echo "<br />";
			echo "<a href=GGHome.php>Return Home</a>";
			echo "</div>";
		}

	}

?>

</div>

<?php include './Call/Footer.php'; ?>