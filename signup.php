<?php
include "include/header.php";

if(isset($_POST['signup']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
   
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    
    $username = htmlentities($username);
    $password = htmlentities($password);
    $password = password_hash($password,PASSWORD_BCRYPT);
    $sql1 = "select * from users where username = '$username'";
    $res1 = mysqli_query($conn,$sql1);

    if(empty($username) || empty($password))
    {    header("Location:index.php");
        $_SESSION['message'] = "<div class='chip red white-text'>Username or password can not be empty</div>";
    }
    else{
    if(mysqli_num_rows($res1)>0)
    {
        header("Location:index.php");
        $_SESSION['message'] = "<div class='chip red white-text'>Account Already Exist</div>";
    }
    else
    {
        $sql = "insert into users(username,password) values('$username','$password')";
    $res = mysqli_query($conn,$sql);
    if($res)
    {
        header("Location:index.php");
        $_SESSION['message'] = "<div class='chip green white-text'>you have been successfully registered, Login to continue</div>";
    }
    else
    {
        header("Location:index.php");
        $_SESSION['message'] = "<div class='chip red black-text'>Something went wrong try again</div>";
    }
    }
}
    
}
?>  