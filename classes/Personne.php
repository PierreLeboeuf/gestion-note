<?php
// Classe de base pour une personne : contient les attributs nom, prénom, âge.
?>

<?php
abstract class Personne
{
    private $nom;
    private $prenom;
    private $age;

        public function __construct($nom,$prenom) {
        $this->nom = $nom;
        $this->prenom = $prenom;
        // $this->age = $age;
    }

    public function getNomComplet(){
        return $this->nom . " " . $this->prenom;
    }
}
?>