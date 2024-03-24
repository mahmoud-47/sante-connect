<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/profil.css">
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
        <form action="#" method="post">
            <div class="profile-pic-container">
                <div class="pic-div">
                    <img src="<?php  echo $user->getUser()->photo; ?>
                                " id="profile-pic" alt="">
                    <input type="file" name="input-photo" id="input-photo">
                    <label for="input-photo" id="edit-label">
                        <img src="public/Icons/image_input.png" alt="">
                    </label>
                </div>
            </div>
            <div class="container">
                <label for="nom">Nom complet</label> <br>
                <input readonly="readonly" type="text" id="nom" value="<?=$user->getUser()->nom_complet?>">
            </div>

            <div class="container">
                <label for="num_telephone">Numéro de téléphone</label> <br>
                <input readonly="readonly" type="text" id="num_telephone" value="<?=$user->getUser()->numero_tel?>">
            </div>
            <div class="container">
                <label for="specialite">Spécialité</label> <br>
                <input readonly="readonly" type="text" id="specialite" value="<?=$user->getSpecialite()->nom?>">
            </div>
            <div class="container">
                <label for="genre">Genre</label> <br>
                <input readonly="readonly" type="text" id="genre" value="<?php 
                                                                            if($user->getUser()->sexe=='h') 
                                                                                echo 'Homme'; 
                                                                            else echo'Femme'; 
                                                                        ?>">
            </div>
            <div class="container">                                 
                <label for="hopital">Hôpital actuel</label> <br>
                <input readonly="readonly" type="text" id="hopital" value="<?=$user->getHopital()->nom?>">
            </div>
            <div class="container">
                <label for="lieu_rv">Lieu du rendez-vous</label> <br>
                <input readonly="readonly" type="text" id="lieu_rv" value="<?=$user->getHopital()->nom?>">
            </div>   
            <div class="container">
                    <label for="ville_rv">Ville du rendez-vous</label> <br>
                    <input readonly="readonly" type="text" id="ville_rv" value="<?=$user->getHopital()->nom?>">
            </div>
            <div class="container cas_particulier">
                <a href="<?=$user->attestation?>" class="boutton-bleu boutton-link">
                    <img src="public/Images/upload.png" alt="" style="margin-right: 10px;">
                    Attestation
                </a>
                <a href="<?=$user->carte_professionnelle?>" class="boutton-bleu boutton-link">
                    <img src="public/Images/upload.png" alt="" style="margin-right: 10px;">
                    Carte professionnelle
                </a>
            </div>
            <div class="container">
                <img src="public/Icons/info.png" alt="">
                Pour toute modification, veuillez nous <a id="contacter" href="index.php?page=requete">contacter</a> .
            </div>
            <div class="container" id="ligne"><br></div>
        </form>
        <form action="#" method="post">
            <div class="container">
                <label for="bio">Bio</label> <br>
                <textarea name="bio" id="bio" cols="30" rows="7"><?=$user->bio?></textarea>
            </div>
            <div class="container">
                <input type="submit" class="boutton-bleu" value="Modifier ma bio">
            </div>
            <div class="container" id="ligne"> <br></div>
        </form>

        <form action="#" method="post">
            <h2 class="container">Tarifs de consultation</h2>
            <div class="container">
                <label for="enfant">Tarif enfant</label> <br>
                <input type="number" id="enfant" placeholder="Entrez le tarif enfant">
            </div>
            <div class="container"> 
                <label for="adulte">Tarif adulte</label> <br>
                <input type="number" id="adulte" placeholder="Entrez le tarif adulte">
            </div>
            <div  class=" container ">
                <input class="boutton-bleu" type="submit" id="submit" value="Valider">
            </div>
        </form>
    </main>
    <script src="public/medecin/Js/profil.js"></script>
</body>
</html>