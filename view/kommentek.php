<?php
date_default_timezone_set('Europe/Budapest');
include 'controller/komment.php';
?>
<div id='komment3'>
    <div class='text-center'>
        <h2 style="color: white;">Vélemények<br></h2>
    </div>
</div>
<div id='komment'>
    <?php
    //szövegmező megjelenítése
    if (isset($_SESSION['userid']) or isset($_SESSION['admin'])) {
        echo "<form method='POST' action='" . setComments($conn) . "'>
    <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
    <div class='d-flex justify-content-center'>
    <div id='komment2'>
    <textarea rows='4' maxlength='10000' class='form-control' name='message' placeholder='Írj véleményt...' required></textarea><br>
    <div class='text-center'>
    <button type='submit' class='btn btn-success' style='color:white;' name='submit'>Küldés</button>
    </div></div></div><br>
    </form>";
    } else {
        echo "<div class='text-center' id='komment3'><h5><a href='index.php?page=login' style='color:white;'>A kommenteléshez be kell jelentkezned!</a></h5></div>";
    }
    echo "<div class='d-flex justify-content-center'>
    <div id='komment2'>";
    getComments($conn); //Az összes komment megjelenítésének hivatkozása
    echo "</div></div>";
    ?>
</div>