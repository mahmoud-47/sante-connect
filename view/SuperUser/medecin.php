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
        <h1>Tous les médecins</h1> 
        <br> <br>
        <form action="" class="form">
            <div class="search">
                <input type="text" placeholder="Rechercher">
                <img src="public/Icons/Search.png" alt="">
            </div>
            <div class="filtrer">
                <select name="" id="filtre" class="select">
                    <option value="">Filtrer par</option>
                    <option value="">Géolocalisation ajoutée</option>
                    <option value="">Pas de Géolocalisation</option>
                </select>
            </div>
            <div class="send">
                <input type="submit" value="Rechercher">
            </div>
        </form>
        <br> <br>
        
        <p class="result-tableau">Résultat : 14 lignes</p>

        <div class="tableau-container">
            <table class="tableau">
                <thead>
                    <tr>
                        <th>#No</th>
                        <th>Nom complet</th>
                        <th>Date insc</th>
                        <th>Email</th>
                        <th>Spécialité</th>
                        <th>Hôpotal</th>
                        <th>Lieu RV</th>
                        <th>Ville</th>
                        <th>Genre</th>
                        <th>Num Tél</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Modou Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Ophtalmologie</td>
                        <td>Hôpital Fane</td>
                        <td><a href="">Afficher</a></td>
                        <td>Dakar</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Modou Moustapha Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Urologie</td>
                        <td>Hôpital Khoury Dieye</td>
                        <td><a href="">Afficher</a></td>
                        <td>Mbour</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Modou Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Ophtalmologie</td>
                        <td>Hôpital Fane</td>
                        <td><a href="">Afficher</a></td>
                        <td>Dakar</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Modou Moustapha Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Urologie</td>
                        <td>Hôpital Khoury Dieye</td>
                        <td><a href="">Afficher</a></td>
                        <td>Mbour</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Modou Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Ophtalmologie</td>
                        <td>Hôpital Fane</td>
                        <td><a href="">Afficher</a></td>
                        <td>Dakar</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Modou Moustapha Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Urologie</td>
                        <td>Hôpital Khoury Dieye</td>
                        <td><a href="">Afficher</a></td>
                        <td>Mbour</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Modou Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Ophtalmologie</td>
                        <td>Hôpital Fane</td>
                        <td><a href="">Afficher</a></td>
                        <td>Dakar</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Modou Moustapha Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Urologie</td>
                        <td>Hôpital Khoury Dieye</td>
                        <td><a href="">Afficher</a></td>
                        <td>Mbour</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Modou Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Ophtalmologie</td>
                        <td>Hôpital Fane</td>
                        <td><a href="">Afficher</a></td>
                        <td>Dakar</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Modou Moustapha Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Urologie</td>
                        <td>Hôpital Khoury Dieye</td>
                        <td><a href="">Afficher</a></td>
                        <td>Mbour</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Modou Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Ophtalmologie</td>
                        <td>Hôpital Fane</td>
                        <td><a href="">Afficher</a></td>
                        <td>Dakar</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Modou Moustapha Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Urologie</td>
                        <td>Hôpital Khoury Dieye</td>
                        <td><a href="">Afficher</a></td>
                        <td>Mbour</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Modou Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Ophtalmologie</td>
                        <td>Hôpital Fane</td>
                        <td><a href="">Afficher</a></td>
                        <td>Dakar</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Modou Moustapha Gaye</td>
                        <td>12/12/1999</td>
                        <td>gaye.mohamed@ugb.edu.sn</td>
                        <td>Urologie</td>
                        <td>Hôpital Khoury Dieye</td>
                        <td><a href="">Afficher</a></td>
                        <td>Mbour</td>
                        <td>M</td>
                        <td>771234567</td>
                        <td>
                            <a href="public/Images/dr-fatou.jpg">voir</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script src="public/admin/Js/base.js"></script>
</body>
</html>

