<?php
    class DemandePaiement {
        public $id;
        public $user_id;
        public $date;
        public $montant;
        public $numTel;
        public $operateur_libelle;
        public $etat;
        public $dossier_ouvert;
        public $admin_actor_id;
        public $paiement_code;
        
        // Constructor
        public function __construct($id, $user_id, $montant, $numTel, $operateur_libelle, $etat, $admin_actor_id, $paiement_code, $date = null, $dossier_ouvert = false) {
            $this->id = $id;
            $this->user_id = $user_id;
            $this->date = $date;
            $this->montant = $montant;
            $this->numTel = $numTel;
            $this->operateur_libelle = $operateur_libelle;
            $this->etat = $etat;
            $this->dossier_ouvert = $dossier_ouvert;
            $this->admin_actor_id = $admin_actor_id;
            $this->paiement_code = $paiement_code;
        }
    }