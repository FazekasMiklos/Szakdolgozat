<?php

session_start();

require 'includes/db.inc.php';
require 'model/felhasznalok.php';
require 'model/orszagmodel.php';
require 'model/ligamodel.php';
require 'model/csapatmodel.php';
require 'model/profilkepmodel.php';

$felhasznalo = new User;
$orszag = new Orszagok;
$liga = new Ligak;
$csapat = new Csapatok;
$image = new Profilkepek;

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
        $szoveg = "Kijelentkezés";
        $upload = "Profilkép beállítás";
        $action = "kilepes";
}
else {
        $szoveg = "Belépés";
        $action = "belepes";
        $reg = "Regisztrálás";     
} 

if(isset($_REQUEST['page'])) {
        if(file_exists('controller/'.$_REQUEST['page'].'.php')) {
                $page = $_REQUEST['page']; 
        }
}

if (!empty($_REQUEST['search'])) {

	$search = $_REQUEST['search']; 
}

if(!empty($_SESSION["userid"])) {
$menupontok = array(    'index' => "Főoldal",
                        'logout' => $szoveg,
                        'orszag' => "Országok",
                        'liga' => "Ligák",
                        'jatekos' => "Játékosok",
                        'csapat' => "Csapatok",
                        'adatok' => "Adatok",
                        'upload' => $upload,         
                );
}else
$menupontok = array(    'index' => "Főoldal",
                        'register' => $reg,
                        'login' => $szoveg,
                        'orszag' => "Országok",
                        'liga' => "Ligák",
                        'jatekos' => "Játékosok",
                        'csapat' => "Csapatok",          
                );
if(in_array($page,$menupontok)){
$title = $menupontok[$page];
}else $title=$page;

include 'includes/htmlheader.inc.php';
?>
<body>
<?php

include 'includes/menu.inc.php';
include 'controller/'.$page.'.php';

?>
</body>
</html>