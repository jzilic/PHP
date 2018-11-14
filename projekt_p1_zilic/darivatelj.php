<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<h4><small><a href='darivatelj_forma.php'>Dodaj novog darivatelja</a></small></h4>";
	$query = $db->query("SELECT * FROM darivatelji");
}else{
	$query = $db->query("SELECT * FROM mjesto_darivanja WHERE id_mjesto_darivanja = " . $id);
	$rezultati = $query->fetchAll();
	echo "<h1>" . $rezultati[0]["naziv"] . "</h1>";
	echo "<h1>" . $rezultati[0]["adresa_mj"] . "</h1>";
	$query = $db->query("SELECT * FROM darivatelji WHERE mjesto_darivanja= " . $id);
}


$rezultati = $query->fetchAll();

foreach($rezultati as $darivatelj){
		echo "<div class=\"row\" style=\"margin-top:26px\">";
		echo "<div class=\"medium-3 large-3 columns\">";
		
						echo "</div>";
			echo "<div class=\"medium-6 large-6 columns\">";
			echo "<strong>" . $darivatelj["ime_darivatelj"] ."   " . $darivatelj["prezme_darivatelj"] . "</strong> </br>";
			echo "<i>" .  "Krvna grupa:". " " . $darivatelj["krvna_grupa"] . "</i></br>";			
			echo "<small>" ."Adresa:"."  ". $darivatelj["adresa"] . "</small></br>";

		echo "</div>";
		echo "<div class=\"medium-3 large-3 columns\">";
		echo "<a href='darivatelj_forma.php?id=" . $darivatelj["id_darivatelj"] . "'>Uredi</a><br><a href='darivatelj_brisanje.php?id=" . $darivatelj["id_darivatelj"] . "'>Obriši</a>";
		echo "</div>";

		echo "</div>";
}
?>



<?php
include("template_podnozje.html");
?>