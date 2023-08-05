<?php

// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <style>

    </style>

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

    <!-- product search  -->


    <div class="container">

        <h3 class="mt-4">Search result for "<?php echo $_GET['search_input'] ?>" </h3>

    </div>

    <div class="container-fluid pt-5">
        <div class="row px-xl-5">

            <?php
            include 'Connection.php';

            $noResult = true;

            $search_input = $_GET['search_input'];

            $search_query = mysqli_query($con, "SELECT * FROM `product` WHERE p_name LIKE '%$search_input%'");

            while ($row_product = mysqli_fetch_assoc($search_query)) {

                $p_Name = $row_product['p_name'];
                $p_Price = $row_product['p_price'];
                $p_Image = $row_product['p_image'];
                $p_id = $row_product['p_id'];

                $noResult = false;

            ?>

                <form action="add_to _cart_code.php" method="post">

                    <form action="add_to _cart_code.php" method="post">

                        <div class="col-lg-12 col-md-6 col-sm-12 pb-1">
                            <div class="card product-item border-0 mb-4">
                                <div class="card-header text-center product-img position-relative overflow-hidden bg-transparent border p-0">
                                    <img class="img-fluid" style="width: 280px; height: 350px;" src="Pimages/<?php echo $row_product['p_image'] ?>" alt="" />
                                </div>
                                <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                    <h6 class="text-truncate mb-3"> <?php echo $row_product['p_name'] ?> </h6>
                                    <div class="d-flex justify-content-center">
                                        <h6>RS: <?php echo $row_product['p_price'] ?> </h6>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between bg-light border" style="width: 360px;">
                                    <a href="detail.php?BeautyPRODUCTid=<?php echo $row_product['p_id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>

                                    <button type="submit" style="height: 25px;" class="btn btn-sm text-dark" name="addToCart"><i class="fas fa-shopping-cart text-primary"></i> Add To Cart</button>

                                </div>
                            </div>
                        </div>


                        <input type="hidden" value="<?php echo $row_product['p_id'] ?>" name="cart_ID" id="">
                        <input type="hidden" name="cart_pImage" value="<?php echo $row_product['p_image'] ?>" id="">
                        <input type="hidden" name="cart_pName" value="<?php echo $row_product['p_name'] ?>" id="">
                        <input type="hidden" name="cart_pPrice" value="<?php echo $row_product['p_price'] ?>" id="">


                    </form>

                <?php
            }

            if ($noResult) {
                echo
                "
            No Result:
            
            &nbsp
            
            <p> 
            
            Your search [ '$search_input' ] did not match any Word.
            
            </p>
            
            ";
            }

                ?>

        </div>
    </div>


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