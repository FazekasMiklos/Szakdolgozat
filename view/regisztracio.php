<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body align="middle">
	<div id="btn"><h2>Regisztráció</h2>
	<form action='index.php?page=register' method='POST'>
		<label for="user">Felhasználónév:</label>	<br/>
		<input type='text' name='user' id="user"  required/><br/>
		<label for="user">Jelszó:</label>	<br/>
		<input type='password' name='pass' id="pass"  required/><br/>
		<label for="user">Email:</label>	<br/>
		<input type='email' name='email' id="email"  required/><br/><br>
		<input type='submit' name='sentForm' id="sentForm" />
	</form>
	</div>
</body>
</html>