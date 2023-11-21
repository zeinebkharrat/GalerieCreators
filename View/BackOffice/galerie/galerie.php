<?php
include "../../../Controller/galerieC.php";
$c = new GalerieC();
$tab = $c->list_Galerie();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="../style.css">
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
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../utilisateur/utilisateur.php" class="not-active">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Utilisateurs</h3>
                </a>
                <a href="../evenement/evenement.php" class="not-active">
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
                <a href="../galerie/galerie.php" class="active">
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
            <h1>Galeries</h1>
            <div class="new-users">
                <div class="user-list" id="adding_galeries_key">
                    <div class="user" onclick="galerie_formulaire()">
                        <img src="../images/plus.png">
                        <h2>ajouter</h2>
                        <p>Galerie</p>
                    </div>
                </div>
            </div>
            <!-- Users Table -->
            <div class="recent-orders">
                <table>
                    <thead>
                        <tr>
                            <th>Id Galerie</th>
                            <th>Nom Galerie</th>
                            <th>propriete Galerie</th>
                            <th>lieu Galerie</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tab as $galerie) { ?>
                            <tr>
                                <td><h2><?= $galerie['idGalerie']; ?></h2></td>
                                <td><h2><?= $galerie['nomGalerie']; ?></h2></td>
                                <td><h2><?= $galerie['proprieteGalerie']; ?></h2></td>
                                <td><h2><?= $galerie['lieuGalerie']; ?></h2></td>
                                <td><h1><a href="updateGalerie.php?idGalerie=<?php echo $galerie['idGalerie'];?>">Update</a></h1></td>
                                <td><h1><a href="deleteGalerie.php?idGalerie=<?php echo $galerie['idGalerie'];?>">Delete</a></h1></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- End Users Table -->
        <div class="new-galerie-form" id="formulaire-new-galerie" style="display: none;">
            <form action="addGalerie.php" method="POST">
                <table>
                    <tr>
                        <td><label for="nom_galerie">Nom :</label></td>
                        <td><input type="text" id="nom_galerie" name="nom_galerie" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td><label for="propriete_galerie">propriete :</label></td>
                        <td><input type="text" id="propriete_galerie" name="propriete_galerie" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td><label for="lieu_galerie">lieu :</label></td>
                        <td><input type="text" id="lieu_galerie" name="lieu_galerie" autocomplete="off"/></td>
                    </tr>
                    <td><input type="submit" value="Save" onclick="validateInput()"></td>
                    <td><input type="reset" value="Reset"></td>
                    <td><input type="button" value="cancel" onclick="hide_formulaire_galerie()"></td>
                </table>
            </form>
        </div>
        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
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
                        <p>Hey, <b id="admin_name">zeineb</b></p>
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


    </div>

    <script src="../index.js"></script>
    <script>
        function validateInput() {
                       
                       var inputValue = document.getElementById("nom_galerie").value;

                    
                       inputValue = inputValue.trim();

                      
                       if (/^[a-zA-Z]+$/.test(inputValue)) {
                           
                           alert("Valid input");
                       } else {
                           
                           alert("Invalid input. Please enter only characters.");
                           
                           document.getElementById("nom_galerie").value = '';
                       }
                   }
    </script>
</body>
<script>
    function hide_formulaire_galerie(){
        form = document.getElementById("formulaire-new-galerie");
        form.style.display = "none";
    }
    function galerie_formulaire(){
        form = document.getElementById("formulaire-new-galerie");
        form.style.display = "block";
    }
</script>
</html>