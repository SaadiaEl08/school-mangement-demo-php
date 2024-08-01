<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_etablissement.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numEtab = $_POST["NumEtab"];
    Manager_etablissement::supprimer($numEtab);
    header("location: http://localhost:8080/etablissement/consulter.php");
} else {
    $numEtab = $_GET["NumEtab"];
}
require_once("../aside.php");

?>

    <form  class="m-3 d-flex justify-content-center  flex-wrap" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <h2 class="text text-white text-center mb-5">Voulez-vous supprimer l'établissement portant le numéro : <?= $numEtab ?> ?</h2>
        <input class="p3 btn  border border-white " type="submit" value="Yes">
        <input type="hidden" value="<?= $numEtab ?>" name="NumEtab">
        <button type="reset" class="p3 btn border border-white ms-5 "  onclick="location.href='http://localhost:8080/etablissement/consulter.php'" >No</button>
    </form>
    <?php require_once("../end.php"); ?>