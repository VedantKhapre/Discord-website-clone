<?php
include 'session.php';
session_destroy();
header("Location: ./load_index.php");
exit();
?>
