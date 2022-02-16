<link rel="stylesheet" type="text/css" href="view/style.css">
<div id="btn">
<?php

session_start();

require 'includes/db.inc.php';
require 'model/felhasznalok.php';
require 'model/orszagmodel.php';
require 'model/ligamodel.php';
require 'model/csapatmodel.php';
require 'model/profilkepmodel.php';


if (!empty($_REQUEST['search'])) {

	$search = $_REQUEST['search']; 

$sql = "SELECT * from ligak where nev like '%".$search."%'";
$result = $conn->query($sql);

if ($result->num_rows > 0){
	?>
	<?php
while($row = $result->fetch_assoc() ){
	echo $row["nev"]."<br>";
	?>
	
	<img src="data:image/jpg;charset=utf8;base64 ,<?php echo base64_encode($row['logo']); ?>" width="100"/>
<?php
}
} else {
	echo "0 records";
}
}
?>