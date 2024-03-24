<?php
    require_once __DIR__.'/../model/models/UserModel.php';
    require_once __DIR__.'/../model/models/SpecialiteModel.php';
    require_once __DIR__.'/../model/models/HopitalModel.php';
    require_once __DIR__.'/../model/models/MedecinInfosModel.php';

    require_once __DIR__.'/fonctions/fonctionsUtiles.php';

    require_once __DIR__.'/UserController.php';
    require_once __DIR__.'/MedecinController.php';
    

    class AuthController{

        public function __construct(){
            require_once __DIR__.'/./middlewares/unAuthenticatedCheck.php';
        }

        public function home(){
            header('Location:?page=login');
        }

        public function invoke(){
            if(!isset($_GET['page'])){
                $this->home();
            }

            $page = $_GET['page'];
            switch($page){
                case 'register':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['type_compte']) && isset($_POST['email']) && isset($_POST['password'])){

                                $acc_type = htmlspecialchars($_POST['type_compte']);
                                $email = htmlspecialchars($_POST['email']);
                                $password = htmlspecialchars($_POST['password']);

                                if(!$acc_type || !$email || !$password){
                                    $message_error = 'Tous les champs doivent etre remplis';
                                    include __DIR__.'/../view/Auth/register.php';
                                    return;
                                }
                                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                    $message_error = 'Adressemail invalide';
                                    include __DIR__.'/../view/Auth/register.php';
                                    return;
                                }
                                if($acc_type!=='user' && $acc_type!== 'medecin'){
                                    $message_error = 'Vous devez choisir un type de compte entre patient et medecin';
                                    include __DIR__.'/../view/Auth/register.php';
                                    return;
                                }
                                if(count(UserModel::getWhere(['email'=> $email]))!=0){
                                    $message_error = 'Cette adresse mail est deja prise';
                                    include __DIR__.'/../view/Auth/register.php';
                                    return;
                                }
                                if(strlen($password)<8){
                                    $message_error = 'Le mot de passe doit contenir au moins 8 caracteres';
                                    include __DIR__.'/../view/Auth/register.php';
                                    return;
                                }

                                $mdpcrypt = password_hash($password, PASSWORD_DEFAULT);
                                
                                do {
                                    $token = generateRandomString(30); 
                                    $count = count(UserModel::getWhere(['token'=> $token]));
                                } while ($count > 0); 

                                $codeotp = rand(1000,9999);

                                $user = UserModel::create($token, $email, $mdpcrypt, $codeotp, $acc_type);

                                if(!$user){
                                    $message_error = 'Une erreur s est produite lors de l inscription';
                                    include __DIR__.'/../view/Auth/register.php';
                                    return;
                                }
                                
                                $htmlFilePath = __DIR__.'/../view/mail/mail-register.php';
                                $to = $email;
                                $sitelink = getSiteLink();
                                $subject = "Code de verification";
                                $message = file_get_contents($htmlFilePath);
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                $headers .= "From: noreply@santeconnect.duruskaolack.com" . "\r\n";

                                if (mail($to, $subject, $message, $headers)) {
                                    
                                } else {
                                    
                                }

                                $_SESSION['user_register_id'] = $user->id;

                                header("Location:?page=otp&token=".$user->token);
                            }
                            break;
                        case 'GET':
                            include __DIR__.'/../view/Auth/register.php';
                            break;
                    }
                    break;
                case 'login':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['email']) && isset($_POST['password'])){
                                $email = htmlspecialchars($_POST['email']);
                                $password = htmlspecialchars($_POST['password']);
                                if($users = UserModel::getWhere(['email'=> $email])){
                                    $user = $users[0];
                                    if(password_verify($password, $user->mot_de_passe)){
                                        if($user->bloque){
                                            $message_error = 'Votre compte a été bloqué';
                                            include __DIR__.'/../view/Auth/connexion.php';
                                            return;
                                        }
                                        if(!$user->verified_at){
                                            $message_error = 'Vous devez activer votre compte d abord';
                                            include __DIR__.'/../view/Auth/connexion.php';
                                            return;
                                        }
                                        $_SESSION['user_id'] = $user->id;
                                        header('Location:index.php');
                                    }
                                
                                $message_error = 'Credentiels incorrects';
                                include __DIR__.'/../view/Auth/connexion.php';
                                return;
                                
                                }else $this->home();  
                            }
                            break;
                        case 'GET':
                            include __DIR__.'/../view/Auth/connexion.php';
                            break;
                    }
                    break;
                case 'recup_mdp': 
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['email'])){
                                $email = htmlspecialchars($_POST['email']);
                                if(count(UserModel::getWhere(['email'=>$email]))==0){
                                    $message_error = 'Cette adresse mail n est pas inscrite';
                                    include __DIR__.'/../view/Auth/recup-mdp-web.php';
                                }else{
                                    $htmlFilePath = __DIR__.'/../view/mail/mail-recup.php';
                                    $to = $email;
                                    $sitelink = getSiteLink();
                                    $nom = UserModel::getWhere(['email'=>$email])[0]->nom_complet;
                                    $token = UserModel::getWhere(['email'=>$email])[0]->token;
                                    $message = file_get_contents($htmlFilePath);
                                    $headers = "MIME-Version: 1.0" . "\r\n";
                                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                    $headers .= "From: noreply@santeconnect.duruskaolack.com" . "\r\n";
                                    $subject = "Recuperation de compte";

                                    if (mail($to, $subject, $message, $headers)) {
                                        
                                    } else {
                                        
                                    }

                                    $message_success = 'Un mail de récupération vient de vous etre envoyé ' . "$sitelink/?page=new_mdp&token=$token";
                                    include __DIR__.'/../view/Auth/recup-mdp-web.php';
                                }
                            }
                            break;
                        case 'GET':
                            include __DIR__.'/../view/Auth/recup-mdp-web.php';
                            break;
                    }
                    break;
                case 'new_mdp':
                    if(isset($_GET['token'])){
                        $token = $_GET['token'];
                        if(count(UserModel::getWhere(['token'=>$token]))==0)
                            $this->home();
                        switch($_SERVER['REQUEST_METHOD']){
                            case 'POST':
                                if(isset($_POST['pwd1']) && isset($_POST['pwd2'])){
                                    $pwd1 = htmlspecialchars($_POST['pwd1']);
                                    $pwd2 = htmlspecialchars($_POST['pwd2']);
                                    if($pwd1 !== $pwd2){
                                        $message_error = 'Les mots de passe ne sont pas identiques';
                                        include __DIR__.'/../view/Auth/nouveau-mdp-web.php';
                                        return;
                                    }
                                    if(strlen($pwd1)<8){
                                        $message_error = 'Les mots de passe doivent avoir au moins 8 caracteres';
                                        include __DIR__.'/../view/Auth/nouveau-mdp-web.php';
                                        return;
                                    }
                                    $user = UserModel::getWhere(['token'=>$token])[0];
                                    $user->mot_de_passe = password_hash($pwd1, PASSWORD_DEFAULT);
                                    $user->update();
                                    $message_success = 'Votre mot de passe a ete reinitiallise avec succes';
                                    include __DIR__.'/../view/Auth/nouveau-mdp-web.php';
                                }
                                break;
                            case 'GET':
                                include __DIR__.'/../view/Auth/nouveau-mdp-web.php';
                                break;
                        }
                    }
                    break;
                case 'politique-de-confidentialite': 
                    include __DIR__.'/../view/Auth/politique_confidentialite.html';
                    break;
                case 'condition_utilisation': 
                    include __DIR__.'/../view/Auth/condition_utilisation.html';
                    break;
                case 'otp':
                    if(isset($_GET['token']) && !empty($_GET['token'])){
                        $token = $_GET['token'];
                        $user = UserModel::getWhere(['token'=>$token]);
                        if(!$user || UserModel::getWhere(['token'=>$token])[0]->token !== $token){
                            $this->home();
                        }
                        switch($_SERVER['REQUEST_METHOD']){
                            case 'POST':
                                if(isset($_POST['val1']) && isset($_POST['val2']) && isset($_POST['val3']) && isset($_POST['val4'])){
                                    $v1 = htmlspecialchars($_POST['val1']); 
                                    $v2 = htmlspecialchars($_POST['val2']); 
                                    $v3 = htmlspecialchars($_POST['val3']); 
                                    $v4 = htmlspecialchars($_POST['val4']); 
                                    $code =  $v1 . $v2 . $v3 . $v4;
                                    if($user[0]->code_verification == $code){
                                        $currentDateTime = date('Y-m-d H:i:s');
                                        $user[0]->verified_at = $currentDateTime;
                                        $user[0]->update();
                                        if($user[0]->accountType_libelle === 'user')
                                            header('Location:?page=register-user&token='.$user[0]->token);
                                        else if($user[0]->accountType_libelle === 'medecin')
                                            header('Location:?page=register-medecin&token='.$user[0]->token);
                                        else $this->home();
                                    }else
                                        $message_error = 'Code incorrect !';
                                    include __DIR__.'/../view/Auth/otp.php';
                                     
                                }else
                                    include __DIR__.'/../view/Auth/otp.php';
                                break;
                            case 'GET':
                                include __DIR__.'/../view/Auth/otp.php';
                                break;
                        }
                    }else
                        $this->home();
                    
                    break;
                case 'register-medecin':
                    if(isset($_GET['token']) && !empty($_GET['token'])){
                        $token = $_GET['token'];
                        $user = UserModel::getWhere(['token'=>$token]);
                        
                        if(!$user || $user[0]->token !== $token || !$user[0]->verified_at || $user[0]->accountType_libelle!=='medecin'){
                            $this->home();
                            return;
                        }
                        $hopitax = HopitalModel::getAll();
                        $specialites = SpecialiteModel::getAll();
                        switch($_SERVER['REQUEST_METHOD']){
                            case 'POST':
                                if(isset($_POST['nom_complet']) && isset($_POST['sexe']) && isset($_POST['tel']) && isset($_POST['hopital']) && isset($_POST['specialite']) && isset($_POST['villerv'])){
                                    $nom = htmlspecialchars($_POST['nom_complet']);
                                    $sexe = htmlspecialchars($_POST['sexe']);
                                    $tel = htmlspecialchars($_POST['tel']);
                                    $hopital = $_POST['hopital']==='Autre' ? null : htmlspecialchars($_POST['hopital']);
                                    $specialite = $_POST['specialite']=='Autre' ? null : htmlspecialchars($_POST['specialite']);
                                    $villerv = htmlspecialchars($_POST['villerv']);
                                    $autrespecialite = isset($_POST['autrespecialite'])? htmlspecialchars($_POST['autrespecialite']) : null ;
                                    $autrehopital = isset($_POST['autrehopital'])? htmlspecialchars($_POST['autrehopital']) : null;
                                    if(empty($nom) || empty($sexe) || empty($tel) || empty($villerv)){
                                        $message_error = 'Tous les champs sont obligatoire';
                                        include __DIR__.'/../view/Auth/register-medecin.php';
                                        return;
                                    }
                                    if(!$specialite && !$autrespecialite || !$hopital && !$autrehopital){
                                        $message_error = 'Erreur sur hopital et specialite';
                                        include __DIR__.'/../view/Auth/register-medecin.php';
                                        return;
                                    }

                                    if($hopital && !HopitalModel::get($hopital)){
                                        $message_error = 'Cet hopital n existe pas';
                                        include __DIR__.'/../view/Auth/register-medecin.php';
                                        return;
                                    }

                                    if($specialite && !SpecialiteModel::get($specialite)){
                                        $message_error = 'Cette specialite n existe pas';
                                        include __DIR__.'/../view/Auth/register-medecin.php';
                                        return;
                                    }

                                    $dbImagePath = 'public/uploads/user_profils/noimage.jpg';
                                    if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0){
                                        $targetDir = "public/uploads/user_profils/";
                                        createTargetDirectory($targetDir);

                                        $fileName = basename($_FILES["photo"]["name"]);
                                        $targetFilePath = $targetDir . $fileName;
                                        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                                        // verifier si c est fake image
                                        $check = getimagesize($_FILES["photo"]["tmp_name"]);
                                        if ($check !== false) {
                                            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                                            if (in_array($fileType, $allowTypes)) {
                                                // verifier s il n existe pas deja
                                                $dbImagePath = checkAndRenameIfExists($targetFilePath,$targetDir);
                                                
                                                // Upload 
                                                if (move_uploaded_file($_FILES["photo"]["tmp_name"], $dbImagePath)) {
                                                    $user[0]->photo = $dbImagePath;
                                                } else {
                                                    $message_error = "Erreur lors de l upload.";
                                                    include __DIR__.'/../view/Auth/register-medecin.php';
                                                    return;
                                                }
                                            } else {
                                                $message_error = "la photo doit etre en JPG, JPEG, PNG";
                                                include __DIR__.'/../view/Auth/register-medecin.php';
                                                return;
                                            }
                                        } else {
                                            $message_error = "Le fichier n est pas une image.";
                                            include __DIR__.'/../view/Auth/register-medecin.php';
                                            return;
                                        }
                                    }


                                    if(isset($_FILES['attestation']) && $_FILES['attestation']['size'] > 0 && isset($_FILES['carte']) && $_FILES['carte']['size'] > 0){
                                        $targetDirAtt = "public/uploads/Attestations/";
                                        $targetDirCart = "public/uploads/Cartes/";
                                        createTargetDirectory($targetDirAtt);
                                        createTargetDirectory($targetDirCart);

                                        $fileNamea = basename($_FILES["attestation"]["name"]);
                                        $targetFilePatha = $targetDirAtt . $fileNamea;
                                        $fileTypea = pathinfo($targetFilePatha, PATHINFO_EXTENSION);

                                        $fileNamec = basename($_FILES["carte"]["name"]);
                                        $targetFilePathc = $targetDirCart . $fileNamec;
                                        $fileTypec = pathinfo($targetFilePathc, PATHINFO_EXTENSION);

                                        $allowTypes = array('jpg', 'png', 'jpeg', 'pdf');
                                        if (in_array($fileTypea, $allowTypes) && in_array($fileTypec, $allowTypes)) {
                                            // verifier s il n existe pas deja
                                            $dbFilePatha = checkAndRenameIfExists($targetFilePatha,$targetDirAtt);
                                            $dbFilePathc = checkAndRenameIfExists($targetFilePathc,$targetDirCart);
                                            
                                            // Upload 
                                            if (move_uploaded_file($_FILES["carte"]["tmp_name"], $dbFilePathc) && move_uploaded_file($_FILES["attestation"]["tmp_name"], $dbFilePatha)) {
                                                
                                                $user[0]->nom_complet = $nom;
                                                $user[0]->sexe = $sexe;
                                                $user[0]->tel = $tel;
                                                $user[0]->photo = $dbImagePath;
                                                $user[0]->update();

                                                $user = $user[0];

                                                $medecin = MedecinInfosModel::create($user->id,$specialite, $autrespecialite, $hopital, $autrehopital, null, null, $villerv, $dbFilePatha, $dbFilePathc, false, false, null, null, null);
                                                if(!$medecin){
                                                    $message_error = 'Erreur lors de la creation du compte medecin';
                                                    include __DIR__.'/../view/Auth/register-medecin.php';
                                                    return;
                                                }

                                                $_SESSION['user_id'] = $user->id;
                                                header('Location:index.php');

                                            } else {
                                                $message_error = "Erreur lors de l upload.";
                                                include __DIR__.'/../view/Auth/register-medecin.php';
                                                return;
                                            }
                                        } else {
                                            $message_error = 'les fichiers doivent etre entre pdf JPG, JPEG, PNG';
                                            include __DIR__.'/../view/Auth/register-medecin.php';
                                            return;
                                        }
                                    }else{
                                        $message_error = 'La carte professionnelle et le certificat sont requis';
                                        include __DIR__.'/../view/Auth/register-medecin.php';
                                        return;
                                    }
                                    
                                }else{
                                    $this->home();
                                }
                                break;
                            case 'GET':
                                $user = $user[0];
                               
                                include __DIR__.'/../view/Auth/register-medecin.php';
                                break;
                        }
                    }else
                        $this->home();
                    
                    break;
                    case 'register-user':
                        if(isset($_GET['token']) && !empty($_GET['token'])){
                            $token = $_GET['token'];
                            $user = UserModel::getWhere(['token'=>$token]);
                            if(!$user || $user[0]->token !== $token || !$user[0]->verified_at || $user[0]->accountType_libelle!=='user'){
                                $this->home();
                                return;
                            }
                            switch($_SERVER['REQUEST_METHOD']){
                                case 'POST':
                                    if(isset($_POST['nom_complet']) && isset($_POST['sexe']) && isset($_POST['date_naiss']) && isset($_POST['tel'])){
                                        $nom = htmlspecialchars($_POST['nom_complet']);
                                        $sexe = htmlspecialchars($_POST['sexe']);
                                        $date_naiss = htmlspecialchars($_POST['date_naiss']);
                                        $tel = htmlspecialchars($_POST['tel']);
                                        if(empty($nom) || empty($sexe) || empty($tel)){
                                            $message_error = 'Tous les champs sont obligatoire';
                                            $user = $user[0];
                                            include __DIR__.'/../view/Auth/register-user.php';
                                            return;
                                        }
                                        $user[0]->nom_complet = $nom;
                                        $user[0]->sexe = $sexe;
                                        $user[0]->date_de_naissance = $date_naiss;
                                        $user[0]->tel = $tel;
                                        
                                        $user[0]->photo = 'public/uploads/user_profils/noimage.jpg';

                                        if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0){
                                            $targetDir = "public/uploads/user_profils/";
                                            createTargetDirectory($targetDir);
    
                                            $fileName = basename($_FILES["photo"]["name"]);
                                            $targetFilePath = $targetDir . $fileName;
                                            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    
                                            // verifier si c est fake image
                                            $check = getimagesize($_FILES["photo"]["tmp_name"]);
                                            if ($check !== false) {
                                                $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                                                if (in_array($fileType, $allowTypes)) {
                                                    // verifier s il n existe pas deja
                                                    $dbImagePath = checkAndRenameIfExists($targetFilePath,$targetDir);
                                                    
                                                    // Upload 
                                                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $dbImagePath)) {
                                                        $user[0]->photo = $dbImagePath;
                                                    } else {
                                                        echo "Erreur lors de l upload.";
                                                        return;
                                                    }
                                                } else {
                                                    echo "la photo doit etre en JPG, JPEG, PNG, GIF.";
                                                    return;
                                                }
                                            } else {
                                                echo "Le fichier n est pas une image.";
                                                return;
                                            }
                                        }
    
                                        $user[0]->update();
                                        $_SESSION['user_id'] = $user[0]->id;
                                        header('Location:index.php');
                                    }else{
                                        $this->home();
                                    } 
                                    break;
                                case 'GET':
                                    $user = $user[0];
                                    $hopitax = HopitalModel::getAll();
                                    $specialites = SpecialiteModel::getAll();
                                    include __DIR__.'/../view/Auth/register-user.php';
                                    break;
                            }
                        }else
                            $this->home();
                        
                        break;
                default:
                    //$this->home();
                    echo 'not found';
                    break;
            }
        }

        
    }