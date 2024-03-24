<?php
    require_once __DIR__.'/../dbconfig/connect.php';
    require_once __DIR__.'/../classes/AccountType.php';
    class AccountTypeModel extends AccountType{
        private $bdd;
        
        public function __construct($libelle) {
            parent::__construct($libelle);
            $this->bdd = connexion();
        }
    }