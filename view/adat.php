<div id = "btn">
    <?php
$result = $conn->query("SELECT * FROM felhasznalok as f INNER JOIN profilkepek as p ON (f.userid = p.userid) WHERE f.userid = '".$_SESSION['userid']."'");
while($row = $result->fetch_assoc()){
    echo"Profilkep:"; 
    echo $row['name'] . "<br />";
     echo"Felhasználónév:"; 
    echo $row['felhasznalonev'] . "<br />";
    echo"Jelszó:"; 
     echo $row['jelszo'] . "<br />";
     echo"Email:"; 
     echo $row['email'] . "<br />";
}
?>
</div>