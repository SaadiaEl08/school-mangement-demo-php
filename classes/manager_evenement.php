<?php
require "evenement.php";
class Manager_evenment
{
    public static function ajouter(Evenement $evenement)
    {
        try {
            require("../conn_cree/connectionDBWithName.php");
            $stmt = $pdo->prepare("insert into Evenement (DateEven, Ville, Matricule, NumEcole, Duree) values (:DateEven, :Ville, :Matricule, :NumEcole, :Duree);");
            $data = [
                ":DateEven" => $evenement->getDateEven(),
                ":Ville" => $evenement->getVille(),
                ":Matricule" => $evenement->getMatricule(),
                ":NumEcole" => $evenement->getNumEcole(),
                ":Duree" => $evenement->getDuree(),

            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
    public static function supprimer(int $numEven)
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("DELETE FROM Evenement WHERE NumEven = :NumEven");
        $stmt->execute(["NumEven"=>$numEven]);
    }
    public static function consulter()
    {
        require("../conn_cree/connectionDBWithName.php");
        $stmt = $pdo->prepare("SELECT * FROM Evenement ORDER BY DateEven DESC;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
    public static function modifier(Evenement $evenement,$numeven)
    {
        try {
            require("../conn_cree/connectionDBWithName.php");
            $stmt = $pdo->prepare("update Evenement set DateEven=:DateEven, Ville=:Ville, Matricule=:Matricule, NumEcole=:NumEcole, Duree=:Duree where NumEven=:NumEven ;");
            $data = [
                ":DateEven" => $evenement->getDateEven(),
                ":Ville" => $evenement->getVille(),
                ":Matricule" => $evenement->getMatricule(),
                ":NumEcole" => $evenement->getNumEcole(),
                ":Duree" => $evenement->getDuree(),
                ":NumEven"=>$numeven

            ];
            $stmt->execute($data);
        } catch (PDOException $err) {
            echo "Error : " . $err->getMessage();
        }
    }
}
