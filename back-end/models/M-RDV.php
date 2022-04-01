<?php

    class RDV
    {
        // DB
        private $conn;

        // Rendez-vous Properties
        public $id;
        public $sujet;
        public $date;
        public $creneau;
        public $client_Id;

        public function __construct($DB)
        {
            $this->conn = $DB;
        }

        public function creer_rdv()
        {
            // request
            $sql = "INSERT INTO rdv (`sujet`, `date`, `creneau`, `client_Id`) 
            VALUES (:sujet,:date,:creneau,:client_Id)";

            // prepare request
            $stmt = $this->conn->prepare($sql);

            //bind data
            $stmt->bindParam(':sujet', $this->sujet);
            $stmt->bindParam(':date', $this->date);
            $stmt->bindParam(':creneau', $this->creneau);
            $stmt->bindParam(':client_Id', $this->client_Id);

            // exectute
            return $stmt->execute();
        }
        public function lire_rdv()
        {
            // request
            $sql = "SELECT rdv.* ,client.nom,client.prenom,client.age,client.profession,client.reference_client
            FROM rdv
            INNER JOIN client
            ON rdv.client_Id = client.id
            ";

            // prepare request
            $stmt = $this->conn->prepare($sql);

            // exectute  
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        public function lireun_rdv()
        {
            // request
            $sql = "SELECT rdv.* ,client.nom,client.prenom,client.age,client.profession,client.reference_client
            FROM rdv
            INNER JOIN client
            ON rdv.client_Id = client.id WHERE id = :id";

            // prepare request
            $stmt = $this->conn->prepare($sql);

            // On attache l'id
            $stmt->bindParam(1, $this->id);

            // On exécute la requête
            $stmt->execute();

            // on récupère la ligne
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // On hydrate l'objet
            $this->sujet = $row['sujet'];
            $this->date = $row['date'];
            $this->creneau = $row['creneau'];
            $this->client_Id = $row['client_Id'];
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