<div class="reg">
    <?php
    //A felhasználó profiljának oldala ahol látszódik a profilképe,jelszava,email-e
    if (!empty($_SESSION["userid"])) {
    ?>
        <?php
        $result = $conn->query("SELECT * FROM felhasznalok WHERE userid = '" . $_SESSION['userid'] . "'");
        $result1 = $conn->query("SELECT * FROM profilkepek INNER JOIN felhasznalok ON (felhasznalok.userid=profilkepek.userid) WHERE felhasznalok.userid = '" . $_SESSION['userid'] . "'");

        while ($row = $result1->fetch_assoc()) {
            echo "Profilkép:";
        ?>
            <img alt="" src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="100" height="100" /><br><br>
        <?php
        }
        ?>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "Felhasználónév:";
            echo $row['felhasznalonev'] . "<br>" . "<br>";
            echo "Email:";
            echo $row['email'] . "<br>" . "<br>";
        }
        ?>
    <?php
    }
    ?>
    <?php
    if (!empty($_SESSION["admin"])) {
    ?>
        <?php
        $result = $conn->query("SELECT * FROM felhasznalok WHERE userid = '" . $_SESSION['admin'] . "'");
        $result1 = $conn->query("SELECT * FROM profilkepek INNER JOIN felhasznalok ON (felhasznalok.userid=profilkepek.userid) WHERE felhasznalok.userid = '" . $_SESSION['admin'] . "'");

        while ($row = $result1->fetch_assoc()) {
            echo "Profilkép:";
        ?>
            <img alt="" src="<?php echo 'kepek/profilkepek/' . $row['name']; ?>" class="rounded-circle" width="100" height="100" /><br><br>
        <?php
        }
        ?>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "Felhasználónév:";
            echo $row['felhasznalonev'] . "<br>" . "<br>";
            echo "Email:";
            echo $row['email'] . "<br>" . "<br>";
        }
        ?>
    <?php
    }
    ?>
    <a style="color: white" href="index.php?page=profile" title="Profile">Adatok módosítása<br><br></a><!--Itt irányítja át a felhasználót arra az oldalra ahol megtudja változtani az adatait-->
    <a style="color: white" href="index.php?page=profilepicdelete" title="Profile">Profilkép törlése<br><br></a><!--Itt irányítja át a felhasználót arra az oldalra ahol eldöntheti hogy tényleg törli-e a profilképét-->
    <a style="color: white" href="index.php?page=profiledelete" title="Profile">Profil törlése<br><br></a><!--Itt irányítja át a felhasználót arra az oldalra ahol eldöntheti hogy tényleg törli-e a profilját-->
</div>