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
<div id='komment'>
    <?php
    if (isset($_SESSION['userid'])){ 
    echo "<form method='POST' action='".setComments($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['userid']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <div class='d-flex justify-content-center'>
    <div class='form-group w-100'>
    <textarea rows='4' maxlength='10000' class='form-control' name='message' required></textarea><br>
    <div class='text-center'>
    <button type='submit' class='btn btn-success' style='color:white;' name='submit'>Küldés</button>
    </div></div></div><br>
    </form>";
    } else {
        echo "<div class='text-center'><h5>A kommenteléshez be kell jelentkezned!</h5></div><br>";
    }
    getComments($conn);
    ?>
     </div>
    </body>
</html>