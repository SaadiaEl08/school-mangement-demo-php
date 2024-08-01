<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_etablissement.php");

$res = Manager_etablissement::consulter() ;
require_once("../aside.php");

?>
<h3 class="text-white text text-center">Consulter les établissements </h3>

    <table class="table text-white text text-center table-bordered table-responsive align-middle">
        <thead>
            <tr>
                <th>N° établissements</th>   
                <th>Nom de l'établissements</th>
                <th>Ville</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $line) : ?>
                <tr>
                    <td><?php echo $line->NumEtab ?></td>
                    <td><?php echo $line->NomEtab ?></td>
                    <td><?php echo $line->Ville ?></td>
                    <td class="bg-danger "><a class="text-white text text-center" href="supprimer.php?NumEtab=<?= $line->NumEtab ?>"><i class="fa-sharp fa-solid fa-trash"></i> Supprimer</a></td>
                    <td class="bg-success"><a class="text-white text text-center" href="modifier.php?NumEtab=<?= $line->NumEtab ?>"><i class="fa-solid fa-pen"></i> Modifier</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
    <p class="text-white text text-center w-100" > <?= "Le total des établissements est " . count($res) ?>
    </p>
    <button class="btn  mt-1 border border-white border-2" onclick="location.href='ajouter.php'">Ajouter un établissement</button>

    <?php require_once("../end.php"); ?>