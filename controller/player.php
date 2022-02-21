<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>

<?php
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM jatekosok INNER JOIN orszagok ON (orszagok.orszagid = jatekosok.orszagid) INNER JOIN klubbok ON (klubbok.klubid = jatekosok.klubid) INNER JOIN posztok ON (posztok.pozid = jatekosok.pozid) WHERE jatekosid='$id' ";
    $result = mysqli_query($conn,$sql) or die;
    $row = mysqli_fetch_array($result);
    ?>
    <h1><?php echo($row['nev']);?><br></h1>
    <div id="btn">
    <div id="adat"><?php echo"Született:";?><br>
    <?php echo($row['szuletesidatum']);?><br></div>
    <div id="adat"><?php echo"Lejátszott mérkőzései:";?><br>
    <?php echo($row['merkozesek']);?><br></div>
    <div id="adat"><?php echo"Góljainak száma:";?><br>
    <?php echo($row['golok']);?><br></div>
    <div id="adat"><?php echo"Gólpasszainak száma:";?><br>
    <?php echo($row['golpasszok']);?><br></div>
    <div id="adat"> <?php echo"Védéseinek száma:";?><br>
    <?php echo($row['vedesek']);?><br></div>
    <div id="adat"> <?php echo"Nemzetisége:";?><br>
    <?php echo($row['orszagnev']);?><br></div>
    <div id="adat"> <?php echo"Jelenlegi klubja:";?><br>
    <?php echo($row['klubnev']);?><br></div>
    <div id="adat"> <?php echo"Posztja:";?><br>
    <?php echo($row['poznev']);?><br></div>
    </div>
<?php
}
?>
</body>
</html>