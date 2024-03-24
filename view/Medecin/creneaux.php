<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/creneaux.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <title>Créneaux | SanteConnect</title>
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
        <h1>Détail Créneau</h1>
        <br>
        <br>
        <form action="" class="form">

                <div class="filtrer">
                    <select name="filtre" id="filtre">
                        <option value="">Prendre une action</option>
                        <option value="Option1">Annuler tous les rendez-vous</option>
                        <option value="Option2">Annuler les rendre-vous en attente</option>
                        <option value="Option3">Cloturer les rendez-vous</option>
                    </select>
                </div>
                <div class="send">
                    <input type="submit" value="Valider">
                </div>
        </form>
        <br>
        <br>
        <br>
        <form action="#">
            <div class="search">
                <input type="text" placeholder="Rechercher">
                <img src="public/Icons/Search.png" alt="">
            </div>
            <div class="filtrer">
                <select name="filtre" id="filtre">
                    <option value="">Filtrer par</option>
                    <option value="Option1">En attente</option>
                    <option value="Option2">Approuvé</option>
                    <option value="Option3">Décliné</option>
                </select>
            </div>
            <div class="send">
                <input type="submit" value="Rechercher">
            </div>
        </form>
        <br>
        <br>
        <p class="result-tableau"><?php echo 'Résultat:'.count($prisesRvs).' lignes' ?></p>
        <div class="tableau-container">
        <table class="tableau">
            <thead>
                    <tr>
                        <th>#No</th>
                        <th>Num RV</th>
                        <th>Date</th>
                        <th>Créneau</th>
                        <th>Nom Patient</th>
                        <th>Num Tél</th>
                        <th>Etat</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $n=1;
                        foreach($prisesRvs as $prise){
                    ?>
                        <tr>
                            <td><?=$n++?></td>
                            <td><?=$prise->num_rv?></td>
                            <td><?=$prise->date?></td>
                            <td><?php echo $prise->getRendezVous()->heure_debut. '-'.$prise->getRendezVous()->heure_fin?></td>
                            <td><?=$prise->getUser()->nom_complet?></td>
                            <td><?=$prise->getUser()->numero_tel?></td>
                            <td><?=$prise->etat?></td>
                            <td><a href="index.php?page=detail_rendez_vous" target="_parent">voir</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
        </table>
        </div>
    </main>
    <script src="public/medecin/Js/creneaux.js"></script>
</body>
</html>