<?php
class Ecole
{
    private string $nomEcole;
    private string $ville;
    private string $adresse;
    public function __construct(string $nomEcole, string $ville, string $adresse)
    {
        $this->nomEcole = $nomEcole;
        $this->ville = $ville;
        $this->adresse= $adresse;
    }

    public function getNomEcole()
    {
        return $this->nomEcole;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
}
