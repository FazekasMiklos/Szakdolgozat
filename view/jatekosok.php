<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>
<div id="btn"> 
<?php 
$result = $conn->query("SELECT * FROM jatekosok"); 
?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btm">
            <?php echo"Név:";?><br>
            <a style="color: white"; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
            <?php echo($row['nev']);?>
            </a>
 </div>
 <?php
 } 
 ?>
 </div>
</body>
</html>