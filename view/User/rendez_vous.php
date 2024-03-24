<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/user/Css/rendez_vous.css">
    <link rel="stylesheet" href="public/templatesCSS/choices.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Rendez-Vous | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
    <style>
        .date-row{
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            width: 100%;
            gap: 30px;
            padding:10px;
        }
        .row-element{
            flex-basis: 28%;
            display: flex;
            justify-self: center;
        }
        .date-row span{
            color: #3C7ECC;
            font-weight: 800;
            border: 4px solid #3C7ECC;
            cursor: pointer;
            padding: 3px 0;
            width: 120px;
            display: flex;
            justify-content: center;
            border-radius: 30px;
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
        <h1>Prendre un Rendez-Vous</h1>
        <br>
        <div class="filter-slider">
            <a href="?page=rendez-vous&categorie=Tout" class="filter-bloc <?php if($categorie==='Tout') echo 'active'; ?>">Tout</a>
            <?php foreach($specialites as $specialite){?>
                <a href="?page=rendez-vous&categorie=<?=$specialite->id?>" class="filter-bloc <?php if($categorie==$specialite->id) echo 'active'; ?>"><?=$specialite->nom?></a>
            <?php } ?>
           
        </div>
        <div class="medecins-disponibles">

            <?php foreach($groupedRvsByMedecin as $medecinId => $rvsForMedecin) {?>
            
            <div class="medecin-disponible">
                <div class="medecin-header">
                    <img class="medecin-photo" src="<?=MedecinInfosModel::get($medecinId)->getUser()->photo?>" alt="">
                    <div class="medecin-info">
                        <div class="name-like">
                            <a href="?page=medecin&med-id=<?=$medecinId?>" style="text-decoration:none;color:black">

                                <span><?=MedecinInfosModel::get($medecinId)->getUser()->nom_complet?></span>
                            </a>
                            
                        </div>
                        <hr class="sep">
                        <div class="spec-ville">
                        <?=MedecinInfosModel::get($medecinId)->getSpecialite()->nom?> | <?=MedecinInfosModel::get($medecinId)->ville_lieurv?>
                        </div>
                        <div class="stars">
                        <?php $count = 0; for($i=1; $i<=(float)MedecinInfosModel::get($medecinId)->getNote(); $i++, $count++): ?>
                            <img src="public/Icons/star.png" alt="">
                        <?php endfor ?>

                        <?php if(MedecinInfosModel::get($medecinId)->getNote()-$count>0) : ?>
                            <img src="public/Icons/star-middle.png" alt="">
                        <?php endif ?>
                        </div>
                    </div>
                </div>
                
                    <div class="date-row">
                        <?php foreach ($rvsForMedecin as $rv) { ?>
                        <div class="row-element">
                            <span><?=$rv->date?></span>
                        </div>
                        <?php } ?>
                    </div>
                
                <a href="?page=choisir_creneau&med-id=<?=$medecinId?>" class="consulter">Consulter</a>
            </div>
            
            <?php } ?>


            
            
        </div>
    </main>
    <script src="public/user/Js/rendez_vous.js"></script>
</body>
</html>