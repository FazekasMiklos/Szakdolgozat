<?php
function setComments($conn){
    if (isset($_POST['submit'])){
    if (isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = $_POST['message'];
    $sql= "INSERT INTO velemenyek (userid,jatekosid,klubid,datum,szoveg) VALUES ('$uid','$id',NULL,'$date','$message')";
    $result = $conn->query($sql);
    }else if (isset($_GET['id2'])){
        $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql= "INSERT INTO velemenyek (userid,jatekosid,klubid,datum,szoveg) VALUES ('$uid',NULL,'$id2','$date','$message')";
        $result = $conn->query($sql);
        }
}
}
function getComments($conn){
    if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM velemenyek INNER JOIN felhasznalok ON (felhasznalok.userid=velemenyek.userid) WHERE jatekosid='$id' ORDER BY datum DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "<div class='container'>";
    if (isset($_SESSION['userid'])){
        if ($_SESSION['userid'] == $row['userid']){
    echo " <div class='adat2'>      
    <form method='POST' action='".deleteComments($conn)."'>
    <input type='hidden' name='id' value='".$row['velemenyid']."'>
    <button class='btn btn-link' style='color:white;' name='deletesubmit'>Törlés</button>
    </form>
    <form method='POST' action='index.php?page=editcomment'>
    <input type='hidden' name='id' value='".$row['velemenyid']."'>
    <input type='hidden' name='uid' value='".$row['userid']."'>
    <input type='hidden' name='date' value='".$row['datum']."'>
    <input type='hidden' name='message' value='".$row['szoveg']."'>
    <button class='btn btn-link' style='color:white;'>Módosítás</button>
    </form>
    </div>";
    }
}
    echo $row['felhasznalonev']."<br>";
    echo $row['datum']."<br>";
    echo $row['szoveg']."<br>";
    echo "</div>";
    }
}else if(isset($_GET['id2'])){
    $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
    $sql = "SELECT * FROM velemenyek INNER JOIN felhasznalok ON (felhasznalok.userid=velemenyek.userid) WHERE klubid='$id2' ORDER BY datum DESC";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()){
        echo "<div class='container'>";
        if (isset($_SESSION['userid'])){
            if ($_SESSION['userid'] == $row['userid']){
                echo "<div class='adat2'>        
        <form method='POST' action='".deleteComments($conn)."'>
        <input type='hidden' name='id' value='".$row['velemenyid']."'>
        <button class='btn btn-link' style='color:white;' name='deletesubmit'>Törlés</button>
        </form>      
        <form method='POST' action='index.php?page=editcomment'>
        <input type='hidden' name='id' value='".$row['velemenyid']."'>
        <input type='hidden' name='uid' value='".$row['userid']."'>
        <input type='hidden' name='date' value='".$row['datum']."'>
        <input type='hidden' name='message' value='".$row['szoveg']."'>
        <button class='btn btn-link' style='color:white;'>Módosítás</button>
        </form>
        </div>";
        }
    }
    echo $row['felhasznalonev']."<br>";
    echo $row['datum']."<br>";
    echo $row['szoveg']."<br>"."<br>";
    echo "</div>";
    }
}  
}
function editComments($conn){
    if(isset($_POST['editsubmit'])){
        $cid = $_POST['id'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql ="UPDATE velemenyek SET szoveg='$message' WHERE velemenyid='$cid'";
        $result = $conn->query($sql);
        header("Location: index.php?page=jatekos");

    }
}
function deleteComments($conn){
    if(isset($_POST['deletesubmit'])){
        $cid = $_POST['id'];
        $sql = "DELETE FROM velemenyek WHERE velemenyid='$cid'";
        $result = $conn->query($sql);

    }
}