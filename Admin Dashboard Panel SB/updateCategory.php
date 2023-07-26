<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>

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

                                    <p class="h2 mb-5 mx-1 mx-md-4 mt-4"> Category Update</p>

                                    <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">


                                        <!-- Category Update PHP Code  -->
                                        <?php
                                        include 'Connection.php';

                                        $updateID = $_GET['UPDATEid'];

                                        $select_category_data = mysqli_query($con, " SELECT * FROM `p_category` WHERE c_id = '$updateID' ");

                                        $data_save = mysqli_fetch_assoc($select_category_data);

                                        if (isset($_POST['btnAddCategory'])) {

                                            $updateID_fetch = $_GET['UPDATEid'];

                                            $category = $_POST['update_category'];

                                            $update_query_category = mysqli_query($con, " UPDATE `p_category` SET `c_name`='$category' WHERE c_id = '$updateID_fetch' ");

                                            if ($update_query_category) {

                                        ?>

                                                <script>
                                                    alert("Category Updated SuccessFully Done")

                                                    location.replace('ViewCategory.php');
                                                </script>

                                            <?php
                                            } else {
                                            ?>

                                                <script>
                                                    alert("Category Not Update ")
                                                </script>

                                        <?php
                                            }
                                        }

                                        ?>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Category Name (Upadte)</label>
                                                <input type="text" name="update_category" class="for-control" value="<?php echo $data_save['c_name'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" class="btn btn-outline-primary btn-lg" name="btnAddCategory" id="" value="Update Category">
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