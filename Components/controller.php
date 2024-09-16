<?php
    class Controller {
        private $db;

        public function __construct($connecdb)
        {
            $this->db = $connecdb;
        }
    }

?>