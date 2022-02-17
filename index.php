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
if(isset($_REQUEST['search'])) {
        $_SESSION['search']='';
}

if (!empty($_REQUEST['search'])) {

	$search = $_REQUEST['search']; 

$sql = "SELECT * from ligak where nev like '%".$search."%'";
$sql2 = "SELECT * from klubbok where nev like '%".$search."%'";
$sql3 = "SELECT * from orszagok where nev like '%".$search."%'";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);

if ($result->num_rows > 0){
	?>
	<?php
while($row = $result->fetch_assoc() ){
	echo $row["nev"]."<br>";
	?>
	
	<img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['logo']); ?>" width="100"/><br>
<?php
}
}
if($result2->num_rows > 0){
?>
<?php
while($row = $result2->fetch_assoc() ){
	echo $row["nev"]."<br>";
	?>
<?php
}
}
?>
<?php
if ($result3->num_rows > 0){
	?>
<?php
while($row = $result3->fetch_assoc() ){
	echo"Név:";
	echo $row["nev"]."<br>";
	echo"Ranglistahelyezés:";
	echo $row['ranglista']."<br>";
	?>
	<img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['zaszlok']); ?>" width="100"/><br>
<?php
}
}
}
?>
<?php
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