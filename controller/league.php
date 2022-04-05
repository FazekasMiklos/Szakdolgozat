<!DOCTYPE html>
<html lang="HU">

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

    <?php
    //Egy megnyitott liga adatainak kilistázása
    if (isset($_GET['id3'])) {
        $id3 = mysqli_real_escape_string($conn, $_GET['id3']);
        $sql = "SELECT * FROM klubbok INNER JOIN ligak ON (ligak.ligaid = klubbok.ligaid) WHERE ligak.ligaid='$id3' ORDER BY klubnev";
        $sql2 = "SELECT * FROM ligak WHERE ligaid='$id3'";
        $result = mysqli_query($conn, $sql) or die;
        $result2 = mysqli_query($conn, $sql2) or die;
        $row = mysqli_fetch_array($result);
        $row2 = mysqli_fetch_array($result2);
    ?>
        <div id='komment3'>
            <h1 style="color: white;"><?php echo ($row2['liganev']);
                                        include 'view/kedvencek.php';//meghívom a kinézetet ?></h1>
        </div>
        <div id="btn">
            <div id="reg"><?php echo "A liga csapatai:"; ?><br>
                <?php
                if ($result->num_rows > 0) {
                ?>
                    <a style="color: white" ; href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
                        <?php
                        echo ($row['klubnev']) . "<br>" . "</a>";
                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <a style="color: white" ; href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
                                <?php echo ($row['klubnev']); ?><br></a>
                    <?php
                        }
                    }
                    ?>
            </div>
        </div>
    <?php
    }
    include 'view/ertekelesek.php';//meghívom a kinézetet
    include 'view/kommentek.php';//meghívom a kinézetet
    ?>
</body>

</html>