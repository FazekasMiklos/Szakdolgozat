<?php
if (isset($_POST['edit'])) {
    $felhasznalonev = $_POST['user'];
    $jelszo = md5($_POST['pass']);
    $email = $_POST['email'];
    if (!empty($_SESSION["userid"])) {
        $query = "UPDATE `felhasznalok` SET felhasznalonev = '$felhasznalonev', jelszo = '$jelszo', email = '$email' WHERE userid = '" . $_SESSION['userid'] . "'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
        }
    }
    if (!empty($_SESSION["admin"])) {
        $query2 = "UPDATE `felhasznalok` SET felhasznalonev = '$felhasznalonev', jelszo = '$jelszo', email = '$email' WHERE userid = '" . $_SESSION['admin'] . "'";
        $result2 = mysqli_query($conn, $query2);
        if ($query2) {
            echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
        }
    }
}
include 'view/editprofile.php';
?>