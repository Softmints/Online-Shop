<!--
	Lines 5-9 call the connect and header pages into this page
-->

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<!--
	Lines 17-41 define a Javascript function that checks if the user
	has provided a value in the specific fields of a form.
	If they have not it creates an alert box to tell them what they need to do.
-->

<script type="text/javascript">

<!--

function validate()
{

	if (document.changeform.Password.value == "")
	{
		alert("Please provide a Password!");
		return false;
	}

	if (document.changeform.Conf_Pass.value == "")
	{
		alert("Please confirm your Password!");
		return false;
	}

	return ( true );
}

//-->

</script>

<!--
	Lines 50-83 check if the 'GG' user cookie is present.
	If it is then an SQL query is run to get all data associated with that username.
	The information is then output for the user to view.
	If the cookie is not present then the user is taken to a login page
-->

	<h1 id="Reghead">Your Account</h1><br />

	<div class="Regtable">
	<table id="tablecen">
	<tr><td id="FeedLeft">

<?php

	if (isset($_COOKIE['GG'])){
		$cookie = $_COOKIE['GG'];

		$query = "SELECT * FROM Register WHERE Username='$cookie'";
					$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
					while($row = $result->fetch_assoc()) {

						echo "<p id=moretitle>Full Name:</p>";
						echo "<p id=moretext>".$row['Full_Name']."</p>";
						echo "<p id=moretitle>Email Address:</p>";
						echo "<p id=moretext>".$row['Email']."</p>";
						echo "<p id=moretitle>Username:</p>";
						echo "<p id=moretext>".$row['Username']."</p>";

					}

	}

	else {
		
		header("Location: ./Loginex.php");
	}

	echo "</td>";

?>

<!--
	Lines 90-115 check if the 'GG' user cookie is set and if so it will output a table
	which will allow users to change their passwords.
-->

	</td>

	<td id="Feedright">

<?php

	if (isset($_COOKIE['GG'])){
		$cookie = $_COOKIE['GG'];

	echo "<form name=changeform id=Regform action=changeinfo.php onsubmit=return (validate()); method=post>";

		echo "<h2 id=Acchead>Change Password:</h2><br />";

		echo "<div class=Regtable>";
		echo "<table id=Regtablein>";
			echo "<tr><td id=Regcell1>New Password*:</td><td id=Regcell2><input name=Password type=password size=10 /></td></tr>";
			echo "<tr><td id=Regcell1>Confirm Password*:</td><td id=Regcell2><input name=Conf_Pass type=password size=10 /></td></tr>";
		echo "</table>";
		echo "</div>";

		echo "<input type=submit name=change value=Change>";
		echo "<input type=reset name=clear value=Reset>";

	}

?>

	</table>
	</div>

	</div>

<?php include './Call/Footer.php'; ?>