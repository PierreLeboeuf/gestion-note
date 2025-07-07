



 <?php
    //  Database::getConnection();
    require "../includes/Database.php";
    require "Etudiant.php";
    require "Matiere.php";
     require "Note.php";
    class GestionNotes
    {

        private $pdo;

        public function __construct()
        {
            $this->pdo = Database::getConnection();
        }
        // //-----------------------------------------------------------
        // Méthode Ajouter Etudiant
        // //-----------------------------------------------------------
        public function ajouterEtudiant($nom, $prenom, $matricule)
        {
            $sql = "INSERT INTO etudiants (
            nom,
            prenom,
            matricule
        ) VALUES (
            :nom,
            :prenom,
            :matricule
        );";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'matricule' => $matricule
            ]);
            $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // header('Location: index.php');
        }
        // //-----------------------------------------------------------
        // Méthode Ajouter Matière
        // //-----------------------------------------------------------
        public function ajouterMatiere($nomMatiere, $codeMatiere)
        {
            $sql = "INSERT INTO matieres (
            nomMatiere,
            codeMatiere
        ) VALUES (
            :nomMatiere,
            :codeMatiere
        );";

            $stmt = $this->pdo->prepare($sql);

            $stmt->execute([
                'nomMatiere' => $nomMatiere,
                'codeMatiere' => $codeMatiere
            ]);
            $matieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
            header('Location: index.php');
        }
        // //-----------------------------------------------------------
        // Méthode Attribuer Note
        // //-----------------------------------------------------------
        public function attribuerNote($idEtudiant, $idMatiere, $valeurNote)
        {
            session_start();
            if ($valeurNote >= 0 && $valeurNote <= 20) {
                $sql = "INSERT INTO notes (
            id_etudiant,
            id_matiere,
            valeurNote
        ) VALUES (
            :id_etudiant,
            :id_matiere,
            :valeurNote
        );";

                $stmt = $this->pdo->prepare($sql);

                $stmt->execute([
                    'id_etudiant' => $idEtudiant,
                    'id_matiere' => $idMatiere,
                    'valeurNote' => $valeurNote
                ]);
                $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['error'] = "Veuillez remplir le champ note par une valeur comprise entre 0 et 20.";
                header('Location: attribuerNote.php');
                exit;
            }
        }
          // //-----------------------------------------------------------
        // Calculer la moyenne d'un etudiant
        // //-----------------------------------------------------------
        public function calculerMoyenneEtudiant(Etudiant $idEtudiant){
              $sql = "SELECT valeurNote 
                    FROM notes 
                    WHERE id_etudiant = :id_etudiant";

             $etudiantId = $idEtudiant->getId();
        
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_etudiant', $etudiantId, PDO::PARAM_INT);
            $stmt->execute();
            $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
             if (empty($notes)) {
                return null; // No notes for this student
            }

             $valeursNotes = array_column($notes, 'valeurNote');
             
              $sommeNotes = array_sum($valeursNotes); // Sum all values in the array
            $nombreNotes = count($valeursNotes);    // Count the number of notes

             return $nombreNotes > 0 ? $sommeNotes / $nombreNotes : null;
        }
        // //-----------------------------------------------------------
        // Méthode lister Etudiants
        // //-----------------------------------------------------------
        public function listerEtudiants()
        {

            $sql = "SELECT *
                        FROM etudiants";

            // $stmt = $this->pdo->prepare($etudiants);
            $stmt = $this->pdo->query($sql);
            // $stmt->bindParam(':id', 'e.id', PDO::PARAM_INT);
            // $stmt->execute();
            $etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($etudiants as $etudiant) {
                $result[] = new Etudiant($etudiant["id"], $etudiant["nom"], $etudiant["prenom"], $etudiant["matricule"]);
            }
            return $result;
        }
        // //-----------------------------------------------------------
        // Méthode lister Matières
        // //-----------------------------------------------------------
        public function listerMatieres()
        {

            $sql = "SELECT *
                        FROM matieres";

            // $stmt = $this->pdo->prepare($etudiants);
            $stmt = $this->pdo->query($sql);
            // $stmt->bindParam(':id', 'e.id', PDO::PARAM_INT);
            // $stmt->execute();
            $matieres = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($matieres as $matiere) {
                $result[] = new Matiere($matiere["id"], $matiere["nomMatiere"], $matiere["codeMatiere"]);
            }
            return $result;
        }
        // //-----------------------------------------------------------
        // Méthode lister notes
        // //-----------------------------------------------------------
        public function listerNotes(){
              $sql = "SELECT n.*, m.nomMatiere, e.nom, e.prenom
                        FROM notes n
                        LEFT JOIN matieres m ON m.id = n.id_matiere
                        LEFT JOIN etudiants e ON e.id = n.id_etudiant";

            // $stmt = $this->pdo->prepare($etudiants);
            $stmt = $this->pdo->query($sql);
            // $stmt->bindParam(':id', 'e.id', PDO::PARAM_INT);
            // $stmt->execute();
            $notes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $result = [];
            foreach ($notes as $note) {
                // $result[] = new Note($note["valeurNote"]);
                 $result[] = new Note($note["id"], $note["nom"] . " " . $note["prenom"], $note["nomMatiere"],$note["valeurNote"]);
            }
            return $result;
        }
    }
