<?php
//Belépési panel
if (isset($_POST['user']))
        echo $loginError;
?>
<div class="reg">
        <h1>Bejelentkezés</h1>
        <form name="f1" action="index.php?page=login" method="post">
                <label> Felhasználó: </label>
                <input type="text" class="form-control" name="user" required /><br>
                <label> Jelszó: </label>
                <input type="password" class="form-control" name="pw" required /><br>
                <input type="submit" class="btn mb-2" style="background-color:#228B22; color:white;" value="Belépés" />
        </form>
        <a href="index.php?page=register" style='color:white;'>Fiók létrehozása</a>
        <!--Átírányítja a felhasználót a regisztációs oldalra-->
</div>