<meta name="viewport" content="width=device-width, initial-scale=1">
<div id = "reg">
<?php 
if(!empty($_SESSION["userid"])) { 
    ?>
    <?php
$result = $conn->query("SELECT * FROM felhasznalok WHERE userid = '".$_SESSION['userid']."'");
$result1 = $conn->query("SELECT * FROM profilkepek INNER JOIN felhasznalok ON (felhasznalok.userid=profilkepek.userid) WHERE felhasznalok.userid = '".$_SESSION['userid']."'");

while($row = $result1->fetch_assoc()){
    echo"Profilkép:";
    ?> 
    <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" width="100"/><br><br>
    <?php
    }
    ?>
    <?php
    while($row = $result->fetch_assoc()){
     echo"Felhasználónév:"; 
    echo $row['felhasznalonev'] ."<br>"."<br>";
     echo"Email:"; 
     echo $row['email']."<br>"."<br>";
}
?>
<?php
}
?>
<a style="color: white"; href="index.php?page=profile" title="Profile">Adatok módosítása<br><br></a>
<a style="color: white"; href="index.php?page=profilepicdelete" title="Profile">Profilkép törlése<br><br></a>
<a style="color: white"; href="index.php?page=profiledelete" title="Profile">Profil törlése<br><br></a>
</div>