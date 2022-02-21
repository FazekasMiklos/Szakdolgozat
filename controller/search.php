<div id="reg">
    <h1>Találatok:</h1>
<?php
if (!empty($_REQUEST['search'])) {

$search = $_REQUEST['search']; 

$sql = "SELECT * from ligak where liganev like '%".$search."%'";
$sql2 = "SELECT * from klubbok where klubnev like '%".$search."%'";
$sql3 = "SELECT * from orszagok where orszagnev like '%".$search."%'";
$sql4 = "SELECT * from jatekosok where nev like '%".$search."%'";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);

if ($result->num_rows > 0){
?>
<?php
while($row = $result->fetch_assoc() ){
    ?>
<a href="index.php?page=league&id=<?php echo ($row['ligaid']); ?>">
<?php echo $row["liganev"]?><br></a>
<?php
}
}
if($result2->num_rows > 0){
?>
<?php
while($row = $result2->fetch_assoc() ){
echo $row["klubnev"]."<br>";
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
echo $row["orszagnev"]."<br>";
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
    ?>
<a href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">  
<?php echo $row["nev"]?><br></a>
<?php
}
}
}
?>
</div>