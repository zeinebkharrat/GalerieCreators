<?php
include "../../../controller/EvenementC.php";
include "../../../Model/Evenement_Model.php";

$c = new EvenementC();
$tab = $c->list_Event();
$eventC = new EvenementC();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style_event.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title>Evenement Administration</title>
</head>
<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <h2>Galerie<span class="danger">Creators</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../index.php" class="not-active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../utilisateur/utilisateur.php" class="not-active">
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Utilisateurs</h3>
                </a>
                <a href="../evenement/evenement.php" class="active">
                    <span class="material-symbols-outlined">
                    event
                    </span>
                    <h3>Evenements</h3>
                </a>
                <a href="../commande/commande.php" class="not-active">
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Commandes</h3>
                </a>
                <a href="../post/post.php" class="not-active">
                    <span class="material-icons-sharp">
                        mail_outline
                    </span>
                    <h3>Posts</h3>
                    <span class="message-count">27</span>
                </a>
                <a href="../galerie/galerie.php" class="not-active">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Galeries</h3>
                </a>
                <a href="../produit/produit.php" class="not-active">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Produits</h3>
                </a>
                <a href="#" class="not-active">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                </a>
                
                <a href="#">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

    <!-- Main Content -->
        <main>
            <h1>Evenements</h1>
            <!-- ajouter evenement Section -->
            <div class="new-users">
                <div class="user-list" id="adding_events_key">
                    <div class="user" onclick="formulaire()">
                        <img src="../images/plus.png">
                        <h2>ajouter</h2>
                        <p>evenement</p>
                    </div>
                </div>
            </div>
            <!-- End of ajouter evenement Section -->



    <!-- formulaire new event -->
    <div class="new-event-form" id="formulaire-new-event">
        <form action="addEvenement.php" method="POST" enctype="multipart/form-data">
            <table>
                <tr>
                    <td><label for="nom_event">Nom</label></td>
                    <td><input type="text" id="nom_event" name="nom_event" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td><label for="date_event">Date</label></td>
                    <td><input type="date" id="date_event" value="01/01/2023" name="date_event" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><label for="lieu_event">lieu</label></td>
                    <td><input type="text" id="lieu_event" name="lieu_event" autocomplete="off" /></td>
                </tr>
                <tr>
                    <td><label for="img_event">image</label></td>
                    <td><input type="file" required id="img_event" name="image_event"/></td>
                </tr>
                <tr>
                    <td><input type="submit" onclick="valider_formulaire()" value="Save"></td>
                    <td><input type="reset"  value="Reset"></td>
                    <td><input type="button" value="cancel" onclick="hide_formulaire()"></td>
                </tr>
            </table>
        </form>
    </div>
    <!-- end formulaire new event-->


    <!-- afficher event Section -->
        <div class="new-users" id="displaying-events">
            <div class="user-list" id="displays">
                <?php foreach ($tab as $event) { ?>
            <div  class="user">
                <img src="uploads/<?= $event['imgEvent'] ?>">
                <p>Id event:</p> <h2><?= $event['idEvent']; ?></h2>
                <p>Nom event:</p> <h2><?= $event['nomEvent']; ?></h2>
                <p>Date event:</p> <h2><?= $event['dateEvent']; ?></h2>
                <p>Lieu event:</p> <h2><?= $event['lieuEvent']; ?></h2>
    <h1><a href="updateEvenement.php?idEvent=<?= $event['idEvent']; ?>">Update</a></h1>
    <h1><a href="deleteEvenement.php?idEvent=<?=$event['idEvent'];?>">Delete</a></h1>
            </div>
            <?php } ?>
            </div>
        </div>
    <!-- End of afficher event Section -->

        </main>
    <!-- End of Main Content -->

    <!-- Start Right Section -->
    <div class="right-section">
        <div class="nav">
            <button id="menu-btn">
                <span class="material-icons-sharp">
                    menu
                </span>
            </button>
            <div class="dark-mode">
                <span class="material-icons-sharp active">
                    light_mode
                </span>
                <span class="material-icons-sharp">
                    dark_mode
                </span>
            </div>

            <div class="profile">
                <div class="info">
                    <p>Hey, <b id="admin_name">Anwar</b></p>
                    <small class="text-muted">Admin</small>
                </div>
                <div class="profile-photo">
                    <img src="../images/profile-1.jpg">
                </div>
            </div>

        </div>
        <!-- End of Nav -->
        <div class="user-profile">
            <div class="logo">
                <img src="../images/logo.png">
                <h2>GalerieCreators</h2>
                <p>Best Fullstack Web Developer Team</p>
            </div>
        </div>            
    </div>
    <!-- End Right Section -->
    </div>

    <script src="../index.js"></script>
    <script>
        function formulaire(){
            formulair = document.getElementById("formulaire-new-event");
            formulair.style.display = "block";
        }
        function hide_formulaire(){
            formulair = document.getElementById("formulaire-new-event");
            formulair.style.display = "none";
        }

        function is_word(ch) {
            var allowedChars = ' abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            for (var i = 0; i < ch.length; i++) {
                if (allowedChars.indexOf(ch[i]) === -1) {
                    return false;
                }
            }
            return true;
        }
        function valider_formulaire_update() {
            var nom = document.getElementById("nom_event_update").value;
            var date = document.getElementById("date_event_update").value; 
            var lieu = document.getElementById("lieu_event_update").value;
            if (!nom || !is_word(nom)) {
                alert("Nom event invalide");
                return false;
            }
            if (!date) {
                alert("Date event invalide");
                return false;
            }
            if (!lieu) {
                alert("Lieu event invalide");
                return false;
            }
            if (nom && is_word(nom) && date && lieu){
                return true;
            }
            else{
                return false;
            }
        }

        function valider_formulaire() {
            var nom = document.getElementById("nom_event").value;
            var date = document.getElementById("date_event").value;
            var lieu = document.getElementById("lieu_event").value;
            if (!nom || !is_word(nom)) {
                alert("Nom invalide");
                return false;
            }
            if (!date) {
                alert("Date invalide");
                return false;
            }
            if (!lieu) {
                alert("Lieu invalide");
                return false;
            }
            if ((nom)&&(is_word(nom))&&(date)&&(lieu)){
                return true;
            }
        }
    </script>
</body>
<style>
    
#displaying-events{
    height: 90rem;
    overflow-y: scroll;
    flex-wrap: wrap;
}
body{
    overflow-y: hidden;
}
</style>
</html>