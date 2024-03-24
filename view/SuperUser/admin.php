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
        <h1>Tous les administrateurs</h1>
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
        
        <p class="result-tableau">Résultat : 14 lignes</p>

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
                        <td><a href="public/Images/dr-fatou.jpg">voir</a></td>
                        <td><a href="details-user.html">admin</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Astou Ndiom Fall</td>
                        <td>12/12/1999</td>
                        <td>12/12/1999</td>
                        <td>astou@ugb.edu.sn</td>
                        <td>F</td>
                        <td>771234567</td>
                        
                        <td><a href="public/Images/dr-fatou.jpg">voir</a></td>
                        <td><a href="details-user.html">admin</a></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Ousmane Diop</td>
                        <td>05/05/1998</td>
                        <td>05/05/1998</td>
                        <td>ousmane.diop@senegal.sn</td>
                        <td>M</td>
                        <td>770123456</td>
                        <td><a href="public/Images/ousmane.jpg">voir</a></td>
                        <td><a href="details-user.html">admin</a></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Marième Sarr</td>
                        <td>15/07/2001</td>
                        <td>15/07/2001</td>
                        <td>marieme.sarr@senegal.sn</td>
                        <td>F</td>
                        <td>772345678</td>
                        
                        <td><a href="public/Images/marieme.jpg">voir</a></td>
                        <td><a href="details-user.html">admin</a></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Mamadou Ba</td>
                        <td>10/09/1997</td>
                        <td>10/09/1997</td>
                        <td>mamadou.ba@senegal.sn</td>
                        <td>M</td>
                        <td>770987654</td>
                        <td><a href="public/Images/mamadou.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Fatou Sow</td>
                        <td>25/03/2002</td>
                        <td>25/03/2002</td>
                        <td>fatou.sow@senegal.sn</td>
                        <td>F</td>
                        <td>771234567</td>
                        
                        <td><a href="public/Images/fatou.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Papa Ndoye</td>
                        <td>03/08/1995</td>
                        <td>03/08/1995</td>
                        <td>papa.ndoye@senegal.sn</td>
                        <td>M</td>
                        <td>772345678</td>
                        
                        <td><a href="public/Images/papa.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Mariama Diallo</td>
                        <td>20/11/1998</td>
                        <td>20/11/1998</td>
                        <td>mariama.diallo@senegal.sn</td>
                        <td>F</td>
                        <td>771234567</td>
                        
                        <td><a href="public/Images/mariama.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Moussa Ndiaye</td>
                        <td>16/06/2000</td>
                        <td>16/06/2000</td>
                        <td>moussa.ndiaye@senegal.sn</td>
                        <td>M</td>
                        <td>771234567</td>
                        
                        <td><a href="public/Images/moussa.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Ndeye Sall</td>
                        <td>07/04/2003</td>
                        <td>07/04/2003</td>
                        <td>ndeye.sall@senegal.sn</td>
                        <td>F</td>
                        <td>770123456</td>
                        <td><a href="public/Images/ndeye.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Ibrahima Sow</td>
                        <td>14/02/1996</td>
                        <td>14/02/1996</td>
                        <td>ibrahima.sow@senegal.sn</td>
                        <td>M</td>
                        <td>772345678</td>
                        
                        <td><a href="public/Images/ibrahima.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>Maimouna Cissé</td>
                        <td>30/10/1997</td>
                        <td>30/10/1997</td>
                        <td>maimouna.cisse@senegal.sn</td>
                        <td>F</td>
                        <td>771234567</td>
                        
                        <td><a href="public/Images/maimouna.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Mamadou Ndiaye</td>
                        <td>08/11/1994</td>
                        <td>08/11/1994</td>
                        <td>mamadou.ndiaye@senegal.sn</td>
                        <td>M</td>
                        <td>770987654</td>
                        <td><a href="public/Images/mamadou.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Mariama Sow</td>
                        <td>22/03/2000</td>
                        <td>22/03/2000</td>
                        <td>mariama.sow@senegal.sn</td>
                        <td>F</td>
                        <td>772345678</td>
                        
                        <td><a href="public/Images/mariama.jpg">voir</a></td>
                        <td><a href="">admin</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
    <script src="public/admin/Js/base.js"></script>
</body>
</html>

