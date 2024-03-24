<?php
    class MedecinInfos {
        public $user_id;
        public $specialite_id;
        public $autre_specialite;
        public $hopital_id;
        public $autre_hopital;
        public $lat_lieurv;
        public $lon_lieurv;
        public $ville_lieurv;
        public $attestation;
        public $carte_professionnelle;
        public $confirmed;
        public $declined;
        public $bio;
        public $tarif_enfant;
        public $tarif_adulte;
        
        // Constructor
        public function __construct($user_id, $specialite_id, $autre_specialite, $hopital_id, $autre_hopital, $lat_lieurv, $lon_lieurv, $ville_lieurv, $attestation, $carte_professionnelle, $confirmed = false, $declined = false, $bio = null, $tarif_enfant = null, $tarif_adulte = null) {
            $this->user_id = $user_id;
            $this->specialite_id = $specialite_id;
            $this->autre_specialite = $autre_specialite;
            $this->hopital_id = $hopital_id;
            $this->autre_hopital = $autre_hopital;
            $this->lat_lieurv = $lat_lieurv;
            $this->lon_lieurv = $lon_lieurv;
            $this->ville_lieurv = $ville_lieurv;
            $this->attestation = $attestation;
            $this->carte_professionnelle = $carte_professionnelle;
            $this->confirmed = $confirmed;
            $this->declined = $declined;
            $this->bio = $bio;
            $this->tarif_enfant = $tarif_enfant;
            $this->tarif_adulte = $tarif_adulte;
        }
    }