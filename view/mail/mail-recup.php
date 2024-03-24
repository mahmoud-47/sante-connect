<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>
    <div style="margin: 30px 10%;border: 1px solid black;border-radius: 5px; padding: 10px;">
        <h1 style="text-align: center;">Recuperez votre compte</h1>
        
        <p>Bonjour, <?=$nom?><br>
            Veuillez cliquer sur le lien ci dessous pour changer votre mot de passe
            <br><br>
            <center>
                <a href="<?=$sitelink?>/?page=new_mdp&token=<?=$token?>" style="text-decoration: none;background-color: blue;color: white; padding: 10px;border-radius: 2px;">
                    Veuillez cliquer sur le lien
                </a>
            </center>   
            <br><br>
            Cordialement, l'equipe Santé Connect
        </p>

    </div>
</body>
</html>