<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
    if(!empty($_SESSION["admin"])){
    ?>
    <br>
    <form action="index.php?page=hozzaadas" method="post">
    <div class="text-center">
    <label style="color: white"><h2>Ország hozzáadás:</h2></label><br>
    <button class="btn btn-success" style='color:white;' type="submit" name="orszagfelvitel"><i class="fa fa-plus"></i></button>
    </div>
    </form>
    <?php
    }
    ?>
<div id="btn">  
<?php 
$result = $conn->query("SELECT orszagid,orszagnev,ranglista,zaszlok FROM orszagok ORDER BY orszagnev"); 
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
            <i class="fas fa-trash"></i>
            </a>
            <a style="color: white"; href="index.php?page=modositas&id4=<?php echo ($row['orszagid']); ?>">
            <i class="fas fa-pencil"></i>
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