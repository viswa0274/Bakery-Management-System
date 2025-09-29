<?php
session_start();
echo $_SESSION['aid'];
unset($_SESSION['aid']);
header("location:login.html");
?>
