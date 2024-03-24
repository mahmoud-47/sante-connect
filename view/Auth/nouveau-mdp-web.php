<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/auth/Css/nouveau-mdp-web.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Nouveau-Mdp-Web</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    <script src="public/auth/Js/nouveau-mdp-web.js" defer></script>
</head>
<body>
        <div class="image">
            <img src="public/Images/nouveau-mdp.png" alt="">

        </div>
        
        <div class="texte">
            <?php if (isset($message_error)){ ?>
                <p style="background:rgba(255,10,10,.5); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_error?></p>
            <?php } ?>

            <?php if (isset($message_success)){ ?>
                <p style="background:rgb(146, 146, 58); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_success?></p>
            <?php } ?>

            <h1>Nouveau mot de passe</h1>
            <p>
                Un mot de passe sécurisé est requis. 
                Entrez au moins 8 caractères. 
                N'incluez pas de mots ou de noms courants. 
                Combinez les lettres majuscules, les lettres minuscules,
                 les chiffres et les symboles
            </p>
        </div>
        <form method="post">

            <div class="password-container">
                <img src="public/Icons/lock.png" id="lock" alt="">
                <img src="public/Icons/hide.png" id="status" alt="">
                <input name="pwd1" type="password" id="password"  placeholder="Nouveau mot de passe">
            </div>
            <div class="password-container">
                <img src="public/Icons/lock.png" id="lock1" alt="">
                <img src="public/Icons/hide.png" id="status1" alt="">
                <input name="pwd2" type="password" id="password1"  placeholder="Confirmer nouveau mot de passe">
            </div>
            <div class="button-container">
                <input type="submit" value="Continuer" id="submit">
            </div>
            <br>
        </form>
        <p class="already_logged"><a style="text-decoration: none;" href="?page=login">connexion</a></p>
</body>
</html>