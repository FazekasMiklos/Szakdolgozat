<?php

class Csapatok {
    
    private $ligaid;
    private $nev;
    private $klubid;

    public function get_nev() {
        return $this->nev;
    }

    public function get_ligaid() {
        return $this->ligaid;
    }

    public function get_klubid() {
        return $this->klubid;
    }

}
?>