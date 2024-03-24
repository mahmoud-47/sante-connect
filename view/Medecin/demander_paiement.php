<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/demander_paiement.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
    <title>Demander Paiement | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    <nav id="navbar">
        <div id="logo-nav">
            <div class="logo-container">
                <img id="logo_image" src="public/Logos/logo_white_text.png" alt="">
            </div>
            <div id="nav-elements">
                <a href="index.html">
                    <div class="element">
                        <img class="icon_nav" src="public/Icons/Book.png" alt="">
                        <span>Dashboard</span>
                    </div>
                </a>
                <a href="rendez_vous.html">
                    <div class="element">
                        <img class="icon_nav" src="public/Icons/Calendar.png" alt="">
                        <span>Rendez-Vous</span>
                    </div>
                </a>
                <a href="notification.html">
                    <div class="element ">
                        <img class="icon_nav" src="public/Icons/Bell.png" alt="">
                        <span>Notification</span>
                    </div>
                </a>
                <a href="paiement.html">
                    <div class="element active_page">
                        <img class="icon_nav" src="public/Icons/Banknotes_blue.png" alt="">
                        <span>Paiement</span>
                    </div>
                </a>
                <a href="profil.html">
                    <div class="element">
                        <img class="icon_nav" src="public/Icons/User.png" alt="">
                        <span>Profil</span>
                    </div>
                </a>
                <a href="apropos.html">
                    <div class="element">
                        <img class="icon_nav" src="public/Icons/About.png" alt="">
                        <span>A propos</span>
                    </div>
                </a> 
                <a href="faq.html">
                    <div class="element">
                        <img class="icon_nav" src="public/Icons/Faq.png" alt="">
                        <span>FAQ</span>
                    </div>
                </a>
            </div>
        </div>
        <div id="logout-container">
            <a href="public/auth/connexion.html">
                <div class="element">
                    <img src="public/Icons/Logout.png" alt="">
                    <span>Déconnexion</span>
                </div>
            </a>  
        </div>
    </nav>
    <main id="main">
        <div id="menu-button">
            <img id = "menu-img"src="public/Icons/menu.png" alt="">
        </div>
        <h1>Demander un paiement</h1>
        <div class="contains">
            <form action="">
                <div class="date">
                    <label>Montant</label>
                    <input type="text" placeholder="Entrez le montant" onfocus="this.type='number'" onblur="this.type='text'">
                </div>
                <div class="heure">
                    <div class="debut">
                        <label>Numéro de téléphone</label>
                        <input type="text" placeholder="Entrez le numéro de téléphone" onfocus="this.type='tel'" onblur="this.type='text'">
                    </div>
                    <div class="fin">
                        <label>Opérateur</label>
                        <select name="filtre" id="filtre">
                            <option>Orange Money</option>
                            <option value="Option1">Wave</option>
                            <option value="Option1">Free Money</option>
                            
                        </select>
                    </div>
                </div>
                <a href="" class="button-link">
                    <button class="boutton-bleu">
                        Envoyer la demande
                    </button>
                </a>
            </form>
            <br>
            <p class="result-tableau">Historique des demandes (3)</p>
            <div class="tableau-container">
                <table class="tableau">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Date</th>
                            <th>Montant</th>
                            <th>Num Tél</th>
                            <th>Opérateur</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>22/09/2023</td>
                            <td>12000</td>
                            <td>+221 76 458 34 56</td>
                            <td>Orange Money</td>
                            <td>En attente</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>28/09/2023</td>
                            <td>13000</td>
                            <td>+221 78 456 23 45</td>
                            <td>Orange Money</td>
                            <td>Validé</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>29/09/2023</td>
                            <td>20000</td>
                            <td>+221 77 234 45 67</td>
                            <td>Orange Money</td>
                            <td>Validé</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="public/medecin/Js/demander_paiement.js"></script>
</body>
</html>