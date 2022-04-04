<?php
function setFavorites($conn){
    if (isset($_POST['kedvenc'])){
        if (isset($_SESSION['userid'])){
            if (isset($_GET['id'])){
                $id = mysqli_real_escape_string($conn, $_GET['id']);
                $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE jatekosid = '".$_GET['id']."' AND userid = '".$_SESSION["userid"]."'");
                if(mysqli_num_rows($kedvenctorles)) {
                    $sql2= "DELETE FROM `kedvencek` WHERE jatekosid = '".$_GET['id']."' AND userid = '".$_SESSION["userid"]."'";
                    $result2 = $conn->query($sql2);
                }else{
                    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["userid"]."','$id',NULL,NULL,NULL)";
                    $result = $conn->query($sql);
                }

            }else if (isset($_GET['id2'])){
                $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
                $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE klubid = '".$_GET['id2']."' AND userid = '".$_SESSION["userid"]."'");
                if(mysqli_num_rows($kedvenctorles)) {
                    $sql2= "DELETE FROM `kedvencek` WHERE klubid = '".$_GET['id2']."' AND userid = '".$_SESSION["userid"]."'";
                    $result2 = $conn->query($sql2);
                }else{
                    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["userid"]."',NULL,NULL,NULL,'$id2')";
                    $result = $conn->query($sql);
                }
            }else if (isset($_GET['id3'])){
                $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
                $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE ligaid = '".$_GET['id3']."' AND userid = '".$_SESSION["userid"]."'");
                if(mysqli_num_rows($kedvenctorles)) {
                    $sql2= "DELETE FROM `kedvencek` WHERE ligaid = '".$_GET['id3']."' AND userid = '".$_SESSION["userid"]."'";
                    $result2 = $conn->query($sql2);
                }else{
                    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["userid"]."',NULL,'$id3',NULL,NULL)";
                    $result = $conn->query($sql);
                }
            }else if (isset($_GET['id4'])){
                $id4 = mysqli_real_escape_string($conn, $_GET['id4']);
                $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE orszagid = '".$_GET['id4']."' AND userid = '".$_SESSION["userid"]."'");
                if(mysqli_num_rows($kedvenctorles)) {
                    $sql2= "DELETE FROM `kedvencek` WHERE orszagid = '".$_GET['id4']."' AND userid = '".$_SESSION["userid"]."'";
                    $result2 = $conn->query($sql2);
                }else{
                    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["userid"]."',NULL,NULL,'$id4',NULL)";
                    $result = $conn->query($sql);
                }
            }
        }
        if (isset($_SESSION['admin'])){
            if (isset($_GET['id'])){
                $id = mysqli_real_escape_string($conn, $_GET['id']);
                $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE jatekosid = '".$_GET['id']."' AND userid = '".$_SESSION["admin"]."'");
                if(mysqli_num_rows($kedvenctorles)) {
                    $sql2= "DELETE FROM `kedvencek` WHERE jatekosid = '".$_GET['id']."' AND userid = '".$_SESSION["admin"]."'";
                    $result2 = $conn->query($sql2);
                }else{
                    $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["admin"]."','$id',NULL,NULL,NULL)";
                    $result = $conn->query($sql);
                }

                }else if (isset($_GET['id2'])){
                    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
                    $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE klubid = '".$_GET['id2']."' AND userid = '".$_SESSION["admin"]."'");
                    if(mysqli_num_rows($kedvenctorles)) {
                        $sql2= "DELETE FROM `kedvencek` WHERE klubid = '".$_GET['id2']."' AND userid = '".$_SESSION["admin"]."'";
                        $result2 = $conn->query($sql2);
                    }else{
                        $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["admin"]."',NULL,NULL,NULL,'$id2')";
                        $result = $conn->query($sql);
                    }
                }else if (isset($_GET['id3'])){
                    $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
                    $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE ligaid = '".$_GET['id3']."' AND userid = '".$_SESSION["admin"]."'");
                    if(mysqli_num_rows($kedvenctorles)) {
                        $sql2= "DELETE FROM `kedvencek` WHERE ligaid = '".$_GET['id3']."' AND userid = '".$_SESSION["admin"]."'";
                        $result2 = $conn->query($sql2);
                    }else{
                        $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["admin"]."',NULL,'$id3',NULL,NULL)";
                        $result = $conn->query($sql);
                    }
                }else if (isset($_GET['id4'])){
                    $id4 = mysqli_real_escape_string($conn, $_GET['id4']);
                    $kedvenctorles = mysqli_query($conn, "SELECT * FROM kedvencek WHERE orszagid = '".$_GET['id4']."' AND userid = '".$_SESSION["admin"]."'");
                    if(mysqli_num_rows($kedvenctorles)) {
                        $sql2= "DELETE FROM `kedvencek` WHERE orszagid = '".$_GET['id4']."' AND userid = '".$_SESSION["admin"]."'";
                        $result2 = $conn->query($sql2);
                    }else{
                        $sql= "INSERT INTO kedvencek (userid,jatekosid,ligaid,orszagid,klubid) VALUES ('".$_SESSION["admin"]."',NULL,NULL,'$id4',NULL)";
                        $result = $conn->query($sql);
                    }
                }
        }
    }
}
function getFavorites($conn){
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM kedvencek WHERE jatekosid='$id'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            if(mysqli_num_rows($result)) {
                if (isset($_SESSION['userid'])){
                    if ($_SESSION['userid'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
                if (isset($_SESSION['admin'])){
                    if ($_SESSION['admin'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
            }
        }
    }else if(isset($_GET['id2'])){
        $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
        $sql = "SELECT * FROM kedvencek WHERE klubid='$id2'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            if(mysqli_num_rows($result)) {
                if (isset($_SESSION['userid'])){
                    if ($_SESSION['userid'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
                if (isset($_SESSION['admin'])){
                    if ($_SESSION['admin'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
            }
        }
    }else if(isset($_GET['id3'])){
        $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
        $sql = "SELECT * FROM kedvencek WHERE ligaid='$id3'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            if(mysqli_num_rows($result)) {
                if (isset($_SESSION['userid'])){
                    if ($_SESSION['userid'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
                if (isset($_SESSION['admin'])){
                    if ($_SESSION['admin'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
            }
        }
    }else if(isset($_GET['id4'])){
        $id4 = mysqli_real_escape_string($conn, $_GET['id4']);
        $sql = "SELECT * FROM kedvencek WHERE orszagid='$id4'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()){
            if(mysqli_num_rows($result)) {
                if (isset($_SESSION['userid'])){
                    if ($_SESSION['userid'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
                if (isset($_SESSION['admin'])){
                    if ($_SESSION['admin'] == $row['userid']){
                    echo "<i class='fas fa-star star-light mr-1 main_star' style='font-size:30px;'></i>";
                    }
                }
            }
        }   
    }
}
?>