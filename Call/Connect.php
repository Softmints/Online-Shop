<!--
	This file provides a connection to the sql database (based on information provided in lab sessions)
-->

<?php
	$DB_HOST = 'ephesus.cs.cf.ac.uk';
	$DB_NAME = 'c1335098';
	$DB_USER = 'c1335098';
	$DB_PASS = 'berlin';
	$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
?>