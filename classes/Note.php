<?php
 // Classe pour gérer les notes attribuées aux étudiants : valeur, étudiant, matière.
 ?>

 <?php

class Note {
    private $id;
    private $id_etudiant;
    private $id_matiere;
    private $valeurNote;
  

          // Constructeur pour initialiser les propriétés
    public function __construct($id,$id_etudiant,$id_matiere,$valeurNote) {
        $this->id = $id;
        $this->id_etudiant = $id_etudiant;
        $this->id_matiere = $id_matiere;
        $this->valeurNote = $valeurNote;
    }

    /**
     * Get the value of valeurNote
     */ 
    public function getValeurNote()
    {
        return $this->valeurNote;
    }

    /**
     * Set the value of valeurNote
     *
     * @return  self
     */ 
    public function setValeurNote($valeurNote)
    {
        $this->valeurNote = $valeurNote;

        return $this;
    }

    /**
     * Get the value of id_matiere
     */ 
    public function getId_matiere()
    {
        return $this->id_matiere;
    }

    /**
     * Set the value of id_matiere
     *
     * @return  self
     */ 
    public function setId_matiere($id_matiere)
    {
        $this->id_matiere = $id_matiere;

        return $this;
    }

    /**
     * Get the value of id_etudiant
     */ 
    public function getId_etudiant()
    {
        return $this->id_etudiant;
    }

    /**
     * Set the value of id_etudiant
     *
     * @return  self
     */ 
    public function setId_etudiant($id_etudiant)
    {
        $this->id_etudiant = $id_etudiant;

        return $this;
    }
}

?>