<?php
include 'controller/favorite.php';
if (isset($_SESSION['userid']) or isset($_SESSION['admin'])){ 
echo "<form method='POST' action='".setFavorites($conn)."'>
<button type='submit' class='btn btn-success' style='color:white;' name='kedvenc'>Kedvencekhez adás/eltávolítás</button>
</form>"; 
getFavorites($conn);
    }
    ?>