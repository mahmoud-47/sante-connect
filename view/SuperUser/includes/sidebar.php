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
                    <img src="public/Icons/User<?php if ($active == 'index'){echo'_blue';}?>.png" alt="">
                    <span>Utilisateurs</span>
                </div>
            </a>
            <a href="?page=medecin">
                <div class="element <?php if ($active == 'medecin'){echo'active_page';}?>">
                    <img src="public/Icons/User<?php if ($active == 'medecin'){echo'_blue';}?>.png" alt="">
                    <span>Medecins</span>
                </div>
            </a>
            <a href="?page=admin">
                <div class="element <?php if ($active == 'admin'){echo'active_page';}?>">
                    <img src="public/Icons/User<?php if ($active == 'admin'){echo'_blue';}?>.png" alt="">
                    <span>Admins</span>
                </div>
            </a>
            <a href="?page=superuser">
                <div class="element <?php if ($active == 'superuser'){echo'active_page';}?>">
                    <img src="public/Icons/User<?php if ($active == 'superuser'){echo'_blue';}?>.png" alt="">
                    <span>Superusers</span>
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