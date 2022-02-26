<?php
date_default_timezone_set('Europe/Budapest');
include 'controller/komment.php';
?>
<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1 style="color: white;">Vélemények<br></h1>
<div id='adat'>
    <?php
    if (isset($_SESSION['userid'])){ 
    echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['userid']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' class='btn mb-2' style='background-color:#228B22; color:white;' name='submit'>Küldés</button>
    </form>";
    } else {
        echo "A kommenteléshez be kell jelentkezned!";
    }
    getComments($conn);
    ?>
     </div>
    </body>
</html>