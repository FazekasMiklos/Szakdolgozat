<?php

class Jatekosok {
    
    private $jatekosid;
    private $orszagid;
    private $klubid;
    private $pozid;
    private $nev;
    private $szuletesidatum;
    private $merkozesek;
    private $golok;
    private $golpasszok;
    private $vedesek;

    public function get_jatekosid() {
        return $this->jatekosid;
    }
    public function get_pozid() {
        return $this->pozid;
    }
    public function get_nev() {
        return $this->nev;
    }
    public function get_szuletesidatum() {
        return $this->szuletesidatum;
    }
    public function get_merkozesek() {
        return $this->merkozesek;
    }
    public function get_golok() {
        return $this->golok;
    }
    public function get_golpasszok() {
        return $this->golpasszok;
    }
    public function get_vedesek() {
        return $this->vedesek;
    }
    public function get_orszagid() {
        return $this->orszagid;
    }
    public function get_klubid() {
        return $this->klubid;
    }

}
?>