<?php
require "ecole.php";
class Manager_ecole
{
    public static function ajouter(Ecole $ecole)
    {
        try {
            require("../conn_cree/connectionDBWithName.php");
            $stmt = $pdo->prepare("insert into Ecole (NomEcole,Adresse,Ville) values (:NomEcole,:Adresse,:Ville);");
            $data = [
                ":NomEcole" => $ecole->getNomEcole(),
                ":Adresse" => $ecole->getAdresse(),
                ":Ville" => $ecole->getVille(),
            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
    public static function supprimer(int $numEcole)
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("DELETE FROM Ecole WHERE NumEcole = :NumEcole");
        $stmt->execute([":NumEcole"=>$numEcole]);
    }
    public static function consulter()
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("SELECT * FROM Ecole ORDER BY NumEcole;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function modifier(Ecole $ecole,int $numecole){
        require("../conn_cree/connectionDBWithName.php");
        try{
            $stmt = $pdo->prepare("update Ecole set NomEcole=:NomEcole, Adresse=:Adresse, Ville=:Ville where NumEcole=:NumEcole;");
            $data = [
                ":NomEcole" => $ecole->getNomEcole(),
                ":Adresse" => $ecole->getAdresse(),
                ":Ville" => $ecole->getVille(),
                ":NumEcole"=>$numecole
            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
    
}
