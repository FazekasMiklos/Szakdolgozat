<?php
$sql = "SELECT * FROM felhasznalok";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
     while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['userid'];

      $sqlImg = "SELECT * FROM profilkepek WHERE userid='$id'";
      $resultImg = mysqli_query($conn, $sqlImg);
      while ($rowImg = mysqli_fetch_assoc($resultImg)) {

        echo "<div>";

          if ($rowImg['status'] == 0) {
            echo "<img src='kepek/profilkepek/profile".$id.".jpg'>";
          }

          else {
            echo "<img src='kepek/profilkepek/profilkep.jpg'>";
          }

          echo "<p>".$row['felhasznalonev']."</p>";
        echo "</div>";
      }
    }
  }
  else {
    echo "There are no users!";
  }
  if (isset($_SESSION['userid'])) {
    echo "You are logged in!";

    echo '<form action="index.php?page=upload" method="post" 
    enctype="multipart/form-data">
      <input type="file" name="file">
      <button type="submit" name="submit">UPLOAD FILE</button>
    </form>';
  }
  else {
    echo "You are not logged in!";

  }
?>
<?php
$id = $_SESSION['userid'];


if (isset($_POST['upload'])) {

$file = $_FILES['file'];
$fileName = $file['name'];
$fileType = $file['type'];
$fileTempName = $file['tmp_name'];
$fileError = $file['error'];
$fileSize = $file['size'];
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));
$allowed = array("jpg", "jpeg", "png", "pdf");


if (in_array($fileActualExt, $allowed)) {

  if ($fileError === 0) {

    if ($fileSize < 500000) {
      $fileNameNew = "profile".$id.".".$fileActualExt;
      $fileDestination = 'kepek/profilkepek/'.$fileNameNew;
      move_uploaded_file($fileTmpName, $fileDestination);

      $sql = "UPDATE profilkepek SET status=0 WHERE userid='$id';";
      $result = mysqli_query($conn, $sql);

      header("Location: index.php?page=index");
    }
    else {
      echo "Your file is too big!";
    }
  }
  else {
    echo "There was an error uploading your file, try again!";
  }
}
else {
  echo "You cannot upload files of this type!";
}
 }
?>
