<nav class="navbar navbar-expand-lg navbar-dark shadow-5-strong justify-content-center">
  <?php
  if (!empty($_SESSION["userid"])) {
  ?>
    <?php
    $result = $conn->query("SELECT * FROM felhasznalok as f INNER JOIN profilkepek as p ON (f.userid = p.userid) WHERE f.userid = '" . $_SESSION['userid'] . "'");
    while ($row = $result->fetch_assoc()) {
    ?>
      <a class="navbar-brand">
        <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="60" height="60">
      </a>
    <?php
    }
  } else {
    if (!empty($_SESSION["admin"])) {
    ?>
      <?php
      $result = $conn->query("SELECT * FROM felhasznalok as f INNER JOIN profilkepek as p ON (f.userid = p.userid) WHERE f.userid = '" . $_SESSION['admin'] . "'");
      while ($row = $result->fetch_assoc()) {
      ?>
        <a class="navbar-brand">
          <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="60" height="60">
        </a>
  <?php
      }
    }
  }
  ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav justify-content-center">
      <?php
      foreach ($menupontok as $key => $value) {
        $active = '';
        if ($_SERVER['REQUEST_URI'] == '/c31c202121/' . $key) $active = ' active';

        if ($key == 'felhasznalo') $key .= '&action=' . $action;
        ob_start();
      ?>
        <div id="kozep">
          <li class="nav-item<?php echo $active; ?>">
            <a class="nav-link" style="color: white;" href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?>
            </a>
          </li>
        </div>
      <?php
      }
      ob_start();
      ?>
      <form action="index.php?page=search" method="post" class="form-inline my-2 my-lg-0" name="searchForm">
        <div class="input-group">
          <input class="form-control" type="search" name="search" placeholder="Keresés" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-success" style='color:white;' type="submit"><i class="fa fa-search"></i></button>
          </div>
        </div>
      </form>
    </ul>
  </div>
</nav>