<?php
include "../../../Controller/galerieC.php";
include "../../../Model/Galerie_Model.php";
if (isset($_POST["nom_galerie"]) && isset($_POST["propriete_galerie"])
    && isset($_POST["lieu_galerie"])){
    $nom_gal = $_POST["nom_galerie"];
    $propriete_gal = $_POST["propriete_galerie"];
    $lieu_gal = $_POST["lieu_galerie"];
    if (!empty($nom_gal)&& !empty($propriete_gal)&&!empty($lieu_gal)){
        $galerie = new Galerie(null,$nom_gal,$propriete_gal,$lieu_gal);
        $galerieC = new GalerieC();
        $galerieC->addGalerie($galerie);
        header('Location:galerie.php');
    }
}
?>