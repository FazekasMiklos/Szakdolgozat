<?php
$userid=$_SESSION['userid'];
if(isset($_POST['igen'])){
$query = "DELETE FROM `profilkepek` WHERE userid = '$userid'";
$result = mysqli_query($conn,$query);
            if ($query) {
                echo "<p style='color:white;'>Sikeresen törölve a profilkép!</p>";
            } else {
                echo "<p style='color:white;'>Hiba történt a profilkép törlése közben.</p>";
            }
header('Location: index.php?page=adatok');
        }
        if(isset($_POST['nem'])){
            header('Location: index.php?page=adatok');
        }  
        include 'view/profilkeptorles.php';     
?>