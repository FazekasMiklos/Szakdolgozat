<?php
$userid=$_SESSION['userid'];
 if(isset($_POST['profileedit'])){
    $profilkep = $_FILES['profilkep']['name'];
    $loginError = '';
$destination = 'kepek/profilkepek/' . $profilkep;
$extension = pathinfo($profilkep, PATHINFO_EXTENSION);

$file = $_FILES['profilkep']['tmp_name'];
$size = $_FILES['profilkep']['size'];

if (!in_array($extension, ['jpg', 'png', 'svg'])) {
echo "<p style='color:white;'>A fájl kiterjesztése csak .jpg, .png vagy .svg lehet.</p>";
} elseif ($_FILES['profilkep']['size'] > 1000000) {
echo "<p style='color:white;'>A fájl túl nagy!</p>";
} else {
if (move_uploaded_file($file, $destination)) {

    
    $query = "UPDATE profilkepek SET  name = '$profilkep', size = '$size' WHERE userid = '$userid'";

    $result = mysqli_query($conn,$query);
    if ($query) {
        echo "<p style='color:white;'>Sikeresen módosítva a profilkép!</p>";
    } else {
        echo "<p style='color:white;'>Hiba történt a profilkép módosítása közben.</p>";
    }
}
}
}
include 'view/editprofilepic.php';
?>