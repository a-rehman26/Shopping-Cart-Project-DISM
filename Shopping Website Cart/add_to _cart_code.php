<?php

session_start();

include 'Connection.php';

// Function to generate a cart ID for non-log in users
function generateTempCartID()
{
    return uniqid('temp_cart_id' . rand(), true); // Generate a unique temporary cart ID with a random prefix
}

if (isset($_POST['addToCart'])) {

    $cart_p_name = $_POST['cart_pName'];
    $cart_p_price = $_POST['cart_pPrice'];
    $cart_p_image = $_POST['cart_pImage'];
    $cart_p_id = $_POST['cart_ID'];

    // if cart user login 
    $user_id =  $_SESSION['user_id'];

    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        // For logged-in users, use their user ID as cart ID
        $user_id = $_SESSION['user_id'];
    } else {
        // For non-logged-in users, generate a temporary cart ID and set it in the session
        if (!isset($_SESSION['temp_cart_id'])) {
            $_SESSION['temp_cart_id'] = generateTempCartID();
        }
        $user_id = $_SESSION['temp_cart_id'];
    }

    $select_product_cart = mysqli_query($con, " SELECT * FROM `cart` WHERE user_id = '$user_id' AND product_id = '$cart_p_id' ");

    $cart_rows = mysqli_num_rows($select_product_cart);

    if ($cart_rows > 0) {
?>
        <script>
            alert("This Product ALready Add in The Cart")

            location.replace('index.php');
        </script>
        <?php
    } else {

        $insert_cart_product = mysqli_query($con, " INSERT INTO `cart`( `cart_name`, `cart_price`, `cart_image`, `product_id`, `user_id`) VALUES ( '$cart_p_name','$cart_p_price','$cart_p_image','$cart_p_id','$user_id') ");

        if ($insert_cart_product) {
        ?>
            <script>
                alert("Product Add in The CART")

                location.replace('shop.php')
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("Product NOT Add in The CART")
            </script>
<?php
        }
    }
}
?>

<!-- cart products end php code -->