<?php
session_start();
unset($_SESSION['ADMIN_USERNAME']);
session_destroy();
header( "location: index.php");
die();
?>