<?php
$sql = "SELECT * FROM felhasznalok";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
      $userid = $row['userid'];

      $sqlImg = "SELECT profilkep FROM felhasznalok WHERE userid='$userid'";
      $resultImg = mysqli_query($conn, $sqlImg);
     }
    }
if (isset($_SESSION['userid'])) {
 echo "You are logged in!";

 echo '<form action="index.php?page=uploaddd" method="post" 
 enctype="multipart/form-data">
   <input type="file" name="file">
   <button type="submit" name="submit">UPLOAD FILE</button>
 </form>';
}
else {
 echo "You are not logged in!";

}
?>