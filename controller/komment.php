<?php
function setComments($conn){
    if (isset($_POST['submit'])){
    if (isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $sql= "INSERT INTO velemenyek (userid,jatekosid,klubid,datum,szoveg) VALUES ('$uid','$id',NULL,'$date','$message')";
    $result = $conn->query($sql);
    }else if (isset($_GET['id2'])){
        $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql= "INSERT INTO velemenyek (userid,jatekosid,klubid,datum,szoveg) VALUES ('$uid',NULL,'$id2','$date','$message')";
        $result = $conn->query($sql);
        }
}
}
function getComments($conn){
    if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM velemenyek INNER JOIN felhasznalok ON (felhasznalok.userid=velemenyek.userid) WHERE jatekosid='$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
    echo "<div class='adat'>";
    echo $row['felhasznalonev']."<br>";
    echo $row['datum']."<br>";
    echo $row['szoveg']."<br>"."<br>";
    echo "</div>";
    }
}else if(isset($_GET['id2'])){
    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
    $sql = "SELECT * FROM velemenyek INNER JOIN felhasznalok ON (felhasznalok.userid=velemenyek.userid) WHERE klubid='$id2'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
    echo "<div class='adat'>";
    echo $row['felhasznalonev']."<br>";
    echo $row['datum']."<br>";
    echo $row['szoveg']."<br>"."<br>";
    echo "</div>";
    }
}  
}