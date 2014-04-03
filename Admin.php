<!--
	Lines 5-9 call the connect and header pages into this page
-->

<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<!--
	Lines 17-89 define a Javascript function that checks if the user
	has provided a value in the specific fields of a form.
	If they have not it creates an alert box to tell them what they need to do.
-->

<script type="text/javascript">

<!--

function validate()
{

	if (document.adminform.platform1.value == "")
	{
		alert("Please pick a Platform!");
		return false;
	}

	if (document.adminform.Name.value == "")
	{
		alert("Please include a Game Name!");
		return false;
	}

	if (document.adminform.Price.value == "")
	{
		alert("Please include a Price!");
		return false;
	}

	if (document.adminform.Image1.value == "")
	{
		alert("Please include an Image Path!");
		return false;
	}

	if (document.adminform.ID.value == "")
	{
		alert("Please include a Game ID!");
		return false;
	}

	if (document.adminform.PEGI.value == "")
	{
		alert("Please include a PEGI Rating!");
		return false;
	}

	if (document.adminform.Year.value == "")
	{
		alert("Please include a Year!");
		return false;
	}

	if (document.adminform.Genre.value == "")
	{
		alert("Please include a Genre!");
		return false;
	}

	if (document.adminform.Video.value == "")
	{
		alert("Please include a Video ID!");
		return false;
	}

	if (document.adminform.Meta.value == "")
	{
		alert("Please include a Metacritic Path!");
		return false;
	}

	return ( true );
}

//-->

</script>

<!--
	Lines 97-126 create a form allowing admin users to enter information to add new products.
	The placeholder parameter sets information that will show as a placeholder in a text box.
	This form sends information to Admininfo.php to be used with the $_POST variable
-->

<form name="adminform" id="Regform" action="Admininfo.php" onsubmit="return (validate());" method="post">

<h1 id="Reghead">Add a Game:</h1><br />

<p id="centre">Fields marked with * are required</p><br />

	<div class="Regtable">
	<table id="Regtablein">
		<tr><td id="Regcell1">Platform*:</td>
		<td><select name="platform1">
		<option value="choose">Please choose a platform...</option>
		<option value="Discount">Discount</option>
		<option value="Xbox">Xbox Games</option>
		<option value="Playstation">Playstation</option>
		<option value="PC">PC</option>
		</select></td></tr>
		<tr><td id="Regcell1">Name*:</td><td id="Regcell2"><input name="Name" type="text" size="30" /></td></tr>
		<tr><td id="Regcell1">Price*:</td><td id="Regcell2"><input name="Price" type="text" size="6" placeholder="e.g. 9.99" /></td></tr>
		<tr><td id="Regcell1">Image*:</td><td id="Regcell2"><input name="Image1" type="text" size="40" placeholder="e.g. ./images/Name.jpg" /></td></tr>
		<tr><td id="Regcell1">Product ID*:</td><td id="Regcell2"><input name="ID" type="text" size="3" /></td></tr>
		<tr><td id="Regcell1">PEGI Rating*:</td><td id="Regcell2"><input name="PEGI" type="text" size="4" placeholder="e.g. 16+" /></td></tr>
		<tr><td id="Regcell1">Release Year*:</td><td id="Regcell2"><input name="Year" type="text" size="4"/></td></tr>
		<tr><td id="Regcell1">Genre*:</td><td id="Regcell2"><input name="Genre" type="text" size="50" placeholder="e.g. RPG" /></td></tr>
		<tr><td id="Regcell1">IGN Video ID*:</td><td id="Regcell2"><input name="Video" type="text" size="20" placeholder="11 digit Youtube ID"/></td></tr>
		<tr><td id="Regcell1">Metacritic Link*:</td><td id="Regcell2"><input name="Meta" type="text" size="40" placeholder="e.g. /pc/hitman-3"/></td></tr>
	</table>
	</div>

<input type="submit" name="admin" value="Submit">
<input type="reset" name="clear" value="Reset">

<p>Thank You!</p>

</form>

</div>

<?php include './Call/Footer.php'; ?>