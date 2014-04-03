<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<!--
	Lines 13-55 define a Javascript function that checks if the user
	has provided a value in the specific fields of a form.
	If they have not it creates an alert box to tell them what they need to do.
-->

<script type="text/javascript">

<!--

function validate()
{

	if (document.regform.Full_Name.value == "")
	{
		alert("Please include your Full Name!");
		return false;
	}

	if (document.regform.Email.value == "")
	{
		alert("Please include your Email Address!");
		return false;
	}

	if (document.regform.Username.value == "")
	{
		alert("Please choose a Username!");
		return false;
	}

	if (document.regform.Password.value == "")
	{
		alert("Please provide a Password!");
		return false;
	}

	if (document.regform.Conf_Pass.value == "")
	{
		alert("Please confirm your Password!");
		return false;
	}

	return ( true );
}

//-->

</script>

<!--
	The lines beow create a table for user registration. The information is sent to Reginfo.php upon submit
-->

<form name="regform" id="Regform" action="Reginfo.php" onsubmit="return (validate());" method="post">

<h1 id="Reghead">Register Below:</h1><br />

<p>Fields marked with * are required</p><br />

<div class="Regtable">
	<table id="Regtablein">
		<tr><td id="Regcell1">Full Name*:</td><td id="Regcell2"><input name="Full_Name" type="text" size="30" /></td></tr>
		<tr><td id="Regcell1">Email Address*:</td><td id="Regcell2"><input name="Email" type="email" size="40" /></td></tr>
		<tr><td id="Regcell1">Username*:</td><td id="Regcell2"><input name="Username" type="text" size="10" /></td></tr>
		<tr><td id="Regcell1">Password*:</td><td id="Regcell2"><input name="Password" type="password" size="10" /></td></tr>
		<tr><td id="Regcell1">Confirm Password*:</td><td id="Regcell2"><input name="Conf_Pass" type="password" size="10" /></td></tr>
	</table>
</div>

<input type="submit" name="register" value="Register">
<input type="reset" name="clear" value="Reset">

<p>Thank You!</p>

</form>

</div>

<?php include './Call/Footer.php'; ?>