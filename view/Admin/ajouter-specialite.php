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
    <title>Ajouter Spécialité | SanteConnect</title>
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
        <h1>Ajouter spécialité</h1>
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
        <br> <br>
        
        <p class="result-tableau">Résultat : <?= count($specialites) ?> ligne<?php if(count($specialites) > 1) echo "s"; ?></p>
        <br>
        <h2>Nouvelle spécialité</h2>
        <div class="half">
            <div class="contains">
                <form method="post" enctype="multipart/form-data">
                    <div class="date">
                        <label>Nom de la spécialité</label>
                        <input type="text" name="nom_spec" placeholder="Entrez le nom de la spécialité">
                    </div>
                    <div class="date">
                        <label>Couleur de la spécialité</label>
                        <div class="flex">
                            <input type="color" name="color" id="color"> <span class="color-test"></span>
                        </div>
                    </div>
                    <div class="date">
                        <label>Icône de la spécialité</label>
                        <input type="file" name="photo"> 
                        <span class="file-test"></span>
                    </div>
                    <div class="date">
                        <label>Description de la spécialité</label>
                        <textarea name="description" id="" cols="30" rows="10" class="textarea" placeholder="Écrivez la decription de la spécialité"></textarea>
                    </div>

                    <button class="boutton-bleu" style="width: 150px;">
                        Ajouter
                    </button>
                </form>
            </div>
            
        </div>
        <h2>Toutes les spécialités</h2>
        <br>
        
        <?php 
            $ligne = 0;
            foreach ($specialites as $specialite) { 
        ?>
        <div class="specialite" style="background-color: <?= $specialite->rgbaColor(0.1)?>;">
            <img src="<?=$specialite->icone?>" alt="">
            <div class="informations">
                <span class="specialite-title"><?=$specialite->nom?></span>
                <span class="specialite-text"><?=$specialite->description?></span>
            </div>
        </div>
        <br>
        <?php } ?>

        

    </main>
    <script src="public/admin/Js/base.js"></script>
    
</body>
</html>

