<!--
	Lines 4-8 call the connect and header pages into this page
-->

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<!--
	Lines 18-40 assign variables based on the $_POST variable sent from the Admin form.
	An SQL query is performed to add all of the values into a specific table (based on the variable $Platform)
	Information is then output to inform the admin user that the item has been added and allows them options
	to navigate from the page
--> 

<?php
	
	$Platform = $_POST['platform1'];
	$Name = $_POST['Name'];
	$Price = $_POST['Price'];
	$Image = $_POST['Image1'];
	$Id = $_POST['ID'];
	$Pegi = $_POST['PEGI'];
	$Year = $_POST['Year'];
	$Genre = $_POST['Genre'];
	$Video = $_POST['Video'];
	$Meta = $_POST['Meta'];

	$query = "INSERT INTO $Platform VALUES ('$Name', '$Price', '$Image', '$Id', '$Pegi', '$Year', '$Genre', '$Video', '$Meta')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	echo "<p id=\"Thankreg\"> Item Added! </p>";
	echo "<div class=Reghome>";
	echo "<a href=Admin.php>Return to Admin Tools</a><br />";
	echo "<a href=GGHome.php>Return Home</a>";
	echo "</div>";

?>