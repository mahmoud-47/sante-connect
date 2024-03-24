<?php
    class RendezVous {
        public $num_rv;
        public $date;
        public $heure_debut;
        public $heure_fin;
        public $nb_limite;
        public $closed;
        public $medecin_id;
        public $created_at;
        
        // Constructor
        public function __construct($num_rv, $date, $heure_debut, $heure_fin, $medecin_id, $created_at, $nb_limite = null, $closed = false) {
            $this->num_rv = $num_rv;
            $this->date = $date;
            $this->heure_debut = $heure_debut;
            $this->heure_fin = $heure_fin;
            $this->nb_limite = $nb_limite;
            $this->closed = $closed;
            $this->medecin_id = $medecin_id;
            $this->created_at = $created_at;
        }
    }