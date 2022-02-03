<?php

class Ligak {
    
    private $ligaid;
    private $nev;
    private $orszagid;
    private $logo;

    public function get_orszagid() {
        return $this->orszagid;
    }

    public function get_nev() {
        return $this->nev;
    }

    public function get_ligaid() {
        return $this->ligaid;
    }

    public function get_logo() {
        return $this->logo;
    }

}
?>