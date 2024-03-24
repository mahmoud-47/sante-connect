<?php
    class Hopital {
        public $id;
        public $nom;
        public $lien;
        public $lat;
        public $lon;
        
        // Constructor
        public function __construct($id, $nom, $lien, $lat, $lon) {
            $this->id = $id;
            $this->nom = $nom;
            $this->lien = $lien;
            $this->lat = $lat;
            $this->lon = $lon;
        }
    }