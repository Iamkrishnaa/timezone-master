<?php

include "header.php";
$userNameF = "";
$passwordF = "";

$userNameErr = "";
$passwordErr = "";

if (isset($_SESSION['user'])) {
?>
    <script>
        window.location.href = "profile.php";
    </script>
    <?php
}

if (isset($_POST['login'])) {
    $userNameF = $_POST['userName'];
    $passwordF = $_POST['password'];
    include "controller/LoginUser.php";
    $obj = new LoginUser();
    $response = json_decode($obj->login($_POST['userName'], $_POST['password']), true);
    $status = $response['status'];
    if ($status == "Password Incorrect") {
        $passwordErr = "Password Incorrect";
    }
    if ($status == "Username Not Found") {
        $userNameErr = "Username Not Found";
    }
    if ($status == "Login Success") {
        $_SESSION["user"] = $_POST['userName'];
    ?>
        <script>
            window.location.href = "profile.php";
        </script>
<?php
    }
}
?>
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>New to our Shop?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="register.php" class="btn_3">Create an Account</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome Back ! <br>
                                Please Sign in now</h3>
                            <form class="row contact_form" action="" method="post" novalidate="novalidate">
                                <div class="col-md-12 form-group p_star">
                                    <input type="text" class="form-control" id="userName" name="userName" value="<?php echo $userNameF; ?>" placeholder="Username">
                                    <span class="loginpage-error" style="color: red; font-size:16px; margin-left:20px;"><?php echo "$userNameErr"; ?></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <input type="password" class="form-control" id="password" name="password" value="<?php echo $passwordF; ?>" placeholder="Password">
                                    <span class="loginpage-error" style="color: red; font-size:16px; margin-left:20px;"><?php echo "$passwordErr"; ?></span>
                                </div>
                                <div class="col-md-12 form-group">
                                    <div class="creat_account d-flex align-items-center">
                                        <input type="checkbox" id="f-option" name="selector">
                                        <label for="f-option">Remember me</label>
                                    </div>
                                    <button type="submit" value="submit" name="login" class="btn_3">
                                        log in
                                    </button>
                                    <a class="lost_pass" href="#">forget password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================login_part end =================-->
</main>
<?php
include "footer.php";
include "search-model.php";
?>