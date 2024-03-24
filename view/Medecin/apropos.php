<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/apropos.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>A-Propos | SanteConnect</title>
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
        <h1>A-propos</h1>
        <div class="main-logo-container">
            <img src="public/Logos/logo_blue_text.png" alt="">
        </div>
        <div class="apropos-sc">
            <h2>Qui sommes nous ?</h2>
            <span>Bienvenue sur Santé Connect, votre plateforme de prise de rendez-vous médicaux en ligne. Conçue pour simplifier votre parcours de santé, Santé Connect vous offre un accès rapide et facile aux services médicaux dont vous avez besoin</span>
        </div>
        <form action="#" id="a-propos-form">
            <h2>Contactez-nous</h2>
            <div>
                <input type="email" name="email" id="email" value="ousmanebadji@gmail.com" placeholder="Adresse Email">
            </div>
            <div>
                <input type="text" name="sujet" id="sujet" placeholder="Sujet">
            </div>
            <div>
                <textarea name="message-content" id="message-content" rows="10" placeholder="Ecrivez-nous"></textarea>
            </div>
            <input type="submit" value="Envoyer">
        </form>
        <br>
        <br>
    </main>
    <script src="public/medecin/Js/apropos.js"></script>
</body>
</html>