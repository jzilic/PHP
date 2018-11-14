<?php
include("session.php");
include("template_zaglavlje_mjesto.html");
include("pdo.php");



$query = $db->query("SELECT * FROM mjesto_darivanja");
$rezultati = $query->fetchAll();
?>
<table>
	<tr>
	<th>Mjesto darivanja</th>
	<th><a href="mjesto_darivanja_forma.php">Novi</a></th>
	<tr>
<?php

foreach($rezultati as $stavka){
	echo "<tr>
			<td> " . $stavka["naziv"] . ", " . $stavka["adresa_mj"] . "</td>
		  	<td><a href=\"mjesto_darivanja_forma.php?id=" . $stavka["id_mjesto_darivanja"] . "\">Uredi</a> | <a href=\"mjesto_darivanja_brisanje.php?akcija=brisanje&id_mjesto_darivanja=" . $stavka["id_mjesto_darivanja"] . "\">Obriši</a></td>
		  </tr>";
}
?>
</table>


<?php
include("template_podnozje.html");
?>