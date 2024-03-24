<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/requete.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Requête | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
</head>
<body>
    <?php
        include __DIR__ ."/includes/sidebar.php";
    ?>
    <main id="main">
        <div id="menu-button">
            <img id = "menu-img" src="public/Icons/menu.png" alt="">
        </div>
        <div class="logo" >
            <img id="princiapale" src="public/Logos/logo_blue_text.png" alt="">
        </div>
        <h1>Demande de modification d’informations personnelles</h1>
        <form action="#" method="post">
            <div class="champ">
                <input class="readonly" name="mail_info_pers" value="exemple@azer.com" type="email" readonly="readonly" id="email">
            </div>
            <div class="champ">
                <input class="readonly" readonly="readonly" value="Demande de modification d’information Dem-124A45B" type="text" id="sujet">
            </div>
            <div class="champ">
                <textarea name="comment_info_pers" id="" cols="40" rows="5" placeholder="Ecrivez nous" id="message"></textarea>
            </div>
            <br>
            <a href="" class="button-link">
                <button class="boutton-bleu">
                    Soumettre
                </button>
            </a>
            
        </form>
    </main>
    <script src="public/medecin/Js/requete.js"></script>
</body>
</html>