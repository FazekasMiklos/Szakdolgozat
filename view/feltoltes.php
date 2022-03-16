<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<div id="reg"><h2>Profilkép feltöltés</h2>
	<form action='index.php?page=upload' method='POST' enctype="multipart/form-data">
	    Profilkép:<br>
	    <input type="file" name="profilkep" value=""><br>
		<input type="submit" class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name="upload" value="Feltöltés">
    </form>
    </div>
</body>
</html>