<?php
// Classe représentant une matière : nom, coefficient, etc.
?>

<?php

class Matiere {
    private $id;
    private $nomMatiere;
    private $codeMatiere;
    private $bareme;
  
          // Constructeur pour initialiser les propriétés
    public function __construct($id,$nomMatiere,$codeMatiere,$bareme = 20) {
        $this->id = $id;
        $this->nomMatiere = $nomMatiere;
        $this->codeMatiere = $codeMatiere;
        $this->bareme = $bareme;  
    }


    /**
     * Get the value of nomMatiere
     */ 
    public function getNomMatiere()
    {
        return $this->nomMatiere;
    }

    /**
     * Set the value of nomMatiere
     *
     * @return  self
     */ 
    public function setNomMatiere($nomMatiere)
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    /**
     * Get the value of codeMatiere
     */ 
    public function getCodeMatiere()
    {
        return $this->codeMatiere;
    }

    /**
     * Set the value of codeMatiere
     *
     * @return  self
     */ 
    public function setCodeMatiere($codeMatiere)
    {
        $this->codeMatiere = $codeMatiere;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }
}


?>