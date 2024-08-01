<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_ecole.php");

$res = Manager_ecole::consulter();
require_once("../aside.php");
?>
<h3 class="text-white text text-center">Consulter les ecoles </h3>

<table class="table text-white text text-center table-bordered table-responsive align-middle">
    <thead>
        <tr>
            <th>NumEcole</th>
            <th>NomEcole</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th colspan="2">action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($res as $line) : ?>
            <tr>
                <td><?php echo $line->NumEcole ?></td>
                <td><?php echo $line->NomEcole ?></td>
                <td><?php echo $line->Adresse ?></td>
                <td><?php echo $line->Ville ?></td>
                <td class="bg-danger "><a class="text-white text text-center" href="supprimer.php?NumEcole=<?= $line->NumEcole ?>"><i class="fa-sharp fa-solid fa-trash"></i> supprimer</a></td>
                <td class="bg-success"><a class="text-white text text-center" href="modifier.php?NumEcole=<?= $line->NumEcole ?>"><i class="fa-solid fa-pen"></i> Modifier</a></td>

            </tr>
        <?php endforeach ?>
    </tbody>
</table>
    <p class="text-white text text-center w-100"> <?= "le totale des ecoles est " . count($res)  ?>
    </p>
    <button class="btn  mt-1 border border-white border-2" onclick="location.href='ajouter.php'">Ajouter un ecole</button>
<?php require_once("../end.php"); ?>