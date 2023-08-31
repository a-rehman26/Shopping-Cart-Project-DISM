<!-- delete query category  -->
<?php
include 'Connection.php';

$id_GET_delete = $_GET['DELETEidProduct'];

$delete_query_product = mysqli_query($con, " DELETE FROM `product` WHERE p_id = '$id_GET_delete' ");

if ($delete_query_product) {
?>

    <script>
        alert("Product Deleted")

        location.replace('ViewProduct.php');
    </script>

<?php
} else {
?>

    <script>
        alert("Product Not Deleted")
    </script>

<?php
}

?>