<?php     
   if(isset($_POST['user']) and isset($_POST['pw'])) {
	$loginError = '';
	if($loginError == '') {
		$sql = "SELECT `userid` FROM `felhasznalok` WHERE `felhasznalonev` = '".$_POST['user']."' ";

		if(!$result = $conn->query($sql)) echo $conn->error;  
          
        
		if(!empty($result->num_rows) && $result->num_rows > 0) {
			
			if($row = $result->fetch_assoc()) {
				$felhasznalo->set_user($row['userid'], $conn);
				if(md5($_POST['pw']) == $felhasznalo->get_jelszo()) {
					$_SESSION["userid"] = $row['userid'];
					$_SESSION["felhasznalonev"] = $felhasznalo->get_felhasznalonev();
                    header('Location: index.php?page=index');
                    exit();
				}
				else $loginError .= 'Érvénytelen jelszó<br>';
			}
		}
		else $loginError .= 'Érvénytelen felhasználónév<br>';
	}
}

include 'view/belepes.php';

?>  