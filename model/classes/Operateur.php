<?php
    class Operateur {
        public $libelle;
        public $actif;
        
        // Constructor
        public function __construct($libelle, $actif = true) {
            $this->libelle = $libelle;
            $this->actif = $actif;
        }
    }