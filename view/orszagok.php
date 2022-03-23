<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
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
            <a href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
            <img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['zaszlok']); ?>" width="100"/><br></a> 
            <?php echo($row['orszagnev']);?><br>
            <?php
            if(!empty($_SESSION["admin"])){
            ?> 
            <a style="color: white"; href="index.php?page=torles&id4=<?php echo ($row['orszagid']); ?>">
            Törlés
            </a>
            <a style="color: white"; href="index.php?page=modositas&id4=<?php echo ($row['orszagid']); ?>">
            Módosítás
            </a>
            <?php 
            }
            ?>
            </div>
 
 <?php
 } 
 ?>
 </div>
</body>
</html>