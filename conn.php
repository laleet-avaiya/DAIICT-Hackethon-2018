<?php
    $con = pg_connect("host=localhost port=5432 dbname=ttt user=postgres password=admin");

		if (!$con) {
			echo "<center><h1>Doesn't work =(</h1></center>";
		}
	
?>
