<?php

class Specialite {
    public $id;
    public $nom;
    public $couleur;
    public $icone;
    public $description;
    
    // Constructor
    public function __construct($id, $nom, $couleur, $icone, $description) {
        $this->id = $id;
        $this->nom = $nom;
        $this->couleur = $couleur;
        $this->icone = $icone;
        $this->description = $description;
    }
}