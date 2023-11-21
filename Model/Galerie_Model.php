<?php
class Galerie{
    public ?int $id_galerie = null;
    public string $nom_galerie;
    public string $propriete_galerie;
    public string $lieu_galerie;
    /*-----------------------  constructor of "Galerie" ---------------------------*/
    public function __construct($id_gal, $nom_gal, $propriete_gal, $lieu_gal){
        $this->id_galerie = $id_gal;
        $this->nom_galerie = $nom_gal;
        $this->propriete_galerie = $propriete_gal;
        $this->lieu_galerie = $lieu_gal;
    }
    public function getIdGalerie(){
        return $this->id_galerie;
    }
    public function getNomGalerie(){
        return $this->nom_galerie;
    }
    public function setNomGalerie($new_name){
        $this->nom_galerie = $new_name;
        return $this;
    }
    public function setProprieteGalerie($new_propriete){
         $this->propriete_galerie= $new_propriete;
         return $this;
    }
    public function GetProprieteGalerie(){
        return $this->propriete_galerie;
    }
    public function set_lieuGalerie($new_lieu){
        $this->lieu_galerie= $new_lieu;
        return $this;
   }
   public function get_lieuGalerie(){
       return $this->lieu_galerie;
   }
}
?>