<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/details_medecin.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Dr. <?=$medecin->getUser()->nom_complet?> | SanteConnect</title>
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
                <div class="cap">
                   <p style="text-align: center;"><?=$medecin->getUser()->nom_complet?></p>
                   <div class="spec">
                    <span><?=$medecin->getSpecialite()->nom?></span>
                   <span>|</span> 
                   <span><?=$medecin->ville_lieurv?></span>
                   </div>
                </cap>
            </div>
            <div class="detail">
                <span>
                    <img src="public/Icons/Favorite.png" alt="" id="like">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;">J'aime</P>
                    <p style="font-size: 13px; color: #747373; text-align: center;"><?=$medecin->nbLikes()?></p>
                </span>
                <span>
                    <img src="public/Icons/patients.png" alt="" id="patient">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;"><?=$medecin->nbPatients()?></P>
                    <p style="font-size: 13px; color: #747373; text-align: center;">Patients</p>
                </span>
                <span>
                    <img src="public/Icons/etoiles.png" alt="" id="etoiles">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;"><?=$medecin->getNote()?></P>
                    <p style="font-size: 13px; color: #747373; text-align: center;">Etoiles</p>
                </span>
                <span class="Avs">
                    <img src="public/Icons/avis.png" alt="" id="avis">
                    <P style="color: #3c7ECC;margin-top: 20px; font-size: 13px; text-align: center;"><?=count($medecin->getAllAvis())?></P>
                    <p style="font-size: 13px; color: #747373; text-align: center;">Avis</p>
                </span>                                      
           </div>
        </div>

        <br>
        <br>
        <div class="barre-avis" style="display:block">
            <h3 style="">Description</h3>
            <p style="color: #747373;text-align:left">
            <?php if($medecin->bio) echo $medecin->bio; else echo 'Pas de bio disponible';?>
        </p>
        </div>

        <br>
        <div class="barre-avis">
            <h3>Avis</h3>
        </div>

        
        <?php if(!$medecin->getAllAvis())
            echo '<h2>Pas d avis a afficher</h2><br><br>';
        foreach($medecin->getAllAvis() as $avis){ ?>

        <div class="comment">
            <div class="head-comment">
                <img src="<?=$avis->getUser()->photo?>" alt="">
                <div>
                    <strong><?=$avis->getUser()->nom_complet?></strong> <br><br>

                    <?php $count = 0; for($i=1; $i<=$avis->note; $i++, $count++): ?>
                        <img src="public/Icons/star.png" alt="">
                    <?php endfor ?>

                    <?php if($avis->note-$count>0) : ?>
                        <img src="public/Icons/star-middle.png" alt="">
                    <?php endif ?>


                    <span class="date-comment">le <?=$avis->getUser()->date?></span>
                </div>
            </div>
            <?php if($avis->commentaire){ ?>
            <div class="comment-content">
                <?=$avis->commentaire?>
            </div>
            <?php } ?>
            <div class="comment-links" style="margin-top: 5px;display: flex;">
                <img src="public/Icons/Report-problem.png" alt=""><a href="?page=medecin&med-id=<?=$medecin->user_id?>signal=<?=$avis->id?>" style="color: red;text-decoration: none;" onclick="alert('Merci d avoir signalé ce commentaire !')"> Signaler ce commentaire</a>
            </div>
        </div>

        <?php } ?>
        <div class="bt">
            <a href="?page=choisir_creneau&med-id=<?=$medecin->user_id?>" class="button-link">
                <button class="boutton-bleu" style="margin-bottom: 10px;">
                    Prendre un Rendez-Vous
                </button>
            </a>
        </div>
    </main>
    <script src="Js/details_medecin.js"></script>
</body>
</html>