<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations | SanteConnect</title>
    <link rel="stylesheet" href="public/auth/Css/perso-infos-web.css">
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    <h1>Entrez vos informations</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="profile-pic-container">
            <div class="pic-div">
                <img src="public/Images/default_pp.png" id="profile-pic" alt="">
                <input type="file" name="photo" id="input-photo">
                <label for="input-photo" id="edit-label">
                    <img src="public/Icons/image_input.png" alt="">
                </label>
            </div>

            <?php if (isset($message_error)){ ?>
                <p style="background:rgba(255,10,10,.5); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_error?></p>
            <?php } ?>

            <?php if (isset($message_success)){ ?>
                <p style="background:rgb(146, 146, 58); border-radius:10px; padding: 5px;margin:50px 100px;color:white"><?=$message_success?></p>
            <?php } ?>
        </div>
        <div class="container">
            <input type="text" id="nom" placeholder="Nom complet" name="nom_complet">
        </div>
        <div class="container">
            <input type="email" id="poids" value="<?= $user->email ?>" readonly>
        </div>
        <div class="select-container">
            <select name="sexe" id="type_compte">
                <option value="">Genre</option>
                <option value="h">Masculin</option>
                <option value="f">Feminin</option>
            </select>
        </div>
        <div class="container">
            <input type="text" name="date_naiss" id="date" placeholder="Date de naissance" onfocus="this.type='date'" onblur="this.type='text'">
        </div>
        
        
        <div class="container">
            <input name="tel" type="tel" id="tel" placeholder="Numero téléphone">
        </div>
        <div class="button-container">
            <input type="submit" value="Continuer" id="submit">
        </div>
    </form>
    <script>
        const profile_image = document.getElementById("profile-pic");
        const profile_input = document.getElementById("input-photo");
        profile_input.addEventListener("change",()=>{
            profile_image.setAttribute("src",URL.createObjectURL(profile_input.files[0]))
        })
    </script>
</html>