<?php

    class login_admin
    {
        // DB
        private $conn;

        // properties
        public $reference_admin;

        //connection 
        public function __construct($DB)
        {
            $this->conn = $DB;
        }

        // Login
        public function login_admin()
        {
            $query = "SELECT * FROM admin WHERE reference_admin =:reference_admin";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':reference_admin', $this->reference_admin);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }
