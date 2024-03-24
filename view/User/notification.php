<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/notification.css">
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
            <a href="#" class="notification">
                <div class="header-notif">
                    <div class="notif-header-left">
                        <div class="circle-icon decliné">
                            <img src="public/Icons/decliné.png" alt="">
                        </div>
                        <div class="infos">
                            <span class="type-notif">Rendez-Vous decliné!</span>
                            <span class="heure-notif">Aujourd'hui | 14:56</span>
                        </div>
                    </div>
                    <div class="notif-state"></div>
                </div>
                <div class="notif-text">
                    Le rendez-vous avec Dr. Papa Ahmadou Ndiaye  du 23 Août 2023 à l’hopital régional de Saint-Louis a été decliné. Nous nous excusons de ce désagrément Bonne Journée à vous.
                </div>
            </a>
            <a href="#" class="notification">
                <div class="header-notif">
                    <div class="notif-header-left">
                        <div class="circle-icon modifié">
                            <img src="public/Icons/modifié.png" alt="">
                        </div>
                        <div class="infos">
                            <span class="type-notif">Horaire modifié</span>
                            <span class="heure-notif">Hier | 12:18</span>
                        </div>
                    </div>
                    <div class="notif-state"></div>
                </div>
                <div class="notif-text">
                    Vous avez modifé le rendez-vous avec Dr. Fatou Sarr qui devrait se tenir le 24 Août à 9:00 au 29 Août à 9:00. Veuillez activer votre alarme ppour ne pas le manquer.
                </div>
            </a>
            <a href="#" class="notification">
                <div class="header-notif">
                    <div class="notif-header-left">
                        <div class="circle-icon obtenu">
                            <img src="public/Icons/obtenu.png" alt="">
                        </div>
                        <div class="infos">
                            <span class="type-notif">Rendez-Vous obtenu!</span>
                            <span class="heure-notif">14 Août 2023 | 20:36</span>
                        </div>
                    </div>
                    <div class="notif-state notif-lue"></div>
                </div>
                <div class="notif-text">
                    Vous avez obtenu un rendez-vous avec Dr. Soukeyna Ndiaye qui se tiendra le 02 Août à 9:00 à l’hôpital Ousmane Ngom. N’oublier pas d’activer une alarme pour ne pas le manquer.
                </div>
            </a>
            <a href="#" class="notification">
                <div class="header-notif">
                    <div class="notif-header-left">
                        <div class="circle-icon rappel">
                            <img src="public/Icons/rappel.png" alt="">
                        </div>
                        <div class="infos">
                            <span class="type-notif">Rappel</span>
                            <span class="heure-notif">12 Août 2023 | 15:42</span>
                        </div>
                    </div>
                    <div class="notif-state notif-lue"></div>
                </div>
                <div class="notif-text">
                    On tenait à vous rappeler que lerendez-vous avec Dr. Moussa Diop se tiendra demain à 10:00. Veuillez activer votre alarme pour ne pas le manquer.
                </div>
            </a>
            <a href="#" class="notification">
                <div class="header-notif">
                    <div class="notif-header-left">
                        <div class="circle-icon annulé">
                            <img src="public/Icons/annulé.png" alt="">
                        </div>
                        <div class="infos">
                            <span class="type-notif">Rendez-Vous annulé!</span>
                            <span class="heure-notif">31 Juillet 2023 | 14:56</span>
                        </div>
                    </div>
                    <div class="notif-state notif-lue"></div>
                </div>
                <div class="notif-text">
                    Le rendez-vous avec Dr. Papa Ahmadou Ndiaye  du 23 Août 2023 de 08:00 à 10:00 a été annulé. Vous allez être remboursé dans les 48H, Jour non-ouvrables exclus.
                </div>
            </a>
        </div>
        <br>
    </main>
    <script src="Js/notification.js"></script>
</body>
</html>