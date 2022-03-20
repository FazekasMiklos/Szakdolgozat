<?php
if (isset($_POST['upload'])){
$profilkep = $_FILES['profilkep']['name'];

$destination = 'kepek/profilkepek/' . $profilkep;

$extension = pathinfo($profilkep, PATHINFO_EXTENSION);


$file = $_FILES['profilkep']['tmp_name'];
$size = $_FILES['profilkep']['size'];

if (!in_array($extension, ['jpg', 'png', 'svg'])) {
echo "<p style='color:white;'>A fájl kiterjesztése csak .jpg, .png vagy .svg lehet</p>";
} elseif ($_FILES['profilkep']['size'] > 10000000) { 
echo "<p style='color:white;'>A fájl túl nagy!</p>";
} else {

if (move_uploaded_file($file, $destination)) {
  if(!empty($_SESSION["userid"])) { 
  $userid=$_SESSION['userid'];
  $query = "INSERT INTO profilkepek (userid, name, size) VALUES ('$userid','$profilkep','$size')";
 
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo "<p style='color:white;'>Sikeresen feltöltve a profilkép!</p>";
			} else {
				echo "<p style='color:white;'>Hiba történt a profilkép feltöltése közben.</p>";
			}
			$sql = "UPDATE profilkepek SET  name = '$profilkep', size = '$size' WHERE userid = '$userid'";

    $result2 = mysqli_query($conn,$sql);
    if ($sql) {
        echo "<p style='color:white;'>Sikeresen módosítva a profilkép!</p>";
    } else {
        echo "<p style='color:white;'>Hiba történt a profilkép módosítása közben.</p>";
    }
}
if(!empty($_SESSION["admin"])) { 
	$query2 = "INSERT INTO profilkepek (userid, name, size) VALUES ('".$_SESSION["admin"]."','$profilkep','$size')";
 
	$result3 = mysqli_query($conn,$query2);
	if ($query2) {
		echo "<p style='color:white;'>Sikeresen feltöltve a profilkép!</p>";
	} else {
		echo "<p style='color:white;'>Hiba történt a profilkép feltöltése közben.</p>";
	}
	$sql2 = "UPDATE profilkepek SET  name = '$profilkep', size = '$size' WHERE userid = '".$_SESSION["admin"]."'";

$result4 = mysqli_query($conn,$sql2);
}
if ($sql2) {
echo "<p style='color:white;'>Sikeresen módosítva a profilkép!</p>";
} else {
echo "<p style='color:white;'>Hiba történt a profilkép módosítása közben.</p>";
}
	header('Location: index.php?page=upload');
		}
	}
}
include 'view/feltoltes.php';
?>