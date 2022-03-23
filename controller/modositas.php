<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
if (!empty($_GET['id'])){
    ?>
	<form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
		<label for="user">Neve:</label>	<br/>
		<input type='text' name='nev' required/><br/>
		<label for="user">Születési dátuma:</label>	<br/>
		<input type='date' name='datum' required/><br/>
        <label for="user">Mérkőzések száma:</label>	<br/>
		<input type='number' name='merkozes' required/><br/>
        <label for="user">Gólok száma:</label>	<br/>
		<input type='number' name='gol' /><br/>
        <label for="user">Gólpasszok száma:</label>	<br/>
		<input type='text' name='golpassz' /><br/>
        <label for="user">Védések száma:</label>	<br/>
		<input type='number' name='vedes' /><br/><br/>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='jatekos' value = "Módosítás" /><br></div></div></form>
<?php
if(isset($_POST['jatekos'])){
            $id = mysqli_real_escape_string($conn, $_GET['id']);
            $nev = $_POST['nev'];
			$datum = $_POST['datum'];
			$merkozes = $_POST['merkozes'];
            $gol = $_POST['gol'];
            $golpassz = $_POST['golpassz'];
            $vedes = $_POST['vedes'];
            $query = "UPDATE `jatekosok` SET  nev = '$nev', szuletesidatum = '$datum', merkozesek = '$merkozes', golok = '$gol', golpasszok = '$golpassz', vedesek = '$vedes' WHERE jatekosid = '$id'";
            $result = mysqli_query($conn,$query);
            if ($query) {
                echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
            } else {
                echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
            }
            header('Location: index.php?page=jatekos');
}
}
if (!empty($_GET['id2'])){
    ?>
	<form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
		<label for="user">Neve:</label>	<br/>
		<input type='text' name='nev' required/><br/>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='csapat' value = "Módosítás" /><br></div></div></form>
<?php
if(isset($_POST['csapat'])){
            $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
            $nev = $_POST['nev'];
            $query = "UPDATE `klubbok` SET  klubnev = '$nev' WHERE klubid = '$id2'";
            $result = mysqli_query($conn,$query);
            if ($query) {
                echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
            } else {
                echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
            }
            header('Location: index.php?page=csapat');
}
}
if (!empty($_GET['id3'])){
    ?>
	<form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
		<label for="user">Neve:</label>	<br/>
		<input type='text' name='nev' required/><br/>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='liga' value = "Módosítás" /><br></div></div></form>
<?php
if(isset($_POST['liga'])){
            $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
            $nev = $_POST['nev'];
            $query = "UPDATE `ligak` SET  liganev = '$nev' WHERE klubid = '$id3'";
            $result = mysqli_query($conn,$query);
            if ($query) {
                echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
            } else {
                echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
            }
            header('Location: index.php?page=liga');
}
}
if (!empty($_GET['id4'])){
    ?>
	<form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
		<label for="user">Neve:</label>	<br/>
		<input type='text' name='nev' required/><br/>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='orszag' value = "Módosítás" /><br></div></div></form>
<?php
if(isset($_POST['orszag'])){
            $id4 = mysqli_real_escape_string($conn, $_GET['id4']);
            $nev = $_POST['nev'];
            $query = "UPDATE `orszagok` SET  orszagnev = '$nev' WHERE orszagid = '$id4'";
            $result = mysqli_query($conn,$query);
            if ($query) {
                echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
            } else {
                echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
            }
            header('Location: index.php?page=orszag');
}
}
?>
</body>
</html>
