<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/details_medecin.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Dr. Fatou Ndiaye | SanteConnect</title>
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
        
        <div class="fatou">
            <img src="<?=$medecin->getUser()->photo?>" style="object-fit: cover;">
            <div>
                <figcaption>
                   <p><?=$medecin->getUser()->nom_complet?></p>
                   <div class="spec">
                    <span><?=$medecin->getSpecialite()->nom?></span>
                   <span>|</span> 
                   <span><?=$medecin->ville_lieurv?></span>
                   </div>
                </figcaption>
            </div>
            <div class="detail">
                <span>
                    <img src="public/Icons/Favorite.png" alt="" id="like">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;">J'aime</P>
                    <p style="font-size: 13px; color: #747373; text-align: center;"><?=$medecin->nbLikes() ?></p>
                </span>
                <span>                                                              
                    <img src="public/Icons/patients.png" alt="" id="patient">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;"><?= $medecin->nbPatients() ?></P>
                    <p style="font-size: 13px; color: #747373; text-align: center;">Patients</p>
                </span>
                <span>
                    <img src="public/Icons/etoiles.png" alt="" id="etoiles">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;"><?= $medecin->getNote() ?></P>
                    <p style="font-size: 13px; color: #747373; text-align: center;">Etoiles</p> 
                </span>
                <span class="Avs">
                    <img src="public/Icons/avis.png" alt="" id="avis">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;"><?= count($medecin->getAllAvis()) ?></P>
                    <p style="font-size: 13px; color: #747373; text-align: center;">Avis</p>
                </span>                                      
           </div>
        </div>

        <br>
        <div class="description">
            <h3>Description</h3>
            <p style="color: #747373;text-align:left">
            <?php if($medecin->bio) echo $medecin->bio; else echo 'Pas de bio disponible';?>
        </p>
        </div>

        <br>
        <div class="barre-avis">
            <h3>Avis</h3>
        </div>
        <?php foreach($Avis as $etoile1){?>
        <div class="comment">
            <div class="head-comment">
                <img src="<?php $etoile1->getUser()->photo ?>" alt="">
                <div>
                    <strong><?php $etoile1->getUser()->nom_complet ?></strong> <br><br>
                    <?php 
                        $note=$etoile1->note;
                        if($note<5)
                            $rest=5 - $note;
                        while($note!=0){
                            echo '<img src="public/Icons/star.png" alt="">';
                        }
                        if($rest>0)
                        while($rest!=0){
                            echo '<img src="public/Icons/star border.png" alt="">';
                        }
                    ?>
                    if($etoile->note)
                    <img src="public/Icons/star.png" alt="">
                    <img src="public/Icons/star.png" alt="">
                    <img src="public/Icons/star.png" alt="">
                    <img src="public/Icons/star.png" alt="">
                    <?php ?>
                    <span class="date-comment"><?php echo 'Envoyer le :'.$etoile1->date; ?></span>
                </div>
            </div>
            <div class="comment-content">
                <?php $etoile1->commentaire ?>
            </div>
            <div class="comment-links" style="margin-top: 5px;display: flex;">
                <img src="public/Icons/Report-problem.png" alt=""><a href="" style="color: red;text-decoration: none;"> Signaler ce commentaire</a>
            </div>
        </div>
        <?php } ?>
    </main>
    <script src="public/medecin/Js/details_medecin.js"></script>
</body>
</html>