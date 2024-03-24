<?php
    class ValiderMedecin {
        public $id;
        public $admin_id;
        public $user_id;
        public $validate_at;
        
        // Constructor
        public function __construct($id, $admin_id, $user_id, $validate_at) {
            $this->id = $id;
            $this->admin_id = $admin_id;
            $this->user_id = $user_id;
            $this->validate_at = $validate_at;
        }
    }