<?php require_once __DIR__.'/../../model/models/AvisSignaleModel.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link rel="stylesheet" href="public/templatesCSS/onglets.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Avis | SanteConnect</title>
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
        <h1>Avis & Commentaires</h1>
        <br>

        <div class="slider">
            <div class="slideritem bar"><h4>Commentaires Signalés</h4></div>
            <div class="slideritem"><h4>Commentaires en Quarantaine</h4></div>
        </div>
        <br>

        <div class="divs">
            <?php foreach($allavis as $avis){ ?>
            <div class="comment">
                <div class="head-comment">
                    <img src="<?=$avis->getUserSignal()->photo?>" alt="">
                    <div>
                        <strong><?=$avis->getUserSignal()->nom_complet?></strong> <br><br>

                        <?php $count = 0; for($i=1; $i<=AvisModel::get($avis->avis_user_id,$avis->avis_num_rv)->note; $i++, $count++): ?>
                            <img src="public/Icons/star.png" alt="">
                        <?php endfor ?>

                        <?php if($avis->AvisModel::get($avis->avis_user_id,$avis->avis_num_rv)->note  - $count > 0) : ?>
                            <img src="public/Icons/star-middle.png" alt="">
                        <?php endif ?>
                        <span class="date-comment">le <?=AvisModel::get($avis->avis_user_id,$avis->avis_num_rv)->date?></span>
                    </div>
                </div>
                <?php if($avis->commentaire){ ?>
                <div class="comment-content">
                    <?=$avis->commentaire?>
                </div>
                <?php } ?>
                <div class="comment-links">
                    <a href="">voir</a>
                    <a href="">masquer</a>
                    <a href="?page=quarantaine&uid=<?=$avis->avis_user_id?>&rvid=<?=$avis->avis_num_rv?>">mettre en quarantaine</a>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="divs none">
            <?php foreach($allavis as $avis){ ?>
            <div class="comment">
                <div class="head-comment">
                    <img src="<?=$avis->getAvisUser()->photo?>" alt="">
                    <div>
                        <strong><?=$avis->getAvisUser()->nom_complet?></strong> <br><br>

                        <?php $count = 0; for($i=1; $i<=AvisModel::get($avis->avis_user_id,$avis->avis_num_rv)->note; $i++, $count++): ?>
                            <img src="public/Icons/star.png" alt="">
                        <?php endfor ?>

                        <?php if($avis->AvisModel::get($avis->avis_user_id,$avis->avis_num_rv)->note  - $count > 0) : ?>
                            <img src="public/Icons/star-middle.png" alt="">
                        <?php endif ?>
                        <span class="date-comment">le <?=AvisModel::get($avis->avis_user_id,$avis->avis_num_rv)->date?></span>
                    </div>
                </div>
                <?php if($avis->commentaire){ ?>
                <div class="comment-content">
                    <?=$avis->commentaire?>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
    </main>
    <script src="public/admin/Js/base.js"></script>
    <script src="public/templatesJS/onglets.js"></script>
</body>
</html>