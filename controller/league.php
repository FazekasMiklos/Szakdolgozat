<!DOCTYPE html>
<html lang="HU">
<head>
<link rel = "stylesheet" type = "text/css" href = "style.css">
</head>
<body>

<?php
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM klubbok INNER JOIN ligak ON (ligak.ligaid = klubbok.ligaid) WHERE ligak.ligaid='$id'";
    $result = mysqli_query($conn,$sql) or die;
    $row = mysqli_fetch_array($result);

    ?>
    <h1 style="color: white;"><?php echo($row['liganev']);?><br></h1>
    <div id="btn">
    <div id="reg"><?php echo"A liga csapatai:";?><br>
    <a style="color: white"; href="index.php?page=team&id=<?php echo ($row['klubid']); ?>">
    <?php
    echo($row['klubnev'])."<br>";
    while($row = $result->fetch_assoc()){
    ?></a>
    <a style="color: white"; href="index.php?page=team&id=<?php echo ($row['klubid']); ?>">
    <?php echo($row['klubnev']);?><br></a>
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