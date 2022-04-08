<?php
date_default_timezone_set('Europe/Budapest');
include 'controller/komment.php';
?>
<div class='adat'>
    <?php
    //A beírt szöveg felülírása egy új szöveggel 
    $cid = $_POST['id'];
    $uid = $_POST['uid'];
    $message = $_POST['message'];

    echo "<form method='POST' action='" . editComments($conn) . "'>
    <input type='hidden' name='id' value='" . $cid . "'>
    <input type='hidden' name='uid' value='" . $uid . "'>
    <input type='hidden' name='date' value='" . date('Y-m-d H:i:s') . "'>
    <textarea name='message' class='form-control'>" . $message . "</textarea><br>
    <button type='submit' class='btn btn-outline-success my-2 my-sm-0' style='color:white;' name='editsubmit'>Módosítás</button>
    </form>";
    ?>
</div>