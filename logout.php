<?php

session_start();

unset($_SESSION['type']);
unset($_SESSION['user']);
header("Location: ./myaccount.php");
?>