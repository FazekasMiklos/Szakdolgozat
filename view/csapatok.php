<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
<div id="btn"> 
<?php 
$result = $conn->query("SELECT klubid,klubnev,ligaid FROM klubbok"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btm">
            <?php echo"Név:";?><br>
            <a style="color: white"; href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
            <?php echo($row['klubnev']);?></a>
 </div>
 <?php
 } 
 ?>
 </div>
</body>
</html>