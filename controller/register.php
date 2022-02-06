<?php 
		if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['pass']) && isset($_POST['profilkep'])){
			$user = $_POST['user'];
			$pass = md5($_POST['pass']);
			$email = $_POST['email'];
            $profilkep = $_POST['profilkep'];

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