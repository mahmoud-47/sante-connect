<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Médecins | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    <?php
        include __DIR__ ."/includes/sidebar.php";
    ?>
    <main id="main">
        <div id="menu-button">
            <img id = "menu-img"src="public/Icons/menu.png" alt="">
        </div>
        <h1>Tous les médecins</h1> 
        <br> <br>
        <form action="" class="form">
            <div class="search">
                <input type="text" placeholder="Rechercher">
                <img src="public/Icons/Search.png" alt="">
            </div>
            <div class="filtrer">
                <select name="" id="filtre" class="select">
                    <option value="">Filtrer par</option>
                    <option value="">Géolocalisation ajoutée</option>
                    <option value="">Pas de Géolocalisation</option>
                </select>
            </div>
            <div class="send">
                <input type="submit" value="Rechercher">
            </div>
        </form>
        <br> <br>
        
        <p class="result-tableau">Résultat : <?= count($medecinsAll) ?> ligne<?php if(count($medecinsAll) > 1) echo "s"; ?></p>
        <?php if(count($medecinsAll) != 0){ ?>
        <div class="tableau-container">
            <table class="tableau">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Nom complet</th>
                        <th>Date insc</th>
                        <th>Email</th>
                        <th>Spécialité</th>
                        <th>Hôpotal</th>
                        <th>Lieu RV</th>
                        <th>Ville</th>
                        <th>Genre</th>
                        <th>Num Tél</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $ligne = 0;
                        foreach ($medecinsAll as $medecin) { 
                    ?>
                    <tr>
                        <td><?= ++$ligne ?></td>
                        <td><?= $medecin->getUser()->nom_complet ?></td>
                        <td><?= $medecin->getUser()->verified_at ?></td>
                        <td><?= $medecin->getUser()->email ?></td>
                        <td>
                            <?php 
                                if($medecin->specialite_id){
                                    echo $medecin->getSpecialite()->nom;
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($medecin->hopital_id){
                                    echo $medecin->getHopital()->nom;
                                }
                            ?>
                        </td>
                        <td><a href="">Afficher</a></td>
                        <td><?= $medecin->ville_lieurv?></td>
                        <td><?= $medecin->getUser()->sexe ?></td>
                        <td><?= $medecin->getUser()->numero_tel ?></td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <?php }?>
    </main>
    <script src="public/admin/Js/base.js"></script>
</body>
</html>

