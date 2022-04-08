<div class="reg">
    <h1>Találatok:</h1>
    <?php
    //keresés játékos/csapat/liga/országra
    if (!empty($_REQUEST['search'])) {

        $search = $_REQUEST['search'];

        $sql = "SELECT * from ligak where liganev like '%" . $search . "%'";
        $sql2 = "SELECT * from klubbok where klubnev like '%" . $search . "%'";
        $sql3 = "SELECT * from orszagok where orszagnev like '%" . $search . "%'";
        $sql4 = "SELECT * from jatekosok where nev like '%" . $search . "%'";
        $result = $conn->query($sql);
        $result2 = $conn->query($sql2);
        $result3 = $conn->query($sql3);
        $result4 = $conn->query($sql4);
        if ($result->num_rows > 0 || $result2->num_rows > 0 || $result3->num_rows > 0 || $result4->num_rows > 0) {
            if ($result->num_rows > 0) {
    ?>
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <a style="color: white" ; href="index.php?page=league&id3=<?php echo ($row['ligaid']); ?>">
                        <?php echo $row["liganev"] ?><br></a>
                <?php
                }
            }
            if ($result2->num_rows > 0) {
                ?>
                <?php
                while ($row = $result2->fetch_assoc()) {
                ?>
                    <a style="color: white" ; href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
                        <?php echo $row["klubnev"] ?><br></a>
            <?php
                }
            }
            ?>
            <?php
            if ($result3->num_rows > 0) {
            ?>
                <?php
                while ($row = $result3->fetch_assoc()) {
                ?>
                    <a style="color: white" ; href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
                        <?php echo $row["orszagnev"] ?><br></a>
            <?php
                }
            }
            ?>
            <?php
            if ($result4->num_rows > 0) {
            ?>
                <?php
                while ($row = $result4->fetch_assoc()) {
                ?>
                    <a style="color: white" ; href="index.php?page=player&id=<?php echo ($row['jatekosid']); ?>">
                        <?php echo $row["nev"] ?><br></a>
    <?php
                }
            }
        } else {
            echo "<p style='color:white;'>Nincs ilyen adat</p>";
        }
    } else {
        echo "<p style='color:white;'>Nem írtál karaktert</p>";
    }
    ?>
</div>