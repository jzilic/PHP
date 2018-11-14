<?php
include("session.php");
include("pdo.php");

if($_POST["submit"] == "Odustani"){
	header("Location:darivatelj.php");
}




if($_FILES["fotografija"]["name"]){

	$putanja = "slike/upload/"; //putanja do direktorija za upload
	move_uploaded_file($_FILES["fotografija"]["tmp_name"], $putanja . $_FILES["fotografija"]["name"]);


	$upload_slika = $_FILES["fotografija"]["name"];

}else{

	$upload_slika = $_POST["fotografija"];
}

if($_POST["id_darivatelj"] > 0 && $_POST["submit"] == "Dodaj/Uredi" ){
	$upit = $db->query("UPDATE darivatelji SET 
		ime_darivatelj = '" . $_POST["ime_darivatelj"] . "',
		prezme_darivatelj = '" . $_POST["prezme_darivatelj"] . "',
		adresa = '" . $_POST["adresa"] . "',
		mjesto_darivanja = '" . $_POST["mjesto_darivanja"] . "',
		krvna_grupa = '" . $_POST["krvna_grupa"] . "',
		fotografija = '" . $upload_slika. ["fotografija"] . "'
		WHERE
		id_darivatelj = " . $_POST["id_darivatelj"] . "

		");
	header("Location:darivatelj.php");


}elseif($_POST["id_darivatelj"] > 0 && $_POST["submit"] == "Potvrdi" ){
	$upit = $db->query("DELETE FROM darivatelji WHERE id_darivatelj = " . $_POST["id_darivatelj"]);
	header("Location:darivatelj.php");


}elseif($_POST["id_darivatelj"] == 0 && $_POST["submit"] == "Dodaj/Uredi"){
	$upit = $db->query("INSERT INTO darivatelji (ime_darivatelj, prezme_darivatelj, adresa, mjesto_darivanja, krvna_grupa, fotografija)VALUES
		('" . $_POST["ime_darivatelj"] . "',
		'" . $_POST["prezme_darivatelj"] . "',
		'" . $_POST["adresa"] . "',
		'" . $_POST["mjesto_darivanja"] . "',
		'" . $_POST["krvna_grupa"] . "',
		'" . $upload_slika ["fotografija"]. "')
		");
	header("Location:darivatelj.php");
}

?>
