<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_etablissement.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numetab=$_POST['NumEtab'];
    if (!(empty($_POST["NomEtab"]) || empty($_POST["Ville"]))) {
    $etablissement = new Etablissement($_POST["NomEtab"], $_POST["Ville"]);
    Manager_etablissement::modifier($etablissement,$numetab);
    header("Location: http://localhost:8080/etablissement/consulter.php");
    }
}elseif($_SERVER["REQUEST_METHOD"] == "GET"){
    $numetab=$_GET['NumEtab'];
    
}
$stmt = $pdo->prepare("SELECT * FROM Etablissement where NumEtab=:NumEtab;");
    $stmt->execute([":NumEtab"=>$numetab]);
    $res=$stmt->fetchObject();
require_once("../aside.php");

?>
    <form class="m-3" method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
            <h4 class="text text-white ">Modifier l'établissement <?=$numetab?></h4>
            <input type="hidden" name="NumEtab" value="<?= $numetab ?>">
            <div>
                <label class="form-label text text-white">Nom de l'établissement : </label>
                <input class="form-control" type="text" name="NomEtab" value="<?=$res->NomEtab?>">
            </div>
            <span><?= isset($_POST["NomEtab"]) && empty($_POST["NomEtab"]) ? "le nom est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Ville : </label>
                <input class="form-control" type="text" name="Ville" value="<?= $res->Ville?>">
            </div>
            <span><?= isset($_POST["Ville"]) && empty($_POST["Ville"]) ? "la ville est obligatoire" : "" ?></span>

          <div>  
        <input type="submit" class="btn e mt-1 border border-white border-2"  value="Modifier" ></div>
    </form>

    <?php require_once("../end.php"); ?>