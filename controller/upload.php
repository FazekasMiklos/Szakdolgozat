<?php
$userid = $_SESSION['userid'];
// File upload path
$targetDir = "kepek/profilkepek";
$profilkep = basename($_FILES['profilkep']);
$targetFilePath = $targetDir . $profilkep;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES['profilkep'])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["profilkep"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $query = "INSERT into felhasznalok (profilkep) VALUES ('$profilkep')";
            $result = mysqli_query($conn,$query);
            if($query){
                echo "The file ".$profilkep." has been uploaded successfully.";
            }else{
                echo "File upload failed, please try again.";
            } 
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    echo 'Please select a file to upload.';
}


include 'view/feltoltes.php';
?>