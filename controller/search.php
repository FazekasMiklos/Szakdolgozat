<div id="reg">
    <h1>Találatok:</h1>
<?php
if (!empty($_REQUEST['search'])) {

$search = $_REQUEST['search']; 

$sql = "SELECT * from ligak where nev like '%".$search."%'";
$sql2 = "SELECT * from klubbok where nev like '%".$search."%'";
$sql3 = "SELECT * from orszagok where nev like '%".$search."%'";
$sql4 = "SELECT * from jatekosok where nev like '%".$search."%'";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

if ($result->num_rows > 0){
?>
<?php
while($row = $result->fetch_assoc() ){
echo $row["nev"]."<br>";
?>
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
echo $row["nev"]."<br>";
?>
<?php
}
}
?>
<?php
if ($result4->num_rows > 0){
?>
<?php
while($row = $result4->fetch_assoc() ){
echo $row["nev"]."<br>";
?>
<?php
}
}
}
?>
</div>