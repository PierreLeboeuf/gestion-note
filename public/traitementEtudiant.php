<?php
// Traitement des données soumises par le formulaire ajoutEtudiant.php.
?>


  <?php
  session_start();
  require "../classes/GestionNotes.php";


if (!empty($_POST)) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
      // CSRF token est manquant ou invalide
      $_SESSION['error'] = "Requête invalide. Veuillez réessayer.";
      header('Location: ajoutEtudiant.php'); 
      exit;
    } 
    // Si le token est valide, procédez à la validation et au traitement du formulaire existant.
    if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['matricule'])) {
      $_SESSION['error'] = "Veuillez remplir tous les champs.";
      header('Location: ajoutEtudiant.php');
      exit;
    } else{
$gestionNote = new GestionNotes();
$gestionNote -> ajouterEtudiant($_POST['nom'],$_POST['prenom'],$_POST['matricule']);
$_SESSION['success'] = "Etudiant ajouté avec succès.";
      header('Location: ajoutEtudiant.php');
    }

}else {

    $_SESSION['error'] = "Formulaire non soumis.";
    header('Location: index.php');
    exit;
}
// echo "<pre>" . print_r($users, true) . "</pre>";
?>