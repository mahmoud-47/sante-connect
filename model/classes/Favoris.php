<?php
    class Favoris {
        public $user_id;
        public $medecin_id;
        public $created_at;
        
        // Constructor
        public function __construct($user_id, $medecin_id, $created_at) {
            $this->user_id = $user_id;
            $this->medecin_id = $medecin_id;
            $this->created_at = $created_at;
        }
    }