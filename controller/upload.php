<?php
$userid=$_SESSION['userid'];
if (isset($_POST['upload'])){
$profilkep = $_FILES['profilkep']['name'];

$destination = 'kepek/profilkepek/' . $profilkep;

$extension = pathinfo($profilkep, PATHINFO_EXTENSION);


$file = $_FILES['profilkep']['tmp_name'];
$size = $_FILES['profilkep']['size'];

if (!in_array($extension, ['jpg', 'png', 'svg'])) {
echo "<p style='color:white;'>A fájl kiterjesztése csak .jpg, .png or .svg lehet</p>";
} elseif ($_FILES['profilkep']['size'] > 1000000) { 
echo "<p style='color:white;'>A fájl túl nagy!</p>";
} else {

if (move_uploaded_file($file, $destination)) {
  $query = "INSERT INTO profilkepek (userid, name, size) VALUES ('$userid','$profilkep','$size')";
 
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo "<p style='color:white;'>Sikeresen feltöltve a profilkép!</p>";
			} else {
				echo "<p style='color:white;'>Hiba történt a profilkép feltöltése közben.</p>";
			}
		}
	}
}
include 'view/feltoltes.php';
?>