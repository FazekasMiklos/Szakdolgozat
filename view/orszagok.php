<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body> 
<?php 
$result = $conn->query("SELECT orszagid,nev,ranglista,zaszlok FROM orszagok"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btn">
            <img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['zaszlok']); ?>" width="100"/><br>
            <?php echo"Név:";?> 
            <?php echo($row['nev']);?><br>
            <?php echo"Ranglistahelyezés:";?>
            <?php echo($row['ranglista']);?>
            </div>
 
 <?php
 } 
 ?>
</body>
</html>