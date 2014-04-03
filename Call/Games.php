<!--
	Lines 6-16 create a dropdown menu which uses Javascript to select the value and execute without having to submit via buttons.
	The values append the URL with appropriate information to use with a $_GET variable.
	Some information for OnChange in line 8 was obtained via W3Schools.
	The #listreturn at the end of the urls mean that the user is taken back to the element with that id.
	This means upon redirection the user is not sent back to the top of the page. This allows users to add items or change dropdown values with ease. 
-->
<div class="formplatdiv">
<form id="formplat" name="formplat">
<select name="plat" OnChange="location.href=formplat.plat.options[selectedIndex].value">
	<option value='choose'>Please choose a platform...</option>
	<option value="GGHome.php?platform=Discount&price=TopPrice&name=TopName&image=TopImg&link=TopLink&order=product_id&by=DESC#listreturn">Discount Games</option>
	<option value="GGHome.php?platform=Xbox&price=XPrice&name=XName&image=XImg&link=XLink&order=product_id&by=DESC#listreturn">Xbox Games</option>
	<option value="GGHome.php?platform=Playstation&price=PPrice&name=PName&image=PImg&link=PLink&order=product_id&by=DESC#listreturn">Playstation Games</option>
	<option value="GGHome.php?platform=PC&price=PCPrice&name=PCName&image=PCImg&link=PCLink&order=product_id&by=DESC#listreturn">PC Games</option>
</select>
</form>
</div>

<!--
	Lines 24-123 assign variables based on the information provided by the dropdown menu above.
	Lines 32-42 provide "default" values if nothing has been selected.
	Lines 59-120 create 4 seperate dropdown menus which change depending on the $plats variable.
	This was created to allow ordering of information through 4 different sql tables.
-->
		<?php
			$plats = "";
			$prices = "";
			$names = "";
			$imgs = "";
			$links = "";
			$order = "";
			$by = "";
			$button = "cartbutton.png";

			if (empty($_GET['platform']) AND empty($_GET['sort']) == true) {
				$plats = "Discount";
				$prices = "TopPrice";
				$names = "TopName";
				$imgs = "TopImg";
				$links = "TopLink";
				$order = "product_id";
				$by = "ASC";
				$button = "cartbutton.png";

				echo "<h1 id=plathead>".$plats." Games</h1>";
			}
			
			else {
				$plats = $_GET['platform'];
				$prices = $_GET['price'];
				$names = $_GET['name'];
				$imgs = $_GET['image'];
				$links = $_GET['link'];
				$order = $_GET['order'];
				$by = $_GET['by'];
				$button = "cartbutton.png";

				echo "<h1 id=plathead>".$plats." Games</h1>";
			}

			if ($plats == 'Discount') {

				echo "<div class=formorderdiv>";
				echo "<form id=formorder name=formorder>";
				echo "<select name=order OnChange=location.href=formorder.order.options[selectedIndex].value>";
				echo "<option value='order'>Order by...</option>";
				echo "<option value=GGHome.php?platform=Discount&price=TopPrice&name=TopName&image=TopImg&link=TopLink&order=TopName&by=ASC#listreturn>Name (A-Z)</option>";
				echo "<option value=GGHome.php?platform=Discount&price=TopPrice&name=TopName&image=TopImg&link=TopLink&order=TopName&by=DESC#listreturn>Name (Z-A)</option>";
				echo "<option value=GGHome.php?platform=Discount&price=TopPrice&name=TopName&image=TopImg&link=TopLink&order=TopPrice&by=ASC#listreturn>Price (Low to High)</option>";
				echo "<option value=GGHome.php?platform=Discount&price=TopPrice&name=TopName&image=TopImg&link=TopLink&order=TopPrice&by=DESC#listreturn>Price (High to Low)</option>";
				echo "</select>";
				echo "</form>";
				echo "</div>";

			}


			else if ($plats == 'Playstation') {

				echo "<div class=formorderdiv>";
				echo "<form id=formorder name=formorder>";
				echo "<select name=order OnChange=location.href=formorder.order.options[selectedIndex].value>";
				echo "<option value='order'>Order by...</option>";
				echo "<option value=GGHome.php?platform=Playstation&price=PPrice&name=PName&image=PImg&link=PLink&order=PName&by=ASC#listreturn>Name (A-Z)</option>";
				echo "<option value=GGHome.php?platform=Playstation&price=PPrice&name=PName&image=PImg&link=PLink&order=PName&by=DESC#listreturn>Name (Z-A)</option>";
				echo "<option value=GGHome.php?platform=Playstation&price=PPrice&name=PName&image=PImg&link=PLink&order=PPrice&by=ASC#listreturn>Price (Low to High)</option>";
				echo "<option value=GGHome.php?platform=Playstation&price=PPrice&name=PName&image=PImg&link=PLink&order=PPrice&by=DESC#listreturn>Price (High to Low)</option>";
				echo "</select>";
				echo "</form>";
				echo "</div>";

			}

			else if ($plats == 'Xbox') {

				echo "<div class=formorderdiv>";
				echo "<form id=formorder name=formorder>";
				echo "<select name=order OnChange=location.href=formorder.order.options[selectedIndex].value>";
				echo "<option value='order'>Order by...</option>";
				echo "<option value=GGHome.php?platform=Xbox&price=XPrice&name=XName&image=XImg&link=XLink&order=XName&by=ASC#listreturn>Name (A-Z)</option>";
				echo "<option value=GGHome.php?platform=Xbox&price=XPrice&name=XName&image=XImg&link=XLink&order=XName&by=DESC#listreturn>Name (Z-A)</option>";
				echo "<option value=GGHome.php?platform=Xbox&price=XPrice&name=XName&image=XImg&link=XLink&order=XPrice&by=ASC#listreturn>Price (Low to High)</option>";
				echo "<option value=GGHome.php?platform=Xbox&price=XPrice&name=XName&image=XImg&link=XLink&order=XPrice&by=DESC#listreturn>Price (High to Low)</option>";
				echo "</select>";
				echo "</form>";
				echo "</div>";

			}

			else if ($plats == 'PC') {

				echo "<div class=formorderdiv>";
				echo "<form id=formorder name=formorder>";
				echo "<select name=order OnChange=location.href=formorder.order.options[selectedIndex].value>";
				echo "<option value='order'>Order by...</option>";
				echo "<option value=GGHome.php?platform=PC&price=PCPrice&name=PCName&image=PCImg&link=PCLink&order=PCName&by=ASC#listreturn>Name (A-Z)</option>";
				echo "<option value=GGHome.php?platform=PC&price=PCPrice&name=PCName&image=PCImg&link=PCLink&order=PCName&by=DESC#listreturn>Name (Z-A)</option>";
				echo "<option value=GGHome.php?platform=PC&price=PCPrice&name=PCName&image=PCImg&link=PCLink&order=PCPrice&by=ASC#listreturn>Price (Low to High)</option>";
				echo "<option value=GGHome.php?platform=PC&price=PCPrice&name=PCName&image=PCImg&link=PCLink&order=PCPrice&by=DESC#listreturn>Price (High to Low)</option>";
				echo "</select>";
				echo "</form>";
				echo "</div>";

			}

				echo '<div class=Pics>';
				echo '<ul>';

/* 
	Lines 134-153 query a table based on the $plats variable and output the information into an UL.
	The if / elseif query check if either cookie is set and then changes the Add to Basket button from
	either a functioning link to add an item or a static image to inform user that the item as already been added
*/

				$query = "SELECT * FROM $plats ORDER BY $order $by";
				$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
				while($row = $result->fetch_assoc()) {
					echo "<li id=listreturn>";
					echo "<a href='./More.php?id=".$row['product_id']."&gamename=".$row[$names]."&gameimg=".$row[$imgs]."&gameprice=".$row[$prices]."&gameplat=".$plats."&gameorder=".$order."&orderby=".$by."' id=tablelinks>" . $row[$names] . "</a>";
					echo "<img src=".$row[$imgs]." id=tablepics alt=Game Cover Art>";
					echo "<p>&pound;".$row[$prices]."</p>";
					
					if((isset($_COOKIE['GG']) OR (isset($_COOKIE['Temp']))) AND (in_array($row['product_id'], $cart) == true)) {
						echo "<img src='./images/added.png' alt=Added to Cart></img>";
					}

					elseif((isset($_COOKIE['GG']) OR (isset($_COOKIE['Temp']))) AND (in_array($row['product_id'], $cart) == false)) {
						echo "<a href='./Basketinfo.php?id=".$row['product_id']."&gamename=".$row[$names]."&gameimg=".$row[$imgs]."&gameprice=".$row[$prices]."&gameplat=".$plats."&gameorder=".$order."&orderby=".$by."'><img src='./images/cartbutton.png' alt=Add to Cart></img></a>";
					}

				    echo "</li>";

			    }
		?>

	</ul>
</div>