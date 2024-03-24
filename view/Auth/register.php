<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/auth/Css/register.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Inscription | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    <div class="logo-text">
        <img src="public/Logos/logo_blue_text.png" alt="">
        <span>Inscrivez-vous</span>

        <?php if (isset($message_error)){ ?>
            <p style="background:rgba(255,10,10,.5); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_error?></p>
        <?php } ?>

        <?php if (isset($message_success)){ ?>
            <p style="background:rgb(146, 146, 58); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_success?></p>
        <?php } ?>

    </div>
    
    <form method="post">
        <div class="select-container">
            <select name="type_compte" id="type_compte">
                <option value="">Type de compte</option>
                <option value="user">Patient</option>
                <option value="medecin">Médecin</option>
            </select>
        </div>
        <div class="email-container">
            <img src="public/Icons/mail.png" alt="">
            <input type="text" id="email" name="email" placeholder="Adresse Email">
        </div>
        <div class="password-container">
            <img src="public/Icons/lock.png" id="lock" alt="">
            <img src="public/Icons/hide.png" id="status" alt="">
            <input type="password" id="password" name="password"  placeholder="Mot de passe">
        </div>
        <div class="checkbox-container">
            <input type="checkbox" name="checkbox" id="checkbox" required>
            <label for="checkbox">J'ai lu la <a href="?page=politique-de-confidentialite" target="_blank">politique de confidentialité</a> et j'accepte  les <a target="_blank" href="?page=condition_utilisation">conditions d'utilisation</a></label>
        </div>
        <div class="button-container">
            <input type="submit" value="S'inscrire" id="submit">
        </div>
        <p class="already_logged">Déja inscrit ? <a href="?page=login">Connectez-vous</a></p>
    </form>
    <script src="public/auth/Js/register.js"></script>

</body>
</html>