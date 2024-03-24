<?php
    $active = isset($active)? $active : "";
?>
<nav id="navbar">
        <div id="logo-nav">
            <div class="logo-container">
                <img id="logo_image" src="public/Logos/logo_white_text.png" alt="">
            </div>
            <div id="nav-elements">
                <a href="?page=index">
                    <div class="element <?php if ($active == 'index'){echo'active_page';}?>">
                        <img src="public/Icons/user_check<?php if ($active == 'index'){echo'_blue';}?>.png" alt="">
                        <span>Validation</span>
                    </div>
                </a>
                <a href="?page=utilisateurs">
                    <div class="element <?php if ($active == 'utilisateurs'){echo'active_page';}?>">
                        <img src="public/Icons/User<?php if ($active == 'utilisateurs'){echo'_blue';}?>.png" alt="">
                        <span>Utilisateurs</span>
                    </div>
                </a>
                <a href="?page=medecins">
                    <div class="element <?php if ($active == 'medecins'){echo'active_page';}?>">
                        <img src="public/Icons/User<?php if ($active == 'medecins'){echo'_blue';}?>.png" alt="">
                        <span>Medecins</span>
                    </div>
                </a>

                <a href="?page=ajout_spec">
                    <div class="element <?php if ($active == 'ajout_spec'){echo'active_page';}?>">
                        <img src="public/Icons/specialites<?php if ($active == 'ajout_spec'){echo'_blue';}?>.png" alt="">
                        <span>Spécialités</span>
                    </div>
                </a>

                <a href="?page=ajout_hospi">
                    <div class="element <?php if ($active == 'ajout_hospi'){echo'active_page';}?>">
                        <img src="public/Icons/Hopital<?php if ($active == 'ajout_hospi'){echo'_blue';}?>.png" alt="">
                        <span>Hopitaux</span>
                    </div>
                </a>
    
                <a href="?page=paiement">
                    <div class="element <?php if ($active == 'paiement'){echo'active_page';}?>">
                        <img src="public/Icons/Banknotes<?php if ($active == 'paiement'){echo'_blue';}?>.png" alt="">
                        <span>Paiement</span>
                    </div>
                </a>

                <a href="?page=avis">
                    <div class="element <?php if ($active == 'avis'){echo'active_page';}?>">
                        <img src="public/Icons/Comments<?php if ($active == 'avis'){echo'_blue';}?>.png" alt="">
                        <span>Avis & Commentaires</span>
                    </div>
                </a>

                <a href="?page=faq">
                    <div class="element <?php if ($active == 'faq'){echo'active_page';}?>">
                        <img src="public/Icons/Faq<?php if ($active == 'faq'){echo'_blue';}?>.png" alt="">
                        <span>FAQ Management</span>
                    </div>
                </a>

            </div>
        </div>
        <div id="logout-container">
            <a href="?page=logout">
                <div class="element">
                    <img src="public/Icons/Logout.png" alt="">
                    <span>Déconnexion</span>
                </div>
            </a>  
        </div>
    </nav>