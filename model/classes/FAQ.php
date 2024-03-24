<?php
    class FAQ {
        public $id;
        public $concernes;
        public $question;
        public $reponse;
        public $admin_id;
        
        // Constructor
        public function __construct($id, $concernes, $question, $reponse, $admin_id) {
            $this->id = $id;
            $this->concernes = $concernes;
            $this->question = $question;
            $this->reponse = $reponse;
            $this->admin_id = $admin_id;
        }
    }