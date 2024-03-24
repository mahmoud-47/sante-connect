<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/auth/Css/otp.css">
        <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
        <title>OTP | SanteConnect</title>
        <link rel="shortcut icon" href="../Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    </head>
<body>
    <br> <br>
    <div class="logo-text">
        <img src="public/Images/otp_image.png" alt="">
        <span>Entrez le Code OTP</span>

        <?php if (isset($message_error)){ ?>
            <p style="background:rgba(255,10,10,.5); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_error?></p>
        <?php } ?>

        <?php if (isset($message_success)){ ?>
            <p style="background:rgb(146, 146, 58); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_success?></p>
        <?php } ?>

    </div>
    <form id = "optform" method="post">
        <div class="otp-text">
            Un code de confirmation vous a été envoyée dans votre adresse email. Ne donnner ce code à personne
        </div>
        <div id="fields">
            <input type="text" autocomplete="off" maxlength="1" class="field" name="val1">
            <input type="text" autocomplete="off" maxlength="1" class="field" name="val2">
            <input type="text" autocomplete="off" maxlength="1" class="field" name="val3">
            <input type="text" autocomplete="off" maxlength="1" class="field" name="val4">
        </div>
        <div class="validate">
            <input type="submit" value="Suivant" id="submit">
        </div>
        <div class="link-container">
            <a href="#">Renvoyer OTP</a>
        </div>
    </form>
    <script src="public/auth/Js/otp.js"></script>
</body>
</html>