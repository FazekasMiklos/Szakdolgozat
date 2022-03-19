<meta name="viewport" content="width=device-width, initial-scale=1">
<h1 style="color: white;">Üdvözöllek a weboldalon</h1>
<div id="btn">
<div id="reg">
      <h4><div class="text-center" style='color:white;'>Góllövőlista</div></h4>
      <?php
    $sql = "SELECT * from jatekosok ORDER BY golok DESC LIMIT 5";
    $result = $conn->query($sql) or die;
    echo"<span class='float-left' style='color:white;'>Neve</span>";
    echo"<span class='float-right' style='color:white;'>Gólok száma</span>";
    echo"<br>";
    while($row = $result->fetch_assoc()){
    echo"<span class='float-left' style='color:white;'>";
    ?>
    <a style="color: white"; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
    <?php 
    echo($row['nev']);
    ?>
    </a>
    <?php
    echo"</span>";
    echo"<span class='float-right' style='color:white;'>";
    echo($row['golok']);
    echo"</span>";
    echo"<br>";
    }
    ?>
  <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
  <div class="text-center">
    <button class="btn btn-link" style='color:white;' type="submit" name="jatekosgollista">Teljes lista megtekintése</button>
</div>
</form>
</div>
<div id="reg">
<h4><div class="text-center" style='color:white;'>Gólpasszlista</div></h4>
      <?php
    $sql = "SELECT * from jatekosok ORDER BY golpasszok DESC LIMIT 5";
    $result = $conn->query($sql) or die;
    echo"<span class='float-left' style='color:white;'>Neve</span>";
    echo"<span class='float-right' style='color:white;'>Gólpasszok száma</span>";
    echo"<br>";
    while($row = $result->fetch_assoc()){
    echo"<span class='float-left' style='color:white;'>";
    ?>
    <a style="color: white"; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
    <?php 
    echo($row['nev']);
    ?>
    </a>
    <?php
    echo"</span>";
    echo"<span class='float-right' style='color:white;'>";
    echo($row['golpasszok']);
    echo"</span>";
    echo"<br>";
    }
    ?>
  <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
  <div class="text-center">
    <button class="btn btn-link" style='color:white;' type="submit" name="jatekosassistlista">Teljes lista megtekintése</button>
</div>
    </form>
</div>
    <div id="reg">
    <h4><div class="text-center" style='color:white;'>Legtöbb védéslista</div></h4>
      <?php
    $sql = "SELECT * from jatekosok ORDER BY vedesek DESC LIMIT 5";
    $result = $conn->query($sql) or die;
    echo"<span class='float-left' style='color:white;'>Neve</span>";
    echo"<span class='float-right' style='color:white;'>Védések száma</span>";
    echo"<br>";
    while($row = $result->fetch_assoc()){
    echo"<span class='float-left' style='color:white;'>";
    ?>
    <a style="color: white"; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
    <?php 
    echo($row['nev']);
    ?>
    </a>
    <?php
    echo"</span>";
    echo"<span class='float-right' style='color:white;'>";
    echo($row['vedesek']);
    echo"</span>";
    echo"<br>";
    }
    ?>
  <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
  <div class="text-center">
    <button class="btn btn-link" style='color:white;' type="submit" name="jatekosvedeslista">Teljes lista megtekintése</button>
</div>
    </form>
</div>
    <div id="reg">
    <h4><div class="text-center" style='color:white;'>Országok ranglista</div></h4>
      <?php
    $sql = "SELECT * from orszagok ORDER BY ranglista LIMIT 5";
    $result = $conn->query($sql) or die;
    echo"<span class='float-left' style='color:white;'>Neve</span>";
    echo"<span class='float-right' style='color:white;'>Világ ranglista helyezés</span>";
    echo"<br>";
    while($row = $result->fetch_assoc()){
    echo"<span class='float-left' style='color:white;'>";
    ?>
    <a style="color: white"; href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
    <?php 
    echo($row['orszagnev']);
    ?>
    </a>
    <img src="data:image/jpg;charset=utf8;base64 , <?php echo base64_encode($row['zaszlok']);?>" width="30"/>
    <?php
    echo"</span>";
    echo"<span class='float-right' style='color:white;'>";
    echo($row['ranglista']).".";
    echo"</span>";
    echo"<br>";
    }
    ?>
  <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
  <div class="text-center">
    <button class="btn btn-link" style='color:white;' type="submit" name="ranglista">Teljes lista megtekintése</button>
</div>
    </form>
    </div>