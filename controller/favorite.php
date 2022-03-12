<?php
function setFavorites($conn){
if (isset($_POST['kedvenc'])){
    if (isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $uid = $_POST['uid'];
    $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE jatekosid = '".$_GET['id']."' AND userid = '$uid'");
    if(mysqli_num_rows($kedvenctorles)) {
        $sql2= "DELETE FROM `kedvencek` WHERE jatekosid = '".$_GET['id']."' AND userid = '$uid'";
        $result2 = $conn->query($sql2);
}else{
    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('$uid','$id',NULL,NULL,NULL)";
    $result = $conn->query($sql);
}

    }else if (isset($_GET['id2'])){
        $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
        $uid = $_POST['uid'];
        $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE klubid = '".$_GET['id2']."' AND userid = '$uid'");
        if(mysqli_num_rows($kedvenctorles)) {
            $sql2= "DELETE FROM `kedvencek` WHERE klubid = '".$_GET['id2']."' AND userid = '$uid'";
            $result2 = $conn->query($sql2);
    }else{
        $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('$uid',NULL,NULL,NULL,'$id2')";
        $result = $conn->query($sql);
    }
}else if (isset($_GET['id3'])){
    $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
    $uid = $_POST['uid'];
    $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE ligaid = '".$_GET['id3']."' AND userid = '$uid'");
    if(mysqli_num_rows($kedvenctorles)) {
        $sql2= "DELETE FROM `kedvencek` WHERE ligaid = '".$_GET['id3']."' AND userid = '$uid'";
        $result2 = $conn->query($sql2);
}else{
    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('$uid',NULL,'$id3',NULL,NULL)";
    $result = $conn->query($sql);
}
}else if (isset($_GET['id4'])){
    $id4 = mysqli_real_escape_string($conn, $_GET['id4']);
    $uid = $_POST['uid'];
    $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE orszagid = '".$_GET['id4']."' AND userid = '$uid'");
    if(mysqli_num_rows($kedvenctorles)) {
        $sql2= "DELETE FROM `kedvencek` WHERE orszagid = '".$_GET['id4']."' AND userid = '$uid'";
        $result2 = $conn->query($sql2);
}else{
    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('$uid',NULL,NULL,'$id4',NULL)";
    $result = $conn->query($sql);
}
}
}
}
?>