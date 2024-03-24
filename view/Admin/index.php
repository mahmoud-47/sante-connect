<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public//templatesCSS/form-search-filter.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Validation | SanteConnect</title>
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
        <h1>Validation</h1>
        <br> <br>
        <form action="" class="form">
            <div class="search">
                <input type="text" placeholder="Rechercher">
                <img src="public/Icons/Search.png" alt="">
            </div>
            <div class="filtrer">
                <select name="" id="filtre" class="select">
                    <option value="">Filtrer par</option>
                    <option value="">En attente</option>
                    <option value="">En traitement</option>
                    <option value="">Confirmé</option>
                    <option value="">Décliné</option>
                </select>
            </div>
            <div class="send">
                <input type="submit" value="Rechercher">
            </div>
        </form>
        <br> <br>
        
        <p class="result-tableau">Résultat : <?= count($medecins) ?> ligne<?php if(count($medecins) > 1) echo "s"; ?></p>

        <div class="tableau-container">
            <table class="tableau">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Date</th>
                        <th>Nom complet</th>
                        <th>Hôpital</th>
                        <th>Spécialité</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $ligne = 0;
                        foreach ($medecins as $medecin) {  
                    ?>
                    <tr>
                        <td><?= ++$ligne ?></td>
                        <td><?= $medecin->getUser()->verified_at ?></td>
                        <td><?= $medecin->getUser()->nom_complet ?></td>
                        <td>
                            <?php 
                                if($medecin->hopital_id){
                                    echo $medecin->getHopital()->nom;
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                if($medecin->specialite_id){
                                    echo $medecin->getSpecialite()->nom;
                                }
                            ?>
                        </td>
                        <td>
                            <?php 
                                $result = ValiderMedecinModel::getWhere(['user_id'=> $medecin->user_id]);
                                if($result == null)
                                    echo "En attente";
                                else{
                                    if($result[0]->validate_at)
                                        echo "Confirmé";
                                    else
                                        echo "	En cours de traitement";
                                }
                            ?>
                        </td>
                        <td>
                            <a href="">voir</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="public/admin/Js/base.js"></script>
</body>
</html>

