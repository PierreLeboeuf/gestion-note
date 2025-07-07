<?php
 // Formulaire pour ajouter une matière (HTML + affichage dynamique).
 require "../classes/GestionNotes.php";
include '../includes/header.php';
include '../includes/menu.php';

 session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Génère une chaîne aléatoire cryptographiquement sûre
}

if (isset($_SESSION['error'])) {
    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']); // Supprimez le message après l'avoir affiché
}

$gestion = new GestionNotes();

$matieres = $gestion->listerMatieres();
?>

<h2>Ajouter Matière :</h2>

<form action="traitementMatiere.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <label for="">Nom Matière :</label>
    <input type="text" name="nomMatiere" id="nomMatiere">
    <label for="">Code Matière :</label>
    <input type="text" name="codeMatiere" id="codeMatiere">
  
    <input type="submit" value="Envoyer" id="bouton">
</form>

<table>
    <tr class="tableau">
        <th>Matières</th>
    </tr>
    <tr class="tableauContenu">
        <th>
            <ul>
                <?php
                foreach ($matieres as $matiere) {
                ?>
                    <li><?= htmlspecialchars($matiere->getNomMatiere()); ?></li>
                <?php
                }
                ?>
            </ul>
        </th>
    </tr>
</table>

<?php include '../includes/footer.php'; ?>