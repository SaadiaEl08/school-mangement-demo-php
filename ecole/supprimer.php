<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_ecole.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numEcole = $_POST["NumEcole"];
    Manager_ecole::supprimer($numEcole);
    header("location: http://localhost:8080/ecole/consulter.php");
} else {
    $numEcole = $_GET["NumEcole"];
}
require_once("../aside.php");

?>

    <form class="m-3 d-flex justify-content-center  flex-wrap" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <h2 class="text text-white text-center mb-5">Voulez-vous supprimer l'école portant le numéro : <?= $numEcole ?> ?</h2>
        <input class="p3 btn  border border-white "  type="submit" value="yes">
        <input type="hidden" value="<?= $numEcole ?>" name="NumEcole">
        <button type="reset" class="p3 btn border border-white ms-5 "  onclick="location.href='http://localhost:8080/ecole/consulter.php'" >No</button>
    </form>
