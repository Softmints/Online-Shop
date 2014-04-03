<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<?php
	$Full_Name = $_POST['Full_Name'];
	$Email = $_POST['Email'];
	$Username = $_POST['Username'];
	$Password = $_POST['Password'];
	$Conf_Pass = $_POST['Conf_Pass'];

	// Lines 15-16 apply md5 encrytion to the Password and Password confirmation the user has entered in the registration form
	$EncryptPass = md5($Password);
	$EncryptConf = md5($Conf_Pass);


	// The below line checks that the password and conf_pass variables match. If not an error is shown.
	if($Password != $Conf_Pass) {
		echo "<p id=\"Thankreg\"> Passwords do not match!</p>";
	}
	else{

		// If the Password and Conf_Pass match then the email entered is checked.
		$query = "SELECT * FROM Register WHERE Email='$Email'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		$Check_Email = mysqli_num_rows($result);

		if($Check_Email == 0){
			// If the Email is not in the database then the Username is checked.
			$query = "SELECT * FROM Register WHERE Username='$Username'";
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
			$Check_Username = mysqli_num_rows($result);

			if($Check_Username == 0){
				/* 
					If both the Email and Username are not in the database already then all information is inserted and
					registration is successful, a message is displayed and naviagtion options are available
				*/
				$query = "INSERT INTO Register VALUES ('$Full_Name', '$Email', '$Username', '$EncryptPass', '$EncryptConf')";
				$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
				echo "<p id=\"Thankreg\"> Thank you for registering! </p>";
				echo "<div class=Reghome>";
				echo "<a href=Login.php>Proceed to Login</a><br />";
				echo "<a href=GGHome.php>Return Home</a>";
				echo "</div>";
			}

			else { 
				// This is executed given an error and naviagtion options if the Username exists in the database.
				echo "<p id=\"Thankreg\"> Username already exists!</p>";
				echo "<div class=Reghome>";
				echo "<a href=Register.php>Return to Registration Page</a><br />";
				echo "<a href=GGHome.php>Return Home</a>";
				echo "</div>";
			}
		}

		else {
			// This is executed given an error and naviagtion options if the Email exists in the database. 
			echo "<p id=\"Thankreg\"> Email address already exists!</p>";
			echo "<div class=Reghome>";
			echo "<a href=Register.php>Return to Registration Page</a><br />";
			echo "<a href=GGHome.php>Return Home</a>";
			echo "</div>";
		}
	}
?>

</div>

<?php include './Call/Footer.php'; ?>

