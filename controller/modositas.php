<?php
//Egy kiválasztott játékos adatainak módosítása
if (!empty($_GET['id'])) {
    $result = $conn->query("SELECT * FROM orszagok");
    $result2 = $conn->query("SELECT * FROM klubbok");
    $result3 = $conn->query("SELECT * FROM posztok");
?>
    <form method='POST' enctype="multipart/form-data">
        <div id="btn">
            <div class="reg">
                <label>Országa:</label><br>
                <select name='orszag' class="form-control">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['orszagid'] . "'>" .
                            $row['orszagnev'] .
                            "</option>";
                    }
                    ?>
                </select><br>
                <label>Csapata:</label><br>
                <select name='csapat' class="form-control">
                    <?php
                    while ($row = $result2->fetch_assoc()) {
                        echo "<option value='" . $row['klubid'] . "'>" .
                            $row['klubnev'] .
                            "</option>";
                    }
                    ?>
                </select><br>
                <label>Posztja:</label><br>
                <select name='poszt' class="form-control">
                    <?php
                    while ($row = $result3->fetch_assoc()) {
                        echo "<option value='" . $row['pozid'] . "'>" .
                            $row['poznev'] .
                            "</option>";
                    }
                    ?>
                </select><br>
                <label>Neve:</label><br>
                <input type='text' name='nev' class="form-control" required /><br>
                <label>Születési dátuma:</label><br>
                <input type='date' name='datum' class="form-control" required /><br>
                <label>Mérkőzések száma:</label><br>
                <input type='number' name='merkozes' class="form-control" required /><br>
                <label>Gólok száma:</label><br>
                <input type='number' name='gol' class="form-control" /><br>
                <label>Gólpasszok száma:</label><br>
                <input type='text' name='golpassz' class="form-control" /><br>
                <label>Védések száma:</label><br>
                <input type='number' name='vedes' class="form-control" /><br><br>
                <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='jatekos' value="Módosítás" /><br>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['jatekos'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $orszag = $_POST['orszag'];
        $csapat = $_POST['csapat'];
        $poszt = $_POST['poszt'];
        $nev = $_POST['nev'];
        $datum = $_POST['datum'];
        $merkozes = $_POST['merkozes'];
        $gol = $_POST['gol'];
        $golpassz = $_POST['golpassz'];
        $vedes = $_POST['vedes'];
        $query = "UPDATE `jatekosok` SET  orszagid = '$orszag', klubid = '$csapat', pozid = '$poszt', nev = '$nev', szuletesidatum = '$datum', merkozesek = '$merkozes', golok = '$gol', golpasszok = '$golpassz', vedesek = '$vedes' WHERE jatekosid = '$id'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
        }
        header('Location: index.php?page=jatekos');
    }
}
//Egy kiválasztott csapat adatainak módosítása
if (!empty($_GET['id2'])) {
    $result = $conn->query("SELECT * FROM ligak");
    ?>
    <form method='POST' enctype="multipart/form-data">
        <div id="btn">
            <div class="reg">
                <label for="user">Neve:</label><br>
                <input type='text' name='nev' class="form-control" required /><br>
                <label>Ligája:</label><br>
                <select name='liga' class="form-control">
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ligaid'] . "'>" .
                            $row['liganev'] .
                            "</option>";
                    }
                    ?>
                </select><br><br>
                <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='csapat' value="Módosítás" /><br>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['csapat'])) {
        $id2 = mysqli_real_escape_string($conn, $_GET['id2']);
        $liga = $_POST['liga'];
        $nev = $_POST['nev'];
        $query = "UPDATE `klubbok` SET  klubnev = '$nev', ligaid = '$liga' WHERE klubid = '$id2'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
        }
        header('Location: index.php?page=csapat');
    }
}
//Egy kiválasztott liga adatainak módosítása
if (!empty($_GET['id3'])) {
    ?>
    <form method='POST' enctype="multipart/form-data">
        <div id="btn">
            <div class="reg">
                <label>Neve:</label><br>
                <input type='text' name='nev' class="form-control" required /><br><br>
                <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='liga' value="Módosítás" /><br>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['liga'])) {
        $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
        $nev = $_POST['nev'];
        $query = "UPDATE `ligak` SET  liganev = '$nev' WHERE klubid = '$id3'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
        }
        header('Location: index.php?page=liga');
    }
}
//Egy kiválasztott ország adatainak módosítása
if (!empty($_GET['id4'])) {
    ?>
    <form method='POST' enctype="multipart/form-data">
        <div id="btn">
            <div class="reg">
                <label>Neve:</label><br>
                <input type='text' name='nev' class="form-control" required /><br>
                <label>Ranglista helyezése:</label><br>
                <input type='number' name='ranglista' class="form-control" required /><br><br>
                <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='orszag' value="Módosítás" /><br>
            </div>
        </div>
    </form>
<?php
    if (isset($_POST['orszag'])) {
        $id4 = mysqli_real_escape_string($conn, $_GET['id4']);
        $nev = $_POST['nev'];
        $ranglista = $_POST['ranglista'];
        $query = "UPDATE `orszagok` SET  orszagnev = '$nev', ranglista = '$ranglista' WHERE orszagid = '$id4'";
        $result = mysqli_query($conn, $query);
        if ($query) {
            echo "<p style='color:white;'>Sikeresen módosítva a felhasználó!</p>";
        } else {
            echo "<p style='color:white;'>Hiba történt a felhasználó módosítása közben.</p>";
        }
        header('Location: index.php?page=orszag');
    }
}
?>