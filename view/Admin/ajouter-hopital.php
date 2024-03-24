<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link rel="stylesheet" href="public/templatesCSS/form.css">
    <link rel="stylesheet" href="public/templatesCSS/specialites.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Ajouter Hôpital | SanteConnect</title>
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
        <h1>Ajouter hôpital</h1>
        <br>
        <form action="" class="form">
            <div class="search">
                <input type="text" placeholder="Rechercher">
                <img src="public/Icons/Search.png" alt="">
            </div>
            
            <div class="send">
                <input type="submit" value="Rechercher">
            </div>
        </form>
        <br>
        <br>
        
        <p class="result-tableau">Résultat : <?= count($hospitals) ?> ligne<?php if(count($hospitals) > 1) echo "s" ?>;</p>
        <br>
        <h2>Nouvel hôpital</h2>
        <div class="half">
            <div class="contains">
                <form method="post">
                    <div class="date">
                        <label>Nom de l’hôpital</label>
                        <input type="text" name="nom" placeholder="Entrez le nom de l’hôpital">
                    </div>
                    <div class="date">
                        <label>Site / Réseaux sociaux</label>
                        <input type="text" name="lien" placeholder="Site / Réseaux sociaux(Commencer par https://">
                    </div>
                    <div class="date">
                        <label>Latitude de l’hôpital</label>
                        <input type="text" name="latitude" placeholder="Entrez la latitude">
                    </div>
                    <div class="date">
                        <label>Longitude de l’hôpital</label>
                        <input type="text" name="longitude" placeholder="Entrez la longitude">
                    </div>
                    <button class="boutton-bleu" style="width: 150px;">
                        Ajouter
                    </button>
                    
                </form>
            </div>
            
        </div>
        <h2>Tous les hopitaux</h2>
        <br>
        <?php 
            $ligne = 0;
            foreach ($hospitals as $hospital) { 
        ?>
            <a href="<?= $hospital->lien?>" class="hopital-link">
                <h2><?= $hospital->nom?></h2>
            </a>
            <br>
        <?php } ?>

    </main>
    <script src="public/admin/Js/base.js"></script>
    
</body>
</html>