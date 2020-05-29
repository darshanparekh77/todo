<?php 
include "include/header.php";
session_destroy();
unset($_SESSION['username']);
echo "<script>location.href='index.php'</script>";
?>