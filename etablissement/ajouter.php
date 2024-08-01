<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_etablissement.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!(empty($_POST["NomEtab"]) || empty($_POST["Ville"]))) {
    $etablissement = new Etablissement($_POST["NomEtab"], $_POST["Ville"]);
    Manager_etablissement::ajouter($etablissement);
    header("Location: http://localhost:8080/etablissement/consulter.php");
    }
}
require_once("../aside.php");

?>
    <form class="m-3" method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
            <h4 class="text text-white ">Ajouter un nouvel établissement</h4>
            <div>
                <label class="form-label text text-white">Nom de l'etablissement : </label>
                <input class="form-control" type="text" name="NomEtab" value="<?= isset($_POST["NomEtab"])?$_POST["NomEtab"]:""?>">
            </div>
            <span><?= isset($_POST["NomEtab"]) && empty($_POST["NomEtab"]) ? "le nom est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Ville : </label>
                <input class="form-control" type="text" name="Ville" value="<?= isset($_POST["Ville"])?$_POST["Ville"]:""?>">
            </div>
            <span><?= isset($_POST["Ville"]) && empty($_POST["Ville"]) ? "la ville est obligatoire" : "" ?></span>

          <div>  
        <input type="submit" class="btn e mt-1 border border-white border-2"  value="ajouter"></div>
    </form>

    <?php require_once("../end.php"); ?>