<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/paiement.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Paiement | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <style>
        .somme_boite{
            font-size: 20px;
        }
        .droite_hist{
            font-size: 15px;
        }
    </style>
</head>
<body>
    <?php
        include __DIR__ ."/includes/sidebar.php";
    ?>
    <main id="main">
        <div id="menu-button">
            <img id = "menu-img"src="public/Icons/menu.png" alt="">
        </div>
        <h1>Paiement</h1>
        <div class="solde">
            <div class="gauche">
                <img src="public/Icons/wallet.png" alt="">
                <div class="g_droite">
                    <p id="monsolde">Mon solde</p>
                    <p id="somme_solde"><?php echo $montant_disponible.' FCFA'; ?></p>
                </div>
            </div>
            <a href="demander_paiement.html" class="button-link">
                <button class="boutton-bleu">
                    Demander un paiement
                </button>
            </a>
        </div>
        <p id="hist">Historique de paiement</p>
        <div class="boite_hist">
            <div class="haut_hist">
            <?php $retirer=0; foreach($statut as $key){ 
                if($key->etat == 'Validé' && $key ->user_id == $_SESSION['user_id']){
                    $retirer= $retirer + $key->montant;
                }
            ?>
                <div class="gauche_hist">
                    <img src="public/Icons/haut.png" alt="">
                    <p class="somme_boite"><?php echo '-'.$retirer.' FCFA'; ?></p>
                </div>
                <span class="droite_hist">
                    <span id="date">21/08/2023</span> à <span id="heure">12 : 55</span>
                </span>
            </div>
            <div class="bas_hist">
                <span>
                    <img src="public/Icons/om.png" alt="">
                </span>
                <span id="numero_tel"><?= $key->getUser()->numero_tel?></span>
                <span><span>Réf:</span><span id="reference"><?= $key->paiement_code?></span></span>
            </div>
            <?php }?>
        </div>
        <div class="boite_hist">
            <div class="haut_hist">
            <?php foreach($RV as $key){
                 if($key ->online_paied && $key ->getRendezVous()->medecin_id == $_SESSION['user_id'])
                 $encaisser=$key->prix; 
            ?>
                <div class="gauche_hist">
                    <img src="public/Icons/bas.png" alt="">
                    <p class="somme_boite"><?php echo '+'.$encaisser.' FCFA'; ?></p>
                </div>
            </div>
            <div class="bas_hist">
                <a id="det_rv" href="detail_rendez_vous.php">
                    <img src="public/Icons/eye_blue.png" alt="">
                    <span>Détails du Rendez-Vous</span>
                </a>
            </div>
            <?php }?>
        </div>
        
    </main>
    <script src="public/medecin/Js/paiement.js"></script>
</body>
</html>