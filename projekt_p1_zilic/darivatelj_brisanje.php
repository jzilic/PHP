<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");

$id = isset($_GET["id"]) ? $_GET["id"] : 0;

if($id != 0){
    $query = $db->query("SELECT * FROM darivatelji WHERE id_darivatelj = ". $id);
    $rezultati = $query->fetchAll();
    $id_darivatelj = $rezultati[0]["id_darivatelj"];
    $ime_darivatelj = $rezultati[0]["ime_darivatelj"];
    $prezme_darivatelj = $rezultati[0]["prezme_darivatelj"];
    $adresa = $rezultati[0]["adresa"];
    $krvna_grupa = $rezultati[0]["krvna_grupa"];
    $fotografija = $rezultati[0]["fotografija"];
}else{
    $id_darivatelj = 0;
    $ime_darivatelj = "";
    $prezme_darivatelj = "";
    $adresa = "";
    $mjesto_darivanja = 0;
    $krvna_grupa = "";
    $fotografija = "";
}

?>
<h5>Brisanje darivatelja</h5>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="darivatelj_sql.php" enctype="multipart/form-data" name="form" id="forma-knjiznice">
    <input type="hidden" name="id_darivatelj" value="<?php echo $id_darivatelj;?>">
    Želite li stvarno obrisati darivatelja "<b><?php echo $ime_darivatelj; ?></b>"

    <input type="submit" name="submit" value="Potvrdi" class="button">&nbsp;&nbsp;
    <input type="submit" name="submit" value="Odustani" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>