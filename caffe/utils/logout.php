<?php
session_start();
unset($_SESSION['userId']);
header("Location:../html/login.php");
?>