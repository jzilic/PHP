<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");


$id = isset($_GET["id"]) ? $_GET["id"] : 0;
//ukoliko je $id == 0 onda je otvoreno dodavanje novog zapisa
//ako je $id != 0 onda uređujemo postojeći zapis i treba ući u bazu i popuniti polja 

if($id != 0){
    $query = $db->query("SELECT * FROM mjesto_darivanja WHERE id_mjesto_darivanja = $id");
    $rezultati = $query->fetchAll();
    $id_mjesto_darivanja = $rezultati[0]["id_mjesto_darivanja"];
    $naziv = $rezultati[0]["naziv"];
    $adresa_mj = $rezultati[0]["adresa_mj"];
    $postanski_broj = $rezultati[0]["postanski_broj"];
    
}else{
    $id_mjesto_darivanja = 0;
    $naziv = "";
    $adresa_mj = "";
    $postanski_broj = "";
    
}


?>
<h3><strong>Mjesto darivanja</strong></h3>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="mjesto_darivanja_sql.php" enctype="multipart/form-data" name="form" id="forma-mjesto_darivanja">
    <input type="hidden" name="id_mjesto_darivanja" value="<?php echo $id_mjesto_darivanja;?>">

    Naziv:
    <input type="text" name="naziv" value="<?php echo $naziv;?>">

    Adresa:
    <input type="text" name="adresa_mj" value="<?php echo $adresa_mj;?>">
	
    Poštanski broj
    <input type="text" name="postanski_broj" value="<?php echo $postanski_broj;?>">
   
    
    <input type="submit" name="submit" value="Dodaj/Uredi" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>