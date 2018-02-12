<?php
	echo "sql begin <br><b>";
	echo ($sadr_stats->sql());
	echo "</b><br>sql end";
	pr($sadr_stats->toArray())
?>