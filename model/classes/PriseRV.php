<?php
    class PriseRV {
        public $user_id;
        public $num_rv;
        public $categorie_age;
        public $date;
        public $etat;
        public $commentaire;
        public $prix;
        public $paied;
        public $online_paied;
        public $paiement_code;
        public $nbPatients;
        public $nom_complet_autre1;
        public $categorie_age_autre1;
        public $nom_complet_autre2;
        public $categorie_age_autre2;
        
        // Constructor
        public function __construct($user_id, $num_rv, $categorie_age, $etat, $prix, $paied, $online_paied, $paiement_code, $nbPatients, $nom_complet_autre1 = null, $categorie_age_autre1 = null, $nom_complet_autre2 = null, $categorie_age_autre2 = null, $commentaire = null, $date = null) {
            $this->user_id = $user_id;
            $this->num_rv = $num_rv;
            $this->categorie_age = $categorie_age;
            $this->etat = $etat;
            $this->commentaire = $commentaire;
            $this->prix = $prix;
            $this->paied = $paied;
            $this->online_paied = $online_paied;
            $this->paiement_code = $paiement_code;
            $this->nbPatients = $nbPatients;
            $this->nom_complet_autre1 = $nom_complet_autre1;
            $this->categorie_age_autre1 = $categorie_age_autre1;
            $this->nom_complet_autre2 = $nom_complet_autre2;
            $this->categorie_age_autre2 = $categorie_age_autre2;
            $this->date = $date;
        }
    }