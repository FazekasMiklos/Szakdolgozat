<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<form action='index.php?page=profile' method='POST' enctype="multipart/form-data">
	<div id="btn">
	<div id="reg">
	    <h2>Adatok módosítása</h2> 
		<label for="user">Felhasználónév:</label>	<br/>
		<input type='text' name='user' id="user"  /><br/>
		<label for="user">Jelszó:</label>	<br/>
		<input type='password' name='pass' id="pass"  /><br/>
		<label for="user">Email:</label>	<br/>
		<input type='email' name='email' id="email"  /><br/><br>
		<input type='submit' name='edit' id="edit" value = "Módosítás" /><br></div>
		<div id="reg">
		<h2>Profilkép módosítása</h2>
	    <input type='file' name='profilkep' id="profilkep"><br><br>
		<input type='submit' name='profileedit' id="profileedit" value = "Módosítás" />
</div>
</div>
</form>
</body>
</html>