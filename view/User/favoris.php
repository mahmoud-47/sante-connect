<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/medecin_favoris.css">
    <link rel="stylesheet" href="public/templatesCSS/medecin-cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title> Médecin favoris| SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    
    <?php
        include __DIR__ ."/includes/sidebar.php";
    ?>

    <main id="main">
        <div id="menu-button">
            <img id = "menu-img" src="../Icons/menu.png" alt="">
        </div>
        <h1>Médecins Favoris</h1>
         <br>
        
        <?php if(!$favoris){ ?>
            <br><br>
            <center>
                <h1>
                    Aucun contenu pour le moment
                </h1>
            </center>
        <?php } ?>

         <?php foreach($favoris as $favori): ?>
            <span  class="cart-long added-to-cart">
                <a href="">
                <img class="medecin-photo" src="<?=$favori->getMedecinInfos()->getUser()->photo?>" alt="">  
                </a>
                <div class="cart-informations">
                  <div class="nom-like">
                      <a href="" style="text-decoration:none; color: black;">
                      <span><?=$favori->getMedecinInfos()->getUser()->nom_complet?></span>
                      </a>
                      <a href="?page=<?=$page?>&favoris=<?=$favori->getMedecinInfos()->user_id?>">
                      <?php if($favori->getMedecinInfos()->isLikedBy($_SESSION['user_id'])): ?>
                        <img src="public/Icons/like_filled.png" alt="">
                        <?php else :?>
                      <img src="public/Icons/like.png" alt="">
                      <?php endif ?>
                      </a>
                  </div>
                  <hr>
                  <div class="spec-ville">
                      <span><?=$favori->getMedecinInfos()->getSpecialite()->nom?></span>
                      <span>|</span>
                      <span><?=$favori->getMedecinInfos()->ville_lieurv?></span>
                  </div>
                  <div class="stars">
                    
                    <?php $count = 0; for($i=1; $i<=(float)$favori->getMedecinInfos()->getNote(); $i++, $count++): ?>
                        <img src="public/Icons/star.png" alt="">
                    <?php endfor ?>

                    <?php if($favori->getMedecinInfos()->getNote()-$count>0) : ?>
                        <img src="public/Icons/star-middle.png" alt="">
                    <?php endif ?>
                      
                  </div>
                </div>
            </span>
            <br>
            <?php endforeach ?>
    </main>
</body>
</html>