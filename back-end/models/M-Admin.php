<?php

    class ADMIN
    {
        // DB
        private $conn;

        // Rendez-vous Properties
        public $id;
        public $nom;
        public $prenom;
        public $age;
        public $profession;
        public $reference_client;

        public function __construct($DB)
        {
            $this->conn = $DB;
        }

        public function lireun_client() {
            
        }

        public function Modifier_Client()
        {
            // request
            $sql = "UPDATE client SET nom=:nom, prenom=:prenom, age=:age, profession=:profession, reference_client=:reference_client WHERE id=:id";

            // prepare request
            $stmt = $this->conn->prepare($sql);

            //bind data
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':nom', $this->nom);
            $stmt->bindParam(':prenom', $this->prenom);
            $stmt->bindParam(':age', $this->age);
            $stmt->bindParam(':profession', $this->profession);
            $stmt->bindParam(':reference_client', $this->reference_client);

            // exectute  
            return $stmt->execute();
        }

        public function supprimer_client()
        {
            // request
            $sql = "DELETE FROM client WHERE id = :id";

            // prepare request
            $stmt = $this->conn->prepare($sql);

            //bind data
            $stmt->bindParam(':id', $this->id);

            // exectute  
            return $stmt->execute();
        }


    }
