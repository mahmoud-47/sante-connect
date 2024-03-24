<?php
    session_start();
    require_once __DIR__.'/./model/models/UserModel.php';
    require_once __DIR__.'/./controller/AuthController.php';
    require_once __DIR__.'/./controller/MedecinController.php';
    require_once __DIR__.'/./controller/UserController.php';
    require_once __DIR__.'/./controller/AdminController.php';
    require_once __DIR__.'/./controller/SuperUserController.php';

    if (isset($_SESSION["user_id"])){
        $user = UserModel::get($_SESSION["user_id"]);
        if($user->bloque){
            unset($_SESSION["user_id"]);
            $_SESSION["bloqued"] = 'Votre compte a été bloqué';
            $authcontroller = new AuthController();
            $authcontroller->invoke();
        }
        $role = $user->accountType_libelle;
        switch ($role) {
            case 'user':
                $usercontroller = new UserController();
                $usercontroller->invoke();
                break;
            
            case 'medecin':
                $medecincontroller= new MedecinController();
                $medecincontroller->invoke();
                break;

            case 'admin':
                $admincontroller = new AdminController();
                $admincontroller->invoke();
                break;
            
            case 'superuser':
                $superusercontroller = new SuperUserController();
                $superusercontroller->invoke();
                break;

            default:
                
                break;
        }
    }else{
        $authcontroller = new AuthController();
        $authcontroller->invoke();
    }
