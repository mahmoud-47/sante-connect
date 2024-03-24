<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/templatesCSS/medecin-cart.css">
    <link rel="stylesheet" href="public/user/Css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Acceuil | SanteConnect</title>
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
        <div class="user_informations">
            <a href="">
                <img src="<?=$user->photo?>" alt="">
            </a>
            <div class="informations">
                <span class="hello">Bonjour</span>
                <span class="name"><?=$user->nom_complet?></span>
            </div>
        </div>
        <form action="#" id="search-form">
            <img src="public/Icons/Search.png" alt="">
            <input type="text" id="search-input" placeholder="rechercher">
        </form>
        <marquee direction = "right" class="pub-slider">
            <?php foreach($pubs as $pub): ?>
            <div class="pub-bloc">
                <div class="left-bloc">
                    <span class="welcome">Bienvenue sur SantéConect</span>
                    <span class="welcome-text">Vous ne vous sentez pas bien ? <br> Prenez un rendez-vous avec les <br> meilleurs spécialistes du pays!</span>
                    <a href="#" class="reserver">Réserver</a>
                </div>
                <img class="pub-image" src="public/Images/welcome_medecin.png" alt="">
            </div>
            <?php endforeach ?>
        </marquee>
        <div class="specialites">
            <div class="head-specialites">
                <span>Spécialités</span>
                <a href="?page=specialites">Voir Tout</a>
            </div>
            <div class="all-specialites">
                <div class="first-row">
                    <?php foreach($specialites as $specialite): ?>
                    <a href="?page=specialite&spe-id=<?= $specialite->id?>" class="specialite">
                        <div style="background-color: <?= $specialite->rgbaColor(0.1)?>">
                            <img src="<?=$specialite->icone?>" alt="" style="width: 60px; heigth:60px">
                        </div>
                        <span><?=$specialite->nom?></span>
                    </a>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="best-meds-slider">
            <?php foreach($medecins as $medecin): ?>
            <span  class="cart added-to-cart">
                <a href="?page=medecin&med-id=<?=$medecin->user_id?>">
                <img class="medecin-photo" src="<?=$medecin->getUser()->photo?>" alt="">  
                </a>
                <div class="cart-informations">
                  <div class="nom-like">
                      <a href="?page=medecin&med-id=<?=$medecin->user_id?>" style="text-decoration:none; color: black;">
                      <span><?=$medecin->getUser()->nom_complet?></span>
                      </a>
                      <a href="?page=<?=$page?>&favoris=<?=$medecin->user_id?>">
                      <?php if($medecin->isLikedBy($_SESSION['user_id'])): ?>
                        <img src="public/Icons/like_filled.png" alt="">
                        <?php else :?>
                      <img src="public/Icons/like.png" alt="">
                      <?php endif ?>
                      </a>
                  </div>
                  <hr>
                  <div class="spec-ville">
                      <span><?=$medecin->getSpecialite()->nom?></span>
                      <span>|</span>
                      <span><?=$medecin->ville_lieurv?></span>
                  </div>
                  <div class="stars">
                    <?php $count = 0; for($i=1; $i<=(float)$medecin->getNote(); $i++, $count++): ?>
                        <img src="public/Icons/star.png" alt="">
                    <?php endfor ?>

                    <?php if($medecin->getNote()-$count>0) : ?>
                        <img src="public/Icons/star-middle.png" alt="">
                    <?php endif ?>
                      
                  </div>
                </div>
            </span>
            <?php endforeach ?>
            <br>
            <br>
            <br>
        </div>
    </main>
    <script src="public/user/Js/home.js"></script>
</body>
</html>