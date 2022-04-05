<?php
//játékos törlés
if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM jatekosok WHERE jatekosid = '$id'";
    $result = $conn->query($sql);
    header('Location: index.php?page=jatekos');
}
//csapat törlés
if (!empty($_GET['id2'])) {
    $id2 = $_GET['id2'];
    $sql = "DELETE FROM klubbok WHERE klubid = '$id2'";
    $result = $conn->query($sql);
    header('Location: index.php?page=csapat');
}
//liga törlés
if (!empty($_GET['id3'])) {
    $id3 = $_GET['id3'];
    $sql = "DELETE FROM ligak WHERE ligaid = '$id3'";
    $result = $conn->query($sql);
    header('Location: index.php?page=liga');
}
//ország törlés
if (!empty($_GET['id4'])) {
    $id4 = $_GET['id4'];
    $sql = "DELETE FROM orszagok WHERE orszagid = '$id4'";
    $result = $conn->query($sql);
    header('Location: index.php?page=orszag');
}
?>
