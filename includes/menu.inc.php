<?php
?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#228B22;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
        foreach($menupontok as $key => $value) {
            $active = '';
            if($_SERVER['REQUEST_URI'] == '/c31c202121/'.$key) $active = ' active';

            if($key == 'felhasznalo') $key.='&action='.$action;
            ?>
            <li class="nav-item<?php echo $active; ?>">
                <a class="nav-link" href="index.php?page=<?php echo $key; ?>"><?php echo $value; ?>
              </a>
            </li>
            <?php            
        }

      ?>
      <form action="" method="post" class="form-inline my-2 my-lg-0" name="searchForm">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Keresés" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Keresés</button>
    </form>
    </ul>
  </div>
</nav>