<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Checkout</title>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <form action="" method="post">
            <div class="row px-xl-5">
                <div class="col-lg-8">
                    <div class="mb-4">
                        <h4 class="font-weight-semi-bold mb-4">Billing Address</h4>
                        <div class="row">

                            <div class="col-md-6 form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" placeholder="John" name="fName">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" placeholder="Doe" name="lName">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>E-mail</label>
                                <input class="form-control" type="text" placeholder="example@email.com" name="email">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="+123 456 789" name="mobile">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" type="text" placeholder="123 Street" name="address01">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Address Line 2</label>
                                <input class="form-control" type="text" placeholder="123 Street" name="address02">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="New York" name="city">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" placeholder="123" name="zipCode">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Orders</h4>
                        </div>

                        <?php
                        include 'Connection.php';

                        $subTotal = 0; // Initialize subtotal variable

                        $user_id_fetch = $_SESSION['user_id'];

                        if (isset($_SESSION['user_id'])) {

                            $select_cart_product = mysqli_query($con, " SELECT * FROM `cart` WHERE user_id = '$user_id_fetch'  ");

                            while ($row_cart_product = mysqli_fetch_assoc($select_cart_product)) {

                                $productTotal = $row_cart_product['cart_price'] * $row_cart_product['cart_quantity'];
                                $subTotal += $productTotal;

                        ?>

                                <form action="" method="post" style="width: auto; height: 50px;">

                                    <div class="card-body">

                                        <div class="d-flex justify-content-between">
                                            <h6> <?php echo $row_cart_product['cart_name'] ?> [ <?php echo $row_cart_product['cart_quantity'] ?> ] </h6>
                                            <p>RS: <?php echo $row_cart_product['cart_price'] ?> </p>
                                        </div>

                                    </div>

                                </form>

                        <?php

                            }
                        }

                        ?>

                        <hr class="mt-3">

                        <div class="card-body border-secondary bg-transparent">
                            <div class="d-flex justify-content-between">
                                <h5 class="font-weight-medium">Subtotal Amount</h5>
                                <h6 class="font-weight-medium">RS: <?php echo $subTotal; ?></h6>
                            </div>
                        </div>
                    </div>


                    <div class="card border-secondary mb-5">
                        <div class="card-header bg-secondary border-0">
                            <h4 class="font-weight-semi-bold m-0">Payment</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="Cash_On_Delivery" name="CashOnDelivery" id="CashOnDelivery">
                                    <label class="custom-control-label" for="CashOnDelivery">Cash On Delivery</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="Check" name="Check" id="Check">
                                    <label class="custom-control-label" for="Check">Check</label>
                                </div>
                            </div>
                            <div class="">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="Bank_Transfer" name="BankTransfer" id="BankTransfer">
                                    <label class="custom-control-label" for="BankTransfer">Bank Transfer</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <input type="submit" class="btn btn-lg btn-block btn-primary font-weight-bold my-3" name="btn_order_place" id="">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Checkout End -->

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

<?php
include 'Connection.php';

if (isset($_POST['btn_order_place'])) {
    $checkout_F_name = $_POST['fName'];
    $checkout_L_name = $_POST['lName'];
    $checkout_email = $_POST['email'];
    $checkout_mobile = $_POST['mobile'];
    $checkout_address01 = $_POST['address01'];
    $checkout_address02 = $_POST['address02'];
    $checkout_city = $_POST['city'];
    $checkout_zipCode = $_POST['zipCode'];

    $checkout_payment_cod = $_POST['CashOnDelivery'];
    $checkout_payment_check = $_POST['Check'];
    $checkout_payment_check = $_POST['BankTransfer'];
}
?>