<?php 
  $userid=$_SESSION['userid'];
		if (isset($_POST['edit'])){
			$felhasznalonev = $_POST['user'];
			$jelszo = md5($_POST['pass']);
			$email = $_POST['email'];
            $query = "UPDATE `felhasznalok` SET felhasznalonev = '$felhasznalonev', jelszo = '$jelszo', email = '$email' WHERE userid = '$userid'";
            $result = mysqli_query($conn,$query);
            if ($query) {
                echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
            } else {
                echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
            }
        
        }
include 'view/editprofile.php';
?>