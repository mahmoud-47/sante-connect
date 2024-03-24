<?php
    class User {
        public $id;
        public $token;
        public $nom_complet;
        public $email;
        public $mot_de_passe;
        public $code_verification;
        public $accountType_libelle;
        public $sexe;
        public $date_de_naissance;
        public $numero_tel;
        public $photo;
        public $verified_at;
        public $bloque;
        
        // Constructor
        public function __construct($id, $token, $nom_complet, $email, $mot_de_passe, $code_verification, $accountType_libelle, $sexe, $date_de_naissance, $numero_tel, $photo = null, $verified_at = null, $bloque = false) {
            $this->id = $id;
            $this->token = $token;
            $this->nom_complet = $nom_complet;
            $this->email = $email;
            $this->mot_de_passe = $mot_de_passe;
            $this->code_verification = $code_verification;
            $this->accountType_libelle = $accountType_libelle;
            $this->sexe = $sexe;
            $this->date_de_naissance = $date_de_naissance;
            $this->numero_tel = $numero_tel;
            $this->photo = $photo;
            $this->verified_at = $verified_at;
            $this->bloque = $bloque;
        }


        
        
        
    }