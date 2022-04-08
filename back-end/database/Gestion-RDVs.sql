CREATE DATABASE IF NOT EXISTS Architecte;

use Architecte;

CREATE TABLE IF NOT EXISTS client 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    nom varchar(50),
    prenom varchar(50),
    age INT NOT NULL,
    profession varchar(250),
    reference_client varchar(250)
);

CREATE TABLE IF NOT EXISTS RDV 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    date DATE NOT NULL,
    creneau varchar(250),
    sujet varchar(250),
    client_Id INT NOT NULL,
    FOREIGN KEY (client_Id) REFERENCES client(id)
);

CREATE TABLE IF NOT EXISTS creneau
(
    time_creneau VARCHAR(255),
    rdv_creneau VARCHAR(255),
    FOREIGN KEY (rdv_creneau ) REFERENCES RDV(creneau )
);

CREATE TABLE IF NOT EXISTS admin 
(
    id int PRIMARY KEY AUTO_INCREMENT,
    reference_admin varchar(50)
);
