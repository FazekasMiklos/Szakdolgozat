<?php
$userid=$_SESSION['userid'];
if(isset($_POST['igen'])){
$query = "DELETE FROM `felhasznalok` WHERE userid = '$userid'";
$result = mysqli_query($conn,$query);
            if ($query) {
                echo "<p style='color:white;'>Sikeresen törölve a felhasználó!</p>";
            } else {
                echo "<p style='color:white;'>Hiba történt a felhasználó törlése közben.</p>";
            }
unset($_SESSION["userid"]);
unset($_SESSION["felhasznalonev"]);
header('Location: index.php?page=index');
        }
        if(isset($_POST['nem'])){
            header('Location: index.php?page=adatok');
        }  
        include 'view/profiltorles.php';     
?>