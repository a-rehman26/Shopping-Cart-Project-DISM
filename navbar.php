<!-- font awesome cdn  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


<?php
// session_start();

?>
<!-- Topbar Start -->
<div class="container-fluid">
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-semi-bold">
                    <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                </h1>
            </a>
        </div>
        <div class="col-lg-6 col-6 text-left">
            <form action="search.php" method="get">
                <div class="input-group">
                    <input type="text" class="form-control" name="search_input" placeholder="Search for products" />
                    <div class="input-group-append">
                        <span class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-3 col-6 text-right">

            <a href="cart.php" class="btn border">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge">

                    <?php
                    include 'Connection.php';

                    if (isset($_SESSION['user_id'])) {

                        $user_id_nav = $_SESSION['user_id'];

                        $select_cart_rows = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id_nav' ");

                        $cart_rows_nav = mysqli_num_rows($select_cart_rows);

                        echo $cart_rows_nav;
                    } else {

                        if (isset($_SESSION['temp_cart_id'])) {

                            $temp_cart_id = $_SESSION['temp_cart_id'];

                            $select_temp_cart_items = mysqli_query($con, " SELECT * FROM `cart` WHERE user_id = '$temp_cart_id' ");

                            $cart_rows_nav_tem = mysqli_num_rows($select_temp_cart_items);

                            echo $cart_rows_nav_tem;
                        } else {
                            echo "0";
                        }
                    }
                    ?>
                </span>
            </a>
        </div>
    </div>
</div>
<!-- TopBar End -->

<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: auto">

                    <!-- Fetch  Product in navbar  -->
                    <?php
                    include 'Connection.php';

                    $select_category_product = mysqli_query($con, " SELECT DISTINCT c_name
                    FROM `p_category` ");

                    while ($fetch_stationery_product = mysqli_fetch_assoc($select_category_product)) {

                    ?>

                        <a href="schoolBag.php?SchoolBagID=<?php echo $fetch_stationery_product['c_name'] ?>" class="nav-item nav-link"> <?php echo $fetch_stationery_product['c_name'] ?> </a>

                    <?php

                    }

                    ?>

                </div>

            </nav>
        </div>
        <div class="col-lg-9">
            <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                <a href="" class="text-decoration-none d-block d-lg-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold">
                        <span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper
                    </h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="shop.php" class="nav-item nav-link">Shop</a>
                        <a href="detail.php" class="nav-item nav-link">Shop Detail</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="cart.php" class="dropdown-item">Shopping Cart</a>
                                <a href="checkout.php" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                        <a href="contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <!-- <div class="navbar-nav ml-auto py-0">
                        <a href="" class="nav-item nav-link" data-toggle="modal" data-target="#myModal">
                            <i class="fa-solid fa-user mr-2"></i>
                            Login
                        </a>
                        <a href="" class="nav-item nav-link">Register</a>
                    </div> -->

                    <div class="navbar-nav ml-auto py-0">
                        <?php if (isset($_SESSION['user_name'])) { ?>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa-solid fa-user mr-2"></i>
                                    <?php echo $_SESSION['user_name']; ?>
                                </a>
                                <div class="dropdown-menu mt-0">
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <a href="#" class="nav-item nav-link" data-toggle="modal" data-target="#myModal">
                                <i class="fa-solid fa-user mr-2"></i>
                                Login
                            </a>
                        <?php } ?>
                    </div>

                </div>
            </nav>
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" style="height: 410px">
                        <img class="img-fluid" src="img/slider image 02.avif" alt="Image" />
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                    <!-- 10% Off Your First Order -->
                                </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                    <!-- Fashionable Dress -->
                                </h3>
                                <!-- <a href="" class="btn btn-light py-2 px-3">Shop Now</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item" style="height: 410px">
                        <img class="img-fluid" src="img/slider image 05.avif" alt="Image" />
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">
                                    <!-- 10% Off Your First Order -->
                                </h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">
                                    <!-- Reasonable Price -->
                                </h3>
                                <!-- <a href="" class="btn btn-light py-2 px-3">Shop Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Navbar End -->


<!-- modal  -->
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-body">

                    <?php
                    include 'Connection.php';
                    ?>

                    <!DOCTYPE html>
                    <html lang="en">

                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>SignUP And Login Panel</title>

                        <!-- css  -->
                        <style>
                            @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

                            .wrapper {
                                overflow: hidden;
                                max-width: 390px;
                                background: #fff;
                                padding: 30px;
                                border-radius: 15px;
                                box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
                            }

                            .wrapper .title-text {
                                display: flex;
                                width: 200%;
                            }

                            .wrapper .title {
                                width: 50%;
                                font-size: 35px;
                                font-weight: 600;
                                text-align: center;
                                transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                            }

                            .wrapper .slide-controls {
                                position: relative;
                                display: flex;
                                height: 50px;
                                width: 100%;
                                overflow: hidden;
                                margin: 30px 0 10px 0;
                                justify-content: space-between;
                                border: 1px solid lightgrey;
                                border-radius: 15px;
                            }

                            .slide-controls .slide {
                                height: 100%;
                                width: 100%;
                                color: #fff;
                                font-size: 18px;
                                font-weight: 500;
                                text-align: center;
                                line-height: 48px;
                                cursor: pointer;
                                z-index: 1;
                                transition: all 0.6s ease;
                            }

                            .slide-controls label.signup {
                                color: #000;
                            }

                            .slide-controls .slider-tab {
                                position: absolute;
                                height: 100%;
                                width: 50%;
                                left: 0;
                                z-index: 0;
                                border-radius: 15px;
                                background: -webkit-linear-gradient(left, #003366, #004080, #0059b3, #0073e6);
                                transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                            }

                            input[type="radio"] {
                                display: none;
                            }

                            #signup:checked~.slider-tab {
                                left: 50%;
                            }

                            #signup:checked~label.signup {
                                color: #fff;
                                cursor: default;
                                user-select: none;
                            }

                            #signup:checked~label.login {
                                color: #000;
                            }

                            #login:checked~label.signup {
                                color: #000;
                            }

                            #login:checked~label.login {
                                cursor: default;
                                user-select: none;
                            }

                            .wrapper .form-container {
                                width: 100%;
                                overflow: hidden;
                            }

                            .form-container .form-inner {
                                display: flex;
                                width: 200%;
                            }

                            .form-container .form-inner form {
                                width: 50%;
                                transition: all 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
                            }

                            .form-inner form .field {
                                position: relative;
                                height: 50px;
                                width: 100%;
                                margin-top: 20px;
                            }

                            .field i {
                                height: 100%;
                                position: absolute;
                                top: 0;
                                right: 10px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                cursor: pointer;
                            }

                            .field #open {
                                display: none;
                            }

                            .form-inner form .field input {
                                height: 100%;
                                width: 100%;
                                outline: none;
                                padding-left: 15px;
                                border-radius: 15px;
                                border: 1px solid lightgrey;
                                border-bottom-width: 2px;
                                font-size: 17px;
                                transition: all 0.3s ease;
                            }

                            .form-inner form .field input:focus {
                                border-color: #1a75ff;
                                /* box-shadow: inset 0 0 3px #fb6aae; */
                            }

                            .form-inner form .field input::placeholder {
                                color: #999;
                                transition: all 0.3s ease;
                            }

                            form .field input:focus::placeholder {
                                color: #1a75ff;
                            }

                            .form-inner form .pass-link {
                                margin-top: 5px;
                            }

                            .form-inner form .signup-link {
                                text-align: center;
                                margin-top: 30px;
                            }

                            .form-inner form .pass-link a,
                            .form-inner form .signup-link a {
                                color: #1a75ff;
                                text-decoration: none;
                            }

                            .form-inner form .pass-link a:hover,
                            .form-inner form .signup-link a:hover {
                                text-decoration: underline;
                            }

                            form .btn {
                                height: 50px;
                                width: 100%;
                                border-radius: 15px;
                                position: relative;
                                overflow: hidden;
                            }

                            form .btn .btn-layer {
                                height: 100%;
                                width: 300%;
                                position: absolute;
                                left: -100%;
                                background: -webkit-linear-gradient(right, #003366, #004080, #0059b3, #0073e6);
                                border-radius: 15px;
                                transition: all 0.4s ease;
                                ;
                            }

                            form .btn:hover .btn-layer {
                                left: 0;
                            }

                            form .btn input[type="submit"] {
                                height: 100%;
                                width: 100%;
                                z-index: 1;
                                position: relative;
                                background: none;
                                border: none;
                                color: #fff;
                                padding-left: 0;
                                border-radius: 15px;
                                font-size: 20px;
                                font-weight: 500;
                                cursor: pointer;
                            }
                        </style>

                    </head>

                    <body>

                        <div class="wrapper">
                            <div class="title-text">
                                <div class="title login">Login Form</div>
                                <div class="title signup">Signup Form</div>
                            </div>
                            <div class="form-container">
                                <div class="slide-controls">
                                    <input type="radio" name="slide" id="login" checked>
                                    <input type="radio" name="slide" id="signup">
                                    <label for="login" class="slide login">Login</label>
                                    <label for="signup" class="slide signup">Signup</label>
                                    <div class="slider-tab"></div>
                                </div>
                                <div class="form-inner">

                                    <form action="" class="login" method="post">
                                        <pre></pre>
                                        <div class="field">
                                            <input type="text" name="email_login" placeholder="Email Address" required>
                                        </div>
                                        <div class="field">
                                            <div class="eye" onclick="pass()">
                                                <i class="fa-solid fa-eye-slash" id="close"></i>
                                                <i class="fa-solid fa-eye" id="open"></i>
                                            </div>
                                            <input type="password" name="pass_login" id="input" placeholder="Password" required>
                                        </div>
                                        <div class="pass-link"><a href="user_forgot_password.php">Forgot password?</a></div>
                                        <div class="field btn">

                                        </div>
                                        <div class="field btn">
                                            <div class="btn-layer"></div>
                                            <input type="submit" value="Login" name="btnLogin">
                                        </div>
                                        <div class="signup-link">Create an account <a href="">Signup now</a></div>
                                    </form>

                                    <?php

                                    // Check if the login form is submit
                                    if (isset($_POST['btnLogin'])) {

                                        $email_login = $_POST['email_login'];
                                        $pass_login = $_POST['pass_login'];

                                        // u_status = 'Active' = if user not verify email otherwise user not login 
                                        $email_select_login = mysqli_query($con, " SELECT * FROM `users` WHERE u_email = '$email_login' AND u_status = 'Active' ");

                                        $email_rows = mysqli_num_rows($email_select_login);

                                        if ($email_rows) {

                                            $data_fetch_login = mysqli_fetch_assoc($email_select_login);

                                            $email_db = $data_fetch_login['u_email'];
                                            $pass_db = $data_fetch_login['u_pass'];

                                            $user_id_db = $data_fetch_login['u_id'];
                                            $_SESSION['user_id'] = $user_id_db;

                                            if ($email_db == $email_login && $pass_db == $pass_login) {
                                    ?>
                                                <script>
                                                    alert("Login Done")

                                                    location.replace('index.php');
                                                </script>
                                            <?php

                                                $name_db = $data_fetch_login['u_name'];

                                                $_SESSION['user_name'] = $name_db;
                                            } else {
                                            ?>
                                                <script>
                                                    alert("Password incorrect")
                                                </script>
                                            <?php
                                            }
                                        } else {
                                            ?>
                                            <script>
                                                alert("Email incorrect")
                                            </script>
                                    <?php
                                        }
                                    }
                                    ?>

                                    <form action="" class="signup" method="post">
                                        <div class="field">
                                            <input type="text" pattern="[A-Za-z\s]+" placeholder="Name" name="name" required>
                                        </div>
                                        <div class="field">
                                            <input type="email" placeholder="Email Address" name="email" required>
                                        </div>
                                        <div class="field">
                                            <input type="password" placeholder="Password" name="pass" required>
                                        </div>
                                        <div class="field">
                                            <input type="password" placeholder="Confirm password" name="cPass" required>
                                        </div>
                                        <div class="field">
                                            <input type="text" pattern="[0-9]{10}" placeholder="Mobile Number" name="mobile">
                                        </div>
                                        <div class="field btn">
                                            <div class="btn-layer"></div>
                                            <input type="submit" value="Signup" name="btnSubmit">
                                        </div>
                                        <div class="signup-link">Already have an account? <a href="">Login</a></div>
                                    </form>

                                    <!-- php code registration form insert -->

                                    <?php
                                    include 'Connection.php';

                                    if (isset($_POST['btnSubmit'])) {

                                        $name = $_POST['name'];
                                        $email = $_POST['email'];
                                        $pass = $_POST['pass'];
                                        $cPass = $_POST['cPass'];
                                        $mobile = $_POST['mobile'];

                                        $_SESSION['otp_email'] = $email;

                                        $randomBytes = random_bytes(4); // Generate 4 random bytes
                                        $randomNumber = hexdec(bin2hex($randomBytes)); // Convert bytes to a decimal number
                                        $min = 100000; // Minimum value (inclusive)
                                        $max = 999999; // Maximum value (inclusive)
                                        $token = $min + ($randomNumber % ($max - $min + 1)); // Convert to the desired range

                                        $otp = rand(10000, 99999);

                                        $select_email = mysqli_query($con, " SELECT * FROM `users` WHERE u_email = '$email' ");

                                        $email_rows = mysqli_num_rows($select_email);

                                        if ($email_rows > 0) {
                                    ?>

                                            <script>
                                                alert("This Email Already Exist")
                                            </script>

                                            <?php
                                        } else {
                                            if ($pass == $cPass) {

                                                $insert_query = mysqli_query($con, " INSERT INTO `users`( `u_name`, `u_email`, `u_pass`, `u_Cpass`, `u_number`, `OTP`, `u_token`, `u_status`) VALUES ( '$name','$email','$pass','$cPass','$mobile','$otp', '$token', 'inActive') ");

                                                if ($insert_query) {
                                                    // mail otp   

                                                    $subject = "Account Activation OTP";
                                                    $body = "Hello: $name This is Your OTP Code
                                                    $otp ";
                                                    $sender = "OTPcode999@outlook.com";


                                                    if (mail($email, $sender, $body, $subject)) {
                                                    }

                                            ?>

                                                    <script>
                                                        alert("Account Created & Please Verify Your Account: Check Your Mail ")

                                                        location.replace('otp.php');
                                                    </script>

                                                <?php

                                                }
                                            } else {
                                                ?>

                                                <script>
                                                    alert("Password & Confirm Password Not Match")
                                                </script>

                                    <?php
                                            }
                                        }
                                    }

                                    ?>

                                </div>
                            </div>
                        </div>

                    </body>

                    </html>

                    <!-- js  -->
                    <script>
                        // form anchor 

                        const loginText = document.querySelector(".title-text .login");
                        const loginForm = document.querySelector("form.login");
                        const loginBtn = document.querySelector("label.login");
                        const signupBtn = document.querySelector("label.signup");
                        const signupLink = document.querySelector("form .signup-link a");
                        signupBtn.onclick = (() => {
                            loginForm.style.marginLeft = "-50%";
                            loginText.style.marginLeft = "-50%";
                        });
                        loginBtn.onclick = (() => {
                            loginForm.style.marginLeft = "0%";
                            loginText.style.marginLeft = "0%";
                        });
                        signupLink.onclick = (() => {
                            signupBtn.click();
                            return false;
                        });

                        // form eye 

                        function pass() {

                            let openEye = document.getElementById("open");
                            let closeEye = document.getElementById("close");

                            let input = document.getElementById("input");

                            if (input.type == "password") {
                                input.type = "text";
                                openEye.style.display = "block";
                                openEye.style.color = "red";
                                openEye.style.marginTop = "17px";
                                closeEye.style.display = "none";
                            } else {
                                input.type = "password";
                                openEye.style.display = "none";
                                closeEye.style.color = "gray";
                                closeEye.style.marginTop = "17px";
                                closeEye.style.display = "block";
                            }

                        }
                    </script>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>