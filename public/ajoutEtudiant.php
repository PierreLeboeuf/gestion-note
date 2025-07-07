<?php
// Formulaire pour ajouter un étudiant (HTML + affichage dynamique si besoin).
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
$etudiants = $gestion->listerEtudiants();
?>

<h2>Ajouter Etudiant :</h2>
<section class="formulaire">
<form action="traitementEtudiant.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
    <label for="">Nom :</label>
    <input type="text" name="nom" id="nom">
    <label for="">Prenom :</label>
    <input type="text" name="prenom" id="prenom">
    <label for="">Matricule :</label>
    <input type="number" name="matricule" id="matricule">

    <input type="submit" value="Envoyer" id="bouton">
</form>
</section>

<table>
    <tr class="tableau">
        <th>Etudiants</th>
    </tr>
    <tr class="tableauContenu">
        <th>
            <ul>
                <?php
                foreach ($etudiants as $etudiant) {
                ?>
                    <li><?= 
                    htmlspecialchars($etudiant->getNomComplet()) ; 
                    ?></li>
                <?php
                }
                ?>
            </ul>
        </th>

    </tr>
</table>

<?php include '../includes/footer.php'; ?>