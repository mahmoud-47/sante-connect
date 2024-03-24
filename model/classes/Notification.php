<?php
    class Notification {
        public $id;
        public $user_id;
        public $notifType_libelle;
        public $num_rv;
        public $created_at;
        
        // Constructor
        public function __construct($id, $user_id, $notifType_libelle, $num_rv, $created_at) {
            $this->id = $id;
            $this->user_id = $user_id;
            $this->notifType_libelle = $notifType_libelle;
            $this->num_rv = $num_rv;
            $this->created_at = $created_at;
        }
    }