<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>

<?php
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM orszagok INNER JOIN jatekosok ON (jatekosok.orszagid=orszagok.orszagid) WHERE orszagok.orszagid = '$id'";
    $result = mysqli_query($conn,$sql) or die;
    $row = mysqli_fetch_array($result);
    ?>
    <h1><?php echo($row['orszagnev']);?><br></h1>
    <div id="btn">
    <div id="adat"><?php echo "Világranglistahelyezése:";?><br>
    <?php echo($row['ranglista']);?></div>
    <div id="adat"><?php echo"Az ország játékosai:";?><br>
    <?php
    while($row = $result->fetch_assoc()){
        ?>
    <?php echo($row['nev']);?><br>
    <?php
    }
    ?>
    </div>
    </div>
<?php
}
?>
</body>
</html>