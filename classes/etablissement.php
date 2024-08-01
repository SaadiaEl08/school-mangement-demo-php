<?php 
class Etablissement{
    private string $nomEtab;
    private string $ville;
    public function __construct(string $nomEtab, string $ville){
        $this->nomEtab = $nomEtab;
        $this->ville = $ville;
    }
    public function getVille(){
        return $this->ville;
    }
    public function getNomEtab(){
        return $this->nomEtab;
    }


}