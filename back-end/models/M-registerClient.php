<?php

    class register
    {
        // DB
        private $conn;

        // Les propriété de client
        public $nom;
        public $prenom;
        public $age;
        public $profession;
        public $reference_client;

        public function __construct($DB)
        {
            $this->conn = $DB;
        }

        public function register()
        {
            $checkifexist = "SELECT reference_client FROM client WHERE reference_client = ?";
            $stmt = $this->conn->prepare($checkifexist);
            $stmt->execute([$this->reference_client]);
            $result = $stmt->rowCount();
            if ($result == 0) {
                $registerclient = "INSERT INTO client (`nom`, `prenom`, `age`, `profession`, `reference_client`) 
                                    VALUES (:nom,:prenom,:age,:profession,:reference_client)";
                $stmt = $this->conn->prepare($registerclient);
                $stmt->bindParam(':nom', $this->nom);
                $stmt->bindParam(':prenom', $this->prenom);
                $stmt->bindParam(':age', $this->age);
                $stmt->bindParam(':profession', $this->profession);
                $stmt->bindParam(':reference_client', $this->reference_client);
                $stmt->execute();
                return true;
            } else {
                return false;
            }
        }
        
    }

?>