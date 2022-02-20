<?php
session_start();
if (!isset($_SESSION['connecte']) || $_SESSION['connecte'] != true) {
    header('Location: index.php#ancre2');
    exit(0);
}
?>

