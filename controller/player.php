 <?php
    //Egy megnyitott játékos adatainak kilistázása
    if (isset($_GET['id'])) {
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        $sql = "SELECT * FROM jatekosok INNER JOIN orszagok ON (orszagok.orszagid = jatekosok.orszagid) INNER JOIN klubbok ON (klubbok.klubid = jatekosok.klubid) INNER JOIN posztok ON (posztok.pozid = jatekosok.pozid) WHERE jatekosid='$id' ";
        $result = mysqli_query($conn, $sql) or die;
        $row = mysqli_fetch_array($result);
    ?>
     <div id="btn">
         <div id='komment3'>
             <h1 style="color: white;"><?php echo ($row['nev']);
                                        include 'view/kedvencek.php'; ?></h1>
         </div>
     </div><br>
     <div id="btn">
         <div class="adat"><?php echo "Született:"; ?><br>
             <?php echo ($row['szuletesidatum']); ?><br></div>
         <div class="adat"><?php echo "Lejátszott mérkőzései:"; ?><br>
             <?php echo ($row['merkozesek']); ?><br></div>
         <div class="adat"><?php echo "Góljainak száma:"; ?><br>
             <?php echo ($row['golok']); ?><br></div>
         <div class="adat"><?php echo "Gólpasszainak száma:"; ?><br>
             <?php echo ($row['golpasszok']); ?><br></div>
         <div class="adat"> <?php echo "Védéseinek száma:"; ?><br>
             <?php echo ($row['vedesek']); ?><br></div>
         <div class="adat"> <?php echo "Nemzetisége:"; ?><br>
             <a style="color: white" ; href="index.php?page=country&id4=<?php echo ($row['orszagid']); ?>">
                 <?php echo ($row['orszagnev']); ?><br></a>
         </div>
         <div class="adat"> <?php echo "Jelenlegi klubja:"; ?><br>
             <a style="color: white" ; href="index.php?page=team&id2=<?php echo ($row['klubid']); ?>">
                 <?php echo ($row['klubnev']); ?><br></a>
         </div>
         <div class="adat"> <?php echo "Posztja:"; ?><br>
             <?php echo ($row['poznev']); ?><br></div>
     </div>
 <?php
    }
    include 'view/ertekelesek.php'; //meghívom a kinézetet
    include 'view/kommentek.php'; //meghívom a kinézetet
    ?>