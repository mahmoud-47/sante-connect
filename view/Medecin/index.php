<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Dashboard | SanteConnect</title>
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    <?php
    include __DIR__ ."/includes/sidebar.php";
    ?>
<!-- --------------------------------------------------------------------------------------------------------------------- -->

    <main id="main">
        <div id="menu-button">
            <img id = "menu-img"src="public/Icons/menu.png" alt="">
        </div>
        <div id="entete">
            <div class="client">
                <div>
                    <a href="index.php?page=entete">
                        <img src="  <?php 
                                        if(($user->getUser()->photo)!=null){
                                            echo $user->getUser()->photo;
                                        }
                                        else{
                                            echo 'public/Icons/profil.png';
                                        }
                                    ?>" alt="nom_medecin">
                    </a>
                </div>
                <div><font color="grey"><?php 
                                            $heure_actuelle = date("H");
                                            if ($heure_actuelle >= 5 && $heure_actuelle < 16) {
                                                echo "Bonjour";
                                            } else {
                                                echo "Bonsoir";
                                            }
                                        ?> <br> 
                                        <span style="font-weight: 700;font-size: 18px;color: black;">
                                            <?php 
                                                echo 'Dr.'.$user->getUser()->nom_complet;  
                                            ?>
                                        </span> </div>
            </div>
            
            <form class="barre_recherche" method="" action="#">
                <div class="recherche">
                    <input type="search" id="recherche" placeholder="Recherche">
                    <img id="loupe" src="public/Icons/Search.png" alt="">
                    
                </div>
            </form> 
        </div>

<!-- --------------------------------------------------------------------------------------------------------------------- -->

        <div id="rvpaystat">
            <div class="rendez_vous">
                <div class="mini_titre">Rendez-Vous</div>  
                <div class="detail_rv">
                    <div class="first part">
                        <div class="boite_rv tout" >
                            <a href="index.php?page=rendez_vous">
                                <img src="public/Icons/Eye.png" alt="">
                                <div class="nombre">
                                    <?php echo '<span>'.$count.'</span>'; ?>
                                </div> <br>
                                <p class="etat_rv">Tout</p>
                            </a>
                        </div>
                        <div class="boite_rv attente">
                            <a href="index.php?page=rendez_vous">
                                <img src="public/Icons/Time.png" alt="">
                                <div class="nombre">
                                    <?php echo '<span>'.$En_attente.'</span>'; ?>    
                                </div><br>
                                <p class="etat_rv">En attentes</p>
                            </a>
                        </div>  
                    </div>
                    <div class="secon part">
                        <div class="boite_rv confirme" >
                            <a href="index.php?page=rendez_vous">
                                <img src="public/Icons/check.png" alt="">
                                <div class="nombre">
                                    <?php echo '<span>'.$Approuver.'</span>'; ?>
                                </div> <br>
                                <p class="etat_rv">Confirmés</p>
                            </a>
                        </div>
                        <div class="boite_rv decline">
                            <a href="index.php?page=rendez_vous">
                                <img src="public/Icons/Close.png" alt="">
                                <div class="nombre">
                                    <?php echo '<span>'.$Decliner.'</span>'; ?>    
                                </div><br>
                                <p class="etat_rv">Déclinés</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
<!-- --------------------------------------------------------------------------------------------------------------------- -->

            <div >
                <div class="mini_titre">Paiement</div>
                <div class="payement">
                    <div class="boite_pay">
                        <a href="index.php?page=paiement">
                            <div class="somme"><?php echo $montant_disponible.' FCFA'; ?></div> 
                            <div class="etat_pay">Montant disponible</div>
                        </a>
                    </div>
                    <div class="boite_pay">
                        <a href="index.php?page=paiement">
                            <div class="somme"><?php echo $montant_retirer.' FCFA'; ?></div> 
                            <div class="etat_pay">Montant retiré</div>
                        </a>
                    </div>

                </div>
            </div> 

<!-- --------------------------------------------------------------------------------------------------------------------- -->

            <div>
                <div class="mini_titre">Statistiques</div>
                <div class="statistiques">
                    <div class="boite_stat">
                        <div class="stat_gauche">
                            <img src="public/Images/avis.png" alt="">
                        </div>
                        <div class="stat_droite">
                            <p class="mot">Nombre d'avis</p> 
                            <p class="val"><?php echo $nb_avis; ?></p>
                            <p class="plus">
                                <a href="index.php?page=detail">
                                    Plus de détails
                                </a>
                            </p>
                        </div>
                        
                    </div>
                    <div class="ligne"> 
                        
                    </div>
                    <div class="boite_stat">
                        <div class="stat_gauche">
                            <img src="public/Images/occupation.png" alt="">
                        </div>
                        
                        <div class="stat_droite">
                            <p class="mot">Taux d'occupation</p>
                            <p class="val"><?php echo $nb_avis.'%'; ?></p>
                        </div>
                        
                    </div>
                </div>
            </div> 
        </div>  
        
    </main>
    <script src="public/medecin/Js/dashboard.js"></script>
</body>
</html>