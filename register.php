<?php
include "preloader.php";
include "header.php";

?>

<main>
    <!-- Hero Area Start-->
    <canvas id="nokey" style="background-color: #000; color:#fff;">
        <div class="slider-area ">
            <div class="single-slider slider-height2 d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2 style="z-index: 99999; position:absolute;">Register</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </canvas>
    <!-- Hero Area End-->
    <!--================login_part Area =================-->
    <section class="login_part section_padding ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_text text-center">
                        <div class="login_part_text_iner">
                            <h2>Already have an account?</h2>
                            <p>There are advances being made in science and technology
                                everyday, and a good example of this is the</p>
                            <a href="login.php" class="btn_3">Login</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="login_part_form">
                        <div class="login_part_form_iner">
                            <h3>Welcome! Register new account <br>
                                Please fill the form now</h3>
                            <form class="row" method="post">
                                <div class="row mx-1">
                                    <div class="col-lg-6 form-group p_star">
                                        <input type="text" class="form-control" id="firstName" name="firstName" value="" placeholder="First Name">
                                    </div>
                                    <div class="col-lg-6 form-group p_star">
                                        <input type="text" class="form-control" id="lastName" name="lastName" value="" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="col-md-12 mx-1 form-group p_star">
                                    <input type="email" class="form-control" id="email" name="email" value="" placeholder="Email">
                                </div>
                                <div class="col-md-12 mx-1 form-group p_star">
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="" placeholder="Phone Number">
                                </div>
                                <div class="row mx-1">
                                    <div class="col-md-4 form-group p_star">
                                        <input type="text" class="form-control" id="state" name="state" value="" placeholder="State">
                                    </div>
                                    <div class="col-md-4 form-group p_star">
                                        <input type="text" class="form-control" id="city" name="city" value="" placeholder="City">
                                    </div>
                                    <div class="col-md-4 form-group p_star">
                                        <input type="text" class="form-control" id="tole" name="tole" value="" placeholder="Tole">
                                    </div>
                                </div>
                                <div class="col-md-12 mx-1 form-group p_star">
                                    <input type="text" class="form-control" id="userName" name="userName" value="" placeholder="Username">
                                </div>
                                <div class="row mx-1">
                                    <div class="col form-group">
                                        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password">
                                    </div>
                                    <div class="col form-group">
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" value="" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="col-md-12 mx-1 form-group">
                                    <button id="submit" type="button" name="register" class="btn_3">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/handleForm.js"></script>
    <script src="assets/js/vendor/animated-canvas.js"></script>
    <!--================login_part end =================
        -->
</main>
<?php
include "footer.php";
include "search-model.php";
?>