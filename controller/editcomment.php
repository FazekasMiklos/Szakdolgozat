<?php
date_default_timezone_set('Europe/Budapest');
include 'controller/komment.php';
?>
<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">   
</head>
<body>
<div id='adat'>
    <?php
    $cid = $_POST['id'];
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];

    echo "<form method='POST' action='".editComments($conn)."'>
    <input type='hidden' name='id' value='".$cid."'>
    <input type='hidden' name='uid' value='".$uid."'>
    <input type='hidden' name='date' value='".$date."'>
    <textarea name='message'>".$message."</textarea><br>
    <button type='submit' class='btn mb-2' style='background-color:#228B22; color:white;' name='editsubmit'>Módosítás</button>
    </form>";
    ?>
     </div>
    </body>
</html>