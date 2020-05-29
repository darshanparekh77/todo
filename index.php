<?php
include "include/header.php";
?>
<style>
     ::placeholder { 
    color: white;
    opacity: 1; 
  }


</style>
<body style="background-image: url(img/bg.png);">
    <div class="row" style="margin-top: 100px">
        <div class="col 16 offset-13 m8 offset-m2 s12">
            <div class="card-panel center grey lighten-2" style="margin-bottom: 0px">
                <ul class="tabs grey lighten-2">
                    <li class="tab">
                        <a href="#login" class="black-text">Login</a>
                    </li>
                    <li class="tab">
                        <a href="#signup" class="black-text">sign up</a>
                    </li>
                </ul>
            </div>


        </div>
        <div class="col 16 offset-13 m8 offset-m2 s12" id="login">
            <div class="card-panel center light-blue darken-4" style="margin-top: 1px">
                <h5 class="white-text">Login To Continue</h5>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
                <form action="login_check.php" method="post">
                    <div class="input-field">
                        <input type="text" id="username" name="username" placeholder="Username" require>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" name="login" value="Login" class="btn white black-text">
                </form>
            </div>
        </div>
        <div class="col 16 offset-13 m8 offset-m2 s12" id="signup">
            <div class="card-panel center red accent-4" style="margin-top: 1px">
                <h5 class="white-text">SignUp Now</h5>
                <form action="signup.php" method="POST">

                    <div class="input-field">
                        <input type="text" id="username" name="username" placeholder="Username">
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" class="btn white black-text" value="SIGNUP" name="signup">
                </form>
            </div>
        </div>
    </div>

    <?php
    include "include/footer.php"
    ?>