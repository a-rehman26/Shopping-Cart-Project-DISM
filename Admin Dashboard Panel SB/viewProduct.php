<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Products</title>

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

<body id="page-top">

    <!-- DataTales Example -->
    <div class="card shadow mb-4  d-flex justify-content-center align-items-center">
        <div class="card-header py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="m-0 font-weight-bold text-dark">Products</h3>

                <form method="POST">
                    <div class="form-group ml-3">
                        <label for="priceFilter">Price Filter:</label>
                        <select class="form-control" id="priceFilter" name="priceFilter">
                            <option value="all">All</option>
                            <option value="LowToHigh">Price: Low To High</option>
                            <option value="HighToLow">Price: High To Low</option>
                        </select>
                        <button type="submit" class="mt-3 btn btn-sm btn-outline-primary">Apply Filter</button>
                    </div>
                </form>

            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                        <tr style="color: #555; font-size: 1.2rem;">
                            <th style="vertical-align: middle;">Product ID</th>
                            <th style="vertical-align: middle;">Product Name</th>
                            <th style="vertical-align: middle;">Product Price</th>
                            <th style="vertical-align: middle;">Product Description</th>
                            <th style="vertical-align: middle;">Product Category</th>
                            <th style="vertical-align: middle;">Product image</th>
                            <th style="vertical-align: middle;" colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        include 'Connection.php';

                        // Pagination settings
                        // $records_per_page = 10; // Number of records per page
                        // $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

                        // Calculate offset
                        // $offset = ($current_page - 1) * $records_per_page;

                        // Fetch products with pagination
                        // $select_product_data = mysqli_query($con, "SELECT * FROM `product` LIMIT $offset, $records_per_page");

                        // Pagination settings
                        $records_per_page = 10; // Number of records per page
                        $current_page = isset($_GET['page']) ? $_GET['page'] : 1; // Current page number

                        // Calculate offset
                        $offset = ($current_page - 1) * $records_per_page;

                        // Initialize variables
                        $orderBy = 'ORDER BY CAST(p_price AS DECIMAL) ASC';
                        // $orderBy = ''; // To store the sorting order

                        // Check if the price filter option is selected
                        if (isset($_POST['priceFilter'])) {
                            $filter = $_POST['priceFilter'];

                            // Determine the sorting order based on the filter
                            if ($filter === 'LowToHigh') {
                                $orderBy = 'ORDER BY p_price ASC';
                            } elseif ($filter === 'HighToLow') {
                                $orderBy = 'ORDER BY p_price DESC';
                            }
                        }

                        // Fetch products with pagination and sorting
                        $query = "SELECT * FROM `product` $orderBy LIMIT $offset, $records_per_page";
                        $select_product_data = mysqli_query($con, $query);

                        while ($fetch_product_data = mysqli_fetch_assoc($select_product_data)) {

                            // while ($fetch_product_data = mysqli_fetch_assoc($select_product_data)) {
                        ?>

                            <tr>
                                <td style="vertical-align: middle;"> <?php echo $fetch_product_data['p_id'] ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_product_data['p_name'] ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_product_data['p_price'] ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_product_data['p_des'] ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_product_data['p_cat'] ?></td>
                                <td style="vertical-align: middle;"> <img src="Pimages/<?php echo  $fetch_product_data['p_image'] ?> " alt="" style="width: 75px;"> </td>
                                <td style="vertical-align: middle;"> <a href="UPDATEproduct.php?UPDATEidProduct=<?php echo $fetch_product_data['p_id'] ?>" title="Edit" style="padding: 20px;"><i class="fa-solid fa-pen-to-square"></i></a> </td>
                                <td style="vertical-align: middle;"> <a href="DELETEproduct.php?DELETEidProduct=<?php echo $fetch_product_data['p_id'] ?>" title="Remove" style="padding: 20px;"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>

                        <?php

                        }

                        ?>

                        <!-- Pagination navigation -->
                        <tr>
                            <td colspan="8" style="text-align: center;">
                                <?php
                                $total_records = mysqli_query($con, "SELECT COUNT(*) AS total FROM `product`")->fetch_assoc()['total'];
                                $total_pages = ceil($total_records / $records_per_page);

                                if ($total_pages > 1) {
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        echo "<a href='viewProduct.php?page=$i' class='btn btn-sm btn-outline-info'>$i</a> ";
                                    }
                                }
                                ?>
                            </td>
                        </tr>

                        <td colspan="8" style="text-align: right;">
                            <a href="dashboard_index.php" class="btn btn-primary">Back To DashBoard</a>
                        </td>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>

</html>