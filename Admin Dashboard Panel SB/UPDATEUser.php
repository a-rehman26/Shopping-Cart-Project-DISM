<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contact Form</title>

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

                                    <p class="h2 mb-5 mx-1 mx-md-4 mt-4"> Contact Form Update</p>

                                    <form class="mx-1 mx-md-4" method="post" enctype="multipart/form-data">


                                        <!-- Category Update PHP Code  -->
                                        <?php
                                        include 'Connection.php';

                                        $updateID = $_GET['UPDATEidUser'];

                                        $select_contact_data = mysqli_query($con, " SELECT * FROM `contact` WHERE id = '$updateID' ");

                                        $data_save = mysqli_fetch_assoc($select_contact_data);

                                        if (isset($_POST['btnAddCategory'])) {

                                            $updateID_fetch = $_GET['UPDATEidUser'];

                                            $contact_name = $_POST['product_category_name'];
                                            $contact_email = $_POST['product_category_price'];
                                            $contact_subject = $_POST['product_category_sub'];
                                            $contact_message = $_POST['product_category_des'];

                                            $update_query_contact = mysqli_query($con, " UPDATE `contact` SET `name`='$contact_name',`email`='$contact_email',`subject`='$contact_subject',`message`='$contact_message' WHERE id = '$updateID_fetch' ");

                                            if ($update_query_contact) {

                                        ?>

                                                <script>
                                                    alert("Contact Form Data Updated SuccessFully Done")

                                                    location.replace('ContactForm.php');
                                                </script>

                                            <?php
                                            } else {
                                            ?>

                                                <script>
                                                    alert("Contact Form Data Not Update ")

                                                    location.replace('ContactForm.php');
                                                </script>

                                        <?php
                                            }
                                        }

                                        ?>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Contact Name (Update)</label>
                                                <input type="text" name="product_category_name" class="for-control" value="<?php echo $data_save['name'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Contact Email (Update)</label>
                                                <input type="email" name="product_category_price" class="for-control" value="<?php echo $data_save['email'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Contact Subject (Update)</label>
                                                <input type="text" name="product_category_sub" class="for-control" value="<?php echo $data_save['subject'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <div class="form-outline flex-fill mb-0">
                                                <label class="form-label">Contact Message (Update)</label>
                                                <input type="text" name="product_category_des" class="for-control" value="<?php echo $data_save['message'] ?>" id="">
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <input type="submit" class="btn btn-outline-primary btn-lg" name="btnAddCategory" id="" value="Update User Data">
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