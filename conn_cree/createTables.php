<?php
require("connectionDBWithName.php");
try {
    $sql = "CREATE TABLE Etablissement (
        NumEtab INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
        NomEtab VARCHAR(30) NOT NULL,
        Ville VARCHAR(30) NOT NULL
      );
      
      CREATE TABLE Orienteur (
        Matricule VARCHAR(50) NOT NULL UNIQUE PRIMARY KEY,
        Nom VARCHAR(30) NOT NULL,
        Prenom VARCHAR(30) NOT NULL,
        NumEtab INT,
        NombreEvenments INT NOT NULL,
        Pass VARCHAR(8) NOT NULL,
        FOREIGN KEY (NumEtab) REFERENCES Etablissement(NumEtab) ON UPDATE CASCADE ON DELETE SET NULL
      );
      
      CREATE TABLE Ecole (
        NumEcole INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
        NomEcole VARCHAR(30) NOT NULL,
        Adresse VARCHAR(60) NOT NULL,
        Ville VARCHAR(30) NOT NULL
      );
      
      CREATE TABLE Evenement (
        NumEven INT NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
        DateEven DATE NOT NULL,
        Ville VARCHAR(30) NOT NULL,
        Matricule VARCHAR(50) ,
        NumEcole INT ,
        Duree double NOT NULL,
        FOREIGN KEY (NumEcole) REFERENCES Ecole(NumEcole) ON UPDATE CASCADE ON DELETE SET NULL,
        FOREIGN KEY (Matricule) REFERENCES Orienteur(Matricule) ON UPDATE CASCADE ON DELETE SET NULL
      );
      ";

    $pdo->exec($sql);
} catch (PDOException $err) {
    echo "Error: " ;
}
