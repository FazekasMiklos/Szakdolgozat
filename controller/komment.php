<?php
//A beírt szöveg eltárolása 
function setComments($conn)
{
    if (isset($_POST['submit'])) {
        if (!empty($_SESSION["userid"])) {
            if (isset($_GET['id'])) {
                $id = mysqli_real_escape_string($conn, $_GET['id']);
                $date = $_POST['date'];
                $message = $_POST['message'];
                $sql = "INSERT INTO velemenyek (userid,jatekosid,klubid,ligaid,datum,szoveg) VALUES ('" . $_SESSION["userid"] . "','$id',NULL,NULL,'$date','$message')";
                $result = $conn->query($sql);
            } else if (isset($_GET['id2'])) {
                $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
                $date = $_POST['date'];
                $message = $_POST['message'];
                $sql = "INSERT INTO velemenyek (userid,jatekosid,klubid,ligaid,datum,szoveg) VALUES ('" . $_SESSION["userid"] . "',NULL,'$id2',NULL,'$date','$message')";
                $result = $conn->query($sql);
            } else if (isset($_GET['id3'])) {
                $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
                $date = $_POST['date'];
                $message = $_POST['message'];
                $sql = "INSERT INTO velemenyek (userid,jatekosid,klubid,ligaid,datum,szoveg) VALUES ('" . $_SESSION["userid"] . "',NULL,NULL,'$id3','$date','$message')";
                $result = $conn->query($sql);
            }
        }
        if (!empty($_SESSION["admin"])) {
            if (isset($_GET['id'])) {
                $id = mysqli_real_escape_string($conn, $_GET['id']);
                $date = $_POST['date'];
                $message = $_POST['message'];
                $sql = "INSERT INTO velemenyek (userid,jatekosid,klubid,ligaid,datum,szoveg) VALUES ('" . $_SESSION["admin"] . "','$id',NULL,NULL,'$date','$message')";
                $result = $conn->query($sql);
            } else if (isset($_GET['id2'])) {
                $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
                $date = $_POST['date'];
                $message = $_POST['message'];
                $sql = "INSERT INTO velemenyek (userid,jatekosid,klubid,ligaid,datum,szoveg) VALUES ('" . $_SESSION["admin"] . "',NULL,'$id2',NULL,'$date','$message')";
                $result = $conn->query($sql);
            } else if (isset($_GET['id3'])) {
                $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
                $date = $_POST['date'];
                $message = $_POST['message'];
                $sql = "INSERT INTO velemenyek (userid,jatekosid,klubid,ligaid,datum,szoveg) VALUES ('" . $_SESSION["admin"] . "',NULL,NULL,'$id3','$date','$message')";
                $result = $conn->query($sql);
            }
        }
    }
}
//A beírt szöveg megjelenítése
function getComments($conn)
{
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM felhasznalok INNER JOIN velemenyek ON (felhasznalok.userid=velemenyek.userid) INNER JOIN profilkepek ON (felhasznalok.userid=profilkepek.userid) WHERE jatekosid='$id' ORDER BY datum DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='container'>";
            if (isset($_SESSION['userid'])) {
                if ($_SESSION['userid'] == $row['userid']) {
                    echo "<div class='adat2'>      
    <form method='POST' action='" . deleteComments($conn) . "'>
    <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
    <button class='btn btn-link' style='color:white;' name='deletesubmit'><i class='fas fa-trash'></i></button>
    </form>
    </div>
    <div class='adat3'> 
    <form method='POST' action='index.php?page=editcomment'>
    <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
    <input type='hidden' name='uid' value='" . $row['userid'] . "'>
    <input type='hidden' name='date' value='" . $row['datum'] . "'>
    <input type='hidden' name='message' value='" . $row['szoveg'] . "'>
    <button class='btn btn-link' style='color:white;'><i class='fas fa-pencil'></i></button>
    </form>
    </div>";
                }
            }
            if (isset($_SESSION['admin'])) {
                echo "<div class='adat2'>      
<form method='POST' action='" . deleteComments($conn) . "'>
<input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
<button class='btn btn-link' style='color:white;' name='deletekomment'><i class='fas fa-trash'></i></button>
</form>
</div>";
            }
?>
            <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="60" height="60" />
        <?php
            echo $row['felhasznalonev'] . "<br>";
            echo $row['datum'] . "<br>";
            echo $row['szoveg'] . "<br>" . "<br>";
            echo "</div>";
        }
    } else if (isset($_GET['id2'])) {
        $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
        $sql = "SELECT * FROM felhasznalok INNER JOIN velemenyek ON (felhasznalok.userid=velemenyek.userid) INNER JOIN profilkepek ON (felhasznalok.userid=profilkepek.userid) WHERE klubid='$id2' ORDER BY datum DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='container'>";
            if (isset($_SESSION['userid'])) {
                if ($_SESSION['userid'] == $row['userid']) {
                    echo "<div class='adat2'>        
        <form method='POST' action='" . deleteComments($conn) . "'>
        <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
        <button class='btn btn-link' style='color:white;' name='deletesubmit'><i class='fas fa-trash'></i></button>
        </form>
        </div>
        <div class='adat3'>      
        <form method='POST' action='index.php?page=editcomment'>
        <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
        <input type='hidden' name='uid' value='" . $row['userid'] . "'>
        <input type='hidden' name='date' value='" . $row['datum'] . "'>
        <input type='hidden' name='message' value='" . $row['szoveg'] . "'>
        <button class='btn btn-link' style='color:white;'><i class='fas fa-pencil'></i></button>
        </form>
        </div>";
                }
            }
            if (isset($_SESSION['admin'])) {
                echo "<div class='adat2'>      
        <form method='POST' action='" . deleteComments($conn) . "'>
        <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
        <button class='btn btn-link' style='color:white;' name='deletekomment'><i class='fas fa-trash'></i></button>
        </form>
        </div>";
            }
        ?>
            <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="60" height="60" />
        <?php
            echo $row['felhasznalonev'] . "<br>";
            echo $row['datum'] . "<br>";
            echo $row['szoveg'] . "<br>" . "<br>";
            echo "</div>";
        }
    } else if (isset($_GET['id3'])) {
        $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
        $sql = "SELECT * FROM felhasznalok INNER JOIN velemenyek ON (felhasznalok.userid=velemenyek.userid) INNER JOIN profilkepek ON (felhasznalok.userid=profilkepek.userid) WHERE ligaid='$id3' ORDER BY datum DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo "<div class='container'>";
            if (isset($_SESSION['userid'])) {
                if ($_SESSION['userid'] == $row['userid']) {
                    echo "<div class='adat2'>        
        <form method='POST' action='" . deleteComments($conn) . "'>
        <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
        <button class='btn btn-link' style='color:white;' name='deletesubmit'><i class='fas fa-trash'></i></button>
        </form>
        </div>
        <div class='adat3'>      
        <form method='POST' action='index.php?page=editcomment'>
        <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
        <input type='hidden' name='uid' value='" . $row['userid'] . "'>
        <input type='hidden' name='date' value='" . $row['datum'] . "'>
        <input type='hidden' name='message' value='" . $row['szoveg'] . "'>
        <button class='btn btn-link' style='color:white;'><i class='fas fa-pencil'></i></button>
        </form>
        </div>";
                }
            }
            if (isset($_SESSION['admin'])) {
                echo "<div class='adat2'>      
        <form method='POST' action='" . deleteComments($conn) . "'>
        <input type='hidden' name='id' value='" . $row['velemenyid'] . "'>
        <button class='btn btn-link' style='color:white;' name='deletekomment'><i class='fas fa-trash'></i></button>
        </form>
        </div>";
            }
        ?>
            <img src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="60" height="60" />
<?php
            echo $row['felhasznalonev'] . "<br>";
            echo $row['datum'] . "<br>";
            echo $row['szoveg'] . "<br>" . "<br>";
            echo "</div>";
        }
    }
}
//A beírt szöveg módosítása
function editComments($conn)
{
    if (isset($_POST['editsubmit'])) {
        $cid = $_POST['id'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "UPDATE velemenyek SET szoveg='$message', datum='$date' WHERE velemenyid='$cid' AND userid='" . $_SESSION["userid"] . "'";
        $result = $conn->query($sql);
        header('Location: index.php?page=index');
    }
}
//A beírt szöveg törlése
function deleteComments($conn)
{
    if (isset($_POST['deletesubmit'])) {
        if (isset($_SESSION['userid'])) {
            $cid = $_POST['id'];
            $sql = "DELETE FROM velemenyek WHERE velemenyid='$cid' AND userid='" . $_SESSION["userid"] . "'";
            $result = $conn->query($sql);
            header('Location: index.php?page=player&id=' . $_GET["id"] . '');
        }
        if (isset($_GET['id2'])) {
            $cid = $_POST['id'];
            $sql = "DELETE FROM velemenyek WHERE velemenyid='$cid' AND userid='" . $_SESSION["userid"] . "'";
            $result = $conn->query($sql);
            header('Location: index.php?page=team&id2=' . $_GET["id2"] . '');
        }
        if (isset($_GET['id3'])) {
            $cid = $_POST['id'];
            $sql = "DELETE FROM velemenyek WHERE velemenyid='$cid' AND userid='" . $_SESSION["userid"] . "'";
            $result = $conn->query($sql);
            header('Location: index.php?page=league&id3=' . $_GET["id3"] . '');
        }
    }
    if (isset($_POST['deletekomment'])) {
        if (isset($_GET['id'])) {
            $cid = $_POST['id'];
            $sql = "DELETE FROM velemenyek WHERE velemenyid='$cid'";
            $result = $conn->query($sql);
            header('Location: index.php?page=player&id=' . $_GET["id"] . '');
        }
        if (isset($_GET['id2'])) {
            $cid = $_POST['id'];
            $sql = "DELETE FROM velemenyek WHERE velemenyid='$cid'";
            $result = $conn->query($sql);
            header('Location: index.php?page=team&id2=' . $_GET["id2"] . '');
        }
        if (isset($_GET['id3'])) {
            $cid = $_POST['id'];
            $sql = "DELETE FROM velemenyek WHERE velemenyid='$cid'";
            $result = $conn->query($sql);
            header('Location: index.php?page=league&id3=' . $_GET["id3"] . '');
        }
    }
}
?>