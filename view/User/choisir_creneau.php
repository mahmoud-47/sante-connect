<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/choisir_creneau.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Choisir Créneau | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    <style>
        .sdate{
            border: 5px solid blue;
            padding: 5px 10px;
            border-radius: 10px;
            margin: 10px;
        }
    </style>
</head>
<body>
    
    <?php
        include __DIR__ ."/includes/sidebar.php";
    ?>

    <main id="main">
        <div id="menu-button">
            <img id = "menu-img"src="public/Icons/menu.png" alt="">
        </div>
        <h1>Choisir un Créneau</h1>
        <div class="informations-medecins">
            <img class="medecin-photo" src="<?=$medecin->getUser()->photo?>" alt="">  
            <div class="med-infos">
                <a href="#" class="med-name"><?=$medecin->getUser()->nom_complet?></a>
                <div class="spec-ville">
                    <span><?=$medecin->getSpecialite()->nom?></span>
                    <span>|</span>
                    <span><?=$medecin->ville_lieurv?></span>
                </div>
            </div>
        </div>
        <div class="details-rv">
        <div class="show-rv">
                <div>
                    <?php foreach($rvs as $rv){ ?>
                        <a href="?page=finaliser&num_rv=<?=$rv->num_rv?>" style="text-decoration:none">
                            <span class="sdate">
                                
                                    <?php 
                                    echo "Le " . date("j F Y", strtotime($rv->date)) . ", de " . date("H\hi", strtotime($rv->heure_debut)) . " à " . date("H\hi", strtotime($rv->heure_fin));

                                    ?>
                            </span>
                        </a> 
                    <?php } ?>
                </div>
                <br>
                <span class="lieu-rv">Lieu du rendez-vous <a href="">Hopital  Fann</a></span>
            </div>
        </div>
    </main>
    <script src="public/user/Js/choisir_creneau.js"></script>
    
</body>
</html>