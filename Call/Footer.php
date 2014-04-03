<!--
	This file adds the footer to the page and closes any sql connections made
-->

<footer>
<p id="footer">Gaming Gateway, Unit 1, Vere Street, Vale of Glamorgan, Barry, CF62 8JE, Phone: 07889169451</p>
<p id="footer">All content is copyright to Gaming Gateway 2013</p><br />
<?php
	mysqli_close($mysqli);
?>
</footer>