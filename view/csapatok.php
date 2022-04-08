      <!--Külön kereső a csapatokra-->
      <form action="index.php?page=csapat" method="post" class="form-inline justify-content-center my-2 my-lg-0" name="searchForm">
            <div id="kereso">
                  <div class="input-group">
                        <input style="height: 50px;" class="form-control" type="search" name="search" placeholder="Csapat keresése" aria-label="Search">
                        <div class="input-group-append">
                              <button class="btn btn-success" style='color:white;' type="submit"><i class="fa fa-search"></i></button>
                        </div>
                  </div>
            </div>
      </form>
      <?php
      //Átírányítja az admint ahol hozzátud adni csapatot az adatbázisba
      if (!empty($_SESSION["admin"])) {
      ?>
            <br>
            <form action="index.php?page=hozzaadas" method="post">
                  <div class="text-center">
                        <label style="color: white">
                              <h2>Csapat hozzáadás:</h2>
                        </label><br>
                        <button class="btn btn-success" style='color:white;' type="submit" name="csapatfelvitel"><i class="fa fa-plus"></i></button>
                  </div>
            </form>
      <?php
      }
      ?>
      <!--Csapatok megjelenítése-->
      <div id="btn">
            <?php
            $result = $conn->query("SELECT klubid,klubnev,ligaid FROM klubbok ORDER BY klubnev");
            if (!empty($_REQUEST['search'])) {
                  $search = $_REQUEST['search'];
                  $sql = "SELECT * from klubbok where klubnev like '%" . $search . "%'";
                  $result2 = $conn->query($sql);
                  if ($result2->num_rows > 0) {
                        while ($row = $result2->fetch_assoc()) {
            ?>
                              <div class="btm">
                                    <?php echo "Név:"; ?><br>
                                    <a style="color: white" href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
                                          <?php echo ($row['klubnev']); ?>
                                    </a><br>
                                    <?php
                                    if (!empty($_SESSION["admin"])) {
                                    ?>
                                          <a style="color: white" href="index.php?page=torles&id2=<?php echo ($row['klubid']); ?>">
                                                <i class="fas fa-trash mr-2"></i>
                                          </a>
                                          <a style="color: white" href="index.php?page=modositas&id2=<?php echo ($row['klubid']); ?>">
                                                <i class="fas fa-pencil"></i>
                                          </a>
                                    <?php
                                    }
                                    ?>
                              </div>
                  <?php
                        }
                  } else {
                        echo "<div class='reg'><h2><p style='color:white;'>Nincs ilyen csapat</p></h2></div>";
                  }
            } else {
                  ?>
                  <?php
                  while ($row = $result->fetch_assoc()) {
                  ?>
                        <div class="btm">
                              <?php echo "Név:"; ?><br>
                              <a style="color: white" href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
                                    <?php echo ($row['klubnev']); ?>
                              </a><br>
                              <?php
                              if (!empty($_SESSION["admin"])) {
                              ?>
                                    <a style="color: white" href="index.php?page=torles&id2=<?php echo ($row['klubid']); ?>">
                                          <i class="fas fa-trash mr-2"></i>
                                    </a>
                                    <!--Csapat törlés-->
                                    <a style="color: white" href="index.php?page=modositas&id2=<?php echo ($row['klubid']); ?>">
                                          <i class="fas fa-pencil"></i>
                                    </a>
                                    <!--Csapat módosítás-->
                              <?php
                              }
                              ?>
                        </div>
            <?php
                  }
            }
            ?>
      </div>