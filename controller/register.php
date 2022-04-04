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
				exit("<p style='color:white;'>Ez a felhasználónév foglalt</p>");
				header('Location: index.php?page=login');
			}elseif(mysqli_num_rows($azonosEmail)){
				exit("<p style='color:white;'>Ez az email már regisztrálva van</p>");
			}else{
			    $query = "INSERT INTO `felhasznalok` (`felhasznalonev`,`jelszo`,`email`,`level`) VALUES ('$user', '$pass', '$email', 'user')";
			    $result = mysqli_query($conn,$query);
			    if ($query) {
				    echo "<p style='color:white;'>Sikeresen elmentve a felhasználó!</p>";
			    }else{
				    echo "<p style='color:white;'>Hiba történt a felhasználó mentése közben.</p>";
			    }
		    }
	    }
    }
include 'view/regisztracio.php';
?>