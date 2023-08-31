<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>View Contact Form</title>

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
            <h3 class="m-0 font-weight-bold text-dark">Contact Form</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="color: #555; font-size: 1.2rem;">
                            <th style="vertical-align: middle;">Contact ID</th>
                            <th style="vertical-align: middle;">Contact Name</th>
                            <th style="vertical-align: middle;">Contact Email</th>
                            <th style="vertical-align: middle;">Contact Subject</th>
                            <th style="vertical-align: middle;">Contact Message</th>
                            <th style="vertical-align: middle;" colspan="2">Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <!-- view products PHP Code -->
                        <?php
                        include 'Connection.php';

                        // for index counting sequence 
                        $pID = 1;

                        $select_contact_data = mysqli_query($con, " SELECT * FROM `contact` ");

                        while ($fetch_contact_data = mysqli_fetch_assoc($select_contact_data)) {

                        ?>

                            <tr>
                                <td style="vertical-align: middle;"> <?php echo $pID++ ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_contact_data['name'] ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_contact_data['email'] ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_contact_data['subject'] ?></td>
                                <td style="vertical-align: middle;"> <?php echo $fetch_contact_data['message'] ?></td>
                                <td style="vertical-align: middle;"> <a href="UPDATEUser.php?UPDATEidUser=<?php echo $fetch_contact_data['id'] ?>" title="Edit" style="padding: 20px;" target="_blank"><i class="fa-solid fa-pen-to-square"></i></a> </td>
                                <td style="vertical-align: middle;"> <a href="DELETEUser.php?DELETEidUser=<?php echo $fetch_contact_data['id'] ?>" title="Remove" style="padding: 20px;" target="_blank"><i class="fa-solid fa-trash"></i></a> </td>
                            </tr>

                        <?php

                        }

                        ?>

                    </tbody>
                </table>
            </div>
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