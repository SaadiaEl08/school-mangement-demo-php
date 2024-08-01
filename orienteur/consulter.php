<?php
require("../conn_cree/connectionDBWithName.php");
require("../classes/manager_orienteur.php");

$res = Manager_orienteur::consulter() ;
require_once("../aside.php");

?>
<h3 class="text-white text text-center">Consulter les orienteurs </h3>


    <table class="table text-white text text-center table-bordered table-responsive align-middle">
        <thead>
            <tr>
                <th>Matricule</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>N° Evenments</th>
                <th>NumEtab</th>
                <th>Pass</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($res as $line) : ?>
                <tr>
                    <td><?php echo $line->Matricule ?></td>
                    <td><?php echo $line->Nom ?></td>
                    <td><?php echo $line->Prenom ?></td>
                    <td><?php echo $line->NombreEvenments ?></td>
                    <td><?php echo $line->NumEtab ?></td>
                    <td><?php echo $line->Pass ?></td>
                    <td class="bg-danger "><a class="text-white text text-center" href="supprimer.php?Matricule=<?= $line->Matricule ?>"><i class="fa-sharp fa-solid fa-trash"></i> supprimer</a></td>
                    <td class="bg-success"><a class="text-white text text-center" href="modifier.php?Matricule=<?= $line->Matricule ?>"><i class="fa-solid fa-pen"></i> Modifier</a></td>
               
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
    <p class="text-white text text-center w-100"> <?= "le total des orienteurs est " . count($res) ?>
    </p>
    <button class="btn  mt-1 border border-white border-2" onclick="location.href='ajouter.php'">Ajouter un orienteur</button>

    <?php require_once("../end.php"); ?>