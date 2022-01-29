<?php
session_start();
unset($_SESSION["userid"]);
unset($_SESSION["felhasznalonev"]);
header('Location: index.php?page=login');
?>