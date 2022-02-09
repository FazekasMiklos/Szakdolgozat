<?php
$userid = $_SESSION['userid'];


if (isset($_POST['upload'])) {

$file = $_FILES['profilkep'];
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

      $sql = "UPDATE felhasznalok SET profilkep = '$profilkep' WHERE userid='$userid';";
      $result = mysqli_query($conn, $sql);

      header("Location: index.php?page=uploadd");
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
