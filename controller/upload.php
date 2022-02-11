<?php
$userid=$_SESSION['userid'];
if (isset($_POST['upload'])){
$profilkep = $_FILES['profilkep']['name'];

$destination = 'kepek/profilkepek/' . $profilkep;

$extension = pathinfo($profilkep, PATHINFO_EXTENSION);


$file = $_FILES['profilkep']['tmp_name'];
$size = $_FILES['profilkep']['size'];

if (!in_array($extension, ['jpg', 'png', 'svg'])) {
echo "You file extension must be .jpg, .png or .svg";
} elseif ($_FILES['profilkep']['size'] > 1000000) { 
echo "File too large!";
} else {

if (move_uploaded_file($file, $destination)) {
  $query = "INSERT INTO profilkepek (userid, name, size) VALUES ('$userid','$profilkep','$size')";
 
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo 'Sikeresen feltöltve a profilkép!';
			} else {
				echo "Hiba történt a profilkép feltöltése közben.";
			}
		}
	}
}
include 'view/feltoltes.php';
?>