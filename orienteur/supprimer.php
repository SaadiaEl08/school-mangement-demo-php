<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_orienteur.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matricule = $_POST["Matricule"];
    Manager_orienteur::supprimer($matricule);
    header("location: http://localhost:8080/orienteur/consulter.php");
} else {
    $matricule = $_GET["Matricule"];
}
require_once("../aside.php");

?>

    <form class="m-3 d-flex justify-content-center  flex-wrap" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
        <h2 class="text text-white text-center mb-5">vollez vous suprimer l'orienteur ayant le Matricule : <?= $matricule ?> ?</h2>
        <input  class="p3 btn  border border-white "  type="submit" value="yes">
        <input type="hidden" value="<?= $matricule ?>" name="Matricule">
        <button type="reset" class="p3 btn border border-white ms-5 "  onclick="location.href='http://localhost:8080/orienteur/consulter.php'" >No</button>
    </form>
    <?php require_once("../end.php"); ?>