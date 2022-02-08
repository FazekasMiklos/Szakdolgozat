<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body align="middle">
<div id="btn"><h2>Profilkép feltöltés</h2>
	<form action='index.php?page=upload' method='POST' enctype="multipart/form-data">
	    Profilkép:<br>
	    <input type="file" name="profilkep" value=""><br>
		<input type="submit" name="upload" value="Upload">
    </form>
    </div>
</body>
</html>