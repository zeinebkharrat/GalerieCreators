<?php
include "../../../Controller/galerieC.php";
include "../../../Model/Galerie_Model.php";
$galerie = null;
$galerieC = new GalerieC();
if (isset($_POST["nom_galerie"]) && isset($_POST["propriete_galerie"]) && isset($_POST["lieu_galerie"])){
        $nom_gal = $_POST["nom_galerie"];
        $date_gal = $_POST["propriete_galerie"];
        $lieu_gal = $_POST["lieu_galerie"];
        if (!empty($nom_gal) &&!empty($date_gal) &&!empty($lieu_gal)){
            $galerie = new Galerie(null, $nom_gal, $date_gal, $lieu_gal);
            var_dump($galerie);
            $galerieC->updateGalerie($galerie, $_GET['idGalerie']);
            header('Location:galerie.php');
    }
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <?php
    if (isset($_GET['idGalerie'])) {
        $old_gal = $galerieC->showGalerie($_GET['idGalerie']);
    ?>
    <form action="" method="POST">
        <table>
        <tr>
            <td><label for="idGalerie">Id galerie :</label></td>
            <td>
                <input type="text" id="idGalerie" name="idGalerie" 
                value="<?php echo $_GET['idGalerie'] ?>" readonly/>
            </td>
            </tr>
            <tr>
                <td><label for="nom_galerie">Nom galerie :</label></td>
                <td>
                    <input type="text" id="nom_galerie" name="nom_galerie" 
                    value="<?php echo $old_gal['nomGalerie']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="propriete_galerie">propriete galerie :</label></td>
                <td>
                    <input type="text" id="propriete_galerie" name="propriete_galerie"
                     value="<?php echo $old_gal['proprieteGalerie']?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="lieu_galerie">lieu galerie:</label></td>
                <td>
                    <input type="text" id="lieu_galerie" name="lieu_galerie"
                     value="<?php echo $old_gal['lieuGalerie']?>"/>
                </td>
            </tr>
            <td>
                <input type="submit" value="Save">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </table>

    </form>
    <?php
    }
    ?>
</body>

</html>