<?php
require_once(__DIR__ . '/../config.php');
class GalerieC{
    public function list_Galerie(){
        $req = "SELECT * FROM galerie";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function deleteGalerie($id_gal){
        $sql = "DELETE FROM galerie WHERE idGalerie = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_gal);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addGalerie($galerie){
        $sql = "INSERT INTO galerie
        VALUES (null, :nom_gal, :propriete_gal, :lieu_gal)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_gal'  => $galerie->getNomGalerie(),
                'propriete_gal' => $galerie->GetProprieteGalerie() , 
                'lieu_gal' => $galerie->get_lieuGalerie()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function showGalerie($id_gal){
        $sql = "SELECT * from galerie where idGalerie = :idG";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':idG', $id_gal);
            $query->execute();
            $Event = $query->fetch();
            return $Event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function updateGalerie($galerie, $id_galerie){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE galerie SET
                    nomGalerie  =       :nom_galerie,
                    proprieteGalerie =  :propriete_galerie,
                    lieuGalerie =       :lieu_galerie
                WHERE idGalerie =       :id_galerie'
            );
            $query->execute([
                'id_galerie' => $id_galerie,
                'nom_galerie' => $galerie->getNomGalerie(),
                'propriete_galerie' => $galerie->GetProprieteGalerie(),
                'lieu_galerie' => $galerie->get_lieuGalerie(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
?>