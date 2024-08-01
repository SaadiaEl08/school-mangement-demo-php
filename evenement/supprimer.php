<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_evenement.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numEven = $_POST["NumEven"];
    Manager_evenment::supprimer($numEven);
    header("location: http://localhost:8080/evenement/consulter.php");
} else {
    $numEven = $_GET["NumEven"];
}
require_once("../aside.php");

?>

    <form class="m-3 d-flex justify-content-center  flex-wrap" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <h2 class="text text-white text-center mb-5">Vollez vous supprimer l'Evenement ayant le numero : <?= $numEven ?> ?</h2>
        <input  class="p3 btn  border border-white "  type="submit" value="yes">
        <input type="hidden" value="<?= $numEven ?>" name="NumEven">
        <button type="reset" class="p3 btn border border-white ms-5 "  onclick="location.href='http://localhost:8080/evenement/consulter.php'" >No</button>
    </form>
    <?php require_once("../end.php"); ?>