<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_evenement.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numEcole="1";
    $matricule="1";
    if (!(empty($_POST["DateEven"]) || empty($_POST["Ville"]) ||  empty($_POST["Duree"]))) {
        $evenement = new Evenement($_POST["DateEven"], $_POST["Ville"], $_POST["Matricule"], $_POST["NumEcole"], $_POST["Duree"]);
        Manager_evenment::ajouter($evenement);
        header("Location: http://localhost:8080/evenement/consulter.php");
    }
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $pdo->prepare("SELECT NumEcole ,NomEcole FROM Ecole;");
    $stmt->execute();
    $numEcole = $stmt->fetchAll(PDO::FETCH_OBJ);
   

    $stmt = $pdo->prepare("SELECT Matricule , Nom ,Prenom FROM Orienteur;");
    $stmt->execute();
    $matricule = $stmt->fetchAll(PDO::FETCH_OBJ);
    
}
require_once("../aside.php");
?>

    <form class="m-2" method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
        <?php if ($numEcole != null && $matricule != null) : ?>
            <h3 class="text text-white ">Ajouter un nouvel évènement</h3>
            <div>
                <label class="form-label text text-white">Date Evenement : </label>
                <input class="form-control"  type="date" name="DateEven" value="<?= isset($_POST["DateEven"])?$_POST["DateEven"]:""?>">
            </div>
            <span><?= isset($_POST["DateEven"]) && empty($_POST["DateEven"]) ? "la date evenenement est obligatoire" : "" ?></span>
            <div>
                <label class="form-label text text-white">Ville : </label>
                <input class="form-control"  type="text" name="Ville" value="<?= isset($_POST["Ville"])?$_POST["Ville"]:""?>">
            </div>
            <span><?= isset($_POST["Ville"]) && empty($_POST["Ville"]) ? "la Ville est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Duree : </label>
                <input class="form-control"  type="text" name="Duree" value="<?= isset($_POST["Duree"])?$_POST["Duree"]:""?>">
            </div>
            <span><?= isset($_POST["Duree"]) && empty($_POST["Duree"]) ? "la Duree  d'evenenement est obligatoire" : "" ?></span>

            <div>
                <label class="form-label text text-white">Choisir le nom de l'école :</label>
                <select class="form-select" name="NumEcole">
                    <?php foreach ($numEcole as $ecole) : ?>
                        <option value="<?= $ecole->NumEcole ?>"><?= $ecole->NomEcole ?></option>
                    <?php endforeach; ?>
                </select>
                
                <p class="d-inline text text-white">-Vous n'avez pas trouvé l'école ?</p>
                <a href="../ecole/ajouter.php">Ajouter un école</a>
            
            </div>
            <div>
                <label class="form-label text text-white">Choisir le Matricule de l'Orienteur</label>
                <select class="form-select" name="Matricule">
                    <?php foreach ($matricule as $orienteur) : ?>
                        <option value="<?= $orienteur->Matricule ?>"><?= $orienteur->Matricule . " " . $orienteur->Nom . " " . $orienteur->Prenom ?></option>
                    <?php endforeach; ?>
                </select >
                <p class="d-inline text text-white">-Vous n'avez pas trouvé l'Orienteur ?</p>
                <a href="../orienteur/ajouter.php">Ajouter un Orienteur </a>
            </div>
            <input class="btn  mt-1 border border-white border-2"   type="submit" value="ajouter">
        <?php endif ?>
        <?php if ($numEcole == null) : ?>
            <h2 class="d-block text text-white text-center mb-5">Avant de pouvoir ajouter un événement, vous devez ajouter au moins une école.</h2>
            <button type="button" class="p3 btn border border-white ms-5 "  onclick="location.href='../ecole/ajouter.php'">Ajouter une école</button>
        <?php endif ?>
        <?php if ($matricule == null) : ?>
            <h2 class="d-block text text-white text-center mb-5">Avant de pouvoir ajouter un événement, vous devez ajouter au moins un Orienteur.</h2>
            <button type="button" class="p3 btn border border-white ms-5 "  onclick="location.href='../orienteur/ajouter.php'">Ajouter un Orienteur</button>
        <?php endif ?>

    </form>

    <?php require_once("../end.php"); ?>