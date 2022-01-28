<?php

class User {
    
    private $userid;
    private $felhasznalonev;
    private $email;
    private $jelszo;

    public function set_user($userid, $conn) {
        $sql = "SELECT userid, felhasznalonev, email, jelszo FROM felhasznalok";
        $sql .= " WHERE userid = $userid ";
        $result = $conn->query($sql);
        if ($conn->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $this->userid = $row['userid'];
                $this->felhasznalonev = $row['felhasznalonev'];
                $this->email = $row['email'];
                $this->jelszo = $row['jelszo'];
            }
        } 
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function get_email() {
        return $this->email;
    }

    public function get_jelszo() {
        return $this->jelszo;
    }

    public function get_felhasznalonev() {
        return $this->felhasznalonev;
    }


    public function get_userid() {
        return $this->userid;
    }

    public function felhasznalokListaja($conn) {
        $lista = array();
        $sql = "SELECT userid FROM felhasznalok";
        if($result = $conn->query($sql)) {
            if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
                    $lista[] = $row['userid'];
                }
            }
        }
        return $lista;
    }
}


?>