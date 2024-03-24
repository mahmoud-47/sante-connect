<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/detail_rendez_vous.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <title>Détail Rendez-Vous | SanteConnect</title>
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
        <h1>Détail Rendez-Vous</h1>
            <div class="tableau-container">
                <table class="tableau">
                    <tbody>
                    <?php 
                        foreach($prisesRvs as $prise){
                    ?>
                        <tr>
                            <th>Numéro Rendez-Vous</th>
                            <td><?=$prise->num_rv?></td>
                            <th>Nom Patient</th>
                            <td><?=$prise->getUser()->nom_complet?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
            <br>
            <a href="" class="button-link">
                <button class="boutton-vert" style="margin-bottom: 20px;">
                    Valider
                </button>
            </a>
            <a href="" class="button-link">
                <button class="boutton-rouge">
                    Décliner
                </button>
            </a>
            
    </main>
    <script src="public/medecin/Js/detail_rendez_vous.js"></script>
</body>
</html>