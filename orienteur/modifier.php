<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_orienteur.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numEtab="1";
    $matricule=$_POST['Matricule'];

    if (!(empty($_POST["Matricule"]) || empty($_POST["Nom"]) || empty($_POST["Prenom"])|| empty($_POST["NombreEvenments"])|| empty($_POST["Pass"]))) {
        $orienteur = new Orienteur($_POST["Matricule"], $_POST["Nom"], $_POST["Prenom"], $_POST["NumEtab"], $_POST["NombreEvenments"], $_POST["Pass"]);
        Manager_orienteur::modifier($orienteur);
        header("Location: http://localhost:8080/orienteur/consulter.php");
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $pdo->prepare("SELECT NumEtab , NomEtab FROM Etablissement;");
    $stmt->execute();
    $numEtab = $stmt->fetchAll();
    $matricule=$_GET['Matricule'];
    
}
$stmt = $pdo->prepare("SELECT * FROM orienteur where Matricule=:Matricule;");
    $stmt->execute([":Matricule"=>$matricule]);
    $res=$stmt->fetchObject();
require_once("../aside.php");

?>

    <form class="m-2" method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
        <?php if ($numEtab != null) : ?>
            <h3 class="text text-white ">Modifier l'orienteur portant le matricule <?=$matricule?></h3>
            <input type="hidden" name="Matricule" value="<?=$matricule?>">
            <div>
                <label class="form-label text text-white">Matricule orienteur(ne peut pas étre modifier) : </label>
                <input class="form-control" type="text" name="Matricule" value="<?=$res->Matricule?>" readonly disabled>
            </div>

            <div>
                <label class="form-label text text-white">Nom : </label>
                <input class="form-control"  type="text" name="Nom" value="<?=$res->Nom?>">
            </div>
            <span><?= isset($_POST["Nom"]) && empty($_POST["Nom"]) ? "le Nom est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Prenom : </label>
                <input class="form-control"  type="text" name="Prenom" value="<?= $res->Prenom?>">
            </div>
            <span><?= isset($_POST["Prenom"]) && empty($_POST["Prenom"]) ? "le Prenom est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Nombre Evenments : </label>
                <input  class="form-control"  type="number" min="1" name="NombreEvenments" value="<?= $res->NombreEvenments?>">
            </div>
            <span><?= isset($_POST["NombreEvenments"]) && empty($_POST["NombreEvenments"]) ? "le NombreEvenments est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Pass : </label>
                <input class="form-control" type="text" name="Pass" value="<?= $res->Pass?>">
            </div>
            <span><?= isset($_POST["Pass"]) && empty($_POST["Pass"]) ? "le Pass est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Choisir le nom d'etablissement :</label>
                <select name="NumEtab" class="form-select">
                    <?php foreach ($numEtab as $key => $value) : ?>
                        <option value="<?= $numEtab[$key]["NumEtab"] ?>"><?= $numEtab[$key]["NomEtab"] ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="d-inline text text-white">vous n'avez pas trouver l'Etablissement ?</p>
                <a href="../etablissement/ajouter.php">Ajouter un Etablissement</a>
            </div>

            <input class="btn text text-white mt-1 border border-white border-2"style="background-color: rgb(42, 47, 79);"  type="submit" value="Modifier">
        <?php else : ?>
            <p class="d-inline text text-white">Vous devez ajouter un Etablissement pour avoir la possibilité d'ajouter un orienteur</p>
            <a href="../etablissement/ajouter.php">Ajouter un Etablissement</a>
        <?php endif ?>


    </form>

    <?php require_once("../end.php"); ?>