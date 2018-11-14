<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id == 0){
	echo "<h1>Darivatelji</h1>";
	$query = $db->query("SELECT * FROM darivatelji");
}else{
	$query = $db->query("SELECT * FROM mjesto_darivanja WHERE id_mjesto_darivanja = " . $id);
	$rezultati = $query->fetchAll();
	echo "<h1>" . $rezultati[0]["naziv"] . " " . $rezultati[0]["adresa_mj"] . "</h1>";
	$query = $db->query("SELECT * FROM darivatelji WHERE mjesto_darivanja = " . $id);
}


$rezultati = $query->fetchAll();

foreach($rezultati as $darivatelj){
	echo "<div class=\"row\" style=\"margin-top:26px\">";
		echo "<div class=\"medium-3 large-3 columns\">";
			echo "<img src='slike/" . $darivatelj["id_darivatelj"] . ".jpg'>";
		echo "</div>";
		echo "<div class=\"medium-9 large-9 columns\">";
			echo "<strong>" . $darivatelj["ime_darivatelj"] . "</strong></br>";
			echo "<i>" . $darivatelj["prezime_darivatelj"] . "," . " " . $darivatelj["adresa"] . "</i></br>";			
			echo "<small>" . $darivatelj["krvna_grupa"] . "</small></br>";
		
			
		echo "</div>";
	echo "</div>";
}
?>

<?php
include("template_podnozje.html");
?>