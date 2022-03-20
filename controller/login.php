<?php 
   if(isset($_POST['user']) and isset($_POST['pw'])) {
	
	$loginError = "";
	if($loginError == '') {
		$sql = "SELECT * FROM `felhasznalok` WHERE `felhasznalonev` = '".$_POST['user']."' ";

		if(!$result = $conn->query($sql)) echo $conn->error;  
          
        
		if(!empty($result->num_rows) && $result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				$felhasznalo->set_user($row['userid'], $conn);
				if(md5($_POST['pw']) == $felhasznalo->get_jelszo()) {
					if($row["level"]=="admin"){
					$_SESSION["admin"] = $row['userid'];
					$_SESSION["felhasznalonev"] = $felhasznalo->get_felhasznalonev();
                    header('Location: index.php?page=index');
					$query2 = "INSERT INTO profilkepek (userid, name, size) VALUES ('".$_SESSION["admin"]."','profilkep.jpg', NULL)";
			        $result3 = mysqli_query($conn,$query2);
                    exit();
					}else{
					$_SESSION["userid"] = $row['userid'];
					$_SESSION["felhasznalonev"] = $felhasznalo->get_felhasznalonev();
                    header('Location: index.php?page=index');
					$query = "INSERT INTO profilkepek (userid, name, size) VALUES ('".$_SESSION["userid"]."','profilkep.jpg', NULL)";
			        $result2 = mysqli_query($conn,$query);
                    exit();
					}
				}
				else $loginError .= "<p style='color:white;'>Érvénytelen jelszó<br></p>";
			}
		}
		else $loginError .= "<p style='color:white;'>Érvénytelen felhasználónév<br></p>";
	}
}

include 'view/belepes.php';

?>  