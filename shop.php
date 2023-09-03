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
        form input[type="submit"] {
            padding: 0;
            margin: 0;
            position: relative;
            border-radius: 15px;
            overflow: hidden;
        }
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

        <div class="container">
            <div class="row" style="display: flex; justify-content: right;">
                <form action="" method="post">
                    <div class="form-group ml-3 mb-5">
                        <label for="priceFilter">Price Filter:</label>
                        <select class="form-control mb-3" id="priceFilter" name="priceFilter">
                            <option value="all">All</option>
                            <option value="LowToHigh">Price: Low To High</option>
                            <option value="HighToLow">Price: High To Low</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-outline-primary">Apply Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row px-xl-5">

            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">

                    <?php
                    include 'Connection.php';

                    // Fetch all products from the database
                    $select_product = mysqli_query($con, "SELECT * FROM `product`");
                    $products = [];

                    while ($fetch_products = mysqli_fetch_assoc($select_product)) {
                        $products[] = $fetch_products;
                    }

                    // Initialize the price filter
                    $priceFilter = '';

                    // Check if the price filter option is selected
                    if (isset($_POST['priceFilter'])) {
                        $priceFilter = $_POST['priceFilter'];

                        // Sort the products array based on the selected price filter
                        if ($priceFilter === 'LowToHigh') {
                            usort($products, function ($a, $b) {
                                return $a['p_price'] - $b['p_price'];
                            });
                        } elseif ($priceFilter === 'HighToLow') {
                            usort($products, function ($a, $b) {
                                return $b['p_price'] - $a['p_price'];
                            });
                        }
                    }

                    // Pagination settings
                    $itemsPerPage = 16; // Number of products per page
                    $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Current page, default to 1

                    // Calculate the starting index for fetching products
                    $startIndex = ($page - 1) * $itemsPerPage;

                    // Display products with pagination
                    for ($i = $startIndex; $i < min($startIndex + $itemsPerPage, count($products)); $i++) {
                        $fetch_products = $products[$i];

                        // Your product display code here

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
                                            <h6>RS: <?php echo $fetch_products['p_price'] ?> </h6>
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

                    // Calculate the total number of products for pagination
                    $totalProducts = mysqli_num_rows(mysqli_query($con, "SELECT * FROM `product`"));
                    $totalPages = ceil($totalProducts / $itemsPerPage);
                    ?>

                </div>

                <!-- Your existing HTML code for displaying products -->

                <!-- Pagination links -->
                <div class="pagination" style="display: flex; justify-content: center; align-items: center;">
                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                        <a href="shop.php?page=<?php echo $i; ?>" class="btn btn-sm btn-outline-primary mr-2 <?php echo ($i === $page) ? 'active' : ''; ?> "><?php echo $i; ?></a>
                    <?php endfor; ?>
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