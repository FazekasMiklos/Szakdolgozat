<?php 

		if(isset($_POST['sentForm'])){
			$user = $_POST['user'];
			$pass = md5($_POST['pass']);
			$email = $_POST['email'];
			$query = "INSERT INTO `felhasznalok` (`felhasznalonev`,`jelszo`,`email`) VALUES ('$user', '$pass', '$email')";
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo 'Sikeresen elmentve a felhasználó!';
				$msg = "First line of text\nSecond line of text";
			$msg = wordwrap($msg,70);
			mail($email,"Fazekas Miklós",$msg);
			} else {
				echo "Hiba történt a felhasználó mentése közben.";
			}
		}

include 'view/regisztracio.php';

?>