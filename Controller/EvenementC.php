<?php
require_once(__DIR__ . '/../config.php');
class EvenementC{
    public function list_Event(){
        $req = "SELECT * FROM evenement";
        $db = configurer::getConnexion();
        try{
            $list = $db->query($req);
            return $list;
        } catch (Exception $e){
            die('Error:' . $e->getMessage());
        }
    }
    function deleteEvenement($id_event){
        $sql = "DELETE FROM evenement WHERE idEvent = :id";
        $db = configurer::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id_event);
        try{
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addEvent($new_event){
        $sql = "INSERT INTO evenement
        VALUES (null, :nom_event, :date_event, :lieu_event, :img_event)";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nom_event'  => $new_event->getNomEvent(),
                'date_event' => $new_event->getDate_evenement(),
                'lieu_event' => $new_event->get_lieu(),
                'img_event'  => $new_event->get_img(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateEvenement($Event, $id_event){
        try {
            $db = configurer::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement SET 
                    nomEvent  = :nom_event,
                    dateEvent = :date_event,
                    lieuEvent = :lieu_event,
                    imgEvent  = :img_event
                WHERE idEvent = :id_event'
            );
            $query->execute([
                'id_event' => $id_event,
                'nom_event' => $Event->getNomEvent(),
                'date_event' => $Event->getDate_evenement(),
                'lieu_event' => $Event->get_lieu(),
                'img_event' => $Event->get_img(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function showEvent($id_event){
        $sql = "SELECT * from evenement where idEvent = :id_event";
        $db = configurer::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindValue(':id_event', $id_event);
            $query->execute();
            $Event = $query->fetch();
            return $Event;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
?>