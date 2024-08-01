<?php
require "etablissement.php";
class Manager_etablissement
{
    public static function ajouter(Etablissement $etablissement)
    {
        try {
            require("../conn_cree/connectionDBWithName.php");
            $stmt = $pdo->prepare("insert into etablissement (NomEtab,Ville) values (:NomEtab,:Ville);");
            $data = [
                ":NomEtab" => $etablissement->getNomEtab(),
                ":Ville" => $etablissement->getVille(),
            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
    public static function supprimer(int $numEtab)
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("DELETE FROM etablissement WHERE NumEtab = :NumEtab");
        $stmt->execute([":NumEtab"=>$numEtab]);
    }
    public static function consulter()
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("SELECT * FROM Etablissement ORDER BY NumEtab;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function modifier(Etablissement $etablissement,int $numetab)
    {
        try {
            require("../conn_cree/connectionDBWithName.php");
            $stmt = $pdo->prepare("update  etablissement set NomEtab=:NomEtab,Ville=:Ville where NumEtab=:NumEtab;");
            $data = [
                ":NomEtab" => $etablissement->getNomEtab(),
                ":Ville" => $etablissement->getVille(),
               ":NumEtab"=>$numetab
            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
}
