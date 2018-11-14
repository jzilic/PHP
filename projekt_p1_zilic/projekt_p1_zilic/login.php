<?php
if(isset($_GET["logout"])){
	session_start();
	session_unset();
	session_destroy();
}
include("template_zaglavlje_login.html");
include("pdo.php");

$submit = isset($_POST["Submit"]) ? $_POST["Submit"] : false;
$korisnicko_ime = isset($_POST["korisnicko_ime"]) ? $_POST["korisnicko_ime"] : false;
$lozinka = isset($_POST["lozinka"]) ? $_POST["lozinka"] : false;

if($submit == "Prijava"){
	$query = $db->prepare("SELECT * FROM administratori WHERE korisnicko_ime = :korisnicko_ime AND lozinka = :lozinka");

	$query->bindParam(':korisnicko_ime', $korisnicko_ime, PDO::PARAM_STR);
	$query->bindParam(':lozinka', $lozinka, PDO::PARAM_STR);
	$query->execute();
	$rezultati = $query->fetchAll();
	if(count($rezultati) == 0){
		echo "<p style='color:#FF0000' align='center'>Netočno korisničko ime ili lozinka, molimo unesite ponovno!</p>";
	}else{
		session_start();
		$_SESSION["korisnik"] = $korisnicko_ime;
		$_SESSION["ime_i_prezime"] = $rezultati[0]["ime"] . " " . $rezultati[0]["prezime"];
		header("Location:darivatelj.php");
	}

}

?>

<div class="medium-4 medium-offset-4">
<p align="center">Prijava</p>
<form action="" method="post">

<input type="text" name="korisnicko_ime"  /><br />
<input type="password" name="lozinka" /><br />
<input type="submit" name="Submit" value="Prijava" />
</form>
</div>
<?php
include("template_podnozje.html");
?>