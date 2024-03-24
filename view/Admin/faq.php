<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/admin/Css/base.css">
    <link rel="stylesheet" href="public/templatesCSS/form.css">
    <link rel="stylesheet" href="public/templatesCSS/boutton.css">
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
        <br>
        <br>
        <h3>Nouvelle question</h3>
        <div class="">
            <div class="contains">
                <form method="post">
                    <div class="date">
                        <div>
                            <label style="margin-right: 20px;">Concernés</label>
                            <input type="radio" name="concernes" value="patients" id = "patients" checked> 
                            <label style="color: black;" for="patients">Patients</label>
                            <input type="radio" name="concernes" value="medecins" id="medecins" style="margin-left: 20px;"> 
                            <label style="color: black;" for="medecins">Medecins</label>
                        </div>
                    </div>
                    <div class="date">
                        <label>Question</label>
                        <input type="text" name="question" placeholder="Entrez la question">
                    </div>
                    <div class="date">
                        <label>Réponse</label>
                        <textarea name="reponse" id="" cols="30" rows="10" class="textarea" placeholder="Écrivez la réponse"></textarea>
                    </div>

                    <button class="boutton-bleu" style="width: 150px;">
                        Ajouter
                    </button>
                </form>
            </div>
            
        </div>

        <br>
        <h2>Toutes les questions(<?= count($faqs) ?>)</h2>
        <?php foreach ($faqs as $faq) { ?>
        <div class="chevrons">
            <div class="flex-chevron">
                <p class="faq-title"><?= $faq->question ?></p>
                <img src="public/Icons/chevron-down.png" alt="Chevron" class="chevron-ico"> 
            </div>
            <div class="show-hide-rv">
            <br>
            <?= $faq->reponse ?>
            </div>
        </div>
        <?php } ?>
    </main>
    <script src="public/admin/Js/base.js"></script>
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

