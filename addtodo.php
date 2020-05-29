<?php
include "include/header.php";

if ($_SESSION['username'] == true) {
  $_SESSION["username"];
} else {
  header("location:index.php");
}
?>
<?php
$username = $_SESSION['username'];
$query = mysqli_query($conn, "select * from users where username = '$username'");
$row = mysqli_fetch_array($query);
$id = $row['id'];
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>

<body class="blue lighten-3">
  <nav class="blue">
    <div class="nav-wrapper">
      <a href="" class="brand-logo center">TODO</a>
      <div>
        <a href="logout.php"><input type="button" class="btn red right" style="margin-top: 13px; margin-right: 100px;" value="Logout"></a>
      </div>
    </div>
  </nav>

  <div class="container">
    <br><br><br>
    <div class="card-panel">
      <div class="row">
        <div class="center">
          <h1>ADD TO-DO</h1>
        </div>
        <form class="col l12 m12 s12" method="POST" id="form" action="addtodo.php" style="padding: 100px;">
<div class="center">
<?php
            if (isset($_SESSION['message'])) {
              echo $_SESSION['message'];
              unset($_SESSION['message']);
            }
            ?>
</div> 
            

            <div class="input-field col l12 m12 s12">
              <i class="material-icons prefix">mode_edit</i>
              <input type="text" placeholder="TITLE" name="title" class="clear" />
            </div><br><br><br><br><br>
            <h6><span>Select Deadline</span></h6>
            <div class="input-field col l6 m6 s12">

              <i class="material-icons prefix">calendar_today</i>
              <input type="date" class="datepicker" name="date" />
            </div>
            <div class="input-field col l6 m6 s12">

              <i class="material-icons prefix">access_time</i>
              <input type="time" class="datepicker" name="time" />
            </div>

            <div class="center">

              <input type="submit" class="btn blue" name="add" value="Add">
              <input type="button" class="btn blue" name="button" value="Clear" id="btn">

            </div>

            <br>
            <div class="center">
              <a href="todos.php">
                <input type="button" class="btn blue" value="All todos">
              </a>
            </div>
            <input type="hidden" name="id">
        </form>

      </div>
    </div>
  </div>

  <?php
  if (isset($_REQUEST['add'])) {
    $title = $_REQUEST['title'];
    $date = $_REQUEST['date'];
    $time = $_REQUEST['time'];


    $title = mysqli_real_escape_string($conn, $title);
    $date = mysqli_real_escape_string($conn, $date);
    $time = mysqli_real_escape_string($conn, $time);


    $title = htmlentities($title);
    $date = htmlentities($date);
    $time = htmlentities($time);


    $date = strtr($_REQUEST['date'], '/', '-');
    $insertdate = date('Y-m-d', strtotime($date));

    $sql = "insert into todos (title,date,time,user_id) values('$title','$date','$time','$id')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
      header("Location:addtodo.php");
      $_SESSION['message'] = "<div class='chip green white-text'>todo added successfully</div>";
    } else {
      header("Location:addtodo.php");
      $_SESSION['message'] = "<div class='chip red white-text'>something went wrong</div>";
    }
  }
  ?>

  <script>
    $(document).ready(function() {
      $("#btn").click(function() {

        $("#form")[0].reset();
      });
    });
  </script>

</body>

</html>