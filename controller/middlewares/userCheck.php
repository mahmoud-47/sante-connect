<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    require_once __DIR__."/../../model/models/UserModel.php";

    if(isset($_SESSION["user_id"]) 
        && UserModel::get($_SESSION["user_id"]) 
        && UserModel::get($_SESSION['user_id'])->verified_at
        && UserModel::get($_SESSION["user_id"])->accountType_libelle === 'user'
        && !UserModel::get($_SESSION['user_id'])->bloque
    ) {
        // do rien
    }else{
        //rediriger vers index nonpage
    }