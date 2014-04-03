<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<!--
	Lines 13-27 obtain information submitted by the feedback form via the $_POST variable.
	An SQL query is then performed which inserts the information into the Feedback table.
	The user is then shown a message and options to navigate from the page
-->

<?php
	$Full_Name = $_POST['Full_Name'];
	$Email = $_POST['Email'];
	$Username = $_POST['Username'];
	$Rate = $_POST['Star'];
	$Exp = $_POST['Exp'];

	$query = "INSERT INTO Feedback VALUES ('$Full_Name', '$Email', '$Username', '$Rate', '$Exp')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
	echo "<p id=\"Thankreg\"> Thank you for leaving feedback! </p>";
	echo "<div class=Reghome>";
	echo "<a href=GGHome.php>Return Home</a>";
	echo "</div>";

?>

</div>

<?php include './Call/Footer.php'; ?>