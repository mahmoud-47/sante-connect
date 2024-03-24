<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/auth/Css/recup-mdp-web.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>MotDePasse</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    <div class="logo-text">
        <img src="public/Images/nouveau-mdp.png" alt="">

        <?php if (isset($message_error)){ ?>
            <p style="background:rgba(255,10,10,.5); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_error?></p>
        <?php } ?>

        <?php if (isset($message_success)){ ?>
            <p style="background:rgb(146, 146, 58); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_success?></p>
        <?php } ?>

        <h1>Mot de Passe Oublié</h1>
        <p class="para">
            Entrez votre adresse mail 
            associé à votre compte et nous 
            allons vous envoyer un lien 
            pour modifier votre mot de passe
        </p> 
    </div>
    <form method="post">
        <div class="email-container">
            <img src="public/Icons/mail.png" alt="">
            <input type="email" id="email" placeholder="Adresse Email" name="email">
        </div>
        <div class="button-container">
            <input type="submit" value="Récupérer mon mot de passe" id="submit">
        </div>
        <div class="question">
            <p>Pas encore inscrit ? <a href="?page=register">Inscrivez-vous</a></p> 
        </div>
    </form>
    
    <script>

    </script>
</body>
</html>