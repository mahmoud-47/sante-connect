<?php
    require_once __DIR__.'/../model/models/UserModel.php';
    require_once __DIR__.'/../model/models/MedecinInfosModel.php';
    require_once __DIR__.'/../model/models/ValiderMedecinModel.php';
    require_once __DIR__.'/../model/models/SpecialiteModel.php';
    require_once __DIR__.'/../model/models/HopitalModel.php';
    require_once __DIR__.'/../model/models/FAQModel.php';
    require_once __DIR__.'/../model/models/AvisSignaleModel.php';
    require_once __DIR__.'/fonctions/fonctionsUtiles.php';
 
class AdminController{
        public function __construct() {
            require_once __DIR__.'/./middlewares/adminCheck.php';
        }
        
        public function home(){
            header('Location:?page=index');
        }
        
        public function invoke(){
            if(!isset($_GET['page'])){
                $this->home();
                return;
            }
            
            $page = $_GET['page'];
            switch($page){
                case 'index':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            echo "Bad request";
                            break;
                        case 'GET':
                            $medecins = MedecinInfosModel::getAll();
                            $active = "index";
                            require_once __DIR__.'/../view/Admin/index.php';
                            break;
                    }
                    break;
                case 'utilisateurs':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            echo "Bad request";
                            break;
                        case 'GET':
                            $users = UserModel::getWhere(['accountType_libelle' => 'user']);
                            $active = "utilisateurs";
                            require_once __DIR__.'/../view/Admin/utilisateurs.php';
                            break;
                    }
                    break;
                case 'medecins':
                        switch($_SERVER['REQUEST_METHOD']){
                            case 'POST':
                                echo "Bad request";
                                break;
                            case 'GET':
                                $medecinsAll = MedecinInfosModel::getAll();
                                $active = "medecins";
                                require_once __DIR__.'/../view/Admin/medecins.php';
                                break;
                        }
                        break;
                case 'ajout_spec':
                    $active = "ajout_spec";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['nom_spec']) && isset($_POST['color']) && isset($_POST['description'])){
                                $nom =htmlspecialchars($_POST['nom_spec']) ;
                                $couleur = htmlspecialchars($_POST['color']);
                                $description = htmlspecialchars($_POST['description']);
                                if(isset($_FILES['photo']) && $_FILES['photo']['size'] > 0){
                                    $targetDir = "public/uploads/icons/";
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
                                            SpecialiteModel::create($nom,$couleur,$dbImagePath,$description);

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
                            }
                            require_once __DIR__.'/../view/Admin/ajouter-specialite.php';
                            break;
                        case 'GET':
                                $specialites = SpecialiteModel::getAll();
                            require_once __DIR__.'/../view/Admin/ajouter-specialite.php';
                            break;
                    }
                    break;
                    case 'ajout_hospi':
                        $active = "ajout_hospi";
                        switch($_SERVER['REQUEST_METHOD']){
                            case 'POST':
                                if(isset($_POST['nom']) && isset($_POST['lien']) && isset($_POST['latitude']) && isset($_POST['longitude'])){
                                    $nom =htmlspecialchars($_POST['nom']) ;
                                    $lien = htmlspecialchars($_POST['lien']);
                                    $latitude = htmlspecialchars($_POST['latitude']);
                                    $longitude = htmlspecialchars($_POST['longitude']);
                                    HopitalModel::create($nom,$lien,$latitude,$longitude);
                                }
                                $hospitals = HopitalModel::getAll();
                                require_once __DIR__.'/../view/Admin/ajouter-hopital.php';
                                break;
                            case 'GET':
                                    $hospitals = HopitalModel::getAll();
                                require_once __DIR__.'/../view/Admin/ajouter-hopital.php';
                                break;
                        }
                        break;
                case 'faq':
                    $active = "faq";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['concernes']) && isset($_POST['question']) && isset($_POST['reponse']) && isset($_SESSION["user_id"])){
                                $concernes =htmlspecialchars($_POST['concernes']) ;
                                $question = htmlspecialchars($_POST['question']);
                                $reponse = htmlspecialchars($_POST['reponse']);
                                FAQModel::create($concernes,$question,$reponse,$_SESSION["user_id"]);
                            }
                            $faqs = FAQModel::getAll();
                            require_once __DIR__.'/../view/Admin/faq.php';
                            break;
                        case 'GET':
                                $faqs = FAQModel::getAll();
                            require_once __DIR__.'/../view/Admin/faq.php';
                            break;
                    }
                    break;
                case 'avis':
                    $active = "avis";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':
                            $allavis = AvisSignaleModel::getAll();
                            require_once __DIR__.'/../view/Admin/avis.php';
                            break;
                    }
                    break;
                case 'quarantaine':
                    if($_SERVER['REQUEST_METHOD'] == 'GET'){
                        if(isset($_GET['uid']) && isset($_GET['rvid'])){
                            $uid = htmlspecialchars($_GET['uid']);
                            $rvid = htmlspecialchars($_GET['rvid']);
                            $avisquarantaine =  AvisSignaleModel::get($uid,$rvid);
                            $avisquarantaine->update();
                            header("Location:__DIR__.'/../view/Admin/avis.php");
                        }
                    }
                    break;
                case 'paiement':
                    $active = "paiement";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':
                            require_once __DIR__.'/../view/Admin/paiement.php';
                            break;
                    }
                    break;       
                    
                case 'logout':
                    session_destroy();
                    header('Location:index.php');
                break;

            }
        }
    }