<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- font awesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- bootstrap  cdn  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="h2 mb-5 mx-1 mx-md-4 mt-4">Add Product</p>

                                    <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Product Name</label>
                                                <input type="text" name="pName" pattern="[A-Za-z\s]+" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <!-- pattern="^\d+(\.\d{1,2})?$" -->
                                                <label class="form-label">Product Price</label>
                                                <input type="text" name="pPrice" pattern="[0-9]+" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Product Description</label>
                                                <input type="text" name="pDes" class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Product Category</label>
                                                <select name="p_cate" id="" class="form-control" required>
                                                    <!-- categories get  -->
                                                    <?php
                                                    include 'Connection.php';

                                                    $select_categories = mysqli_query($con, " SELECT * FROM `p_category` ");

                                                    while ($fetch_category = mysqli_fetch_assoc($select_categories)) {

                                                    ?>

                                                        <option value="<?php echo $fetch_category['c_id'] ?>">
                                                            <?php echo $fetch_category['c_name'] ?>
                                                        </option>

                                                    <?php

                                                    }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Product image</label>
                                                <input type="file" name="pImage" class="form-control" required accept="image/jpeg, image/jpg, image/png, image/gif" />
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" class="btn btn-outline-primary btn-lg" name="btnAddProduct" id="" value="Add Product">
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<!-- insert product PHP Code  -->
<?php
include 'Connection.php';

if (isset($_POST['btnAddProduct'])) {

    $p_Name = $_POST['pName'];
    $p_Price = $_POST['pPrice'];
    $p_Description = $_POST['pDes'];
    $p_Category = $_POST['p_cate'];
    $p_Image = $_FILES['pImage']['name'];
    $p_Image_tem = $_FILES['pImage']['tmp_name'];

    move_uploaded_file($p_Image_tem, "Pimages/" . $p_Image);

    $product_same_validate = mysqli_query($con, " SELECT * FROM `product` WHERE p_price = '$p_Price' ");

    if (mysqli_num_rows($product_same_validate) > 0) {

?>
        <script>
            alert("This Product Already Add")
        </script>

        <?php

    } else {

        $insert_query_product = mysqli_query($con, "INSERT INTO `product` (`p_name`, `p_price`, `p_des`, `p_cat`, `p_image`) VALUES (
            '" . mysqli_real_escape_string($con, $p_Name) . "',
            '" . mysqli_real_escape_string($con, $p_Price) . "',
            '" . mysqli_real_escape_string($con, $p_Description) . "',
            '" . mysqli_real_escape_string($con, $p_Category) . "',
            '" . mysqli_real_escape_string($con, $p_Image) . "')");

        if ($insert_query_product) {

        ?>

            <script>
                alert("Product Add SuccessFully Done")
            </script>

        <?php
        } else {
        ?>

            <script>
                alert("Product Not Add ")
            </script>

<?php
        }
    }
}
?>