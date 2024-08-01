<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_ecole.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numecole=$_POST["NumEcole"];
    if (!(empty($_POST["NomEcole"]) || empty($_POST["Adresse"]) || empty($_POST["Ville"]))) {
        $ecole = new Ecole($_POST["NomEcole"], $_POST["Adresse"], $_POST["Ville"]);
        Manager_ecole::modifier($ecole,$numecole);
        header("Location: http://localhost:8080/ecole/consulter.php");
    }
}elseif($_SERVER["REQUEST_METHOD"] == "GET"){
    $numecole=$_GET['NumEcole'];
}
$stmt = $pdo->prepare("SELECT * FROM Ecole where NumEcole=:NumEcole;");
    $stmt->execute([":NumEcole"=>$numecole]);
    $res=$stmt->fetchObject();
require_once("../aside.php");
?>

    <form class="m-3" method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
        <h3 class="text text-white " >Modifier l'ecole <?=$numecole?></h3>
        <input type="hidden" name="NumEcole" value="<?= $numecole ?>">
        <div>
            <label class="form-label text text-white">nom ecole : </label>
            <input class="form-control" type="text" name="NomEcole" value="<?= $res->NomEcole ?>">
        </div>
        <span><?= isset($_POST["NomEcole"]) && empty($_POST["NomEcole"]) ? "le nom est obligatoire" : "" ?></span>
        <div>
            <label class="form-label text text-white">Ville : </label>
            <input class="form-control" type="text" name="Ville" value="<?= $res->Ville ?>">
        </div>
        <span><?= isset($_POST["Ville"])  && empty($_POST["Ville"])? "la ville est obligatoire" : "" ?></span>
        <div>
            <label class="form-label  text text-white">Adresse : </label>
            <input class="form-control" type="text" name="Adresse" value="<?=$res->Adresse?>">
        </div>
        <span><?= isset($_POST["Adresse"])  && empty($_POST["Adresse"]) ? "l'Adresse est obligatoire" : "" ?></span>
        <div>
        <input class="btn mt-1 border border-white border-2" type="submit" value="Modifier">
        </div>
    </form>

<?php require_once("../end.php"); ?>