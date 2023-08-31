                                    <!-- remove product php code  -->

                                    <?php
                                    session_start();
                                    include 'Connection.php';

                                    if (isset($_GET['product_ID'])) {

                                        $product_id = $_GET['product_ID'];
                                        $user_id = $_SESSION['user_id'];

                                        $remove_query_product_cart = mysqli_query($con, "DELETE FROM `cart` WHERE user_id = '$user_id' AND product_id = '$product_id'");

                                        if ($remove_query_product_cart) {
                                    ?>
                                            <script>
                                                alert("Product Removed")
                                                location.replace('cart.php');
                                                exit();
                                            </script>
                                        <?php
                                        } else {
                                        ?>
                                            <script>
                                                alert("Product Not Removed")
                                                location.replace('cart.php');
                                            </script>
                                    <?php
                                        }
                                    } else {
                                        header("Location: cart.php");
                                        exit();
                                    }
                                    ?>