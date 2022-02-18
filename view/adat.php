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
    echo"Jelszó:"; 
     echo $row['jelszo']."<br>"."<br>";
     echo"Email:"; 
     echo $row['email']."<br>"."<br>";
}
?>
<?php
}
?>
<a href="index.php?page=profile" title="Profile">Adatok módosítása<br><br></a> 
</div>