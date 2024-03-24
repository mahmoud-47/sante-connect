<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/specialites.css">
    <link rel="stylesheet" href="public/templatesCSS/sama_specialite.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title> specialite| SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    
    <?php
        include __DIR__ ."/includes/sidebar.php";
    ?>

    <main id="main">
        <div id="menu-button">
            <img id = "menu-img" src="public/Icons/menu.png" alt="">
        </div>
        <h1>Specialités</h1>
        <div class="all">
            <br>
            <?php 
                $ligne = 0;
                foreach ($specialites as $specialite) { 
            ?>
            <div class="specialite" style="background-color: <?= $specialite->rgbaColor(0.1)?>;">
                <img src="<?=$specialite->icone?>" alt="" style="width: 60px; heigth:60px">
                <div class="informations">
                    <a href="?page=specialite&spe-id=<?= $specialite->id?>" style="text-decoration:none; color:black">
                    <span class="specialite-title"><?=$specialite->nom?></span>
                    </a>
                    <span class="specialite-text"><?=$specialite->description?></span>
                </div>
            </div>
            <br>
            <?php } ?>
            
        </div>
    </main>
    <script src="public/user/Js/specialite.js"></script>
    
</body>
</html>