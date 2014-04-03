<!--
	Lines 5-9 call the connect and header pages into this page
-->

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<!--
	Lines 17-37 create variables based on information sent from the user clicking the add to basket button.
	If the 'Temp' cookie is present then an SQL query is performed to insert the appropriate values into the appropriate
	columns of the Basket table
-->

<?php
	
	$game = $_GET['id'];
	$gamename = $_GET['gamename'];
	$gameimg = $_GET['gameimg'];
	$gameprice = $_GET['gameprice'];
	$shopper = "";
	$gameplat = $_GET['gameplat'];
	$order = $_GET['gameorder'];
	$orderby = $_GET['orderby'];
	$More = $_GET['More'];

	if (isset($_COOKIE['Temp'])){
		$shopper = $_COOKIE['Temp'];

	$query = "INSERT INTO Basket (temp_id, product_id, BName, BImg, BPrice) VALUES ('$shopper', '$game', '$gamename', '$gameimg', '$gameprice')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	}

?>

<!--
	Lines 49-85 ensure that after the items are added the user is sent back to the homepage where they left off.
	Information from the URL is taken and then the header function is used in conjuction with this information.
	This means that if the user had arranged the products by Xbox titles in the order A-Z then that is what they will
	see when they are rediredted to the homepage, allowing the user to continue where they were and creating a seamless
	add item action.
	The 'more' variable is only present if the user added an item from the More Details page which means the user is sent back
	to the correct page they were viewing after adding an item
-->

<?php

if(empty($_GET['gameorder']) AND empty($_GET['orderby']) == true) {

	$order = 'product_id';
	$orderby = 'ASC';

}

	if($gameplat == 'Xbox'){
		header("Location: GGHome.php?platform=Xbox&price=XPrice&name=XName&image=XImg&link=XLink&order=$order&by=$orderby#listreturn");
	}

	else if($gameplat == 'Playstation'){
		header("Location: GGHome.php?platform=Playstation&price=PPrice&name=PName&image=PImg&link=PLink&order=$order&by=$orderby#listreturn");

	}

	else if($gameplat == 'PC'){
		header("Location: GGHome.php?platform=PC&price=PCPrice&name=PCName&image=PCImg&link=PCLink&order=$order&by=$orderby#listreturn");

	}

	else if($gameplat == 'Discount'){
		header("Location: GGHome.php?platform=Discount&price=TopPrice&name=TopName&image=TopImg&link=TopLink&order=$order&by=$orderby#listreturn");

	}

	if($More == true){
		header("Location: ./More.php?id=$game&gamename=$gamename&gameimg=$gameimg&gameprice=$gameprice&gameplat=$gameplat&gameorder=$order&orderby=$orderby#moreitem");
	}

?>

</div>

<?php include './Call/Footer.php'; ?>
