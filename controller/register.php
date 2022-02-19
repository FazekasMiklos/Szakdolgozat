<?php 

		if(isset($_POST['sentForm'])){
			$loginError = '';
			$user = $_POST['user'];
			$pass = md5($_POST['pass']);
			$email = $_POST['email'];
			if($loginError == '') {
		
				$azonosUser = mysqli_query($conn, "SELECT * FROM felhasznalok WHERE felhasznalonev = '".$_POST['user']."'");
				$azonosEmail = mysqli_query($conn, "SELECT * FROM felhasznalok WHERE email = '".$_POST['email']."'");
				if(mysqli_num_rows($azonosUser)) {
					exit('Ez a felhasználónév foglalt');
					header('Location: index.php?page=login');
				}elseif(mysqli_num_rows($azonosEmail)){
				  exit('Ez az email már regisztrálva van');
				}
				else{
			$query = "INSERT INTO `felhasznalok` (`felhasznalonev`,`jelszo`,`email`) VALUES ('$user', '$pass', '$email')";
			$result = mysqli_query($conn,$query);
			if ($query) {
				echo 'Sikeresen elmentve a felhasználó!';
			} else {
				echo "Hiba történt a felhasználó mentése közben.";
			}
		}
	}
}
include 'view/regisztracio.php';

?>