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

	if (document.feedform.Full_Name.value == "")
	{
		alert("Please include your Full Name!");
		return false;
	}

	if (document.feedform.Email.value == "")
	{
		alert("Please include your Email Address!");
		return false;
	}

	return ( true );
}

//-->

</script>

<!--
	Lines 50-92 create a form which consists of radio button options and text inputs.
	The radio buttons have been given the parameter checked to ensure that an option of
	my chossing is selected by default.
-->


<div class="Regtable">
<table id="tablecen">
<tr><td id="FeedLeft">

	<form name="feedform" id="feedform" action="Feedinfo.php" onsubmit="return (validate());" method="post">

	<h1 id="Reghead">Leave Feedback Below:</h1><br />

	<p>Fields marked with * are required</p>

		<div class="Regtable">
		<table id="Regtablein">
			<tr><td id="Regcell1">Full Name*:</td><td id="Regcell2"><input name="Full_Name" type="text" size="30" /></td></tr>
			<tr><td id="Regcell1">Email Address*:</td><td id="Regcell2"><input name="Email" type="email" size="40" /></td></tr>
			<tr><td id="Regcell1">Username:</td><td id="Regcell2"><input name="Username" type="text" size="10" /></td></tr>
			<tr><td id="Regcell1">Rate the Site*:</td>
				<ul>
					<td id="feedcell3">
						<li id="feedli"><input name="Star" type="radio" value="3 Stars" checked="checked" /> 3 Stars</li>
						<li id="feedli"><input name="Star" type="radio" value="2 Stars" /> 2 Stars</li>
						<li id="feedli"><input name="Star" type="radio" value="1 Star" /> 1 Star</li>
					</td>
				</ul>
			</tr>
			<tr><td id="Regcell1">Experience*:</td>
				<ul>
					<td id="feedcell3">
						<li id="feedli"><input name="Exp" type="radio" value="Great" checked="checked" /> Great</li>
						<li id="feedli"><input name="Exp" type="radio" value="Average" /> Average</li>
						<li id="feedli"><input name="Exp" type="radio" value="Awful" /> Awful</li>
					</td>
				</ul>
			</tr>
		</table>
		</div>

	<input type="submit" name="feedback" value="Submit">
	<input type="reset" name="clear" value="Reset">

	<p>Thank You!</p>

	</form>
</td>

<!--
	Lines 100-127 performs an SQL query which selects all information in the Feedback table
	which is provided by the above form. The query then chosses 2 rows by random to display
	allowing users to see different feedback left. The information is then output into an UL
-->

<td id="Feedright">

	<h1 id="Reghead">Previous Comments:</h1><br />

	<?php

	$query = "SELECT * FROM Feedback ORDER BY RAND() LIMIT 2";
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
			while($row = $result->fetch_assoc()) {
				echo "<ul>";
				echo "<li id=feedli>";
				echo "<p id=moretitle id=moretitle>Full Name: </p>";
				echo "<p>".$row['Full_Name']."</p>";
				echo "<p id=moretitle>Site Rating:</p>";
				echo "<p>".$row['Rate']."</p>";
				echo "<p id=moretitle>User Experience:</p>";
				echo "<p>".$row['Exp']."</p>";
				echo "</li>";
				echo "</ul>";
				echo "<br/>";
				echo "<br />";
			}
	?>

</table>
</div>

</div>

<?php include './Call/Footer.php'; ?>