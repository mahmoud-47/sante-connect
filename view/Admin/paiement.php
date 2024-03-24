<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Paiement | SanteConnect</title>
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
        <h1>Paiements</h1> 
        <br>
        <form action="" class="form">
            <div class="search">
                <input type="text" placeholder="Rechercher">
                <img src="public/Icons/Search.png" alt="">
            </div>
            <div class="filtrer">
                <select name="" id="filtre" class="select">
                    <option value="">Filtrer par</option>
                    <option value="">Retrait</option>
                    <option value="">Remboursement</option>
                </select>
            </div>
            <div class="send">
                <input type="submit" value="Rechercher">
            </div>
        </form>
        <br> <br>
        
        <p class="result-tableau">Résultat : 2 lignes</p>

        <h2 style="margin-top: 30px;">Toutes les transactions</h2>
        <br>

        <div class="transaction">
            <div class="img-transaction" style="display: flex;gap: 30px;align-items: center;">
                <img src="public/Icons/transfer.png" alt="" style="width: 25px;height: 25px;">
                <div class="transaction-infos">
                    <p>Retrait de 200.000f de Dr Fatou Ndiaye</p>
                    <div class="transaction-botton">
                        <div class="sub">
                            <img src="public/Icons/orange-money.png" alt="" class="logo-transaction">
                            <span>77 123 45 67</span>
                        </div>
                        <span>Réf OM83765.0284.276</span>
                    </div>
                </div>
            </div>
            <div class="date-transaction">
                21/08/2024 à 11h02
            </div>
        </div>

        <div class="transaction">
            <div class="img-transaction" style="display: flex;gap: 30px;align-items: center;">
                <img src="public/Icons/transfer.png" alt="" style="width: 25px;height: 25px;">
                <div class="transaction-infos">
                    <p>Retrait de 200.000f de Dr Fatou Ndiaye vers Omar Ba</p>
                    <div class="transaction-botton">
                        <div class="sub">
                            <img src="public/Icons/orange-money.png" alt="" class="logo-transaction">
                            <span>77 123 45 67</span>
                        </div>
                        <span>Réf OM83765.0284.276</span>
                    </div>
                </div>
            </div>
            <div class="date-transaction">
                21/08/2024 à 11h02
            </div>
        </div>
        
    </main>
    <script src="public/admin/Js/base.js"></script>
</body>
</html>

