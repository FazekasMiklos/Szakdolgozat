<?php
//kijelentkezés
session_start();
unset($_SESSION["userid"]);
unset($_SESSION["admin"]);
unset($_SESSION["felhasznalonev"]);
header('Location: index.php?page=login');
?>