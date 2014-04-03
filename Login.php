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

	if (document.Logform.Username.value == "")
	{
		alert("Please enter your Username!");
		return false;
	}

	if (document.Logform.Password.value == "")
	{
		alert("Please enter a Password!");
		return false;
	}

	return ( true );
}

//-->

</script>

<!--
	Lines 47-65 create a form and submit the information to the Logininfo.php page
-->

<form id="Logform" action="Logininfo.php" method="post">

<h1 id="Reghead">Login Below:</h1><br />

<div class="Logtable">
	<table id="Logtablein">
		<tr><td id="Logcell1">Username:</td><td id="Logcell2"><input name="Username" type="text" size="10" /></td></tr>
		<tr><td id="Logcell1">Password:</td><td id="Logcell2"><input name="Password" type="password" size="10" /></td></tr>
	</table>
</div>

<input type="submit" name="login" value="Login">
<input type="reset" name="clear" value="Clear">

<p>Thank You!</p>

</form>

</div>

<?php include './Call/Footer.php'; ?>