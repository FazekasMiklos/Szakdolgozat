<!DOCTYPE html>
<html lang="HU">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div id="reg">
        <?php
        //játékos lista gólok alapján
        if (isset($_POST['jatekosgollista'])) {
            $sql = "SELECT * from jatekosok WHERE NOT pozid LIKE 'KA' ORDER BY golok DESC";
            $result = $conn->query($sql) or die;
            echo "<span class='float-left'>Neve</span>";
            echo "<span class='float-right'>Gólok száma</span>";
            echo "<br>";
            while ($row = $result->fetch_assoc()) {
                echo "<span class='float-left'>";
        ?>
                <a style="color: white" ; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
                    <?php
                    echo ($row['nev']);
                    ?>
                </a>
            <?php
                echo "</span>";
                echo "<span class='float-right'>";
                echo ($row['golok']);
                echo "</span>";
                echo "<br>";
            }
        }
        //játékos lista gólpasszok alapján
        if (isset($_POST['jatekosassistlista'])) {
            $sql = "SELECT * from jatekosok WHERE NOT pozid LIKE 'KA' ORDER BY golpasszok DESC";
            $result = $conn->query($sql) or die;
            echo "<span class='float-left'>Neve</span>";
            echo "<span class='float-right'>Gólpasszok száma</span>";
            echo "<br>";
            while ($row = $result->fetch_assoc()) {
                echo "<span class='float-left'>";
            ?>
                <a style="color: white" ; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
                    <?php
                    echo ($row['nev']);
                    ?>
                </a>
            <?php
                echo "</span>";
                echo "<span class='float-right'>";
                echo ($row['golpasszok']);
                echo "</span>";
                echo "<br>";
            }
        }
        //játékos lista védések alapján
        if (isset($_POST['jatekosvedeslista'])) {
            $sql = "SELECT * from jatekosok WHERE pozid LIKE 'KA' ORDER BY vedesek DESC";
            $result = $conn->query($sql) or die;
            echo "<span class='float-left'>Neve</span>";
            echo "<span class='float-right'>Védések száma</span>";
            echo "<br>";
            while ($row = $result->fetch_assoc()) {
                echo "<span class='float-left'>";
            ?>
                <a style="color: white" ; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
                    <?php
                    echo ($row['nev']);
                    ?>
                </a>
            <?php
                echo "</span>";
                echo "<span class='float-right'>";
                echo ($row['vedesek']);
                echo "</span>";
                echo "<br>";
            }
        }
        //ország lista világranglista helyezés alapján
        if (isset($_POST['ranglista'])) {
            $sql = "SELECT * from orszagok ORDER BY ranglista";
            $result = $conn->query($sql) or die;
            echo "<span class='float-left' style='color:white;'>Neve</span>";
            echo "<span class='float-right' style='color:white;'>Világ ranglista helyezés</span>";
            echo "<br>";
            while ($row = $result->fetch_assoc()) {
                echo "<span class='float-left'>";
            ?>
                <a style="color: white" ; href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
                    <?php
                    echo ($row['orszagnev']);
                    ?>
                </a>
                <img src="data:image/jpg;charset=utf8;base64 , <?php echo base64_encode($row['zaszlok']); ?>" width="20" />
        <?php
                echo "</span>";
                echo "<span class='float-right'>";
                echo ($row['ranglista']) . ".";
                echo "</span>";
                echo "<br>";
            }
        }
        ?>
    </div>
</body>

</html>