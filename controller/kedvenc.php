<?php
//kedvencnek beállított játékos/csapat/liga/ország megjelenítése kilistázva
if (!empty($_SESSION["userid"])) {
  $result = $conn->query("SELECT * FROM jatekosok INNER JOIN kedvencek ON (kedvencek.jatekosid = jatekosok.jatekosid) WHERE userid='" . $_SESSION["userid"] . "'ORDER BY nev");
  $result2 = $conn->query("SELECT * FROM klubbok INNER JOIN kedvencek ON (kedvencek.klubid = klubbok.klubid) WHERE userid='" . $_SESSION["userid"] . "'ORDER BY klubnev");
  $result3 = $conn->query("SELECT * FROM ligak INNER JOIN kedvencek ON (kedvencek.ligaid = ligak.ligaid) WHERE userid='" . $_SESSION["userid"] . "'ORDER BY liganev");
  $result4 = $conn->query("SELECT * FROM orszagok INNER JOIN kedvencek ON (kedvencek.orszagid = orszagok.orszagid) WHERE userid='" . $_SESSION["userid"] . "'ORDER BY orszagnev");
?>
  <div id="btn">
    <div id="adat2">
      <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kedvenc játékosaid
        </button>
        <div class="dropdown-menu">
          <?php
          while ($row = $result->fetch_assoc()) {
          ?>
            <a class="dropdown-item" href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
              <?php echo ($row['nev']); ?>
            </a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <div id="adat2">
      <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kedvenc csapataid
        </button>
        <div class="dropdown-menu">
          <?php
          while ($row = $result2->fetch_assoc()) {
          ?>
            <a class="dropdown-item" href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
              <?php echo ($row['klubnev']); ?>
            </a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <div id="adat2">
      <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kedvenc ligáid
        </button>
        <div class="dropdown-menu">
          <?php
          while ($row = $result3->fetch_assoc()) {
          ?>
            <a class="dropdown-item" href="index.php?page=league&id3=<?php echo ($row['ligaid']); ?>">
              <?php echo ($row['liganev']); ?>
            </a>
          <?php
          }
          ?>
        </div>
      </div>
    </div>
    <div id="adat2">
      <div class="btn-group">
        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kedvenc országaid
        </button>
        <div class="dropdown-menu">
          <?php
          while ($row = $result4->fetch_assoc()) {
          ?>
            <a class="dropdown-item" href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
              <?php echo ($row['orszagnev']); ?>
            </a>
        <?php
          }
        }
        ?>
        <?php
        if (!empty($_SESSION["admin"])) {
          $result = $conn->query("SELECT * FROM jatekosok INNER JOIN kedvencek ON (kedvencek.jatekosid = jatekosok.jatekosid) WHERE userid='" . $_SESSION["admin"] . "'ORDER BY nev");
          $result2 = $conn->query("SELECT * FROM klubbok INNER JOIN kedvencek ON (kedvencek.klubid = klubbok.klubid) WHERE userid='" . $_SESSION["admin"] . "'ORDER BY klubnev");
          $result3 = $conn->query("SELECT * FROM ligak INNER JOIN kedvencek ON (kedvencek.ligaid = ligak.ligaid) WHERE userid='" . $_SESSION["admin"] . "'ORDER BY liganev");
          $result4 = $conn->query("SELECT * FROM orszagok INNER JOIN kedvencek ON (kedvencek.orszagid = orszagok.orszagid) WHERE userid='" . $_SESSION["admin"] . "'ORDER BY orszagnev");
        ?>
          <div id="btn">
            <div id="adat2">
              <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kedvenc játékosaid
                </button>
                <div class="dropdown-menu">
                  <?php
                  while ($row = $result->fetch_assoc()) {
                  ?>
                    <a class="dropdown-item" href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
                      <?php echo ($row['nev']); ?>
                    </a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <div id="adat2">
              <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kedvenc csapataid
                </button>
                <div class="dropdown-menu">
                  <?php
                  while ($row = $result2->fetch_assoc()) {
                  ?>
                    <a class="dropdown-item" href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
                      <?php echo ($row['klubnev']); ?>
                    </a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <div id="adat2">
              <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kedvenc ligáid
                </button>
                <div class="dropdown-menu">
                  <?php
                  while ($row = $result3->fetch_assoc()) {
                  ?>
                    <a class="dropdown-item" href="index.php?page=league&id3=<?php echo ($row['ligaid']); ?>">
                      <?php echo ($row['liganev']); ?>
                    </a>
                  <?php
                  }
                  ?>
                </div>
              </div>
            </div>
            <div id="adat2">
              <div class="btn-group">
                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kedvenc országaid
                </button>
                <div class="dropdown-menu">
                  <?php
                  while ($row = $result4->fetch_assoc()) {
                  ?>
                    <a class="dropdown-item" href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
                      <?php echo ($row['orszagnev']); ?>
                    </a>
                <?php
                  }
                }
                ?>
                </div>
              </div>
            </div>
          </div>