<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/detail_specialite.css">
    <link rel="stylesheet" href="public/templatesCSS/medecin-cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Détails spécialite | SanteConnect</title>
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
        <div class="detail">
            <div class="profil">
                <img src="<?=$specialite->icone?>" alt="" id="gene" style="width: 80px; heigth:80px">
                <label for="gene" style="font-size: 30px;"><b><?=$specialite->nom?></b></label> 
            </div>
            <div class="Description">
                <strong>Description</strong>
                <div>
                <?=$specialite->description?>
            </div>

            <?php if(!$medecins){ ?>
                <br><br>
                <center>
                    <h1>
                        Aucun medecin pour le moment
                    </h1>
                </center>
            <?php } ?>

            <?php foreach($medecins as $medecin): ?>
            <span  class="cart-long added-to-cart">
                <a href="">
                <img class="medecin-photo" src="<?=$medecin->getUser()->photo?>" alt="">  
                </a>
                <div class="cart-informations">
                  <div class="nom-like">
                      <a href="" style="text-decoration:none; color: black;">
                      <span><?=$medecin->getUser()->nom_complet?></span>
                      </a>
                      <a href="?page=<?=$page?>&spe-id=<?=$_GET['spe-id']?>&favoris=<?=$medecin->user_id?>">
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
            <br>
            <?php endforeach ?> 

            </div>
        </div>
    </main>
    <script src="Js/specialite.js"></script>
</body>
</html>