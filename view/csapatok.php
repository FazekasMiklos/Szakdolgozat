<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form action="index.php?page=csapat" method="post" class="mx-2 my-auto d-inline w-100" name="searchForm">
<div class="input-group">
      <input style="height: 50px"class="form-control" type="search" name="search" placeholder="Csapat keresése" aria-label="Search">
      <div class="input-group-append">
      <button class="btn btn-success" style='color:white;' type="submit"><i class="fa fa-search"></i></button>
      </div></div>
    </form>
<div id="btn"> 
<?php 
$result = $conn->query("SELECT klubid,klubnev,ligaid FROM klubbok");
if (!empty($_REQUEST['search'])) {
      $search = $_REQUEST['search']; 
      $sql = "SELECT * from klubbok where klubnev like '%".$search."%'";
      $result2 = $conn->query($sql);
      if ($result2->num_rows > 0){
      while($row = $result2->fetch_assoc()){
            ?>
           <div id="btm">
            <?php echo"Név:";?><br>
            <a style="color: white"; href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
            <?php echo($row['klubnev']);?></a>
            </a><br>
            <?php
            if(!empty($_SESSION["admin"])){
            ?> 
            <a style="color: white"; href="index.php?page=torles&id2=<?php echo ($row['klubid']); ?>">
            Törlés
            </a>
            <?php
            }
            ?>
 </div>
 <?php
}
}else{
      echo "<div id='reg'><h2><p style='color:white;'>Nincs ilyen csapat</p></h2></div>";
}
}else{ 
 ?>
 <?php 
 while($row = $result->fetch_assoc()){
      ?>
            <div id="btm">
            <?php echo"Név:";?><br>
            <a style="color: white"; href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
            <?php echo($row['klubnev']);?></a>
            </a><br>
            <?php
            if(!empty($_SESSION["admin"])){
            ?> 
            <a style="color: white"; href="index.php?page=torles&id2=<?php echo ($row['klubid']); ?>">
            Törlés
            </a>
            <?php
            }
            ?>
 </div>
 <?php
 }
} 
 ?>
 </div>
</body>
</html> 