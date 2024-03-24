<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/medecin/Css/faq.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>FAQ | SanteConnect</title>
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
        <h1>Foire Aux Questions</h1>
        <br><br>
        <?php 
            foreach($faqs as $value){ 
        ?>
        <div class="chevrons">
            <div class="flex-chevron">
                <p class="faq-title"><?=$value->question ?></p>
                <img src="public/Icons/chevron-down.png" alt="Chevron" class="chevron-ico"> 
            </div>            
            <div class="show-hide-rv">
                <br>
                <?=$value->reponse ?>
                <br>
            </div>
        </div>
        <?php } ?>

    </main>
    <script src="public/medecin/Js/faq.js"></script>
    <script>
        var chevrons = document.querySelectorAll(".chevrons");
        var hidable = document.querySelectorAll(".show-hide-rv");

        chevrons.forEach((chevron, index) => {
            chevron.addEventListener("click", () => {
                hidable[index].classList.toggle("show");
                if (hidable[index].classList.contains("show")) {
                    chevron.querySelector("img").setAttribute("src", "public/Icons/chevron-up.png");
                } else {
                    chevron.querySelector("img").setAttribute("src", "public/Icons/chevron-down.png");
                }
            });
        });
    </script>
</body>
</html>

