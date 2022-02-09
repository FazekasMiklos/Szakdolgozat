<?php 
  $userid=$_SESSION['userid'];
		if (isset($_POST['edit'])){
			$felhasznalonev = $_POST['user'];
			$jelszo = md5($_POST['pass']);
			$email = $_POST['email'];
			$profilkep = $_FILES['profilkep']['name'];
            // destination of the file on the server
    $destination = 'kepek/profilkepek/' . $profilkep;
    // get the file extension
    $extension = pathinfo($profilkep, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['profilkep']['tmp_name'];
    $size = $_FILES['profilkep']['size'];

    if (!in_array($extension, ['jpg', 'png', 'svg'])) {
        echo "You file extension must be .jpg, .png or .svg";
    } elseif ($_FILES['profilkep']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {

			$query = "UPDATE `felhasznalok` SET felhasznalonev = '$felhasznalonev', jelszo = '$jelszo', email = '$email' WHERE userid = '$userid'";
			$query = "UPDATE profilkepek SET  name = '$profilkep', size = '$size' WHERE userid = '$userid'";
 
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo 'Sikeresen módosítva a felhasználó!';
			} else {
				echo "Hiba történt a felhasználó módosítása közben.";
			}
		}
	}
}
include 'view/editprofile.php';
?>