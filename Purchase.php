<!--
	Lines 5-9 call the connect and header pages into this page
-->

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<!--
	The lines below delete all items from the Basket table where the user_id
	is the same as the 'GG' value set
-->

<?php
	$shopper = $_COOKIE['GG'];

	$query = "DELETE FROM Basket WHERE user_id = '$shopper'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	echo "<p id=\"Thankreg\"> Your items have been purchased! </p>";
	echo "<div class=Reghome>";
	echo "<a href=GGHome.php>Return Home</a>";
	echo "</div>";
?>

</div>

<?php include './Call/Footer.php'; ?>