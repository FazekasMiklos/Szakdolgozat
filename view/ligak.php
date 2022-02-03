<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body> 
<h1 style=text-align:center>Ha egy liga csapatait szeretnéd megtekinteni akkor kattints az adott liga képére</h1>
<?php 
$result = $conn->query("SELECT ligaid,nev,orszagid,logo FROM ligak"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btn">
            <a href="index.php?page=csapat" title="Csapat">
            <img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['logo']); ?>" width="100"/></a>
            <?php echo"Név:";?> 
            <?php echo($row['nev']);?><br>
 </div>
 <?php
 } 
 ?>
</body>
</html>