<?php include './Call/Connect.php'; ?>

<div class="bodydiv">

<?php include './Call/Header.php'; ?>

<h1 id="bhead">More Details</h1><br />

	<div class="Regtable">
	<table id="tablecen">
	<tr><td id="FeedLeft">

	<?php

/* 
	Lines 22-55 are similar to the Games.php file. Information is taken from the URL using the $_GET variable
	This information is then used to append an SQL query to pull the appropriate information out of the right table.
	This information is sent when the user clicks on the name of the game which is a link on the homepage.
	The query result is then used to display a list of information.
*/

		$game = $_GET['id'];
		$gamename = $_GET['gamename'];
		$gameimg = $_GET['gameimg'];
		$gameprice = $_GET['gameprice'];
		$gameplat = $_GET['gameplat'];
		$gameorder = $_GET['gameorder'];
		$orderby = $_GET['orderby'];
		$More = true;

			echo '<div class=Pics>';
			echo '<ul>';

			$query = "SELECT * FROM $gameplat WHERE product_id=$game";
			$result = $mysqli->query($query) or die($mysqli->error.__LINE__);
			while($row = $result->fetch_assoc()) {
				echo "<li id=#moreitem>";
				echo "<p>".$gamename."</p>";
				echo "<img src=".$gameimg." id=tablepics>";
				echo "<p>&pound;".$gameprice."</p>";
				
				if((isset($_COOKIE['GG']) OR (isset($_COOKIE['Temp']))) AND (in_array($row['product_id'], $cart) == true)) 
				{
					echo "<img src='./images/added.png' alt=Added to Cart></img>";
				}

				elseif ((isset($_COOKIE['GG']) OR (isset($_COOKIE['Temp']))) AND (in_array($row['product_id'], $cart) == false))
				{
					echo "<a href='./Basketinfo.php?id=".$game."&gamename=".$gamename."&gameimg=".$gameimg."&gameprice=".$gameprice."&gameplat=".$gameplat."&gameorder=".$gameorder."&orderby=".$orderby."&More=".$More."'><img src='./images/cartbutton.png' alt=Add to Cart></img></a>";
					
				}

				echo "</li>";
				echo "</ul>";
				echo "</div>";

	echo "</td>";
	echo "<td id=Feedright>";


				$video = $row['Vid'];
				$review = $row['Rev'];

				echo "<p id=moretitle>PEGI Rating:</p>";
				echo "<p id=moretext>".$row['Peg']."</p>";
				echo "<p id=moretitle>Year Released:</p>";
				echo "<p id=moretext>".$row['Year']."</p>";
				echo "<p id=moretitle>Genre:</p>";
				echo "<p id=moretext>".$row['Genre']."</p>";
				echo "<p id=moretitle>Metacritic Score:</p>";

				/* 
					This line appends an anchor tag with the end of a URL allowing the user to access
					an external webpage that relates to the current item being viewed
				*/

				echo "<a href=http://www.metacritic.com/game$review target=_blank><p id=moretext>Click here!</p></a>";

	echo "</td>";
	echo "</table>";
	echo "</div>";

				/*
					The following lines are taken from the Youtube embed feature.
					The 11 digit video ID provided by youtube is stored in the product table and
					is inserted into the URL which then embeds the appropriate video into the webpage
				*/

				echo "<h1 id=bhead>'$gamename' IGN Review</h1><br />";
				echo "<div class=video>";
				echo "<iframe id=#video width=560 height=315 src=//www.youtube.com/embed/$video?rel=0 frameborder=0 allowfullscreen alt=Video Review></iframe>";
				echo "</div>";
			}

	?>

</div>

<?php include './Call/Footer.php'; ?>