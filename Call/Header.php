<!--
	Lines 11-30 provide the page with a and check to see if a cookie is set.
	If the cookie is not set it sets one for the user.
	
	Lines 32-38 check if another cookie (cookie provided on login) is set.
	If the login cookie is set then an sql query is performed to insert the cookie value 
	into the user_id column where the 'Temp' cookie value is present.
	This allows the user to have a persistent basket when logging in and out
--> 

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Gaming Gateway</title>
		<link rel="stylesheet" href="style.css" type="text/css" />
	</head>

	<?php include './Call/Connect.php'; ?>
		
	<h1 id="Banner">Gaming Gateway</h1>

<?php

	if(isset($_COOKIE['Temp'])){
		$temp = $_COOKIE['Temp'];
	}

	else{
		/* 
			This line sets the temp cookie that allows non registered users to add items to a basket.
			uniqid() creates a value of the cookie based on the current time in microseconds (php manual).
			The '/' is required as this cookie is set in a subditectory, the / means that the cookie should
			be available in all directories
		*/
		setcookie('Temp', uniqid(), time()+3600, '/');
	}

	if(isset($_COOKIE['GG'])){
		$perm = $_COOKIE['GG'];

		$query = "UPDATE Basket SET user_id='$perm' WHERE temp_id='$temp'";
		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	}

?>

<!-- 
	Lines 47-64 change if a login or logout button is displayed on the navigation bar
	based on if the 'GG' cookie is present ('GG' cookie is set at login)
-->

	<div id="Nav">
	<ul>
		<li>
			<a href="GGHome.php">Home</a>
			<?php
				if(isset($_COOKIE['GG'])){
					$cookie = $_COOKIE['GG'];

					echo "<a href='./Logoutinfo.php'>Logout (".$cookie.")</a>";
				}

				else {

					echo "<a href='./Login.php'>Login</a>";

				}

			?>

<!--
	Lines 76-126 create futher links on the nav bar and update an empty array (cart) with
	any product ids that are found associated with either of the assigned cookies.
	
	The link is then set to display how many items are in the cart array by displaying the length
	of the array (based on examples given by Will's optional web app lecture)

	The nav bar will also display an extra button based on wether the value of 'GG' cookie is present in the Admin table
-->

			<a href="Register.php">Register</a>
			<a href="Feedback.php">Feedback Page</a>
			<a href="Account">My Account</a>
			<?php
				$cart = array();
				if(isset($_COOKIE['GG'])){
					$query = "SELECT * FROM Basket WHERE user_id = '".$_COOKIE['GG']."'";
					$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
					while($row = $result->fetch_assoc()){
						$cart[] = $row['product_id'];
					}

					echo "<a href='./Basket.php'>Basket (".count($cart).")</a>";
				}

				else if(isset($_COOKIE['Temp'])){
					$query = "SELECT * FROM Basket WHERE temp_id = '".$_COOKIE['Temp']."'";
					$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
					while($row = $result->fetch_assoc()){
						$cart[] = $row['product_id'];
					}

					echo "<a href='./Basket.php'>Basket (".count($cart).")</a>";
				}

				else{

					echo "<a href='./Basket.php'>Basket (Refresh Page)</a>";
				}

			?>
			<?php
				if(isset($_COOKIE['GG'])){
					$query = "SELECT * FROM Admin WHERE admin_id = '".$_COOKIE['GG']."'";
					$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
					$Check = mysqli_num_rows($result);

					if ($Check == 1) {

						echo "<a href='./Admin.php'>Admin Tools</a>";

					}

				}
			?>
			
		</li>
	</ul>
	</div>

	</hr>