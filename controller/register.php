<?php 

		if(isset($_POST['sentForm'])){
			$user = $_POST['user'];
			$pass = md5($_POST['pass']);
			$email = $_POST['email'];
			$query = "INSERT INTO `felhasznalok` (`felhasznalonev`,`jelszo`,`email`,`profilkep`) VALUES ('$user', '$pass', '$email', '$profilkep')";
 
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo 'Sikeresen elmentve a felhasználó!';
			} else {
				echo "Hiba történt a felhasználó mentése közben.";
			}
		}

include 'view/regisztracio.php';

?>