<?php
require_once __DIR__.'/../model/models/UserModel.php';

class SuperUserController{
    public function __construct() {
        require_once __DIR__.'/./middlewares/superUserCheck.php';
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
                $active = "index";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            echo "Bad request";
                            break;
                        case 'GET':
                            $users = UserModel::getWhere(['accountType_libelle' => 'user']);
                            require_once __DIR__.'/../view/SuperUser/index.php';
                        break;
                    }                
                break;
            case 'medecin':
                $active = "medecin";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            echo "Bad request";
                            break;
                        case 'GET':
                            require_once __DIR__.'/../view/SuperUser/medecin.php';
                        break;
                    }                
                break;
            case 'admin':
                $active = "admin";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            echo "Bad request";
                            break;
                        case 'GET':
                            require_once __DIR__.'/../view/SuperUser/admin.php';
                        break;
                    }                
                break;
            case 'superuser':
                $active = "superuser";
                    switch($_SERVER['REQUEST_METHOD']){
                        case 'POST':
                            echo "Bad request";
                            break;
                        case 'GET':
                            require_once __DIR__.'/../view/SuperUser/superuser.php';
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
