<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>

<?php
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM orszagok WHERE orszagok.orszagid = '$id'";
    $sql1 = "SELECT * FROM orszagok INNER JOIN jatekosok ON (jatekosok.orszagid = orszagok.orszagid) WHERE orszagok.orszagid = '$id' ";
    $result = mysqli_query($conn,$sql) or die;
    $result1 = mysqli_query($conn,$sql1) or die;
    $row = mysqli_fetch_array($result);
    $row1 = mysqli_fetch_array($result1);
    ?>
    <h1 style="color: white;"><?php echo($row['orszagnev']);?><br></h1>
    <div id="btn">
    <div id="reg"><?php echo "Világranglistahelyezése:";?><br>
    <?php echo($row['ranglista']);?></div>
    <div id="reg"><?php echo"Az ország játékosai:";?><br>
    <a style="color: white"; href="index.php?page=player&id=<?php echo ($row1['jatekosid']); ?>">
    <?php
    if ($result1->num_rows > 0){
    echo($row1['nev'])."<br>";
    while($row1 = $result1->fetch_assoc()){
        ?></a>
        <a style="color: white"; href="index.php?page=player&id=<?php echo ($row1['jatekosid']); ?>">
    <?php echo($row1['nev']);?><br></a>
    <?php
    }
    }
    ?>
    </div>
    </div>
<?php
}
?>
</body>
</html>