<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Base | SanteConnect</title>
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
        <h1>Tous les super utilisateurs</h1>
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
        
        <p class="result-tableau">Résultat : 3 lignes</p>

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
                    <tr>
                        <td>1</td>
                        <td>Fatou Gaye</td>
                        <td>12/12/1999</td>
                        <td>12/12/1999</td>
                        <td>gaye.fatou@ugb.edu.sn</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>5</td>
                        <td><a href="public/Images/dr-fatou.jpg">voir</a></td>
                        <td><a href="details-user.html">superuser</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Astou Ndiom Fall</td>
                        <td>12/12/1999</td>
                        <td>12/12/1999</td>
                        <td>astou@ugb.edu.sn</td>
                        <td>F</td>
                        <td>771234567</td>
                        <td>5</td>
                        <td><a href="public/Images/dr-fatou.jpg">voir</a></td>
                        <td><a href="details-user.html">superuser</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ousmane Diop</td>
                        <td>05/05/1998</td>
                        <td>05/05/1998</td>
                        <td>ousmane.diop@senegal.sn</td>
                        <td>M</td>
                        <td>770123456</td>
                        <td>6</td>
                        <td><a href="public/Images/ousmane.jpg">voir</a></td>
                        <td><a href="details-user.html">superuser</a></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </main>
    <script src="public/admin/Js/base.js"></script>
</body>
</html>

