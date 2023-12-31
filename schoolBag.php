<?php

// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Products</title>
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
</head>

<body>

    <!-- TopBar & Navbar page -->
    <?php
    include 'navbar2.php';

    ?>

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Our Shop</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <!-- Shop Sidebar End -->

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">

                    <!-- navbar category product fetch in shop page   -->
                    <?php
                    include 'Connection.php';

                    if (isset($_GET['SchoolBagID'])) {

                        $productID_fetch = $_GET['SchoolBagID'];

                        $select_product = mysqli_query($con, "SELECT * FROM `product` WHERE p_cat = (SELECT c_id FROM `p_category` WHERE c_name = '$productID_fetch')");

                        // $select_product = mysqli_query($con, " SELECT * FROM `product` WHERE p_name = '$productID_fetch' ");

                        while ($fetch_products = mysqli_fetch_assoc($select_product)) {

                    ?>

                            <form action="add_to _cart_code.php" method="post">
                                <div class="col-lg-12 col-md-6 col-sm-12 pb-1">
                                    <div class="card product-item border-0 mb-4">
                                        <div class="text-center card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                            <img class="img-fluid" style="width: 200px; height: 280px;" src="Pimages/<?php echo $fetch_products['p_image'] ?>" alt="">
                                        </div>
                                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                            <h6 class="text-truncate mb-3"> <?php echo $fetch_products['p_name'] ?> </h6>
                                            <div class="d-flex justify-content-center">
                                                <h6> <?php echo $fetch_products['p_price'] ?> </h6>
                                            </div>
                                        </div>
                                        <div class="card-footer d-flex justify-content-between bg-light border" style="width: 280px;">
                                            <a href="detail.php?BeautyPRODUCTid=<?php echo $fetch_products['p_id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                                            <button type="submit" style="height: 25px;" class="btn btn-sm text-dark" name="addToCart"><i class="fas fa-shopping-cart text-primary"></i> Add To Cart</button>

                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" value="<?php echo $fetch_products['p_id'] ?>" name="cart_ID" id="">
                                <input type="hidden" name="cart_pImage" value="<?php echo $fetch_products['p_image'] ?>" id="">
                                <input type="hidden" name="cart_pName" value="<?php echo $fetch_products['p_name'] ?>" id="">
                                <input type="hidden" name="cart_pPrice" value="<?php echo $fetch_products['p_price'] ?>" id="">

                            </form>

                    <?php

                        }
                    }

                    ?>

                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

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