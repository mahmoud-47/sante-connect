<?php
    $active = isset($active)? $active :"";
?>
<nav id="navbar">
        <div id="logo-nav">
            <div class="logo-container">
                <img id="logo_image" src="public/Logos/logo_white_text.png" alt="">
            </div>
            <div id="nav-elements">
                <a href="index.php?page=dashboard">
                    <div class="element <?php if ($active == 'dashboard'){echo'active_page';}?>">
                        <img class="icon_nav" src="public/Icons/Book<?php if ($active == 'dashboard'){echo'_blue';}?>.png" alt="">
                        <span>Dashboard</span>
                    </div>
                </a>
                <a href="index.php?page=rendez_vous">
                    <div class="element <?php if ($active == 'rendez_vous'){echo'active_page';}?>">
                        <img class="icon_nav" src="public/Icons/Calendar<?php if ($active == 'rendez_vous'){echo'_blue';}?>.png" alt="">
                        <span>Rendez-Vous</span>
                    </div>
                </a>
                <a href="index.php?page=notification">
                    <div class="element <?php if ($active == 'notification'){echo'active_page';}?>">
                        <img class="icon_nav" src="public/Icons/Bell<?php if ($active == 'notification'){echo'_blue';}?>.png" alt="">
                        <span>Notification</span>
                    </div>
                </a>
                <a href="index.php?page=paiement">
                    <div class="element <?php if ($active == 'paiement'){echo'active_page';}?>">
                        <img class="icon_nav" src="public/Icons/Banknotes<?php if ($active == 'paiement'){echo'_blue';}?>.png" alt="">
                        <span>Paiement</span>
                    </div>
                </a>
                <a href="index.php?page=profil">
                    <div class="element <?php if ($active == 'profil'){echo'active_page';}?>">
                        <img class="icon_nav" src="public/Icons/User<?php if ($active == 'profil'){echo'_blue';}?>.png" alt="">
                        <span>Profil</span>
                    </div>
                </a>
                <a href="index.php?page=a_propos">
                    <div class="element <?php if ($active == 'a_propos'){echo'active_page';}?>">
                        <img class="icon_nav" src="public/Icons/About<?php if ($active == 'a_propos'){echo'_blue';}?>.png" alt="">
                        <span>A propos</span>
                    </div>
                </a> 
                <a href="index.php?page=faq">
                    <div class="element <?php if ($active == 'faq'){echo'active_page';}?>">
                        <img class="icon_nav" src="public/Icons/Faq<?php if ($active == 'faq'){echo'_blue';}?>.png" alt="">
                        <span>FAQ</span>
                    </div>
                </a>
            </div>
        </div>
        <div id="logout-container">
            <a href="index.php?page=logout">
                <div class="element">
                    <img src="public/Icons/Logout.png" alt="">
                    <span>Déconnexion</span>
                </div>
            </a>  
        </div>
    </nav>