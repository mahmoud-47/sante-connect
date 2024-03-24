<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/finaliser.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Rendez-Vous | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    
    <?php
        include __DIR__ ."/includes/sidebar.php";
    ?>
    <main id="main">
        <div id="menu-button">
            <img id = "menu-img"src="../Icons/menu.png" alt="">
        </div>
        <h1>Finaliser le Rendez-Vous</h1>
        <form action="#">
            <div class="finaliser-div">
                <label for="select-age">Votre Catégorie d'age</label>
                <select class="inputs selects" name="select-age" id="select-age">
                    <optgroup>
                        <option value="_">Catégorie d'age</option>
                        <option value="enfant">Enfant</option>
                        <option value="adulte">Adulte</option>
                    </optgroup>
                </select>
            </div>
            <div id="accompagnants">
                <div class="accompagnant hide-section">
                    <div class="finaliser-div">
                        <label for="nom1">Nom complet</label>
                        <input type="text" class="inputs" name="nom1" id="nom1" placeholder="Donnez le nom complet">
                    </div>
                    <div class="finaliser-div">
                        <label for="select1">Catégorie d'âge</label>
                        <select class="inputs selects" name="select1" id="select1">
                            <optgroup>
                                <option value="_">Catégorie d'age</option>
                                <option value="enfant">Enfant</option>
                                <option value="adulte">Adulte</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
                <div class="accompagnant hide-section">
                    <div class="finaliser-div">
                        <label for="nom2">Nom complet</label>
                        <input type="text" class="inputs" name="nom2" id="nom2" placeholder="Donnez le nom complet">
                    </div>
                    <div class="finaliser-div">
                        <label for="select2">Catégorie d'âge</label>
                        <select class="inputs selects" name="select2" id="select2">
                            <optgroup>
                                <option value="_">Catégorie d'age</option>
                                <option value="enfant">Enfant</option>
                                <option value="adulte">Adulte</option>
                            </optgroup>
                        </select>
                    </div>
                </div>
            </div>
            <div class="buttons">
                <span id="add" class="boutton-bleu">Ajouter un patient</span>
                <span id="remove" class="boutton-rouge">Retirer un patient</span>
            </div>
            <div class="finaliser-div">
                <label for="commentaire">Commentaire(Facultatif)</label>
                <textarea name="commentaire" id="commentaire" cols="30" placeholder="Écrivez la commentaire"></textarea>
            </div>

            <p class="montant-container">Montant de la transaction: <span id="montant"> 0 </span> Fcfa</p>
            <div class="finaliser-div">
                <input type="submit" class="boutton-bleu" id="submit" value="Finaliser">            
            </div>
            <br>
            <br>
            <br>
        </form>
    </main>
    <script src="public/user/Js/finaliser.js"></script>
</body>
</html>