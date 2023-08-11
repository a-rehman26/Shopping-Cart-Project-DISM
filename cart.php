<?php

// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Cart Page</title>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                            <th>Update</th>
                        </tr>
                    </thead>

                    <?php
                    include 'Connection.php';

                    // fetch cart login user 

                    if (isset($_SESSION['user_id'])) {

                        $user_id =  $_SESSION['user_id'];

                        $select_cart_data = mysqli_query($con, " SELECT * FROM `cart` WHERE user_id = '$user_id' ");

                        while ($data_fetch_cart = mysqli_fetch_assoc($select_cart_data)) {

                    ?>

                            <form action="" method="post">

                                <tbody class="align-middle">

                                    <tr>
                                        <td class="align-middle"><img src="Pimages/<?php echo $data_fetch_cart['cart_image'] ?>" alt="" style="width: 55px;"> <?php echo $data_fetch_cart['cart_name'] ?> </td>
                                        <td class="align-middle">RS: <?php echo $data_fetch_cart['cart_price'] ?> </td>
                                        <input type="hidden" class="cart_price" name="" value="<?php echo $data_fetch_cart['cart_price'] ?>" id="">
                                        <td class="align-middle">
                                            <div class="input-group quantity mx-auto" style="width: 100px;">

                                                <input type="number" class="form-control form-control-sm bg-secondary text-center cart_quantity" min="1" max="3" value="<?php echo $data_fetch_cart['cart_quantity'] ?>" name="new_quantity" onchange="cart_quantity()">

                                            </div>
                                        </td>
                                        <td class="align-middle cart_total_price">RS: 0 </td>

                                        <td class="align-middle">
                                            <a href="product_cart_removed.php?product_ID=<?php echo $data_fetch_cart['product_id']; ?>" class="btn btn-sm btn-outline-danger">Remove</a>
                                        </td>
                                        <td class="align-middle">
                                            <button type="submit" name="update_quantity_btn" class="btn btn-sm btn-outline-info" style="width: 150px;">Update Quantity</button>
                                        </td>

                                        <form action="" method="post">

                                            <input type="hidden" name="product_ID_cart" value="<?php echo $data_fetch_cart['product_id']; ?>">

                                        </form>

                                        <?php

                                        if (isset($_POST['update_quantity_btn'])) {
                                            $new_quantity = $_POST['new_quantity'];
                                            $user_id = $_SESSION['user_id'];
                                            $product_id_cart = $_POST['product_ID_cart'];

                                            // Perform the database operation to update the cart item's quantity
                                            $update_query = mysqli_query($con, "UPDATE `cart` SET `cart_quantity`='$new_quantity' WHERE user_id = '$user_id' AND product_id = '$product_id_cart'");

                                            if ($update_query) {
                                        ?>
                                                <script>
                                                    alert("Product Quantity Updated")
                                                    location.replace('cart.php');
                                                    exit();
                                                </script>
                                            <?php
                                            } else {
                                            ?>
                                                <script>
                                                    alert("Product Quantity Not Updated")
                                                    location.replace('cart.php');
                                                </script>
                                        <?php
                                            }
                                        }

                                        ?>

                                    </tr>

                                    <form action="" method="post" class="mt-3" style="display: flex; justify-content: right;">

                                        <input type="hidden" name="product_ID" value="<?php echo $data_fetch_cart['product_id']; ?>">

                                    </form>

                                </tbody>

                            </form>

                            <?php

                        }
                    } else {

                        // for fetch cart non login user

                        if (isset($_SESSION['temp_cart_id'])) {

                            $user_id_non_login =  $_SESSION['temp_cart_id'];

                            $select_cart_data_non_login = mysqli_query($con, " SELECT * FROM `cart` WHERE user_id = '$user_id_non_login' ");

                            while ($data_fetch_cart_non_login = mysqli_fetch_assoc($select_cart_data_non_login)) {
                            ?>


                                <tbody>

                                    <form action="" method="post">

                                        <tr>
                                            <td class="align-middle"><img src="Pimages/<?php echo $data_fetch_cart_non_login['cart_image'] ?>" alt="" style="width: 55px;"> <?php echo $data_fetch_cart_non_login['cart_name'] ?> </td>
                                            <td class="align-middle">RS: <?php echo $data_fetch_cart_non_login['cart_price'] ?> </td>
                                            <input type="hidden" class="cart_price" name="" value="<?php echo $data_fetch_cart_non_login['cart_price'] ?>" id="">
                                            <td class="align-middle">
                                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                                    <input type="number" class="form-control form-control-sm bg-secondary text-center cart_quantity" min="1" max="3" value="<?php echo $data_fetch_cart_non_login['cart_quantity'] ?>" name="new_quantity_non" onchange="cart_quantity()">
                                                </div>
                                            </td>
                                            <td class="align-middle cart_total_price">RS: 0 </td>
                                            <td class="align-middle">
                                                <a href="product_cart_removed.php?product_ID=<?php echo $data_fetch_cart_non_login['product_id']; ?>" class="btn btn-sm btn-outline-danger">Remove</a>
                                            </td>
                                            <td class="align-middle">
                                                <button type="submit" name="update_quantity_btn_non" class="btn btn-sm btn-outline-info" style="width: 150px;">Update Quantity</button>
                                            </td>

                                            <form action="" method="post">

                                                <input type="hidden" name="product_ID_cart_non" value="<?php echo $data_fetch_cart_non_login['product_id']; ?>">

                                            </form>

                                            <?php

                                            if (isset($_POST['update_quantity_btn_non'])) {

                                                $new_quantity_non = $_POST['new_quantity_non'];
                                                $user_id_non = $_SESSION['temp_cart_id'];
                                                $product_id_cart_non = $_POST['product_ID_cart_non'];

                                                // Perform the database operation to update the cart item's quantity
                                                $update_query_non = mysqli_query($con, "UPDATE `cart` SET `cart_quantity`='$new_quantity_non' WHERE user_id = '$user_id_non' AND product_id = '$product_id_cart_non'");

                                                if ($update_query_non) {
                                            ?>
                                                    <script>
                                                        alert("Product Quantity Updated")
                                                        location.replace('cart.php');
                                                        exit();
                                                    </script>
                                                <?php
                                                } else {
                                                ?>
                                                    <script>
                                                        alert("Product Quantity Not Updated")
                                                        location.replace('cart.php');
                                                    </script>
                                            <?php
                                                }
                                            }

                                            ?>

                                        </tr>

                                    </form>

                                </tbody>

                    <?php

                            }
                        }
                    }

                    ?>

                </table>

            </div>
            <div class="col-lg-4">

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">CART SUBTOTAL</h5>
                            <h5 class="font-weight-bold" id="cart_total">RS: 0 </h5>
                        </div>
                        <a href="checkout.php" class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


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

<!-- js price cart  -->
<script>
    let cartPrice = document.getElementsByClassName('cart_price');
    let cartQuantity = document.getElementsByClassName('cart_quantity');
    let cartTotal = document.getElementsByClassName('cart_total_price');

    let cartSubTotal = document.getElementById('cart_total');

    gTotal = 0;

    function cart_quantity() {
        gTotal = 0;

        for (i = 0; i < cartPrice.length; i++) {
            cartTotal[i].innerText = (cartPrice[i].value) * (cartQuantity[i].value);

            gTotal = gTotal + (cartPrice[i].value) * (cartQuantity[i].value);

        }

        cartSubTotal.innerText = gTotal;
    }

    cart_quantity();
</script>

<?php


?>