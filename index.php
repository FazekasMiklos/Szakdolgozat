<?php

session_start();

require 'includes/db.inc.php';

$page='index';

if(!empty($_REQUEST['action'])) {
	if($_REQUEST['action']== 'kilepes')
	session_unset();
}


    if(!empty($_SESSION["id"])) {
    $szoveg = $_SESSION["nev"].": Kilépés";
    $action = "kilepes";
    } else {
            $szoveg = "Belépés";
            $action = "belepes";
           }

if(isset($_REQUEST['page'])){
  if(file_exists('controller/'.$_REQUEST['page'].'.php')){
          $page =$_REQUEST['page'];
  }
}
$menupontok = array(
    'index' => "Főoldal",
    'belepes' => $szoveg,
    'regisztracio' => "Regisztráció");
$title = $menupontok[$page];

?>
</body>
</html>