<?php
    class Contact {
        public $id;
        public $user_id;
        public $sujet;
        public $message;
        
        // Constructor
        public function __construct($id, $user_id, $sujet, $message) {
            $this->id = $id;
            $this->user_id = $user_id;
            $this->sujet = $sujet;
            $this->message = $message;
        }
    }