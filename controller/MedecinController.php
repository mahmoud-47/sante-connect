<?php
    require_once __DIR__.'/../model/models/UserModel.php';
    require_once __DIR__.'/../model/models/PriseRVModel.php';
    require_once __DIR__.'/../model/models/RendezVousModel.php';
    require_once __DIR__.'/../model/models/DemandePaiementModel.php';
    require_once __DIR__.'/../model/models/AvisModel.php';
    require_once __DIR__.'/../model/models/NotificationModel.php';
    require_once __DIR__.'/../model/models/FAQModel.php';
    require_once __DIR__.'/../model/models/FavorisModel.php';
    class MedecinController{

        public $medecinmodel;
        public function __construct(){
            require_once __DIR__.'/./middlewares/medecinCheck.php';
        }

        public function home(){
            header('Location:?page=dashboard');
        }

        public function invoke(){
            if(!isset($_GET['page'])){
                $this->home();
                return;
            }

            $page = $_GET['page'];
            switch($page){
                case 'dashboard':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':

                            $RV = PriseRVModel::getAll();
                            $count= 0;
                            $En_attente=0;
                            $Approuver=0;
                            $Decliner=0;
                            foreach($RV as $value){
                                if($value -> etat == 'En attente' && $value ->getRendezVous()->medecin_id == $_SESSION['user_id']){
                                    $count++;
                                    $En_attente++;
                                }
                                if($value -> etat == 'Approuvé' && $value ->getRendezVous()->medecin_id == $_SESSION['user_id']){
                                    $count++;
                                    $Approuver++;
                                }
                                if($value -> etat == 'Décliné' && $value ->getRendezVous()->medecin_id == $_SESSION['user_id']){
                                    $count++;
                                    $Decliner++;
                                }
                            }
                            $total=0;
                            foreach($RV as $value){
                                if($value ->online_paied && $value ->getRendezVous()->medecin_id == $_SESSION['user_id']){
                                    $total= $total + $value->prix;
                                }
                            }
                            $montant_retirer = 0;
                            $statut = DemandePaiementModel::getAll();
                            foreach($statut as $key){
                                if($key->etat == 'Validé' && $key ->user_id == $_SESSION['user_id']){
                                    $montant_retirer= $montant_retirer + $key->montant;
                                }
                            }
                            $montant_disponible= $total - $montant_retirer;

                            $Avis= AvisModel::getAll();
                            $nb_avis=0;
                            foreach($Avis as $key){
                                if($key->getRV()->getRendezVous()->medecin_id == $_SESSION['user_id']){
                                    $nb_avis++;
                                }
                            }
                            $occupation=0;
                            if($count != 0){
                                $occupation=($Approuver*100)/$count;
                                $occupation = number_format($occupation, 2);
                            }
                            $user= MedecinInfosModel::get($_SESSION['user_id']);
                            $active = "dashboard";
                            require_once __DIR__.'/../view/Medecin/index.php';
                }
                    break;

                case 'rendez_vous':
                    switch($_SERVER['REQUEST_METHOD']){
                       case 'POST':
                            if(isset($_POST['date_rv']) && isset($_POST['heure_debut']) && isset($_POST['heure_fin']) && isset($_POST['nombre'])){
                                $date_rv =htmlspecialchars($_POST['date_rv']) ;
                                $heure_debut = htmlspecialchars($_POST['heure_debut']);
                                $heure_fin = htmlspecialchars($_POST['heure_fin']);
                                $nombre = htmlspecialchars($_POST['nombre']);
                                RendezVousModel::create($date_rv,$heure_debut,$heure_fin,$_SESSION['user_id'],$nombre);
                            }
                            $planing = RendezVousModel::getAll();
                            header("Location:index.php?page=rendez_vous");
                            require_once __DIR__.'/../view/Medecin/rendez_vous.php';
                            break;
                        case 'GET':
                            $rendez_vous= PriseRVModel::getAll();
                            $creneau= RendezVousModel::getWhere(['medecin_id' => $_SESSION['user_id']]);
                            $prisesRvGlobal = PriseRVModel::getAll();
                            $prisesRvs = [];
                            foreach($prisesRvGlobal as $prisesRv){
                                if($prisesRv->getRendezVous()->medecin_id == $_SESSION['user_id'])
                                $prisesRvs[] = $prisesRv;
                            }
                            $active = "rendez_vous";
                            require_once __DIR__.'/../view/Medecin/rendez_vous.php';
                    }
                    break;
                case 'notification': 
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':
                            $notif = NotificationModel::getWhere(['user_id'=> $_SESSION['user_id']]);
                            $active = "notification";
                            require_once __DIR__.'/../view/Medecin/notification.php';
                    }
                    break;
                case 'paiement': 
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':
                            $RV = PriseRVModel::getAll();
                            $total=0;
                            foreach($RV as $value){
                                if($value ->online_paied && $value ->getRendezVous()->medecin_id == $_SESSION['user_id']){
                                    $total= $total + $value->prix;
                                }
                            }
                            $montant_retirer = 0;
                            $statut = DemandePaiementModel::getAll();
                            foreach($statut as $key){
                                if($key->etat == 'Validé' && $key ->user_id == $_SESSION['user_id']){
                                    $montant_retirer= $montant_retirer + $key->montant;
                                }
                            }
                            $montant_disponible= $total - $montant_retirer;
                            $active = "paiement";
                            require_once __DIR__.'/../view/Medecin/paiement.php';
                            
                    }
                    break;
                    
                case 'profil': 
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':
                            $user= MedecinInfosModel::get($_SESSION['user_id']);
                            $active = "profil";
                            require_once __DIR__.'/../view/Medecin/profil.php';
                    }
                    break;
                    
                case 'a_propos':
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            if(isset($_POST['sujet']) && isset($_POST['message'])){
                                $sujet = htmlspecialchars($_POST['sujet']);
                                $message = htmlspecialchars($_POST['message']);
                                ContactModel::create($_SESSION['user_id'], $sujet, $message);
                                $message_success = 'Votre message a ete envoye, merci de nous avoir contactes';
                                $active = 'a_propos';
                                $user = UserModel::get($_SESSION['user_id']);
                                require_once __DIR__.'/../view/Medecin/apropos.php';
                                return;
                            }
                        case 'GET':
                            $active = 'a_propos';
                            $user = UserModel::get($_SESSION['user_id']);
                            require_once __DIR__.'/../view/Medecin/apropos.php';
                            break;
                    }
                break;
                    
                case 'faq': 
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            break;
                        case 'GET':
                            $faq= FAQModel::getAll();
                            $faqs = [];
                                    foreach($faq as $key){
                                        if($key->concernes == 'medecin')
                                        $faqs[] = $key;
                                    }
                            $active = "faq";
                            require_once __DIR__.'/../view/Medecin/faq.php';
                    }
                    break;

                    case 'entete': 
                        switch($_SERVER['REQUEST_METHOD']){
                            case 'POST':
                                break;
                            case 'GET':
                                $user= MedecinInfosModel::get($_SESSION['user_id']);
                                $active = "profil";
                                require_once __DIR__.'/../view/Medecin/profil.php';
                        }
                        break;
                    
                    case 'detail': 
                        switch($_SERVER['REQUEST_METHOD']){
                            case 'POST':
                                break;
                            case 'GET':
                                $like=FavorisModel::getWhere(['medecin_id'=> $_SESSION['user_id']]);
                                $count=0;
                                $patient=PriseRVModel::getAll();
                                foreach($patient as $patient1){
                                    if($patient1 ->getRendezVous()->getMedecinInfos()->user_id == $_SESSION['user_id'])
                                        $count++;
                                }
                                $note=0;
                                $Avis=AvisModel::getAll();
                                foreach($Avis as $etoile1){
                                    if($etoile1 -> getRV()->getRendezVous()->getMedecinInfos()->user_id == $_SESSION['user_id']){
                                        $TabAvis []= $etoile1;
                                        $note=$note + $etoile1->note;
                                    }
                                }
                                $moy = 0;
                                if(count($Avis))
                                    $moy = $note / count($Avis);
                                $Avis= AvisModel::getAll();
                                $nb_avis1=0;
                                foreach($Avis as $key){
                                    if($key->getRV()->getRendezVous()->medecin_id == $_SESSION['user_id']){
                                        $nb_avis1++;
                                    }
                                }
                                $medecin = MedecinInfosModel::get($_SESSION['user_id']);
                                require_once __DIR__.'/../view/Medecin/details_medecin.php';
                        }
                        break;

                        case 'detail_rendez_vous': 
                            switch($_SERVER['REQUEST_METHOD']){
                                case 'POST':
                                    break;
                                case 'GET':
                                    $user= MedecinInfosModel::get($_SESSION['user_id']);
                                    $prisesRvGlobal = PriseRVModel::getAll();
                                    $prisesRvs = [];
                                    foreach($prisesRvGlobal as $prisesRv){
                                        if($prisesRv->getRendezVous()->medecin_id == $_SESSION['user_id'])
                                        $prisesRvs[] = $prisesRv;
                                    }
                                    require_once __DIR__.'/../view/Medecin/detail_rendez_vous.php';
                            }
                            break;
                        case 'requete': 
                            switch($_SERVER['REQUEST_METHOD']){
                                case 'POST':

                                    if(isset($_POST['email']) && isset($_POST['sujet']) && isset($_POST['message'])){
                                        $email =htmlspecialchars($_POST['email']) ;
                                        $sujet = htmlspecialchars($_POST['sujet']);
                                        $message = htmlspecialchars($_POST['message']);
                                        ContactModel::create($_SESSION['user_id'],$sujet,$message);
                                    }
                                    $planing = RendezVousModel::getAll();
                                    require_once __DIR__.'/../view/Medecin/rendez_vous.php';
                                    break;
                                case 'GET':
                                    $user= MedecinInfosModel::get($_SESSION['user_id']);
                                    require_once __DIR__.'/../view/Medecin/requete.php';
                            }                            
                            break;

                            case 'creneaux': 
                                switch($_SERVER['REQUEST_METHOD']){
                                    case 'POST':
                                        break;
                                    case 'GET':
                                        $user= MedecinInfosModel::get($_SESSION['user_id']);
                                        $prisesRvGlobal = PriseRVModel::getAll();
                                        $prisesRvs = [];
                                        foreach($prisesRvGlobal as $prisesRv){
                                            if($prisesRv->getRendezVous()->medecin_id == $_SESSION['user_id'])
                                            $prisesRvs[] = $prisesRv;
                                        }
                                        require_once __DIR__.'/../view/Medecin/creneaux.php';
                                }
                                break;

                        case 'logout':
                            session_destroy();
                            header('Location:index.php');
                            break;

                default:
                    //$this->home();
                    echo 'not found';
                    break;
            }
        }

    }
    