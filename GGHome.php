<!--
	This file is the homepage. This page has limited information sotred on it
	but instead calls the information using the include function.
-->

<html>

<body>

<div class="bodydiv">

<?php include './Call/Connect.php'; ?>

<?php include './Call/Header.php'; ?>

<h1>Welcome to Gaming Gateway!</h1> 
<h2>The best gaming deals on the web!<br />
	<br />
	Use the dropdown menu below to view the
	gaming platforms and products available.<br />
	<br />
	Click the name of the product to view more details.<br />
</h2>

<?php include './Call/Games.php'; ?>

</div>

</body>

<?php include './Call/Footer.php'; ?>

</html>