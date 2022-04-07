<?php

    class RDV
    {
        // DB
        private $conn;

        // Rendez-vous Properties
        public $id;
        public $date;
        public $creneau;
        public $sujet;
        // public $client_Id;

        public function __construct($DB)
        {
            $this->conn = $DB;
        }

        public function creer_rdv()
        {
            // request
            $sql = "INSERT INTO rdv (`date`, `creneau`, `sujet`,`client_Id`) 
            VALUES (:date, :creneau, :sujet , :client_Id)";

            // echo $this->client_Id;
            // prepare request
            $stmt = $this->conn->prepare($sql);

            //bind data
            $stmt->bindParam(':date', $this->date);
            $stmt->bindParam(':creneau', $this->creneau);
            $stmt->bindParam(':sujet', $this->sujet);
            $stmt->bindParam(':client_Id', $this->client_Id);

            // exectute
            $stmt->execute();
        }
        public function lire_rdv()
        {
            // request
            $sql = "SELECT * FROM rdv WHERE client_Id=:id";
            // prepare request
            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindParam(':id', $this->id);

            // exectute  
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function modifier_rdv()
        {
            // request
            $sql = "UPDATE rdv SET sujet=:sujet, date=:date, creneau=:creneau, client_Id=:client_Id WHERE id=:id";

            // prepare request
            $stmt = $this->conn->prepare($sql);

            //bind data
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':sujet', $this->sujet);
            $stmt->bindParam(':date', $this->date);
            $stmt->bindParam(':creneau', $this->creneau);
            $stmt->bindParam(':client_Id', $this->client_Id);
            
            // exectute  
            $result = $stmt->execute();

            return $result;
        }

        public function supprimer_rdv()
        {
            // request
            $sql = "DELETE FROM rdv WHERE id = :id";

            // prepare request
            $stmt = $this->conn->prepare($sql);

            //bind data
            $stmt->bindParam(':id', $this->id);

            // exectute  
            return $stmt->execute();
        }
    }

?>