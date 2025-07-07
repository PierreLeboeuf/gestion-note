<?php
// Page d'accueil de l'application, vue principale avec navigation.


require "../classes/GestionNotes.php";
include '../includes/header.php';
include '../includes/menu.php';
?>

<?php
$gestion = new GestionNotes();
$notes = $gestion->listerNotes();
$etudiants = $gestion->listerEtudiants();
?>

<h2>Gestion des Notes</h2>

<table>
    <tr class="tableau">
        <th>Etudiants</th>
        <th>Matières</th>
        <th>Notes</th>
    </tr>
    <tr class="tableauContenu">


        <th>
            <ul>
                <?php
                foreach ($notes as $note) {
                ?>
                    <li>
                        <?=
                        htmlspecialchars($note->getId_etudiant());
                        ?>
                    </li>
                <?php
                }
                ?>
                <a href="ajoutEtudiant.php">➕ Ajouter un étudiant</a>
            </ul>
        </th>
        <th>
            <ul>
                <?php
                foreach ($notes as $note) {
                ?>
                    <li>
                        <?=
                        htmlspecialchars($note->getId_matiere());
                        ?>
                    </li>
                <?php
                }
                ?>
                <a href="ajoutMatiere.php">➕ Ajouter une matière</a>
            </ul>
        </th>
        <th>
            <ul>
                <?php
                foreach ($notes as $note) {
                ?>
                    <li>
                        <?=
                        htmlspecialchars($note->getValeurNote());
                        ?>
                    </li>
                <?php
                }
                ?>
                <a href="attribuerNote.php">➕ Ajouter une note</a>
            </ul>
        </th>
    </tr>
</table>
<h2>Moyenne générale</h2>
<table>
    <tr class="tableau">
        <th>Etudiant</th>
    </tr>
    <tr class="tableauContenu">



        <th>
            <ul>
                <?php
                foreach ($etudiants as $etudiant) {
                    $moyenne = $gestion->calculerMoyenneEtudiant($etudiant);
                ?>
                    <li>
                        <?=
                        htmlspecialchars($etudiant->getNomComplet());
                        ?>
                        <?php
                        if ($moyenne !== null) {
                            echo 'Moyenne: ' . number_format($moyenne, 2); // Format to 2 decimal places
                        } else {
                            echo 'Pas de notes'; // No notes for this student
                        }
                        ?>
                    </li>
                <?php
                }
                ?>
            </ul>
        </th>

    </tr>
</table>
<?php include '../includes/footer.php'; ?>