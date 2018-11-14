<?php
include("session.php");
include("template_zaglavlje.html");
include("pdo.php");


$id = isset($_GET["id"]) ? $_GET["id"] :0;
//ukoliko je $id == 0 onda je otvoreno dodavanje novog zapisa
//ako je $id != 0 onda uređujemo postojeći zapis i treba ući u bazu i popuniti polja 

if($id != 0){
    $query = $db->query("SELECT * FROM darivatelji WHERE id_darivatelj = $id");
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
<h3><strong>Darivatelj</strong></h3>

<div class="row" style="margin-top:26px">
	<div class="medium-12 large-12 columns">
    <form method="post" action="darivatelj_sql.php" enctype="multipart/form-data" name="form" id="forma-darivatelj">
    <input type="hidden" name="id_darivatelj" value="<?php echo $id_darivatelj;?>">
    Ime darivatelja:
    <input type="text" name="ime_darivatelj" value="<?php echo $ime_darivatelj;?>">
	Mjesto darivanja:
    <select name="mjesto_darivanja">
    <option value="0"> -- </option>
    <?php
        $query = $db->query("SELECT * FROM mjesto_darivanja");
        $rezultati = $query->fetchAll();
        foreach($rezultati as $mjdar){
            if($mjesto_darivanja == $mjdar["id_mjesto_darivanja"]){
                $selected = " selected";
            }else{
                $selected = "";
            }
            echo "<option value='" . $mjdar["id_mjesto_darivanja"] . "'" . 
            $selected ." >" . $mjdar["naziv"] . " " . $mjdar["adresa_mj"] . "</option>";
        }
    ?>
    </select>
    <!-- Iz baze izvući sva mjesta darivanja i popuniti padajući izbornik i ako je uređujemo postojeći zapis dodati "selected" gdje je potrebno --> 
	
    
    Prezime
    <input type="text" name="prezme_darivatelj" value="<?php echo $prezme_darivatelj;?>">
    Adresa
    <input type="text" name="adresa" value="<?php echo $adresa;?>">
    Krvna grupa
     <input type="text" name="krvna_grupa" value="<?php echo $krvna_grupa;?>">

    

    <input type="submit" name="submit" value="Dodaj/Uredi" class="button">
    </form>
    
    
    </div>
</div>    
<?php
include("template_podnozje.html");
?>