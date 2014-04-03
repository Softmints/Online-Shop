<!--
	Lines 5-9 call the connect and header pages into this page
-->

<div class="bodydiv">

<?php include './Call/Connect.php'; ?>

<?php include './Call/Header.php'; ?>

<!--
	Lines 17-29 checks if the 'GG' user cookie is present. If it is it uses the value
	of the cookie to display a unique name for the basket page header.
	Else the varible is set to a default value.
-->

<?php

	$tprice = 0.0;

	if (isset($_COOKIE['GG'])){
		$cookie = $_COOKIE['GG'];
		echo "<h1 id=bhead>".$cookie."'s Basket</h1><br />";
	}

	else{
		$cookie = "User";
		echo "<h1 id=bhead>".$cookie."'s Basket</h1><br />";
	}

/*
	The length of the cart array is checked. if it is == to 0 then a message is displayed
	to inform the user that the basket is empty and provides them with a button to continue shopping.
	(Modified version of information given at Will's optional lecture)
*/

	if(count($cart) == 0){

		echo "<h1 id=bhead>Basket is empty!</h1><br />";
		echo "<a href=./GGHome.php><h1 id=bhead>Click here to continue shopping!</h1></a><br />";

	}

/*
	Else if the the cart is > 0 then a check is performed to find which cookie is set.
	Depending on the result of the check the basket is populated with results based on the appropriate query
	The price information is then added together to give a total value

*/

	else {

		echo "<div class=Btable>";
		echo "<table id=Regtablein>";

		if(isset($_COOKIE['GG'])){

			$cookie = $_COOKIE['GG'];
			$query = "SELECT * FROM Basket WHERE user_id='$cookie'";
		}

		else{
			$cookie = $_COOKIE['Temp'];
			$query = "SELECT * FROM Basket WHERE temp_id='$cookie'";
		}

		$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
		while($row = $result->fetch_assoc()) {

			echo "<tr>";
			echo "<td id=Bcell1><p>".$row['BName']."</p></td>";
			echo "<td id=Bcell2><img src=".$row['BImg']." id=basketpics alt=Game Cover></img></td>";
			echo "<td id=Bcell2><p>&pound;".$row['BPrice']."</p></td>";
			echo "<td id=Bcell3><a href='./Remove.php?game=".$row['product_id']."&gamename=".$row['BName']."'><img src='./images/Remove.png' alt=Remove></img></a></td>";
			echo "</tr>";
			$tprice = $tprice + $row['BPrice'];

		}
	}

?>
	</table>

<!--
	The following lines create a variable formated to show an int to 2dp for the total value
-->

	<?php
		$tprice = number_format($tprice, 2);
		echo "<h2 id=pricehead>Total Price = &pound;".$tprice."</h2>";
	?>

<!--
	The lines below add the purchase button and change where the link sends the user based on
	if the 'GG' cookie is present and if the cart array has items in it.
-->

	<?php
		if(isset($_COOKIE['GG']) AND (count($cart) > 0)){

			echo "<a href='./Purchase.php'><img src='./images/Purchase.png' id=purchase alt=Purchase></img></a>";

		}

		else if (empty($_COOKIE['GG']) AND (count($cart) > 0)){

			echo "<a href='./Loginpur.php'><img src='./images/Purchase.png' id=purchase alt=Purchase></img></a>";

		}

	?>
	
	</div>



</div>

<?php include './Call/Footer.php'; ?>