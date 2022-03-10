<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div id="btn"> 
<?php 
$result = $conn->query("SELECT * FROM ligak"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btm">
            <a href="index.php?page=league&id3=<?php echo ($row['ligaid']); ?>">
            <img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['logo']); ?>" width="100"/></a><br>
            <?php echo"Név:";?>
            <?php echo($row['liganev']);?><br>
 </div>
 <?php
 } 
 ?>
 </div>
</body>
</html>