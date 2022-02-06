<?php

session_start();

require 'includes/db.inc.php';
require 'model/felhasznalok.php';
require 'model/orszagmodel.php';
require 'model/ligamodel.php';
require 'model/csapatmodel.php';

$felhasznalo = new User;
$orszag = new Orszagok;
$liga = new Ligak;
$csapat = new Csapatok;

if(!isset($_REQUEST['page'])){
        header('Location: index.php?page=index');
        exit();
    }

$page = 'index';
    

// kilépés végrehajtása
if(!empty($_REQUEST['action'])) {
	if($_REQUEST['action'] == 'kilepes') 
        session_unset();
}

// ki vagy be vagyok lépve?
if(!empty($_SESSION["userid"])) {
        $szoveg = "Adatok és kijelentkezés";
        $action = "kilepes";
}
else {
        $szoveg = "Belépés";
        $action = "belepes";        
} 

if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

$menupontok = array(    'index' => "Főoldal",
                        'register' => "Regisztrálás",
                        'login' => $szoveg,
                        'orszag' => "Országok",
                        'liga' => "Ligák",
                        'jatekos' => "Játékosok",
                        'csapat' => "Csapatok"
                );
$title = $menupontok[$page];

include 'includes/htmlheader.inc.php';
?>
<body>

<?php

include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';

?>
</body>
</html>