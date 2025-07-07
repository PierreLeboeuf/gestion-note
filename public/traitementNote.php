<?php
// Traitement des données soumises par le formulaire attribuerNote.php.
?>

  <?php
  session_start();
  require "../classes/GestionNotes.php";

  if (!empty($_POST)) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
      // CSRF token is missing or invalid
      $_SESSION['error'] = "Requête invalide. Veuillez réessayer."; // Message for security issue
      header('Location: attribuerNote.php'); // Redirect back to the form
      exit;
    } 
    // If the token is valid, proceed with your existing form validation and processing
    if (empty($_POST['idEtudiant']) || empty($_POST['idMatiere']) || empty($_POST['valeurNote'])) {
      $_SESSION['error'] = "Veuillez remplir tous les champs.";
      header('Location: attribuerNote.php');
      exit;
    }
    $gestionNote = new GestionNotes();
    $gestionNote->attribuerNote($_POST['idEtudiant'], $_POST['idMatiere'], $_POST['valeurNote']);
  } else {
    // Gérer le cas où un champ est vide, par exemple rediriger avec un message d'erreur
    $_SESSION['error'] = "Veuillez remplir tous les champs.";
    header('Location: index.php');
    exit;
  }

  ?>
