<!-- delete query category  -->
<?php
include 'Connection.php';

$id_GET_delete = $_GET['DELETEid'];

$delete_query_category = mysqli_query($con, " DELETE FROM `p_category` WHERE c_id = '$id_GET_delete' ");

if ($delete_query_category) {
?>

    <script>
        alert("Category Deleted")

        location.replace('ViewCategory.php');
    </script>

<?php
} else {
?>

    <script>
        alert("Category Not Deleted")
    </script>

<?php
}

?>