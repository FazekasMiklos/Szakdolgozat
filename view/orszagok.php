<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
<div id="btn">  
<?php 
$result = $conn->query("SELECT orszagid,orszagnev,ranglista,zaszlok FROM orszagok"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btm">
            <a href="index.php?page=country&id=<?php echo ($row['orszagid']); ?>">
            <img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['zaszlok']); ?>" width="100"/><br></a>
            <?php echo"Név:";?> 
            <?php echo($row['orszagnev']);?><br>
            </div>
 
 <?php
 } 
 ?>
 </div>
</body>
</html>