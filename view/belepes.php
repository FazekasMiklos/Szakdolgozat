<link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if (isset($_POST['user']))
        echo $loginError;
?>
<div id="reg">
        <h1>Bejelentkezés</h1>
        <form name="f1" action="index.php?page=login" method="post">
                <label> Felhasználó: </label>
                <input type="text" class="form-control" name="user" required /><br>
                <label> Jelszó: </label>
                <input type="password" class="form-control" name="pw" required /><br>
                <input type="submit" class="btn mb-2" style="background-color:#228B22; color:white;" value="Belépés" />
        </form>
        <a href="index.php?page=register" style='color:white;'>Fiók létrehozása</a>
</div>