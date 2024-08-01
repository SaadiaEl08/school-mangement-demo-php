<?php
class Evenement{
    private  $dateEven;
    private string $ville;
    private string $matricule;
    private int $numEcole;
    private float $duree;
public function __construct($dateEven,string $ville, string $matricule, int $numEcole, float $duree){
    $this->dateEven = $dateEven;
    $this->ville = $ville;
    $this->matricule = $matricule;
    $this->numEcole = $numEcole;
    $this->duree = $duree;
}

public function getDateEven(){
    return $this->dateEven;
}
public function getVille(){
    return  $this->ville;
}
public function getMatricule(){
    return $this->matricule;
}
public function getNumEcole(){
    return $this->numEcole;
}
public function getDuree(){
    return $this->duree;
}
  
}