<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
    if (isset($_POST['jatekosfelvitel'])){
        $result = $conn->query("SELECT * FROM orszagok");
        $result2 = $conn->query("SELECT * FROM klubbok");
        $result3 = $conn->query("SELECT * FROM posztok");
    ?>
    	<form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
<label>Országa:</label><br>
<select name ='orszag'>
<?php
while($row = $result->fetch_assoc()){
    echo"<option value='".$row['orszagid']."'>".
    $row['orszagnev'].
    "</option>";
        }
        ?>
</select><br>
<label>Csapata:</label><br>
<select name='csapat'>
<?php
while($row = $result2->fetch_assoc()){
  echo"<option value='".$row['klubid']."'>".
  $row['klubnev'].
  "</option>";
        }
        ?>
</select><br>
<label>Posztja:</label><br>
<select name='poszt'>
<?php
while($row = $result3->fetch_assoc()){
    echo"<option value='".$row['pozid']."'>".
    $row['poznev'].
    "</option>";
        }
        ?>
</select><br>
		<label>Neve:</label><br/>
		<input type='text' name='nev' required/><br>
		<label>Születési dátuma:</label><br>
		<input type='date' name='datum' required/><br>
        <label>Mérkőzések száma:</label><br/>
		<input type='number' name='merkozes' required/><br>
        <label>Gólok száma:</label><br>
		<input type='number' name='gol' /><br>
        <label>Gólpasszok száma:</label><br>
		<input type='text' name='golpassz' /><br>
        <label>Védések száma:</label><br>
		<input type='number' name='vedes' /><br><br>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='jatekos' value = "Hozzáadás" /><br></div></div></form>
    <?php 
}
if (isset($_POST['jatekos'])){
    $orszag = $_POST['orszag'];
    $csapat = $_POST['csapat'];
    $poszt = $_POST['poszt'];
    $nev = $_POST['nev'];
    $datum = $_POST['datum'];
    $merkozes = $_POST['merkozes'];
    $gol = $_POST['gol'];
    $golpassz = $_POST['golpassz'];
    $vedes = $_POST['vedes'];
    $query = "INSERT INTO jatekosok (orszagid,klubid,pozid,nev,szuletesidatum,merkozesek,golok,golpasszok,vedesek) VALUES ('$orszag','$csapat','$poszt','$nev','$datum','$merkozes','$gol','$golpassz','$vedes')";
    $result = mysqli_query($conn,$query);
    header('Location: index.php?page=jatekos');
}
    ?>
    <?php
    if (isset($_POST['csapatfelvitel'])){
        $result = $conn->query("SELECT * FROM ligak");
    ?>
    	<form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
<label>Ligája:</label><br>
<select name ='liga'>
<?php
while($row = $result->fetch_assoc()){
    echo"<option value='".$row['ligaid']."'>".
    $row['liganev'].
    "</option>";
        }
        ?>
</select><br>
		<label>Neve:</label><br>
		<input type='text' name='nev' required/><br><br>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='csapat' value = "Hozzáadás" /><br></div></div></form>
    <?php 
}
if (isset($_POST['csapat'])){
    $liga = $_POST['liga'];
    $nev = $_POST['nev'];
    $query = "INSERT INTO klubbok (klubnev,ligaid) VALUES ('$nev','$liga')";
    $result = mysqli_query($conn,$query);
    header('Location: index.php?page=csapat');
}
    ?>
      <?php
    if (isset($_POST['ligafelvitel'])){
        $result = $conn->query("SELECT * FROM orszagok");
    ?>
    	<form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
<label>Országa:</label><br>
<select name ='orszag'>
<?php
while($row = $result->fetch_assoc()){
    echo"<option value='".$row['orszagid']."'>".
    $row['orszagnev'].
    "</option>";
        }
        ?>
</select><br>
<label>Neve:</label><br>
		<input type='text' name='nev' required/><br>
		<label>Logója:</label><br>
		<input type='file' name='logo' required/><br><br>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='liga' value = "Hozzáadás" /><br></div></div></form>
    <?php 
}
if (isset($_POST['liga'])){
    $orszag = $_POST['orszag'];
    $nev = $_POST['nev'];
    $logo = $_FILES['logo'];
    $query = "INSERT INTO ligak (liganev,orszagid,logo) VALUES ('$nev','$orszag','$logo')";
    $result = mysqli_query($conn,$query);
    header('Location: index.php?page=liga');
}
    ?>
      <?php
    if (isset($_POST['orszagfelvitel'])){
    ?>
    <form method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
    <label>Ország ID:</label><br>
	<input type='text' name='id' required/><br>  
    <label>Neve:</label><br/>
		<input type='text' name='nev' required/><br>
        <label>Ranglista helyezése:</label><br>
		<input type='number' name='ranglista' required/><br>
		<label>Zászlaja:</label><br>
		<input type='file' name='zaszlo' required/><br><br>
		<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='orszag' value = "Hozzáadás" /><br></div></div></form>
    <?php 
}
if (isset($_POST['orszag'])){
    $id = $_POST['id'];
    $nev = $_POST['nev'];
    $ranglista = $_POST['ranglista'];
    $zaszlo = $_FILES['zaszlo'];
    $query = "INSERT INTO orszagok (orszagid,orszagnev,ranglista,zaszlok) VALUES ('$id','$nev','$ranglista','$zaszlo')";
    $result = mysqli_query($conn,$query);
    header('Location: index.php?page=orszag');
}
    ?>
</body>
</html>