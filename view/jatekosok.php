<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<form action="index.php?page=jatekos" method="post" class="mx-2 my-auto d-inline w-100" name="searchForm">
      <div id='kozep'>
      <input style="height: 50px"class="form-control" type="search" name="search" placeholder="Játékos keresése" aria-label="Search"><br>
      <button class="btn btn-success" style='color:white;' type="submit">Keresés</button>
      </div>
    </form>
<div id="btn"> 
 <?php
 $result = $conn->query("SELECT * FROM jatekosok");
 if (!empty($_REQUEST['search'])) {

      $search = $_REQUEST['search']; 
      $sql = "SELECT * from jatekosok where nev like '%".$search."%'";
      $result2 = $conn->query($sql);
      if ($result2->num_rows > 0){
      while($row = $result2->fetch_assoc()){
            ?>
            <div id="btm">
            <?php echo"Név:";?><br>
            <a style="color: white"; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
            <?php echo($row['nev']);?>
            </a>
 </div>
 <?php
}
}else{
      echo "<div id='reg'><h2><p style='color:white;'>Nincs ilyen játékos</p></h2></div>";
}
}else{ 
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
} 
 ?>
 </div>
</body>
</html>