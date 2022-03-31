<?php

    class login
    {
        // DB
        private $conn;

        // properties
        public $reference_client;

        //connection 
        public function __construct($DB)
        {
            $this->conn = $DB;
        }

        // Login
        public function login()
        {
            $query = "SELECT * FROM client WHERE reference_client =:reference_client";
            $stmt   =   $this->conn->prepare($query);
            $stmt->bindParam(':reference_client', $this->reference_client);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        }
    }

?>