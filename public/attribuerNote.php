<?php
// Formulaire pour attribuer une note à un étudiant (HTML + dynamique).
include '../includes/header.php';
include '../includes/menu.php';

 session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère une chaîne aléatoire cryptographiquement sûre
}
?>

<?php 

if (isset($_SESSION['error'])) {
    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']); // Supprimez le message après l'avoir affiché
}

require "../classes/GestionNotes.php";
 ?>

<?php
$gestion = new GestionNotes();
$etudiants = $gestion->listerEtudiants();
$matieres = $gestion->listerMatieres();
?>

<h2>Attribuer Note :</h2>
<section class="formulaire">
<form action="traitementNote.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <select name="idEtudiant">
        <option value="">-- Sélectionnez un Etudiant --</option>

        <?php
        foreach ($etudiants as $etudiant) {
        ?>
            <option value="<?= $etudiant->getId(); ?>">
                <?= htmlspecialchars($etudiant->getNomComplet()) ; ?>
            </option>
        <?php
        }
        ?>
    </select>
    <select name="idMatiere">
        <option value="">-- Sélectionnez une Matiere --</option>
       
        <?php
        foreach ($matieres as $matiere) {
        ?>
            <option value="<?= $matiere->getId(); ?>">
                <?= htmlspecialchars($matiere->getNomMatiere()); ?>
            </option>
        <?php
        }
        ?> 
    </select>
    <label for="">Valeur de la note :</label>
    <input type="number" name="valeurNote" id="valeurNote">

    <input type="submit" value="Envoyer" id="bouton">
</form>
</section>