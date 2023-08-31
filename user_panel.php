<?php
session_start();

include 'Connection.php';

include 'navbar2.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - User Panel</title>
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

    <div class="container mt-5">
        <h2>Your Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Order Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include database connection
                include 'Connection.php';

                // Fetch user's orders
                $user_id = $_SESSION['user_id'];
                $orders_query = "SELECT * FROM orders WHERE user_id = '$user_id'";
                $orders_result = mysqli_query($con, $orders_query);

                while ($row = mysqli_fetch_assoc($orders_result)) {
                    $order_id = $row['order_id'];
                    $order_total = $row['order_total'];
                    $order_status = $row['order_status'];
                ?>
                    <tr>
                        <td><?php echo $order_id; ?></td>
                        <td><?php echo $order_total; ?></td>
                        <td><?php echo $order_status; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php
    include 'footer.php';

    ?>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>