<?php 
		if (isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass'])) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			$email = $_POST['email'];
 
			$query = "INSERT INTO `felhasznalok` (`felhasznalonev`,`jelszo`,`email`) VALUES ('$user', '$pass', '$email')";
 
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo 'Sikeresen elmentve a felhasználó!';
			} else {
				echo "Hiba történt a felhasználó mentése közben.";
			}
		}

include 'view/regisztracio.php';
?>