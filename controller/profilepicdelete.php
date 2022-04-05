<?php
if (isset($_POST['igen'])) {
    if (!empty($_SESSION["userid"])) {
        $userid = $_SESSION['userid'];
        $query = "DELETE FROM `profilkepek` WHERE userid = '$userid'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            echo "<p style='color:white;'>Sikeresen törölve a profilkép!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a profilkép törlése közben.</p>";
        }
        header('Location: index.php?page=adatok');
        $sql = "INSERT INTO profilkepek (userid, name, size) VALUES ('$userid','profilkep.jpg', NULL)";
        $result2 = mysqli_query($conn, $sql);
    }
    if (!empty($_SESSION["admin"])) {
        $query = "DELETE FROM `profilkepek` WHERE userid = '" . $_SESSION["admin"] . "'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            echo "<p style='color:white;'>Sikeresen törölve a profilkép!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a profilkép törlése közben.</p>";
        }
        header('Location: index.php?page=adatok');
        $sql = "INSERT INTO profilkepek (userid, name, size) VALUES ('" . $_SESSION["admin"] . "','profilkep.jpg', NULL)";
        $result2 = mysqli_query($conn, $sql);
    }
}
if (isset($_POST['nem'])) {
    header('Location: index.php?page=adatok');
}
include 'view/profilkeptorles.php';
?>