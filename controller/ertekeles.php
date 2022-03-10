<?php
function setRatings($conn){
if (isset($_POST['ertekelesSubmit'])){
    if (isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $uid = $_POST['uid'];
    $ertekeles = $_POST['e1'];
    $azonosertekeles = mysqli_query($conn, "SELECT * FROM ertekelesek WHERE jatekosid = '".$_GET['id']."' AND userid = '$uid'");
    if(mysqli_num_rows($azonosertekeles)) {
        $sql2= "UPDATE ertekelesek SET userid = $uid, jatekosid = $id ,klubid = NULL ,ertekeles = $ertekeles WHERE jatekosid = '".$_GET['id']."' AND userid = '$uid'";
        $result2 = $conn->query($sql2);
}else{
    $sql= "INSERT INTO ertekelesek (userid,jatekosid,klubid,ertekeles) VALUES ('$uid','$id',NULL,'$ertekeles')";
    $result = $conn->query($sql);
}

    }else if (isset($_GET['id2'])){
    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
    $uid = $_POST['uid'];
    $ertekeles = $_POST['e1'];
    $azonosertekeles = mysqli_query($conn, "SELECT * FROM ertekelesek WHERE klubid = '".$_GET['id2']."' AND userid = '$uid'");
    if(mysqli_num_rows($azonosertekeles)) {
        $sql2= "UPDATE ertekelesek SET userid = $uid, jatekosid = NULL ,klubid = $id2 ,ertekeles = $ertekeles WHERE klubid = '".$_GET['id2']."' AND userid = '$uid'";
        $result2 = $conn->query($sql2);
}else{
    $sql= "INSERT INTO ertekelesek (userid,jatekosid,klubid,ertekeles) VALUES ('$uid',NULL,'$id2','$ertekeles')";
    $result = $conn->query($sql);
}
}else if (isset($_GET['id3'])){
    $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
    $uid = $_POST['uid'];
    $ertekeles = $_POST['e1'];
    $azonosertekeles = mysqli_query($conn, "SELECT * FROM ertekelesek WHERE ligaid = '".$_GET['id3']."' AND userid = '$uid'");
    if(mysqli_num_rows($azonosertekeles)) {
        $sql2= "UPDATE ertekelesek SET userid = $uid, jatekosid = NULL ,klubid = NULL,ligaid = $id3 ,ertekeles = $ertekeles WHERE ligaid = '".$_GET['id3']."' AND userid = '$uid'";
        $result2 = $conn->query($sql2);
}else{
    $sql= "INSERT INTO ertekelesek (userid,jatekosid,klubid,ligaid,ertekeles) VALUES ('$uid',NULL,NULL,'$id3','$ertekeles')";
    $result = $conn->query($sql);
}
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
}else if(isset($_GET['id3'])){
    $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
    $sql = "SELECT * FROM ertekelesek WHERE ligaid='$id3'";
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
        echo "Az összes felhasználó értékelései átlagolva:"."<br>";
        echo $row['AVG(`ertekeles`)']."<br>"."<br>";
        echo "Az összes felhasználó aki értékelt:"."<br>";
        echo $row['COUNT(`userid`)'];
    }
}if(isset($_GET['id2'])){
    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
    $sql = "SELECT AVG(`ertekeles`),COUNT(`userid`),klubid FROM ertekelesek WHERE klubid='$id2'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "Az összes felhasználó értékelései átlagolva:"."<br>";
        echo $row['AVG(`ertekeles`)']."<br>";
        echo "Az összes felhasználó aki értékelt:"."<br>";
        echo $row['COUNT(`userid`)'];
    }
}if(isset($_GET['id3'])){
    $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
    $sql = "SELECT AVG(`ertekeles`),COUNT(`userid`),ligaid FROM ertekelesek WHERE ligaid='$id3'";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "Az összes felhasználó értékelései átlagolva:"."<br>";
        echo $row['AVG(`ertekeles`)']."<br>";
        echo "Az összes felhasználó aki értékelt:"."<br>";
        echo $row['COUNT(`userid`)'];
    }
}
} 
?>