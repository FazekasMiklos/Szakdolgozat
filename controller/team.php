<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>

<?php
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM klubbok INNER JOIN ligak ON (ligak.ligaid = klubbok.ligaid) WHERE klubbok.klubid='$id'";
    $sql1 = "SELECT * FROM klubbok INNER JOIN jatekosok ON (jatekosok.klubid = klubbok.klubid)  WHERE klubbok.klubid='$id'";
    $result = mysqli_query($conn,$sql) or die;
    $result1 = mysqli_query($conn,$sql1) or die;
    $row = mysqli_fetch_array($result);
    $row1 = mysqli_fetch_array($result1);

    ?>
    <h1 style="color: white;"><?php echo($row['klubnev']);?><br></h1>
    <div id="btn">
    <div id="reg"><?php echo"A csapat ligája:";?><br>
    <a style="color: white"; href="index.php?page=league&id=<?php echo ($row['ligaid']); ?>">
    <?php echo($row['liganev']);?><br></a>
</div>
    <div id="reg"><?php echo"A csapat játékosai:";?><br>
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