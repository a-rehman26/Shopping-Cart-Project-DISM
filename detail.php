<?php

// Start the session
session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Product Detail</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .modal-dialog {
            height: 50%;
            width: 50%;
            margin: auto;
        }


        .modal-header {
            color: white;
            background-color: #007bff;
        }

        textarea {
            border: 1px solid whitesmoke;
            box-shadow: none !important;
            -webkit-appearance: none;
            outline: 0px !important;
            margin: 10px;
        }

        /* 
        .openmodal {
            margin-left: 35%;
            width: 25%;
            margin-top: 25%;
        } */

        .icon1 {
            color: #007bff;

        }

        /* 
        a {
            margin: auto;
        } */

        input {
            color: black;
        }
    </style>

</head>

<body>

    <!-- TopBar & Navbar page -->
    <?php
    include 'navbar2.php';

    ?>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">

            <?php
            include 'Connection.php';

            if (isset($_GET['BeautyPRODUCTid'])) {

                $beauty_product_IDfetch = $_GET['BeautyPRODUCTid'];

                $select_product_forDetail = mysqli_query($con, " SELECT * FROM `product` WHERE p_id = '$beauty_product_IDfetch' ");

                if (mysqli_num_rows($select_product_forDetail) > 0) {

                    $fetch_product_detail = mysqli_fetch_assoc($select_product_forDetail);

            ?>

                    <form action="add_to _cart_code.php" class="d-flex" method="post">

                        <input type="hidden" name="product_id_fetch" value="<?php echo $fetch_product_detail['p_id'] ?>" id="">

                        <div class="col-lg-6 pb-5" style="width: 500px;">
                            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner border">
                                    <div class="carousel-item active text-center">
                                        <img class="" style="width: 350px; height: 400px;" src="Pimages/<?php echo $fetch_product_detail['p_image'] ?> " alt="Image">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img class="" style="width: 350px; height: 400px;" src="Pimages/<?php echo $fetch_product_detail['p_image'] ?> " alt="Image">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img class="" style="width: 350px; height: 400px;" src="Pimages/<?php echo $fetch_product_detail['p_image'] ?> " alt="Image">
                                    </div>
                                    <div class="carousel-item text-center">
                                        <img class="" style="width: 350px; height: 400px;" src="Pimages/<?php echo $fetch_product_detail['p_image'] ?> " alt="Image">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                                    <i class="fa fa-2x fa-angle-left text-dark"></i>
                                </a>
                                <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                                    <i class="fa fa-2x fa-angle-right text-dark"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 pb-5" style="width: 500px;">
                            <h2 class="font-weight-semi-bold pb-2"> <?php echo $fetch_product_detail['p_name'] ?> </h2>
                            <!-- <div class="d-flex mb-3">
                                <div class="text-primary mr-2">
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star"></small>
                                    <small class="fas fa-star-half-alt"></small>
                                    <small class="far fa-star"></small>
                                </div>
                                <small class="pt-1">(50 Reviews)</small>
                            </div> -->
                            <h5 class="font-weight-semi-bold mb-4">RS: <?php echo $fetch_product_detail['p_price'] ?></h5>
                            <p class="mb-4"> <?php echo $fetch_product_detail['p_des'] ?> </p>

                            <div class="col-lg-4 d-flex align-items-center mb-4 pt-2">

                                <!--Modal Feedback Button-->
                                <button type="button" class="btn btn-sm btn-primary openmodal" data-toggle="modal" data-target="#myModal2">FeedBack Form</button>

                            </div>

                            <div class="col-lg-4 d-flex align-items-center mb-4 pt-2">

                                <a href="" style="text-decoration: none;"> <input type="submit" class="btn btn-outline-primary text-dark" value="Add To Cart" name="addToCart" id=""> </a>

                            </div>

                            <input type="hidden" value="<?php echo $fetch_product_detail['p_id'] ?>" name="cart_ID" id="">
                            <input type="hidden" name="cart_pImage" value="<?php echo $fetch_product_detail['p_image'] ?>" id="">
                            <input type="hidden" name="cart_pName" value="<?php echo $fetch_product_detail['p_name'] ?>" id="">
                            <input type="hidden" name="cart_pPrice" value="<?php echo $fetch_product_detail['p_price'] ?>" id="">

                    </form>


            <?php

                }
            }

            ?>

            <div class="d-flex pt-2">
                <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                <div class="d-inline-flex">
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>

    </div>

    </div>


    <!-- Shop Detail End -->


    <!-- Products Start -->
    <!-- <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-1.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-2.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-3.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-4.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="img/product-5.jpg" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">Colorful Stylish Shirt</h6>
                            <div class="d-flex justify-content-center">
                                <h6>$123.00</h6>
                                <h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Products End -->

    <!-- Footer Start -->

    <?php
    include 'footer.php';

    ?>

    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<!--Division for Modal-->
<div id="myModal2" class="modal fade" role="dialog">

    <!--Modal-->
    <div class="modal-dialog">

        <form action="" method="post" class="formmodel">
            <!--Modal Content-->
            <div class="modal-content">

                <!-- Modal Header-->
                <div class="modal-header">
                    <h3>Feedback Request</h3>
                    <!--Close/Cross Button-->
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                </div>

                <!-- Modal Body-->
                <div class="modal-body text-center">
                    <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1"></i>
                    <h3>Your opinion matters</h3>
                    <h5>Help us improve our product? <strong>Give us your feedback.</strong></h5>
                    <hr>
                    <h6>Your Rating</h6>
                </div>

                <!-- Radio Buttons for Rating-->
                <div style="display: flex; align-items: baseline;" class="form-check mb-4">
                    <input name="feedback" type="radio" id="Very Good" name="" value="Very Good" style="display: block;">
                    <label class="" style="margin: 0 10px;" for="Very Good">Very good</label>
                </div>
                <div style="display: flex; align-items: baseline;" class="form-check mb-4 d-flex">
                    <input name="feedback" type="radio" id="Good" name="" value=" Good" style="display: block;">
                    <label class="" style="margin: 0 10px;" for="Good">Good</label>
                </div>
                <div style="display: flex; align-items: baseline;" class="form-check mb-4 d-flex">
                    <input name="feedback" type="radio" id="Normal" name="" value="Normal" style="display: block;">
                    <label class="" style="margin: 0 10px;" for="Normal">Normal</label>
                </div>
                <div style="display: flex; align-items: baseline;" class="form-check mb-4 d-flex">
                    <input name="feedback" type="radio" id="Bad" name="" value="Bad" style="display: block;">
                    <label class="" style="margin: 0 10px;" for="Bad">Bad</label>
                </div>
                <div style="display: flex; align-items: baseline;" class="form-check mb-4 d-flex">
                    <input name="feedback" type="radio" id="Very Bad" name="" value="Very Bad" style="display: block;">
                    <label class="" style="margin: 0 10px;" for="Very Bad">Very Bad</label>
                </div>

                <!--Text Message-->
                <div class="text-center">
                    <h4>What could we improve?</h4>
                </div>
                <textarea type="textarea" placeholder="Your Message" name="FeedBackFormTextarea" rows="6"></textarea>

                <!-- Modal Footer-->
                <div class="modal-footer">

                    <input type="submit" class="btn btn-primary " name="btnFeedBackForm" value="Send" id="">
                    <a href="" class="btn btn-outline-primary" data-dismiss="modal">Cancel</a>

                </div>

            </div>

        </form>

        <!-- feedback form data insert  -->
        <?php
        include 'Connection.php';

        $user_id =  $_SESSION['user_id'];

        if (isset($_POST['btnFeedBackForm']) && isset($_SESSION['user_id'])) {

            $feedback_one = $_POST['feedback'];

            $feedback_text = $_POST['FeedBackFormTextarea'];

            $product_id_fetch = $_GET['BeautyPRODUCTid'];

            $insert_feedback = mysqli_query($con, " INSERT INTO `feedbackform`( `rating`, `review`, `u_id`, `p_id`) VALUES ( '$feedback_one','$feedback_text','$user_id','$product_id_fetch') ");

            if ($insert_feedback) {
        ?>
                <script>
                    alert('Feedback submitted successfully!')
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Failed to submit feedback. Please try again later.')
                </script>
            <?php
            }
        } elseif (isset($_POST['btnFeedBackForm']) && !isset($_SESSION['user_id'])) {
            ?>

            <script>
                alert('Please log in to submit feedback.')
            </script>

        <?php
        }

        ?>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>