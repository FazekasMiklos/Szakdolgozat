<?php
include 'controller/favorite.php';
if (isset($_SESSION['userid'])){ 
echo "<form method='POST' action='".setFavorites($conn)."'>
<input type='hidden' name='uid' value='".$_SESSION['userid']."'>
<button type='submit' class='btn btn-success' style='color:white;' name='kedvenc'>Kedvencekhez adás/eltávolítás</button>
</form>"; 
getFavorites($conn);
    }
    ?>