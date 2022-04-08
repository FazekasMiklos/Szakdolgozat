<!--Külön kereső a játékosokra-->
<form action="index.php?page=jatekos" method="post" class="form-inline justify-content-center my-2 my-lg-0" name="searchForm">
      <div id="kereso">
            <div class="input-group">
                  <input style="height: 50px;" class="form-control" type="search" name="search" placeholder="Játékos keresése" aria-label="Search">
                  <div class="input-group-append">
                        <button class="btn btn-success" style='color:white;' type="submit"><i class="fa fa-search"></i></button>
                  </div>
            </div>
      </div>
</form>
<?php
//Átírányítja az admint ahol hozzátud adni játékost az adatbázisba
if (!empty($_SESSION["admin"])) {
?>
      <br>
      <form action="index.php?page=hozzaadas" method="post">
            <div class="text-center">
                  <label style="color: white">
                        <h2>Játékos hozzáadás:</h2>
                  </label><br>
                  <button class="btn btn-success" style='color:white;' type="submit" name="jatekosfelvitel"><i class="fa fa-plus"></i></button>
            </div>
      </form>
<?php
}
?>
<!--Játékosok megjelenítése-->
<div id="btn">
      <?php
      $result = $conn->query("SELECT * FROM jatekosok ORDER BY nev");
      if (!empty($_REQUEST['search'])) {

            $search = $_REQUEST['search'];
            $sql = "SELECT * from jatekosok where nev like '%" . $search . "%'";
            $result2 = $conn->query($sql);
            if ($result2->num_rows > 0) {
                  while ($row = $result2->fetch_assoc()) {
      ?>
                        <div class="btm">
                              <?php echo "Név:"; ?><br>
                              <a style="color: white" href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
                                    <?php echo ($row['nev']); ?>
                              </a><br>
                              <?php
                              if (!empty($_SESSION["admin"])) {
                              ?>
                                    <a style="color: white" href="index.php?page=torles&id=<?php echo ($row['jatekosid']); ?>">
                                          <i class="fas fa-trash mr-2"></i>
                                    </a>
                                    <a style="color: white" href="index.php?page=modositas&id=<?php echo ($row['jatekosid']); ?>">
                                          <i class="fas fa-pencil"></i>
                                    </a>
                              <?php
                              }
                              ?>
                        </div>
            <?php
                  }
            } else {
                  echo "<div class='reg'><h2><p style='color:white;'>Nincs ilyen játékos</p></h2></div>";
            }
      } else {
            ?>
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                  <div class="btm">
                        <?php echo "Név:"; ?><br>
                        <a style="color: white" href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
                              <?php echo ($row['nev']); ?>
                        </a><br>
                        <?php
                        if (!empty($_SESSION["admin"])) {
                        ?>
                              <a style="color: white" href="index.php?page=torles&id=<?php echo ($row['jatekosid']); ?>">
                                    <i class="fas fa-trash mr-2"></i>
                                    <!--Csapat törlés-->
                              </a>
                              <a style="color: white" href="index.php?page=modositas&id=<?php echo ($row['jatekosid']); ?>">
                                    <i class="fas fa-pencil"></i>
                                    <!--Csapat módosítás-->
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