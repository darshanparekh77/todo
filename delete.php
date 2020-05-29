<?php 
include "include/header.php";

$username = $_SESSION['username'];
$query = mysqli_query($conn,"select * from users where username = '$username'");
$row = mysqli_fetch_array($query);
$id = $row['id'];

$sql = "delete from todos where id = '$id'";
$res = mysqli_query($conn,$sql);

if($res)
{
    header("Location : todos.php");
}
else
{
    header("Location : todos.php");
}
?>