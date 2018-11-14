<?php
include("session.php");
include("pdo.php");

if($_POST["submit"] == "Odustani"){
	header("Location:mjesto_darivanja.php");
}

//Ukoliko $_POST["id_albuma"] je nula ($_POST["id_albuma"] == 0) onda znači da dodajemo novi zapis
//Ukoliko $_POST["id_albuma"] nije 0 onda uređujemo postojeći ili brišemo zapis
	//Ako je $_POST["submit"] == "Dodaj/Uredi" onda znači da uređujemo postojeći zapis
	//Ako je $_POST["submit"] == "Potvrdi" onda znači da brišemo postojeći zapis
	//Ako je $_POST["submit"] == "Odustani" onda znači da je pokrenuto brisanje, ali treba odustati i vratiti na albumi.php (ovo može služiti i za odustajanje u bilo kojem slučaju, ako na formu za uređivanje/dodavanje dodamo gumb odustani)


if($_POST["id_mjesto_darivanja"] > 0 && $_POST["submit"] == "Dodaj/Uredi" ){
	$upit = $db->query("UPDATE mjesto_darivanja SET 
		naziv = '" . $_POST["naziv"] . "',
		adresa_mj = '" . $_POST["adresa_mj"] . "',
		postanski_broj = '" . $_POST["postanski_broj"] . "'
		WHERE
		id_mjesto_darivanja = " . $_POST["id_mjesto_darivanja"] . "

		");
	header("Location:mjesto_darivanja.php");


}elseif($_POST["id_mjesto_darivanja"] > 0 && $_POST["submit"] == "Potvrdi" ){
	$upit = $db->query("DELETE FROM mjesto_darivanja WHERE id_mjesto_darivanja = " . $_POST["id_mjesto_darivanja"]);
	header("Location:mjesto_darivanja.php");


}elseif($_POST["id_mjesto_darivanja"] == 0){
	$upit = $db->query("INSERT INTO mjesto_darivanja 
		(naziv, adresa_mj, postanski_broj)VALUES
		('" . $_POST["naziv"] . "',
		'" . $_POST["adresa_mj"] . "',
		'" . $_POST["postanski_broj"] . "')
		");
	header("Location:mjesto_darivanja.php");
}

?>
