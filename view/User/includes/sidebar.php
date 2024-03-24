<?php
    $active = isset($active)? $active :"";
?>  
<nav id="navbar">
    <div id="logo-nav">
        <div class="logo-container">
            <img id="logo_image" src="public/Logos/logo_white_text.png" alt="">
        </div>
        <div id="nav-elements">
            <a href="?page=home">
                <div class="element <?php if($active=='home') echo 'active_page' ?>">
                    <img src="public/Icons/Home<?php if($active=='home') echo '_blue' ?>.png" alt="">
                    <span>Acceuil</span>
                </div>
            </a>
            <a href="?page=rendez-vous&categorie=Tout">
                <div class="element <?php if($active=='rendez-vous') echo 'active_page' ?>">
                    <img src="public/Icons/Calendar<?php if($active=='rendez-vous') echo '_blue' ?>.png" alt="">
                    <span>Rendez-Vous</span>
                </div>
            </a>
            <a href="?page=notification">
                <div class="element <?php if($active=='notif') echo 'active_page' ?>">
                    <img src="public/Icons/Bell<?php if($active=='notif') echo '_blue' ?>.png" alt="">
                    <span>Notification</span>
                </div>
            </a>
            <a href="?page=dashboard">
                <div class="element <?php if($active=='dashboard') echo 'active_page' ?>">
                    <img src="public/Icons/Book<?php if($active=='dashboard') echo '_blue' ?>.png" alt="">
                    <span>Dashboard</span>
                </div>
            </a>
            <a href="index.php?page=favoris">
                <div class="element <?php if($active=='favoris') echo 'active_page' ?>">
                    <img src="public/Icons/Heart<?php if($active=='favoris') echo '_blue' ?>.png" alt="">
                    <span>Favoris</span>
                </div>
            </a>
            <a href="?page=profil">
                <div class="element <?php if($active=='profil') echo 'active_page' ?>">
                    <img src="public/Icons/User<?php if($active=='profil') echo '_blue' ?>.png" alt="">
                    <span>Profil</span>
                </div>
            </a>
            <a href="?page=apropos">
                <div class="element <?php if($active=='apropos') echo 'active_page' ?>">
                    <img src="public/Icons/About<?php if($active=='apropos') echo '_blue' ?>.png" alt="">
                    <span>A-propos</span>
                </div>
            </a>
            <a href="?page=faq">
                <div class="element <?php if($active=='faq') echo 'active_page' ?>">
                    <img class="icon_nav" src="public/Icons/Faq<?php if($active=='faq') echo '_blue' ?>.png" alt="">
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