<div id="btn">
<?php
$result = $conn->query("SELECT * FROM felhasznalok INNER JOIN profilkepek ON (profilkepek.userid=felhasznalok.userid) WHERE NOT felhasznalok.userid = '".$_SESSION["admin"]."'");
while($row = $result->fetch_assoc()){
    ?>
          <div id="reg">
          <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="100" height="100"/><br>
          <?php echo($row['felhasznalonev']);?><br>
          <?php echo($row['email']);?><br>
          <?php echo($row['level']);?><br>
          <a style="color: white"; href="index.php?page=felhasznalok&id=<?php echo ($row['userid']); ?>">Profil törlés</a><br>
          <a style="color: white"; href="index.php?page=felhasznalok&id3=<?php echo ($row['userid']); ?>">Profilkép törlés</a><br>
          <a style="color: white"; href="index.php?page=felhasznalok&id2=<?php echo ($row['userid']); ?>">Admin jogosultság hozzáadása/elvétele</a>
</div>
<?php
}
if (!empty($_GET['id2'])){
$id2=$_GET['id2'];
$sql = "SELECT * FROM felhasznalok WHERE userid = '$id2'";
$result2 = $conn->query($sql);
if($row = $result2->fetch_assoc()) {
    if($row["level"]=="admin"){
$sql2 = "UPDATE felhasznalok SET level = 'user' WHERE userid = '$id2'";
$result3 = mysqli_query($conn,$sql2);
}else{
$sql3 = "UPDATE felhasznalok SET level = 'admin' WHERE userid = '$id2'";
$result4 = mysqli_query($conn,$sql3);
}
}
header('Location: index.php?page=felhasznalok');
}
if (!empty($_GET['id'])){
    $id=$_GET['id'];
    $sql = "DELETE FROM felhasznalok WHERE userid = '$id'";
    $result = $conn->query($sql);
    header('Location: index.php?page=felhasznalok');
    }
    if (!empty($_GET['id3'])){
    $id3=$_GET['id3'];
    $sql = "DELETE FROM profilkepek WHERE userid = '$id3'";
    $result = $conn->query($sql);
    $sql2 = "INSERT INTO profilkepek (userid, name, size) VALUES ('$id3','profilkep.jpg', NULL)";
    $result2 = $conn->query($sql2);
    header('Location: index.php?page=felhasznalok');
    } 
?>
</div>