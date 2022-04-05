<!DOCTYPE html>
<html lang="HU">

<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div id="btn">
	<div id="reg">
		<form action='index.php?page=profilepicdelete' method='POST'>
			<label for="user">Biztos hogy törölni akarod a profilképed?</label> <br />
			<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='igen' id="igen" value="Igen" />
			<input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='nem' id="nem" value="Nem" />
		</form>
	</div>
</div>
</body>

</html>