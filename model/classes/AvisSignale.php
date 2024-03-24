<?php
    class AvisSignale {
        public $avis_user_id;
        public $avis_num_rv;
        public $user_signal_id;
        public $date;
        public $is_quarentaine;
        public $is_ok;
        public $admin_actor_id;
        
        // Constructor
        public function __construct($avis_user_id, $avis_num_rv, $user_signal_id, $date, $is_quarentaine, $is_ok, $admin_actor_id) {
            $this->avis_user_id = $avis_user_id;
            $this->avis_num_rv = $avis_num_rv;
            $this->user_signal_id = $user_signal_id;
            $this->date = $date;
            $this->is_quarentaine = $is_quarentaine;
            $this->is_ok = $is_ok;
            $this->admin_actor_id = $admin_actor_id;
        }
    }