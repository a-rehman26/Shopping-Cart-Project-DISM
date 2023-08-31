<?php
include 'Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    // Perform database update query here to update order status
    $update_query = "UPDATE orders SET order_status = '$new_status' WHERE order_id = '$order_id'";
    $result = mysqli_query($con, $update_query);

    if ($result) {
?>

        <script>
            alert("Order status updated successfully.")

            location.replace("http://localhost/Aptech%20DISM%20Project%20Folder/Admin%20Dashboard%20Panel%20SB/index.php?Orders")
        </script>

    <?php
        echo "";
    } else {
    ?>

        <script>
            alert("Order status Not updated.")
        </script>

<?php
    }
}
