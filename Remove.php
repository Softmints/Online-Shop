<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<?php
	
	$game = $_GET['game'];
	$gamename = $_GET['gamename'];
	$shopper = "";

/*
	Lines **** check if the 'Temp' cookie is set and the 'GG' cookie is not set.
	If this is true then an SQL query removes a row from the Basket table where
	the temp_id in the row is the same as the current 'Temp' cookie and the
	product_id in the row is the same as the current product selected.
*/

	if (isset($_COOKIE['Temp']) and (empty($_COOKIE['GG']))){
		$shopper = $_COOKIE['Temp'];

	$query = "DELETE FROM Basket WHERE temp_id = '$shopper' AND product_id = '$game'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	header('Location: Basket.php#Regtablein');

	}

/*
	If the 'GG' cookie IS present then the query is run using the user_id column instead.
	This allows users to delete items if they log out and get given a new Temp cookie
*/

	else if (isset($_COOKIE['GG'])){
		$shopper = $_COOKIE['GG'];

	$query = "DELETE FROM Basket WHERE user_id = '$shopper' AND product_id = '$game'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	header('Location: Basket.php#Regtablein');

	}

?>

<?php include './Call/Footer.php'; ?>
