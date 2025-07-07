<nav>
    <!-- <button class="burger-menu" id="burger-menu">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </button> -->
   <ul class="navbar" id="navbar">
        <?php 
        $currentPage = basename($_SERVER['PHP_SELF']); 
        ?>
        <li><a href="index.php" <?php if ($currentPage == 'index.php') {echo 'class="active"';} ?>>accueil</a></li>
        <li><a href="ajoutEtudiant.php" <?php if ($currentPage == 'ajoutEtudiant.php') {echo 'class="active"';} ?>>Etudiants</a></li>
        <li><a href="ajoutMatiere.php" <?php if ($currentPage == 'ajoutMatiere.php') {echo 'class="active"';} ?>>Matieres</a></li>
        <li><a href="attribuerNote.php" <?php if ($currentPage == 'attribuerNote.php') {echo 'class="active"';} ?>>Notes</a></li>
    </ul>
</nav>