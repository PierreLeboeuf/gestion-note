<?php
// Traitement des données soumises par le formulaire ajoutMatiere.php.
?>

  <?php
  session_start();
  require "../classes/GestionNotes.php";

  if (!empty($_POST)) {
    // Check CSRF token
    if (!isset($_POST['csrf_token']) || !isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
      // CSRF token is missing or invalid
      $_SESSION['error'] = "Requête invalide. Veuillez réessayer."; // Message for security issue
      header('Location: ajoutMatiere.php'); // Redirect back to the form
      exit;
    }
    // If the token is valid, proceed with your existing form validation and processing
    if (empty($_POST['nomMatiere']) || empty($_POST['codeMatiere'])) {
      $_SESSION['error'] = "Veuillez remplir tous les champs.";
      header('Location: ajoutMatiere.php');
      exit;
    } else {
      $gestionNote = new GestionNotes();
      $gestionNote->ajouterMatiere($_POST['nomMatiere'], $_POST['codeMatiere']);
      $_SESSION['success'] = "Matière ajouté avec succès.";
    }
  }else {

    $_SESSION['error'] = "Formulaire non soumis."; // Or similar, if it's not a POST
    header('Location: index.php');
    exit;
}
  // echo "<pre>" . print_r($users, true) . "</pre>";
  ?>