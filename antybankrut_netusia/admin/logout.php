<?php
session_start();

unset($_SESSION['logadm']);
unset($_SESSION['user_nick']);
unset($_SESSION['user_id']);
unset($_SESSION['user_t']);
header("Location: index.php");
?>