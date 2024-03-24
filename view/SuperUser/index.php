<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Utilisateurs | SanteConnect</title>
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
        <h1>Tous les utilisateurs</h1>
        <br> <br>
        <form action="" class="form">
            <div class="search">
                <input type="text" placeholder="Rechercher">
                <img src="public/Icons/Search.png" alt="">
            </div>
            
            <div class="send">
                <input type="submit" value="Rechercher">
            </div>
        </form>
        <br> <br>
        
        <p class="result-tableau">Résultat : <?= count($users) ?> ligne<?php if(count($users) > 1) echo "s"; ?></p>
        <?php if(count($users) != 0){ ?>

        <div class="tableau-container">
            <table class="tableau">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Nom complet</th>
                        <th>Date naiss</th>
                        <th>Date insc</th>
                        <th>Email</th>
                        <th>Genre</th>
                        <th>Num Tél</th>
                        <th>Nb RV</th>
                        <th>Photo</th>
                        <th>Rôle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $ligne = 0;
                        foreach ($users as $user) {  
                    ?>
                    <tr>
                        <td><?= ++$ligne ?></td>
                        <td><?=$user->nom_complet ?></td>
                        <td><?=$user->date_de_naissance ?></td>
                        <td><?=$user->verified_at ?></td>
                        <td><?=$user->email ?></td>
                        <td><?=$user->sexe ?></td>
                        <td><?=$user->numero_tel ?></td>
                        <td><?=$user->getNbRvs() ?></td>
                        <td><a href="public/Images/dr-fatou.jpg">voir</a></td>
                        <td><a href="details-user.html">user</a></td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        <?php }?>

    </main>
    <script src="public/admin/Js/base.js"></script>
</body>
</html>

