<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id_mjesto_darivanja = isset($_GET["id_mjesto_darivanja"]) ? $_GET["id_mjesto_darivanja"] : 0;

if($id_mjesto_darivanja != 0){
    $query = $db->query("SELECT * FROM mjesto_darivanja WHERE id_mjesto_darivanja = $id_mjesto_darivanja");
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

<h5>Brisanje mjesta darivanja</h5>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="mjesto_darivanja_sql.php" enctype="multipart/form-data" name="form" id="forma-mjesto_darivanja">
    <input type="hidden" name="id_mjesto_darivanja" value="<?php echo $id_mjesto_darivanja;?>">
    Želite li stvarno obrisati mjesto darivanja? "

    <input type="submit" name="submit" value="Potvrdi" class="button">&nbsp;&nbsp;
    <input type="submit" name="submit" value="Odustani" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>