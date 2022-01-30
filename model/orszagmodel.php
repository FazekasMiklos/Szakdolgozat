<?php

class Orszagok {
    
    private $orszagid;
    private $nev;
    private $ranglista;
    private $zaszlok;

    public function get_orszagid() {
        return $this->orszagid;
    }

    public function get_nev() {
        return $this->nev;
    }

    public function get_ranglista() {
        return $this->ranglista;
    }

    public function get_zaszlok() {
        return $this->zaszlok;
    }

}
?>