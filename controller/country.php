<?php
//Egy megnyitott ország adatainak kilistázása
if (isset($_GET['id4'])) {
    $id4 = mysqli_real_escape_string($conn, $_GET['id4']);
    $sql = "SELECT * FROM orszagok WHERE orszagok.orszagid = '$id4'";
    $sql1 = "SELECT * FROM orszagok INNER JOIN jatekosok ON (jatekosok.orszagid = orszagok.orszagid) WHERE orszagok.orszagid = '$id4' ORDER BY nev";
    $result = mysqli_query($conn, $sql) or die;
    $result1 = mysqli_query($conn, $sql1) or die;
    $row = mysqli_fetch_array($result);
    $row1 = mysqli_fetch_array($result1);
?>
    <div id='komment3'>
        <h1 style="color: white;"><?php echo ($row['orszagnev']);
                                    include 'view/kedvencek.php'; ?></h1>
    </div>
    <div id="btn">
        <div class="reg">
            <h3><?php echo "Világranglistahelyezése:"; ?><br>
                <?php echo ($row['ranglista']); ?></h3>
        </div>
        <div class="reg"><?php echo "Az ország játékosai:"; ?><br>
            <a style="color: white" ; href="index.php?page=player&id=<?php echo ($row1['jatekosid']); ?>">
                <?php
                if ($result1->num_rows > 0) {
                    echo ($row1['nev']) . "<br>" . "</a>";
                    while ($row1 = $result1->fetch_assoc()) {
                ?>
                        <a style="color: white" ; href="index.php?page=player&id=<?php echo ($row1['jatekosid']); ?>">
                            <?php echo ($row1['nev']); ?><br></a>
                <?php
                    }
                }
                ?>
        </div>
    </div>
<?php
}
?>