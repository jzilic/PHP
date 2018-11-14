<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$query = $db->query("SELECT * FROM mjesto_darivanja");
$rezultati = $query->fetchAll();
?>
<table>
	<tr>
	<th>Mjesto darivanja</th>
	<th></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td><a href='mj_darivanja_darivatelj.php?id=" . $stavka["id_mjesto_darivanja"] . "'>" . $stavka["naziv"] . "</a></td>
		  	<td>
		  	<td><a href='mj_darivanja_darivatelj.php?id=" . $stavka["id_mjesto_darivanja"] . "'>" . $stavka["adresa_mj"] . "</a></td>
		  	<td>
		  	<td><a href='mj_darivanja_darivatelj.php?id=" . $stavka["id_mjesto_darivanja"] . "'>" . $stavka["postanski_broj"] . "</a></td>
		  	<td>";
	
	$query = $db->query("SELECT * FROM darivatelji WHERE mjesto_darivanja = " . $stavka["id_mjesto_darivanja"]);
	$mjesto_darivanja = $query->fetchAll();
	foreach($mjesto_darivanja as $cover){
		echo "<img src='slike/" . $cover["fotografija"] . "' width='100' height='100'>";
	}


	echo "</td>
		  </tr>";
}
?>
</table>
<?php
include("template_podnozje.html");
?>