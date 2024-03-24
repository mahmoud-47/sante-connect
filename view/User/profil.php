<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/profil.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Profil | SanteConnect</title>
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
        <h1>Profil</h1>
            <?php if (isset($message_error)){ ?>
                <p style="background:rgba(255,10,10,.5); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_error?></p>
            <?php } ?>

            <?php if (isset($message_success)){ ?>
                <p style="background:rgb(146, 146, 58); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_success?></p>
            <?php } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="profile-pic-container">
                <div class="pic-div">
                    <img src="<?=$user->photo?>" id="profile-pic" alt="">
                    <input type="file" name="photo" id="input-photo">
                    <label for="input-photo" id="edit-label">
                        <img src="public/Icons/image_input.png" alt="">
                    </label>
                </div>
            </div>
            <div class="container">
                <label for="nom">Nom complet</label> <br>
                <input type="text" id="nom" name="nom" value="<?=$user->nom_complet?>">
            </div>
            <div class="container">
                <label for="email">Adresse email</label> <br>
                <input type="email" id="email" value="<?=$user->email?>" readonly>
            </div>
            <div class="container">
                <label for="genre">Genre</label> <br>
                <input type="text" id="genre" value="<?php if($user->sexe=='f')echo 'Femme'; else echo 'Homme'?>" readonly>
            </div>
            <div class="container">
                <label for="date-naissance">Date de naissance</label> <br>
                <input type="date" id="date-naissance" name="date_naiss" value="<?php echo date('Y-m-d', strtotime($user->date_de_naissance));?>">
            </div>
            <div class="container">
                <input type="submit" id="submit1" value="Enregistrer">
            </div>
        </form>
        <div class="container" id="change-pwd">
            <span>Changer mot de passe</span>
            <img id="chev-img" src="public/Icons/chevron-down.png" alt="">
        </div>
        <form action="?page=new_mdp" method="post" id="hide-form" class="show">
            <div class="container">
                <img src="public/Icons/lock.png" id="lock1" alt="">
                <img src="public/Icons/hide.png" id="status1" alt="">
                <input type="password" id="pwd1" name="pwd1" placeholder="Nouveau mot de passe">
            </div>
            <div class="container">
                <img src="public/Icons/lock.png" id="lock2" alt="">
                <img src="public/Icons/hide.png" id="status2" alt="">
                <input type="password" id="pwd2" name="pwd2" placeholder="Confirmer le mot de passe">
            </div>
            <div class="container">
                <input type="submit" id="submit2" value="Modifier">
            </div>
        </form>
        <br>
        <br>
        <br>
    </main>
    <script src="public/user/Js/profil.js"></script>
</body>
</html>