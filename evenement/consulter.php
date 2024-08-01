<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_evenement.php");

$res = Manager_evenment::consulter() ;
$sumDuree=0;
require_once("../aside.php");

?>
<h3 class="text-white text text-center">Consulter les evenements </h3>

    <table class="table text-white text text-center table-bordered table-responsive align-middle">
        <thead>
            <tr>
                <th>N° Evenement</th>
                <th>Date Evenement</th>
                <th>Ville</th>
                <th>Matricule de l'Orienteur</th>
                <th>N° Ecole</th>
                <th>Duree (en heure)</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $line) : ?>
                <tr>
                    <td><?php echo $line->NumEven ?></td>
                    <td><?php echo $line->DateEven ?></td>
                    <td><?php echo $line->Ville ?></td>
                    <td><?php echo $line->NumEven ?></td>
                    <td><?php echo $line->NumEcole ?></td>
                    <td><?php echo $line->Duree ?></td>
                    <?php $sumDuree+=$line->Duree;?>
                    <td class="bg-danger "><a class="text-white text text-center" href="supprimer.php?NumEven=<?= $line->NumEven ?>"><i class="fa-sharp fa-solid fa-trash"></i> supprimer</a></td>
                    <td class="bg-success"><a class="text-white text text-center" href="modifier.php?NumEven=<?= $line->NumEven ?>"><i class="fa-solid fa-pen"></i> Modifier</a></td>
               
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
    <p class="text-white text text-center w-100"> <?= "le total des événments est " . $sumDuree ."h" ?>
    </p>
    <button class="btn  mt-1 border border-white border-2" onclick="location.href='ajouter.php'">Ajouter un événment</button>

    <?php require_once("../end.php"); ?>