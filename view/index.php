  <h1 style="color: white;">Üdvözöllek a weboldalon<br>
  </h1>
  <div id="btn">
    <!--Top 5 legtöbb gólt szerzett játékos megjelenítése-->
    <div class="reg">
        <div class="text-center" style='color:white'><h4>Góllövőlista</h4></div>
      <?php
      $sql = "SELECT * from jatekosok ORDER BY golok DESC LIMIT 5";
      $result = $conn->query($sql) or die;
      echo "<span class='float-left' style='color:white;'>Neve</span>";
      echo "<span class='float-right' style='color:white;'>Gólok száma</span>";
      echo "<br>";
      while ($row = $result->fetch_assoc()) {
        echo "<span class='float-left' style='color:white;'>";
      ?>
        <a style="color: white" href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
          <?php
          echo ($row['nev']);
          ?>
        </a>
      <?php
        echo "</span>";
        echo "<span class='float-right' style='color:white;'>";
        echo ($row['golok']);
        echo "</span>";
        echo "<br>";
      }
      ?>
      <!--Itt irányítja át a felhasználót arra az oldalra ahol megtudja tekinteni a teljes góllövőlistát-->
      <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
        <div class="text-center">
          <button class="btn btn-link" style='color:white;' type="submit" name="jatekosgollista">Teljes lista megtekintése</button>
        </div>
      </form>
    </div>
    <!--Top 5 legtöbb gólpasszt szerzett játékos megjelenítése-->
    <div class="reg">
        <div class="text-center" style='color:white;'><h4>Gólpasszlista</h4></div>
      <?php
      $sql = "SELECT * from jatekosok ORDER BY golpasszok DESC LIMIT 5";
      $result = $conn->query($sql) or die;
      echo "<span class='float-left' style='color:white;'>Neve</span>";
      echo "<span class='float-right' style='color:white;'>Gólpasszok száma</span>";
      echo "<br>";
      while ($row = $result->fetch_assoc()) {
        echo "<span class='float-left' style='color:white;'>";
      ?>
        <a style="color: white" href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
          <?php
          echo ($row['nev']);
          ?>
        </a>
      <?php
        echo "</span>";
        echo "<span class='float-right' style='color:white;'>";
        echo ($row['golpasszok']);
        echo "</span>";
        echo "<br>";
      }
      ?>
      <!--Itt irányítja át a felhasználót arra az oldalra ahol megtudja tekinteni a teljes gólpasszlistát-->
      <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
        <div class="text-center">
          <button class="btn btn-link" style='color:white;' type="submit" name="jatekosassistlista">Teljes lista megtekintése</button>
        </div>
      </form>
    </div>
    <!--Top 5 legtöbb védést mutatott játékos megjelenítése-->
    <div class="reg">
        <div class="text-center" style='color:white;'><h4>Legtöbb védéslista</h4></div>
      <?php
      $sql = "SELECT * from jatekosok ORDER BY vedesek DESC LIMIT 5";
      $result = $conn->query($sql) or die;
      echo "<span class='float-left' style='color:white;'>Neve</span>";
      echo "<span class='float-right' style='color:white;'>Védések száma</span>";
      echo "<br>";
      while ($row = $result->fetch_assoc()) {
        echo "<span class='float-left' style='color:white;'>";
      ?>
        <a style="color: white" href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
          <?php
          echo ($row['nev']);
          ?>
        </a>
      <?php
        echo "</span>";
        echo "<span class='float-right' style='color:white;'>";
        echo ($row['vedesek']);
        echo "</span>";
        echo "<br>";
      }
      ?>
      <!--Itt irányítja át a felhasználót arra az oldalra ahol megtudja tekinteni a teljes legtöbb védéslistát-->
      <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
        <div class="text-center">
          <button class="btn btn-link" style='color:white;' type="submit" name="jatekosvedeslista">Teljes lista megtekintése</button>
        </div>
      </form>
    </div>
    <!--Top 5 legtöbb fifa scoreal rendelkező ország megjelenítése-->
    <div class="reg">
        <div class="text-center" style='color:white;'><h4>Országok ranglista</h4></div>
      <?php
      $sql = "SELECT * from orszagok ORDER BY ranglista LIMIT 5";
      $result = $conn->query($sql) or die;
      echo "<span class='float-left' style='color:white;'>Neve</span>";
      echo "<span class='float-right' style='color:white;'>Világ ranglista helyezés</span>";
      echo "<br>";
      while ($row = $result->fetch_assoc()) {
        echo "<span class='float-left' style='color:white;'>";
      ?>
        <a style="color: white" href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
          <?php
          echo ($row['orszagnev']);
          ?>
        </a>
        <img alt="" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['zaszlok']);?>" width="25" />
      <?php
        echo "</span>";
        echo "<span class='float-right' style='color:white;'>";
        echo ($row['ranglista']) . ".";
        echo "</span>";
        echo "<br>";
      }
      ?>
      <!--Itt irányítja át a felhasználót arra az oldalra ahol megtudja tekinteni a teljes országok ranglistát-->
      <form action="index.php?page=lista" method="post" class="mx-2 my-auto d-inline w-100">
        <div class="text-center">
          <button class="btn btn-link" style='color:white;' type="submit" name="ranglista">Teljes lista megtekintése</button>
        </div>
      </form>
    </div>
    </div>