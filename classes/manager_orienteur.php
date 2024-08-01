<?php
require "orienteur.php";
class Manager_orienteur
{
    public static function ajouter(Orienteur $orienteur)
    {
        try {
            require("../conn_cree/connectionDBWithName.php");
            $stmt = $pdo->prepare("insert into Orienteur values (:Matricule, :Nom, :Prenom, :NumEtab, :NombreEvenments, :Pass);");
            $data = [
                ":Matricule" => $orienteur->getMatricule(),
                ":Nom" => $orienteur->getNom(),
                ":Prenom" => $orienteur->getPrenom(),
                ":NumEtab" => $orienteur->getNumEtab(),
                ":NombreEvenments" => $orienteur->getNombreEvenments(),
                ":Pass" => $orienteur->getPass(),

            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
    public static function supprimer(string $matricule)
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("DELETE FROM orienteur WHERE Matricule =:Matricule ;");
        $stmt->execute([":Matricule" => $matricule]);
    }
    public static function consulter()
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("SELECT * FROM orienteur ORDER BY matricule;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function modifier(Orienteur $orienteur)
    {
        try {
            require("../conn_cree/connectionDBWithName.php");
            $stmt = $pdo->prepare("update Orienteur set Nom=:Nom, Prenom=:Prenom,NumEtab=:NumEtab, NombreEvenments=:NombreEvenments, Pass=:Pass  where Matricule=:Matricule ;");
            $data = [
                ":Matricule" =>$orienteur->getMatricule(),
                ":Nom" => $orienteur->getNom(),
                ":Prenom" => $orienteur->getPrenom(),
                ":NumEtab" => $orienteur->getNumEtab(),
                ":NombreEvenments" => $orienteur->getNombreEvenments(),
                ":Pass" => $orienteur->getPass(),

            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
}
