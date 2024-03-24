<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/dashboard.css">
    <link rel="stylesheet" href="public/templatesCSS/onglets.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Dashboard | SanteConnect</title>
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
        <h1>Dashboard</h1>
        <br>
        <div class="slider">
            <div class="slideritem bar"><h4>A Venir</h4></div>
            <div class="slideritem "><h4>En attente</h4></div>
            <div class="slideritem "><h4>Historique</h4></div>
        </div>
        <br>
        <br>
        <div class="divs">
            <div class="med-cart deja-paye">
                <div class="top-cart-section">
                    <img class="medecin-photo" src="public/Images/fatou_ndiaye.png" alt="">  
                    <div class="cart-informations">
                        <span>Dr. Fatou Ndiaye</span>
                        <div class="jour-heure">
                            <span>Demain</span>
                            <span>|</span>
                            <span>09:30</span>
                        </div>
                        <a href="detail_lieu_rv.html" class="hospi">Hôpital Ousmane Ngom</a>
                        <span class="montant-payé">Montant payé : 18500Fcfa</span>
                    </div>
                </div>
                <hr>
                <a href="#" class="modif-button">Modifier</a>
            </div>
            <br>
            <div class="med-cart pas-encore-paye">
                <div class="top-cart-section">
                    <img class="medecin-photo" src="public/Images/fatou_ndiaye.png" alt="">  
                    <div class="cart-informations">
                        <span>Dr. Fatou Ndiaye</span>
                        <div class="jour-heure">
                            <span>Demain</span>
                            <span>|</span>
                            <span>09:30</span>
                        </div>
                        <a href="detail_lieu_rv.html" class="hospi">Hôpital Ousmane Ngom</a>
                        <span class="montant-payé">Montant payé : 18500Fcfa</span>
                    </div>
                </div>
                <hr>
                <div class="btn-container">
                    <a href="#" class="payer-button">Payer en ligne</a>
                    <a href="#" class="annuler-button">Annuler le RV</a>
                </div>
                <div class="info">
                    <img src="public/Icons/Info.png" alt="">
                    <span>Le paiement en ligne n'est pas obligatoire. Vous pouvez payer à la consultation. </span>
                </div>
            </div>
        </div>
        <div class="divs none">
            <div class="med-cart statut-en-attente">
                <div class="state-status en-attente">
                    En attente de confirmation
                </div>
                <div class="top-cart-section">
                    <img class="medecin-photo" src="public/Images/fatou_ndiaye.png" alt="">  
                    <div class="cart-informations">
                        <span>Dr. Fatou Ndiaye</span>
                        <div class="jour-heure">
                            <span>Demain</span>
                            <span>|</span>
                            <span>09:30</span>
                        </div>
                        <a href="detail_lieu_rv.html" class="hospi">Hôpital Ousmane Ngom</a>
                    </div>
                </div>
                <hr>
                <div class="btn-container">
                    <a href="choisir_creneau.html" class="payer-button">Modifier</a>
                    <a href="#" class="annuler-button">Annuler</a>
                </div>
            </div>
            <br>
            <div class="med-cart statut-en-attente">
                <div class="state-status en-attente">
                    En attente de confirmation
                </div>
                <div class="top-cart-section">
                    <img class="medecin-photo" src="public/Images/fatou_ndiaye.png" alt="">  
                    <div class="cart-informations">
                        <span>Dr. Fatou Ndiaye</span>
                        <div class="jour-heure">
                            <span>Demain</span>
                            <span>|</span>
                            <span>09:30</span>
                        </div>
                        <a href="#" class="hospi">Hôpital Ousmane Ngom</a>
                    </div>
                </div>
                <hr>
                <div class="btn-container">
                    <a href="choisir_creneau.html" class="payer-button">Modifier</a>
                    <a href="#" class="annuler-button">Annuler</a>
                </div>
            </div>
        </div>
        <div class="divs none">
            <div class="med-cart statut-rv-annule">
                <div class="state-status annule">
                    Annulé
                </div>
                <div class="top-cart-section">
                    <img class="medecin-photo" src="public/Images/fatou_ndiaye.png" alt="">  
                    <div class="cart-informations">
                        <span>Dr. Fatou Ndiaye</span>
                        <div class="jour-heure">
                            <span>Demain</span>
                            <span>|</span>
                            <span>03/10/2023</span>
                        </div>
                        <a href="#" class="hospi">Hôpital Ousmane Ngom</a>
                    </div>
                </div>
                <hr>
                <a href="#" class="res-a-nouv-button">Réserver à nouveau</a>
            </div>
            <br>
            <div class="med-cart statut-rv-approuve">
                <div class="state-status approuve">
                    Approuvé
                </div>
                <div class="top-cart-section">
                    <img class="medecin-photo" src="public/Images/fatou_ndiaye.png" alt="">  
                    <div class="cart-informations">
                        <span>Dr. Fatou Ndiaye</span>
                        <div class="jour-heure">
                            <span>03/10/2023</span>
                            <span>|</span>
                            <span>09:30</span>
                        </div>
                        <a href="#" class="hospi">Hôpital Ousmane Ngom</a>
                    </div>
                </div>
                <hr>
                <div class="btn-container">
                    <a href="#" class="res-a-nouv-appr-button">Réserver à nouveau</a>
                    <a href="donner-avis-web.html" class="laisse-avis-button">Laisser un avis</a>
                </div>     
            </div>
            
        </div>
        <br>
        
        
    </main>
    <script src="public/user/Js/dashboard.js"></script>
    <script src="public/templatesJS/onglets.js"></script>
</body>
</html>