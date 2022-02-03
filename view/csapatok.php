<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body> 
<?php 
$result = $conn->query("SELECT klubid,nev,ligaid FROM klubbok"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btn">
            <?php echo"Név:";?> 
            <?php echo($row['nev']);?><br>
 </div>
 <?php
 } 
 ?>
</body>
</html>