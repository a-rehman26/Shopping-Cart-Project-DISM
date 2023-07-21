<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>

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

                                    <p class="h2 mb-5 mx-1 mx-md-4 mt-4"> Product Update</p>

                                    <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">


                                        <!-- Category Update PHP Code  -->
                                        <?php
                                        include 'Connection.php';

                                        $updateID = $_GET['UPDATEidProduct'];

                                        $select_product_data = mysqli_query($con, " SELECT * FROM `product` WHERE p_id = '$updateID' ");

                                        $data_save = mysqli_fetch_assoc($select_product_data);

                                        if (isset($_POST['btnAddCategory'])) {

                                            $updateID_fetch = $_GET['UPDATEidProduct'];

                                            $product_name = $_POST['product_category_name'];
                                            $product_price = $_POST['product_category_price'];
                                            $product_des = $_POST['product_category_des'];
                                            $product_category = $_POST['p_cate'];
                                            $product_image = $_POST['product_category_image'];


                                            $update_query_product = mysqli_query($con, " UPDATE `product` SET `p_name`='$product_name',`p_price`='$product_price',`p_des`='$product_des',`p_cat`='$product_category',`p_image`='$product_image' WHERE p_id = '$updateID_fetch' ");

                                            if ($update_query_product) {

                                        ?>

                                                <script>
                                                    alert("Product Updated SuccessFully Done")

                                                    location.replace('ViewProduct.php');
                                                </script>

                                            <?php
                                            } else {
                                            ?>

                                                <script>
                                                    alert("Product Not Update ")

                                                    location.replace('ViewProduct.php');
                                                </script>

                                        <?php
                                            }
                                        }

                                        ?>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Product Name (Update)</label>
                                                <input type="text" name="product_category_name" class="for-control" value="<?php echo $data_save['p_name'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Product Price (Update)</label>
                                                <input type="text" name="product_category_price" class="for-control" value="<?php echo $data_save['p_price'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Product des (Update)</label>
                                                <input type="text" name="product_category_des" class="for-control" value="<?php echo $data_save['p_des'] ?>" id="">
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
                                                <label class="form-label">Product image (Update)</label>
                                                <input type="text" name="product_category_image" class="for-control" value="<?php echo $data_save['p_image'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" class="btn btn-outline-primary btn-lg" name="btnAddCategory" id="" value="Add Category">
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