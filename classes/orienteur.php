<?php
class Orienteur
{
    private string $matricule;
    private string $nom;
    private string $prenom;
    private int $numEtab;
    private  int $nombreEvenments;
    private string $pass;

    public function __construct(string $matricule, string $nom, string $prenom, int $numEtab, int $nombreEvenments, string $pass)
    {
        $this->matricule = $matricule;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numEtab = $numEtab;
        $this->nombreEvenments = $nombreEvenments;
        $this->pass = $pass;
    }
    public function getMatricule(){
       return $this->matricule;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getNumEtab(){
        return $this->numEtab;
    }
    public function getNombreEvenments(){
        return $this->nombreEvenments;
    }
    public function getPass(){
        return $this->pass;
    }
}
