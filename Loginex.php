<!--
	This page was created to provide a way for users to login if they had
	tried to access the account page without being logged in.
	The page is identical to the Login.php page but submits the information to
	the Loginacc.php page instead of the Logininfo.php page.
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

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<form id="Logform" action="Loginacc.php" method="post">

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