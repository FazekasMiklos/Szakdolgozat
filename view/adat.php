<div id = "reg">
<?php 
if(!empty($_SESSION["userid"])) { 
    ?>
    <?php
$result = $conn->query("SELECT * FROM felhasznalok as f INNER JOIN profilkepek as p ON (f.userid = p.userid) WHERE f.userid = '".$_SESSION['userid']."'");
while($row = $result->fetch_assoc()){
    echo"Profilkép:";
    ?> 
    <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" width="100"/><br><br>
    <?php
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
<a style="color: white"; href="index.php?page=profilepic" title="Profile">Profilkép módosítása<br><br></a>
</div>