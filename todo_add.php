<?php 
include "include/header.php";

if(isset($_POST['add']))
{
$title = $_POST['title'];
$date = $_POST['date'];
$time = $_POST['time'];


$title = mysqli_real_escape_string($conn,$title);
$date = mysqli_real_escape_string($conn,$date);
$time = mysqli_real_escape_string($conn,$time);


$title = htmlentities($title);
$date = htmlentities($date);
$time = htmlentities($time);


$date1 = strtr($_REQUEST['date'], '/', '-');
$insertdate = date('Y-m-d', strtotime($date1));
$sql = "insert into todos (title,date,time,uid) values('$title','$date','$time','$id')";
$res = mysqli_query($conn,$sql);

if($res)
{
    header("Location:addtodo.php");
    $_SESSION['message'] = "<div class='chip green white-text'>todo added successfully</div>";
}
else
{
    header("Location:addtodo.php");
    $_SESSION['message'] = "<div class='chip red white-text'>something went wrong</div>";
}
}

?>