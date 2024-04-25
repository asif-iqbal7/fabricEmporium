<?php
// Include Config File
include "config.php";

session_start();
session_unset();
session_destroy();

header("Location: {$hostname}/login.php");

?>