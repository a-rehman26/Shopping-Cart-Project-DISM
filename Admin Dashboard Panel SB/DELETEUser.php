<!-- delete query category  -->
<?php
include 'Connection.php';

$id_GET_delete = $_GET['DELETEidUser'];

$delete_query_contact = mysqli_query($con, " DELETE FROM `contact` WHERE id = '$id_GET_delete' ");

if ($delete_query_contact) {
?>

    <script>
        alert("Contact Data Deleted")

        location.replace('ContactForm.php');
    </script>

<?php
} else {
?>

    <script>
        alert("Contact Data Not Deleted")
    </script>

<?php
}

?>