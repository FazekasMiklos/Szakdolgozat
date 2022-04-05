<!DOCTYPE html>
<html lang="HU">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php
    //játékos hozzáadása
    if (isset($_POST['jatekosfelvitel'])) {
        $result = $conn->query("SELECT * FROM orszagok");
        $result2 = $conn->query("SELECT * FROM klubbok");
        $result3 = $conn->query("SELECT * FROM posztok");
    ?>
        <form method='POST' enctype="multipart/form-data">
            <div id="btn">
                <div id="reg">
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
                    <label>Neve:</label><br />
                    <input type='text' name='nev' class="form-control" required /><br>
                    <label>Születési dátuma:</label><br>
                    <input type='date' name='datum' class="form-control" required /><br>
                    <label>Mérkőzések száma:</label><br />
                    <input type='number' name='merkozes' class="form-control" required /><br>
                    <label>Gólok száma:</label><br>
                    <input type='number' name='gol' class="form-control" /><br>
                    <label>Gólpasszok száma:</label><br>
                    <input type='text' name='golpassz' class="form-control" /><br>
                    <label>Védések száma:</label><br>
                    <input type='number' name='vedes' class="form-control" /><br><br>
                    <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='jatekoshozzaadas' value="Hozzáadás" /><br>
                </div>
            </div>
        </form>
    <?php
    }
    if (isset($_POST['jatekoshozzaadas'])) {
        $orszag = $_POST['orszag'];
        $csapat = $_POST['csapat'];
        $poszt = $_POST['poszt'];
        $nev = $_POST['nev'];
        $datum = $_POST['datum'];
        $merkozes = $_POST['merkozes'];
        $gol = $_POST['gol'];
        $golpassz = $_POST['golpassz'];
        $vedes = $_POST['vedes'];
        $query = "INSERT INTO jatekosok (orszagid,klubid,pozid,nev,szuletesidatum,merkozesek,golok,golpasszok,vedesek) VALUES ('$orszag','$csapat','$poszt','$nev','$datum','$merkozes','$gol','$golpassz','$vedes')";
        $result = mysqli_query($conn, $query);
        header('Location: index.php?page=jatekos');
    }
    ?>
    <?php
    //csapat hozzáadása
    if (isset($_POST['csapatfelvitel'])) {
        $result = $conn->query("SELECT * FROM ligak");
    ?>
        <form method='POST' enctype="multipart/form-data">
            <div id="btn">
                <div id="reg">
                    <label>Ligája:</label><br>
                    <select name='liga' class="form-control">
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['ligaid'] . "'>" .
                                $row['liganev'] .
                                "</option>";
                        }
                        ?>
                    </select><br>
                    <label>Neve:</label><br>
                    <input type='text' name='nev' class="form-control" required /><br><br>
                    <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='csapathozzaadas' value="Hozzáadás" /><br>
                </div>
            </div>
        </form>
    <?php
    }
    if (isset($_POST['csapathozzaadas'])) {
        $liga = $_POST['liga'];
        $nev = $_POST['nev'];
        $query = "INSERT INTO klubbok (klubnev,ligaid) VALUES ('$nev','$liga')";
        $result = mysqli_query($conn, $query);
        header('Location: index.php?page=csapat');
    }
    ?>
    <?php
    //liga hozzáadása
    if (isset($_POST['ligafelvitel'])) {
        $result = $conn->query("SELECT * FROM orszagok");
    ?>
        <form method='POST' enctype="multipart/form-data">
            <div id="btn">
                <div id="reg">
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
                    <label>Neve:</label><br>
                    <input type='text' name='nev' class="form-control" required /><br>
                    <label>Logója:</label><br>
                    <input type='file' name='logo' required /><br><br>
                    <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='ligahozzaadas' value="Hozzáadás" /><br>
                </div>
            </div>
        </form>
    <?php
    }
    if (isset($_POST['ligahozzaadas'])) {
        $orszag = $_POST['orszag'];
        $nev = $_POST['nev'];
        $logo = $_FILES['logo']['tmp_name'];
        $logo = addslashes(file_get_contents($logo));
        $query = "INSERT INTO ligak (liganev,orszagid,logo) VALUES ('$nev','$orszag','$logo')";
        $result = mysqli_query($conn, $query);
        header('Location: index.php?page=liga');
    }
    ?>
    <?php
    //ország hozzáadása
    if (isset($_POST['orszagfelvitel'])) {
    ?>
        <form method='POST' enctype="multipart/form-data">
            <div id="btn">
                <div id="reg">
                    <label>Ország ID:</label><br>
                    <input type='text' name='id' class="form-control" required /><br>
                    <label>Neve:</label><br />
                    <input type='text' name='nev' class="form-control" required /><br>
                    <label>Ranglista helyezése:</label><br>
                    <input type='number' name='ranglista' class="form-control" required /><br>
                    <label>Zászlaja:</label><br>
                    <input type='file' name='zaszlo' required /><br><br>
                    <input type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='orszaghozzaadas' value="Hozzáadás" /><br>
                </div>
            </div>
        </form>
    <?php
    }
    if (isset($_POST['orszaghozzaadas'])) {
        $id = $_POST['id'];
        $nev = $_POST['nev'];
        $ranglista = $_POST['ranglista'];
        $zaszlo = $_FILES['zaszlo']['tmp_name'];
        $zaszlo = addslashes(file_get_contents($zaszlo));
        $query = "INSERT INTO orszagok (orszagid,orszagnev,ranglista,zaszlok) VALUES ('$id','$nev','$ranglista','$zaszlo')";
        $result = mysqli_query($conn, $query);
        header('Location: index.php?page=orszag');
    }
    ?>
</body>

</html>