<?php
    class NotifType {
        public $libelle;
        public $icone;
        
        // Constructor
        public function __construct($libelle, $icone) {
            $this->libelle = $libelle;
            $this->icone = $icone;
        }
    }