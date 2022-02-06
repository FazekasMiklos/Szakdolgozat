<?php 
  $userid=$_SESSION['userid'];
		if (isset($_POST['edit'])) {
			$felhasznalonev = $_POST['user'];
			$jelszo = md5($_POST['pass']);
			$email = $_POST['email'];
			$profilkep = $_POST['profilkep'];
 
			$query = "UPDATE `felhasznalok` SET felhasznalonev = '$felhasznalonev', jelszo = '$jelszo', email = '$email', profilkep = '$profilkep' WHERE userid = '$userid'";
 
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo 'Sikeresen módosítva a felhasználó!';
			} else {
				echo "Hiba történt a felhasználó módosítása közben.";
			}
		}

include 'view/editprofile.php';
?>