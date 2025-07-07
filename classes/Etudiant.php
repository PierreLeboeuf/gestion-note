<?php
// Hérite de Personne : ajoute matricule, classe assignée, niveau, etc.

 // Exemple de polymorphisme : un étudiant est aussi une Personne.

class Etudiant extends Personne{
    private $id;
    private $nom;
    private $prenom;
    private $matricule;
  

          // Constructeur pour initialiser les propriétés
    public function __construct($id,$nom,$prenom,$matricule) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->matricule = $matricule;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of matricule
     */ 
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set the value of matricule
     *
     * @return  self
     */ 
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNomComplet(){
        return $this->nom . " " . $this->prenom;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

}
   // Méthode : 
    // public function calculerPermimetre() {
    //    echo "Exercice 13 / Le périmètre du cercle est de $this->rayon x 2 x 3.14 est égale à  ". $this->rayon*2*3.14 .".\n";
    // }
// $newCercle = new Cercle(9.15); // Crée une instance de la classe Voiture

// $newCercle->calculerPermimetre();
// $newCercle->calculerAire();


?>