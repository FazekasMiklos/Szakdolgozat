<?php     
    require 'includes/db.inc.php';  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
          
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "select * from felhasznalok where felhasznalonev = '$username' and jelszo = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "Bejelentkezés sikeres";  
        }  
        else{  
            echo "Bejelentkezés sikertelen. Helytelen felhasználónév vagy jelszó.";  
        }     
?>  