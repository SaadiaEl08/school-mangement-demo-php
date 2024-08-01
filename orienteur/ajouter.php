<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_orienteur.php");
$stmt = $pdo->prepare("SELECT NumEtab , NomEtab FROM Etablissement;");
$stmt->execute();
$numEtab = $stmt->fetchAll();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!(empty($_POST["Matricule"]) || empty($_POST["Nom"]) || empty($_POST["Prenom"])|| empty($_POST["NombreEvenments"])|| empty($_POST["Pass"]))) {
        $orienteur = new Orienteur($_POST["Matricule"], $_POST["Nom"], $_POST["Prenom"], $_POST["NumEtab"], $_POST["NombreEvenments"], $_POST["Pass"]);
        Manager_orienteur::ajouter($orienteur);
        header("Location: http://localhost:8080/orienteur/consulter.php");
    }
}

require_once("../aside.php");

?>

    <form class="m-2" method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
        <?php if ($numEtab != null) : ?>
            <h3 class="text text-white ">Ajouter un nouvel orienteur</h3>
            <div>
                <label class="form-label text text-white">Matricule d'Orienteur : </label>
                <input class="form-control" type="text" name="Matricule" value="<?= isset($_POST["Matricule"])?$_POST["Matricule"]:""?>">
            </div>
            <span><?= isset($_POST["Matricule"]) && empty($_POST["Matricule"]) ? "la Matricule est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Nom : </label>
                <input class="form-control"  type="text" name="Nom" value="<?= isset($_POST["Nom"])?$_POST["Nom"]:""?>">
            </div>
            <span><?= isset($_POST["Nom"]) && empty($_POST["Nom"]) ? "le Nom est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Prenom : </label>
                <input class="form-control"  type="text" name="Prenom" value="<?= isset($_POST["Prenom"])?$_POST["Prenom"]:""?>">
            </div>
            <span><?= isset($_POST["Prenom"]) && empty($_POST["Prenom"]) ? "le Prenom est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Nombre d'evenments : </label>
                <input  class="form-control"  type="number" name="NombreEvenments" min="1" value="<?= isset($_POST["NombreEvenments"])?$_POST["NombreEvenments"]:""?>">
            </div>
            <span><?= isset($_POST["NombreEvenments"]) && empty($_POST["NombreEvenments"]) ? "le Nombre d'evenments est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Pass : </label>
                <input class="form-control" type="text" name="Pass" value="<?= isset($_POST["Pass"])?$_POST["Pass"]:""?>">
            </div>
            <span><?= isset($_POST["Pass"]) && empty($_POST["Pass"]) ? "le Pass est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Choisir le nom de d'etablissement :</label>
                <select name="NumEtab" class="form-select">
                    <?php foreach ($numEtab as $key => $value) : ?>
                        <option value="<?= $numEtab[$key]["NumEtab"] ?>"><?= $numEtab[$key]["NomEtab"] ?></option>
                    <?php endforeach; ?>
                </select>
                <p class=" text text-white text-center ">Vous n'avez pas trouver l'Etablissement ?</p>
                <a href="../etablissement/ajouter.php">Ajouter un Etablissement</a>
            </div>

            <input class="btn text text-white mt-1 border border-white border-2"style="background-color: rgb(42, 47, 79);"  type="submit" value="ajouter">
        <?php else : ?>
            <h2 class="d-block text text-white text-center mb-5">Vous devez ajouter un Etablissement avant de pouvoir ajouter un Orienteur.</h2>
            <button type="button" class="p3 btn border border-white ms-5 "  onclick="location.href='../etablissement/ajouter.php'">Ajouter un Etablissement</button>
        <?php endif ?>


    </form>

    <?php require_once("../end.php"); ?>