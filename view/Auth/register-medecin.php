<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations | SanteConnect</title>
    <link rel="stylesheet" href="public/auth/Css/med_info.css">
    <link rel="shortcut icon" href="public/Icons/Logo_blue.ico" type="image/x-icon">
    <meta name="description" content="SantéConnect, obtenez un rendez-vous avec le médecin de votre choix en un Click!">
</head>
<body>
    <h1>Entrez vos informations</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="profile-pic-container">
            <div class="pic-div">
                <img src="public/Images/default_pp.png" id="profile-pic" alt="">
                <input type="file" name="input-photo" id="input-photo">
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
            <input type="text" id="nom" placeholder="Nom complet" name="nom_complet" required>
        </div>
        <div class="container">
            <input type="tel" id="tel" placeholder="Numero téléphone" name="tel" required>
        </div>

        <div class="select-container">
            <select name="specialite" id="specialite" required>
                <option value="">Specialité</option>
                <?php foreach ($specialites as $key => $specialite) { ?>
                    <option value="<?=$specialite->id?>"><?=$specialite->nom?></option>
                <?php } ?>                
                <option value="Autre">Autre</option>
            </select>
        </div>

        <div class="select-container">
            <select name="sexe" id="type_compte" required>
                <option value="">Genre</option>
                <option value="h">Masculin</option>
                <option value="f">Feminin</option>
            </select>
        </div>

        <div class="select-container">
            
            <select name="hopital" id="hopital_actuel" required>
                <option value="">Hôpital actuel</option>
                <?php foreach ($hopitax as $key => $hopital) { ?>
                    <option value="<?=$hopital->id?>"><?=$hopital->nom?></option>
                <?php } ?>                
                <option value="Autre">Autre</option>
            </select>
        </div>

        

        <div class="container">
            <input type="text" id="rv" placeholder="ville de rendez-vous" name="villerv" required>
        </div>
        
        <div class="newContainer">
            <div id="autreSpecialiteContainer" class="container1">
                <input type="text" id="autreSpecialite" placeholder="Spécialité (Autre)" name="autrespecialite">
            </div>

            <div id="autreHopitalContainer" class="container1">
                <input type="text" id="autreHopital" placeholder="Hôpital actuel (Autre)" name="autrehopital">
            </div>
        </div>
        
        
        <div class="container cas_particulier">
            <label for="attestation">
                <span class="boutton-bleu boutton-link" id="spana">
                    <img src="public/Images/upload.png" alt="" style="margin-right: 10px;">
                    Attestation
                </span>
            </label>
            <input type="file" id="attestation" name="attestation" style="display:none">
            

            <label for="carte">
                <span class="boutton-bleu boutton-link" id="spanc">
                    <img src="public/Images/upload.png" alt="" style="margin-right: 10px;">
                    Carte professionnelle
                </span>
            </label>
            <input type="file" id="carte" name="carte" style="display:none">
        </div>

        <div class="button-container">
            <input type="submit" value="Continuer" id="submit">
        </div>
    </form>
    <script>
        document.getElementById('attestation').addEventListener('change', function() {
            if (this.files.length > 0) {
                document.getElementById('spana').style.backgroundColor = 'green';
            } 
        });

        document.getElementById('carte').addEventListener('change', function() {
            if (this.files.length > 0) {
                document.getElementById('spanc').style.backgroundColor = 'green';
            } 
        });



        const profile_image = document.getElementById("profile-pic");
        const profile_input = document.getElementById("input-photo");
        profile_input.addEventListener("change",()=>{
            profile_image.setAttribute("src",URL.createObjectURL(profile_input.files[0]))
        })
    


    const specialiteSelect = document.getElementById("specialite");
    const autreSpecialiteContainer = document.getElementById("autreSpecialiteContainer");
    const autreSpecialiteInput = document.getElementById("autreSpecialite");

    specialiteSelect.addEventListener("change", () => {
        if (specialiteSelect.value === "Autre") {
            autreSpecialiteContainer.style.display = "block";
        } else {
            autreSpecialiteContainer.style.display = "none";
        }
    });

    const hopitalActuelSelect = document.getElementById("hopital_actuel");
    const autreHopitalContainer = document.getElementById("autreHopitalContainer");
    const autreHopitalInput = document.getElementById("autreHopital");

    hopitalActuelSelect.addEventListener("change", () => {
        if (hopitalActuelSelect.value === "Autre") {
            autreHopitalContainer.style.display = "block";
        } else {
            autreHopitalContainer.style.display = "none";
        }
    });    
    
</script>
</html>