<?php
    require_once __DIR__.'/../model/models/UserModel.php';
    require_once __DIR__.'/../model/models/MedecinInfosModel.php';
    require_once __DIR__.'/../model/models/SpecialiteModel.php';
    require_once __DIR__.'/../model/models/FavorisModel.php';
    require_once __DIR__.'/../model/models/ContactModel.php';
    class UserController{
        public function __construct(){
            require_once __DIR__.'/./middlewares/userCheck.php';
        }

        public function home(){
            header('Location:?page=home');
        }

        public function invoke(){
            if(!isset($_GET['page'])){
                $this->home();
            }

            $page = $_GET['page'];

            if(isset($_GET['favoris']) && MedecinInfosModel::get(htmlspecialchars($_GET['favoris']))){
                $medecin_id = MedecinInfosModel::get(htmlspecialchars($_GET['favoris']))->user_id;
                if(FavorisModel::get($_SESSION['user_id'], $medecin_id))
                    FavorisModel::get($_SESSION['user_id'], $medecin_id)->delete();
                else
                    FavorisModel::create($_SESSION['user_id'], $medecin_id);
            }

            switch ($page) {
                case 'home':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':
                            $active = 'home';
                            $user = UserModel::get($_SESSION['user_id']);
                            $specialites = SpecialiteModel::getAll();
                            $pubs = ['', '', '', '', ''];
                            $medecins = MedecinInfosModel::getAll();
                            
                            include __DIR__.'/../view/User/index.php';
                            break;
                    }
                    break;
                case 'logout':
                    session_destroy();
                    header('Location:index.php');
                    break;
                case 'specialites':
                    $specialites = SpecialiteModel::getAll();
                    include __DIR__.'/../view/User/specialites.php';
                    break;
                case 'specialite':
                    if(!isset($_GET['spe-id']))
                        $this->home();
                    $id = htmlspecialchars($_GET['spe-id']);
                    $specialite = SpecialiteModel::get($id);
                    if(!$specialite)
                        $this->home();
                    $medecins = MedecinInfosModel::getWhere(['specialite_id'=>$id]);
                    include __DIR__.'/../view/User/detail_specialite.php';
                    break;
                case 'favoris':
                    $favoris = FavorisModel::getWhere(['user_id'=>$_SESSION['user_id']]);
                    $active = 'favoris';
                    include __DIR__.'/../view/User/favoris.php';
                    break;
                case 'medecin':
                    if(!isset($_GET['med-id']))
                        $this->home();
                    $id = htmlspecialchars($_GET['med-id']);
                    $medecin = MedecinInfosModel::get($id);
                    if(!$medecin)
                        $this->home();
                    include __DIR__.'/../view/User/details_medecin.php';
                    break;
                case 'profil':
                    $user = UserModel::get($_SESSION['user_id']);
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['nom']) && isset($_POST['date_naiss'])){
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
                                                $user->photo = $dbImagePath;
                                            }    
                                        } 
                                    } 
                                }
                                $user->nom_complet = htmlspecialchars($_POST["nom"]);
                                $user->date_de_naissance = date(htmlspecialchars($_POST["date_naiss"])) ;
                                $user->update();
                                header("Location:index.php?page=profil");
                                return;
                            }else
                            $this->home();
                            break;
                        case 'GET':
                            $active = 'profil';
                            include __DIR__.'/../view/User/profil.php';
                            break;                    
                    }
                   
                    break;
                case 'new_mdp':
                    $active = 'profil';
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        if(isset($_POST['pwd1']) && isset($_POST['pwd2'])){
                            $user = UserModel::get($_SESSION['user_id']);
                            $pwd1 = htmlspecialchars($_POST['pwd1']);
                            $pwd2 = htmlspecialchars($_POST['pwd2']);
                            if(strlen($pwd1) < 8){
                                $message_error = 'Le mot de passe doit contenir au moins 8 caracteres';
                                include __DIR__.'/../view/User/profil.php';
                                return;
                            }
                            if($pwd1 !== $pwd2){
                                $message_error = 'Les mots de passe sont differents';
                                include __DIR__.'/../view/User/profil.php';
                                return;
                            }
                            $user->mot_de_passe = password_hash($pwd1, PASSWORD_DEFAULT);
                            $user->update();
                            $message_success = 'Votre mot de passe a ete change avec succes';
                            include __DIR__.'/../view/User/profil.php';
                            return;
                        }
                    }
                    $this->home();
                    break;
                case 'apropos':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['sujet']) && isset($_POST['message'])){
                                $sujet = htmlspecialchars($_POST['sujet']);
                                $message = htmlspecialchars($_POST['message']);
                                ContactModel::create($_SESSION['user_id'], $sujet, $message);
                                $message_success = 'Votre message a ete envoye, merci de nous avoir contactes';
                                $active = 'apropos';
                                $user = UserModel::get($_SESSION['user_id']);
                                include __DIR__.'/../view/User/apropos.php';
                                return;
                            }
                        case 'GET':
                            $active = 'apropos';
                            $user = UserModel::get($_SESSION['user_id']);
                            include __DIR__.'/../view/User/apropos.php';
                            break;
                    }
                    break;
                case 'rendez-vous':
                    $active = 'rendez-vous';
                    $categorie = 'Tout';
                    if(isset($_GET['categorie']) && $_GET['categorie']!='Tout' && SpecialiteModel::get(htmlspecialchars($_GET['categorie']))){
                        $categorie = htmlspecialchars($_GET['categorie']);
                    }
                    if($categorie == 'Tout')
                        $rvs = RendezVousModel::getAll();
                    else{
                        $rvsAll = RendezVousModel::getAll();
                        $rvs = [];
                        foreach($rvsAll as $row){
                            if($row->getMedecinInfos()->getSpecialite()->id == $categorie)
                                $rvs[] = $row;
                        }
                    }


                    $rvsAll =$rvs;

                    $groupedRvsByMedecin = [];

                    foreach ($rvsAll as $rv) {
                        $medecinId = $rv->getMedecinInfos()->user_id;

                        if (!isset($groupedRvsByMedecin[$medecinId])) {
                            $groupedRvsByMedecin[$medecinId] = [];
                        }

                        $groupedRvsByMedecin[$medecinId][] = $rv;
                    }

                    $specialites = SpecialiteModel::getAll();
                    include __DIR__.'/../view/User/rendez_vous.php';
                    break;
                case 'choisir_creneau':
                    if(!isset($_GET['med-id']) || !MedecinInfosModel::get($_GET['med-id'])){
                        $this->home();
                        return;
                    }
                    $rvs = RendezVousModel::getWhere(['medecin_id'=>$_GET['med-id']]);
                    $active = 'rendez-vous';
                    $medecin = MedecinInfosModel::get($_GET['med-id']);
                    include __DIR__.'/../view/User/choisir_creneau.php';
                    break;
                case 'finaliser':
                    if(!isset($_GET['num_rv']) || !RendezVousModel::get($_GET['num_rv'])){
                        $this->home();
                        return;
                    }
                    $active = 'rendez-vous';
                    if($_SERVER['REQUEST_METHOD']=='POST'){
                        header('Location:index.php');
                    }else{
                        include __DIR__.'/../view/User/finaliser.php';
                        return;
                    }
                case 'dashboard':
                    $active = 'dashboard';
                    include __DIR__.'/../view/User/dashboard.php';
                    break;
                case 'notification':
                    $active = 'notif';
                    include __DIR__.'/../view/User/notification.php';
                    break;
                case 'faq':
                    $active = 'faq';
                    include __DIR__.'/../view/User/faq.php';
                    break;
                default:
                    echo 'Not found';
                    break;
            }
        }
    }