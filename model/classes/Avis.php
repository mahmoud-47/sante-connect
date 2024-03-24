<?php
    class Avis {
        public $user_id;
        public $num_rv;
        public $note;
        public $commentaire;
        public $date;
        
        // Constructor
        public function __construct($user_id, $num_rv, $note, $commentaire, $date) {
            $this->user_id = $user_id;
            $this->num_rv = $num_rv;
            $this->note = $note;
            $this->commentaire = $commentaire;
            $this->date = $date;
        }
    }