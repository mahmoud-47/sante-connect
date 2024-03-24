<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/auth/Css/connexion.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <title>Connexion | SanteConnect</title>
        <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    </head>
    <body>
        <br> <br>
        <div class="image-text">
            <img src="public/Images/imageconnexion.png" alt="" id="connect">
            <span><b>Connectez-Vous</b></span>

            <?php if (isset($message_error)){ ?>
                <p style="background:rgba(255,10,10,.5); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_error?></p>
            <?php } ?>

            <?php if (isset($message_success)){ ?>
                <p style="background:rgb(146, 146, 58); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_success?></p>
            <?php } ?>

        </div>
        <form method="POST">
            <div class="mail-password">
                <div class="mail">
                    <img src="public/Icons/mail.png"  id="image1" alt="">
                    <input type="email" id="compte" name="email" placeholder="Adresse Email">
                </div>
                <div class="mots">
                    <img src="public/Icons/lock.png" id="image2" alt="">
                    <img src="public/Icons/hide.png" id="image3" alt="">
                    <input type="password" id="pwd" name="password" placeholder="Mots de passe">
                </div>
            </div>
            <a href="?page=recup_mdp">Mots de passe oublié</a>
            <div class="Sign">
                <input type="submit" id="submit" name="envoie"  value="Connexion"> 
            </div>
            <div class="texte">
                <p>Pas encore inscrit? <a href="?page=register">Inscrivez-vous</a></p>
            </div>
        </form>
        <script src="public/auth/Js/Connexion.js"></script>
    </body>
</html>