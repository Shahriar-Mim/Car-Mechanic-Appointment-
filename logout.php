<?php
session_start();
unset($_SESSION['USER_USERNAME']);
session_destroy();
header( "location: ./index.php");
die();
?>