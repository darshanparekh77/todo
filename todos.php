<?php
include "include/header.php";
?>
<?php
if ($_SESSION['username'] == true) {
$_SESSION["username"];
} else {
  header("location:index.php");
}
?>
<?php
$username = $_SESSION['username'];
$query1 = mysqli_query($conn, "select * from users where username = '$username'");
$row1 = mysqli_fetch_array($query1);
$id = $row1['id'];
$query = mysqli_query($conn, "select * from todos where user_id = $id");
$rowcount = mysqli_num_rows($query);


?>
<nav class="blue">
  <div class="nav-wrapper">
    <a href="" class="brand-logo center">TODO</a>
    <div>
    <a href="logout.php"><input type="button" class="btn red right" style="margin-top: 13px; margin-right: 100px;" value="Logout"></a>
    </div>
  </div>
</nav>
<br>
<div class="container">
  <div id="demo">
    <div class="table-responsive-vertical shadow-z-1">
      <div class="center">
        <?php
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
        ?>
      </div>
      <table id="table" class="table table-hover table-mc-light-blue">
        <thead>
          <tr>

            <th>TODO</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>ACTION</th>
          </tr>
        </thead>
        <?php


        for ($i = 1; $i <= $rowcount; $i++) {
          $row = mysqli_fetch_array($query);

        ?>
          <tbody>
            <tr>

              <td data-title="TITLE"><?php echo $row['title']; ?></td>
              <td data-title="DATE"> <?php echo $row['date']; ?></td>
              <td data-title="TIME"> <?php echo $row['time']; ?></td>
              <td data-title="DELETE" name="id"> <a href="todos.php?id=<?php echo $row['id']; ?>" <i class="material-icons center red-text">delete_forever</i></a></td>
            </tr>
          </tbody>
        <?php
        }
        ?>
        <?php
        if (isset($_REQUEST['id'])) {
          $id = $_GET['id'];
          $sql = "delete from todos where id = $id";
          $res = mysqli_query($conn, $sql);
          if ($res) {
            header("Location: todos.php");
            $_SESSION['message'] = "<div class='chip red white-text'>TODO Deleted</div>";
          } else {
            header("Location: todos.php");
          }
        }
        ?>

      </table>
    </div>

  </div>
  <div class="fixed-action-btn">
    <a href="addtodo.php" class="btn btn-floating btn-large white-text pulse""><i class=" material-icons">add</i></a>
  </div>
</div>
</body>

</html>