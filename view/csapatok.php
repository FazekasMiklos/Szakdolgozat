<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
<div id="btn"> 
<?php 
$result = $conn->query("SELECT klubid,nev,ligaid FROM klubbok"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btm">
            <?php echo"Név:";?> 
            <?php echo($row['nev']);?>
 </div>
 <?php
 } 
 ?>
 </div>
</body>
</html>