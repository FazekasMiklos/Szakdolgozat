<?php
function setRatings($conn){
if (isset($_POST['ertekelesSubmit'])){
    if (isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $uid = $_POST['uid'];
    $ertekeles = $_POST['e1'];
    $sql= "INSERT INTO ertekelesek (userid,jatekosid,klubid,ertekeles) VALUES ('$uid','$id',NULL,'$ertekeles')";
    $result = $conn->query($sql);
    }else if (isset($_GET['id2'])){
    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
    $uid = $_POST['uid'];
    $ertekeles = $_POST['e1'];
    $sql= "INSERT INTO ertekelesek (userid,jatekosid,klubid,ertekeles) VALUES ('$uid',NULL,'$id2','$ertekeles')";
    $result = $conn->query($sql);
    }
}
}
function getRatings($conn){
    if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM ertekelesek WHERE jatekosid='$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
    if (isset($_SESSION['userid'])){
        if ($_SESSION['userid'] == $row['userid']){
        echo "Értékelésed:";
        echo $row['ertekeles']."<br>";
        }
    }
}
}else if(isset($_GET['id2'])){
    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
    $sql = "SELECT * FROM ertekelesek WHERE klubid='$id2'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
    if (isset($_SESSION['userid'])){
        if ($_SESSION['userid'] == $row['userid']){
        echo "Értékelésed:";
        echo $row['ertekeles']."<br>";
        }
    }
}
}
}
function getRatings2($conn){
    if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT AVG(`ertekeles`),COUNT(`userid`),jatekosid FROM ertekelesek WHERE jatekosid='$id'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "Az összes felhasználó értékelései átlagolva:";
        echo $row['AVG(`ertekeles`)']."<br>";
        echo "Az összes felhasználó aki értékelt:";
        echo $row['COUNT(`userid`)'];
    }
}if(isset($_GET['id2'])){
    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
    $sql = "SELECT AVG(`ertekeles`),COUNT(`userid`),klubid FROM ertekelesek WHERE klubid='$id2'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "Az összes felhasználó értékelései átlagolva:";
        echo $row['AVG(`ertekeles`)']."<br>";
        echo "Az összes felhasználó aki értékelt:";
        echo $row['COUNT(`userid`)'];
    }
}
} 
?>