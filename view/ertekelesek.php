<?php
include 'controller/ertekeles.php';
?>
<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class='rating'>
<div class='text-center'>
<h2 style="color: white;">Értékelések<br></h2>
</div>
<div class='d-flex justify-content-center'>
    <div id='adat3'>
    <?php
    if (isset($_SESSION['userid']) or isset($_SESSION['admin'])){ 
    echo "<form method='POST' action='".setRatings($conn)."'>
    <input type='radio' id='e1' name='e1' value='1' checked>
<label for='e1'>1</label><br>
<input type='radio' id='e2' name='e1' value='2'>
<label for='e2'>2</label><br>
<input type='radio' id='e3' name='e1' value='3'>
<label for='e3'>3</label><br>
<input type='radio' id='e4' name='e1' value='4'>
<label for='e4'>4</label><br>
<input type='radio' id='e5' name='e1' value='5'>
<label for='e5'>5</label><br>
<input type='radio' id='e6' name='e1' value='6'>
<label for='e1'>6</label><br>
<input type='radio' id='e7' name='e1' value='7'>
<label for='e2'>7</label><br>
<input type='radio' id='e8' name='e1' value='8'>
<label for='e3'>8</label><br>
<input type='radio' id='e9' name='e1' value='9'>
<label for='e4'>9</label><br>
<input type='radio' id='e10' name='e1' value='10'>
<label for='e5'>10</label><br>
    <div class='text-center'>
    <button type='submit' class='btn btn-success' style='color:white;' name='ertekelesSubmit'>Értékelés</button>
    </div><br>
    </form>";
    getRatings($conn);
    } else {
        echo "<div class='text-center'><h5><a href='index.php?page=login' style='color:white;'>Az értékeléshez be kell jelentkezned!</a></h5></div><br>";
    }
    echo "</div>";
    echo "<div id='adat3'>";
    getRatings2($conn);
    echo "</div>";
    echo "</div>";
    ?>
     </div>
    </body>
</html>