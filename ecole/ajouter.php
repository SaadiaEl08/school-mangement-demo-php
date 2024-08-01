<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_ecole.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!(empty($_POST["NomEcole"]) || empty($_POST["Adresse"]) || empty($_POST["Ville"]))) {
        $ecole = new Ecole($_POST["NomEcole"], $_POST["Adresse"], $_POST["Ville"]);
        Manager_ecole::ajouter($ecole);
        header("Location: http://localhost:8080/ecole/consulter.php");
    }
}
require_once("../aside.php");
?>

    <form class="m-3" method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
        <h3 class="text text-white " >Ajouter une nouvelle école</h3>
        <div>
            <label class="form-label text text-white">Nom école : </label>
            <input class="form-control" type="text" name="NomEcole" value="<?= isset($_POST["NomEcole"]) ? $_POST["NomEcole"] : "" ?>">
        </div>
        <span><?= isset($_POST["NomEcole"]) && empty($_POST["NomEcole"]) ? "le Nom est obligatoire" : "" ?></span>
        <div>
            <label class="form-label text text-white">Ville : </label>
            <input class="form-control" type="text" name="Ville" value="<?= isset($_POST["Ville"]) ? $_POST["Ville"] : "" ?>">
        </div>
        <span><?= isset($_POST["Ville"])  && empty($_POST["Ville"])? "la ville est obligatoire" : "" ?></span>
        <div>
            <label class="form-label  text text-white">Adresse : </label>
            <input class="form-control" type="text" name="Adresse" value="<?= isset($_POST["Adresse"]) ? $_POST["Adresse"] : "" ?>">
        </div>
        <span><?= isset($_POST["Adresse"])  && empty($_POST["Adresse"]) ? "l'Adresse est obligatoire" : "" ?></span>
        <div>
        <input class="btn mt-1 border border-white border-2" type="submit" value="Ajouter">
        </div>
    </form>

<?php require_once("../end.php"); ?>