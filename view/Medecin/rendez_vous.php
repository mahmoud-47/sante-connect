<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/rendez_vous.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/templatesCSS/form.css">
    <link rel="stylesheet" href="public/templatesCSS/tableau.css">
    <link rel="stylesheet" href="public/templatesCSS/onglets.css">
    <link rel="stylesheet" href="public/templatesCSS/form-search-filter.css">
    <title>Rendez-vous | SanteConnect</title>
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
        <div class="rendez_vous"><h1>Rendez-Vous</h1></div>
        <div class="slider">
            <div class="slideritem"><h4>Nouveau Rendez-Vous</h4></div>
            <div class="slideritem bar"><h4>Tous les Rendez-Vous</h4></div>
            <div class="slideritem "><h4>Créneaux</h4></div>
        </div>
        <br/>
        <br/>
        <div class="divs none">
            <div class="contains">
                <form action="" method="post">
                    <div class="date">
                        <label>Date du rendez-vous</label>
                        <input type="text" name="date_rv" placeholder="02/09/2023" onfocus="this.type='date'" onblur="this.type='text'">
                    </div>
                    <div  class="heure">
                        <div class="debut">
                            <label>Heure de début</label>
                            <input type="text" name="heure_debut" placeholder="09:20" onfocus="this.type='time'" onblur="this.type='text'">
                        </div>
                        <div class="fin">
                            <label>Heure de fin</label>
                            <input type="text" name="heure_fin" placeholder="12:00" onfocus="this.type='time'" onblur="this.type='text'">
                        </div>
                    </div>
                    <div class="choix">
                        <input type="checkbox" onchange="num()">
                        <span>Limiter le nombre de personnes à recevoir</span>
                    </div>
                    <div class="numb" id="numb" style="display: none;">
                        <input type="number" placeholder="Nombre Limite" name="nombre">
                    </div>
                    <div class="envoie">
                        <input type="submit" value="Créer">
                    </div>
                </form>
            </div>
        </div>
        
        <div class="divs">
            <form action="#">
                <div class="search">
                    <input type="text" placeholder="Rechercher">
                    <img src="public/Icons/Search.png" alt="">
                </div>
                <div class="filtrer">
                    <select name="" id="filtre">
                        <option value="">Filtrer par</option>
                        <option value="">En attente</option>
                        <option value="">Approuvé</option>
                        <option value="">Décliné</option>
                    </select>
                </div>
                <div class="send">
                    <input type="submit" value="Rechercher">
                </div>
            </form>
            <br>
            <br>            
            <p class="result-tableau">Résultat : <?php echo count($rendez_vous).' lignes' ?></p>
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
                    <?php $n=1; foreach ($rendez_vous as $value){ ?>
                        <tr>
                            <td><?php echo $n++; ?></td>
                            <td><?php echo $value->num_rv; ?></td>
                            <td><?php echo $value->date ?></td>
                            <td><?php echo $value->getRendezVous()->heure_debut.'-'.$value->getRendezVous()->heure_fin ?></td>
                            <td><?=$value->getUser()->nom_complet ?></td>
                            <td><?=$value->getUser()->numero_tel ?></td>
                            <td><?=$value->etat ?></td>
                            <td><a href="index.php?page=detail_rendez_vous" target="_parent">voir</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
            </div>
        </div>
        <div class="divs none">
            <form action="#">
                <div class="search">
                    <input type="text" placeholder="Rechercher">
                    <img src="public/Icons/Search.png" alt="">
                </div>
                <div class="filtrer">
                    <select name="" id="filtre">
                        <option value="">Filtrer par</option>
                        <option value="">passés</option>
                        <option value="">Aujourd'hui</option>
                        <option value="">A venir</option>
                    </select>
                </div>
                <div class="send">
                    <input type="submit" value="Rechercher">
                </div>
            </form> 
            <br>
            <br>
            <p class="result-tableau"><?php echo 'Résultat: '.count($creneau). ' lignes' ?></p>
            <div class="tableau-container">
                <table class="tableau">
                    <thead>
                        <tr>
                            <th>#No</th>
                            <th>Date</th>
                            <th>Créneau</th>
                            <th>Nombre de patients</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $n=1;
                            foreach($creneau as $cre){
                        ?>
                            <tr>
                                <td><?=$n++?></td>
                                <td><?=$cre->date?></td>
                                <td><?php echo $cre->heure_debut. '-'.$cre->heure_fin?></td>
                                <td><?=count($prisesRvs)?></td>
                                <td><a href="index.php?page=creneaux" target="_parent">voir</a></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="public/medecin/Js/rendez_vous.js"></script>
    <script src="public/templatesJS/onglets.js"></script>
    <script>
        function num(){
            let numb = document.getElementById("numb");
            if(numb.style.display==="none")
                numb.style.display = "block";
            else
                numb.style.display = "none";
        }
    </script>
</body>
</html>