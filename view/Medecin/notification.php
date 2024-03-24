<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/notification.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Notification | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    <style>
        .notif-text, .heure-notif{
            font-size: 15px;
        }
        .type-notif{
            font-size: 17px;
        }
        .circle-icon{
            width: 35px;
            height: 35px;
        }
        .circle-icon img{
            width: 25px;
            height: 25px;
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
        <h1>Notification</h1>
        <div class="notifications">
        <?php
            foreach($notif as $value){
        ?>
            <a href="#" class="notification">
                <div class="header-notif">
                    <div class="notif-header-left">
                        
                        <div class="circle-icon decliné">
                            <img src="<?php 
                                            $libelle=$value->getNotifType()->libelle;
                                            switch($libelle){
                                                case 'decliné':
                                                    echo 'public/Icons/decliné.png';
                                                break;
                                                case 'modifié':
                                                    echo 'public/Icons/Date_range.png';
                                                break;
                                                case 'retrait':
                                                    echo 'public/Icons/Money_Bag.png';
                                                break;
                                                case 'demande':
                                                    echo 'public/Icons/help.png';
                                                break;
                                                default:
                                                    echo 'public/Icons/Report-problem.png';
                                            }
                                        ?>" alt="">" alt="">
                        </div>
                        <div class="infos">
                            <span class="type-notif"><?php echo $value->getNotifType()->libelle;?></span>
                            <span class="heure-notif"><?php echo $value->created_at;?></span>
                        </div>
                    </div>
                    <div class="notif-state"></div>
                </div>
                <div class="notif-text">
                    Le rendez-vous avec Demba ba du 23 Août 2023 de 09:00 à 10:00 à été annulé.
                </div>
            </a>
        <?php } ?> 
        </div>
        <br>
    </main>
    <script src="public/medecin/Js/notification.js"></script>
</body>
</html>