<?php
session_start();

if (!isset($_SESSION['loginUserName'])) {
    header('Location: ../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin | Dashboard</title>

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

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard_index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> <?php echo $_SESSION['loginUserName']; ?> </div>

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard_index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <?php
            include 'Connection.php';

            if ($_SESSION['loginRole'] == "Admin") {

                echo

                '

                <!-- Nav Item - categories Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa-solid fa-cart-plus"></i>
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Categories</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="dashboard_index.php?AddCategory">Add Categories</a>
                        <a class="collapse-item" href="dashboard_index.php?ViewCategory">View Categories</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - product Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa-solid fa-cart-plus"></i>
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <span>Products</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="dashboard_index.php?AddProduct">Add Product</a>
                        <a class="collapse-item" href="dashboard_index.php?ViewProduct">View Product</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?Users">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?Carts">
                <i class="fa-solid fa-cart-plus"></i>
                    <span>Carts</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?Checkout">
                <i class="fa-solid fa-bag-shopping"></i>
                    <span>Checkout</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?Orders">
                <i class="fa-solid fa-cart-plus"></i>
                    <span>Orders</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?OrdersItem">
                <i class="fa-solid fa-cart-plus"></i>
                    <span>Orders items</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?ContactForm">
                    <i class="fa-regular fa-address-book"></i>
                    <span>Contact Form</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?feedBackForm">
                    <i class="fa-solid fa-message"></i>
                    <span>FeedBack Form</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
                
                ';
            } else if (($_SESSION['loginRole'] == 'Employee')) {

                echo

                '
                
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?ContactForm">
                    <i class="fa-regular fa-address-book"></i>
                    <span>Contact Form</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?feedBackForm">
                    <i class="fa-solid fa-message"></i>
                    <span>FeedBack Form</span></a>
            </li>

        
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?Checkout">
                <i class="fa-solid fa-bag-shopping"></i>
                    <span>Checkout</span></a>
            </li>
            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?Orders">
                <i class="fa-solid fa-cart-plus"></i>
                    <span>Orders</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard_index.php?OrdersItem">
                <i class="fa-solid fa-cart-plus"></i>
                    <span>Orders items</span></a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

                ';
            } else {
                echo "Error 404 [ echo ]";
            }

            ?>


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <?php
                        include 'dashboard_search_navbar.php';

                        ?>


                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter">3+</span>
                                </a>
                            </li>

                            <!-- Nav Item - Messages -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i>
                                    <!-- Counter - Messages -->
                                    <span class="badge badge-danger badge-counter">7</span>
                                </a>
                            </li>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $_SESSION['loginUserName']; ?> </span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="logout.php" data-toggle="#" data-target="#">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- product search fetch  -->

                    <div class="container">

                        <h3 class="mt-4">Search result for "<?php echo $_GET['dashboard_search'] ?>" </h3>

                        <?php
                        include 'Connection.php';

                        $noResult = true;

                        // Search for users

                        $search_input = $_GET['dashboard_search'];

                        $user_query = "SELECT * FROM users WHERE u_name LIKE '%$search_input%'";
                        $user_results = mysqli_query($con, $user_query);

                        while ($row_user_product = mysqli_fetch_assoc($user_results)) {

                            $p_id = $row_user_product['u_id'];
                            $p_Name = $row_user_product['u_name'];
                            $p_Price = $row_user_product['u_email'];
                            $p_Image = $row_user_product['u_pass'];
                            $p_Image = $row_user_product['u_Cpass'];
                            $p_Image = $row_user_product['Role'];
                            $p_Image = $row_user_product['u_number'];
                            $p_Image = $row_user_product['OTP'];
                            $p_Image = $row_user_product['u_token'];
                            $p_Image = $row_user_product['u_status'];

                            $noResult = false;

                        ?>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="text-center table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="color: #555; font-size: 1.2rem;">
                                                <th style="vertical-align: middle;">U ID</th>
                                                <th style="vertical-align: middle;">User Name</th>
                                                <th style="vertical-align: middle;">User Email</th>
                                                <th style="vertical-align: middle;">Password</th>
                                                <th style="vertical-align: middle;">Confirm Password</th>
                                                <th style="vertical-align: middle;">Phone Number</th>
                                                <th style="vertical-align: middle;">OTP</th>
                                                <th style="vertical-align: middle;">User Token</th>
                                                <th style="vertical-align: middle;">User Status</th>
                                                <th style="vertical-align: middle;" colspan="2">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <tr>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_id']  ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_name'] ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_email'] ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_pass'] ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_Cpass'] ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_number'] ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['OTP'] ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_token'] ?></td>
                                                <td style="vertical-align: middle;"> <?php echo $row_user_product['u_status'] ?></td>
                                                <td style="vertical-align: middle;"> <a href="#" title="Edit" style="padding: 20px;"><i class="fa-solid fa-pen-to-square"></i></a> </td>
                                                <td style="vertical-align: middle;"> <a href="#" title="Remove" style="padding: 20px;"><i class="fa-solid fa-trash"></i></a> </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>

                <?php
                        }

                ?>


                <?php
                // Search for products

                $search_input = $_GET['dashboard_search'];

                $product_query = "SELECT * FROM product WHERE p_name LIKE '%$search_input%'";
                $search_results = mysqli_query($con, $product_query);

                while ($row_product = mysqli_fetch_assoc($search_results)) {

                    $p_Name = $row_product['p_name'];
                    $p_Price = $row_product['p_price'];
                    $p_Image = $row_product['p_image'];
                    $p_id = $row_product['p_id'];

                    $noResult = false;

                ?>


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
                                    <tr>
                                        <td style="vertical-align: middle;"> <?php echo $row_product['p_id'] ?></td>
                                        <td style="vertical-align: middle;"> <?php echo $row_product['p_name'] ?></td>
                                        <td style="vertical-align: middle;"> <?php echo $row_product['p_price'] ?></td>
                                        <td style="vertical-align: middle;"> <?php echo $row_product['p_des'] ?></td>
                                        <td style="vertical-align: middle;"> <?php echo $row_product['p_cat'] ?></td>
                                        <td style="vertical-align: middle;"> <img src="Pimages/<?php echo  $row_product['p_image'] ?> " alt="" style="width: 75px;"> </td>
                                        <td style="vertical-align: middle;"> <a href="#" title="Edit" style="padding: 20px;"><i class="fa-solid fa-pen-to-square"></i></a> </td>
                                        <td style="vertical-align: middle;"> <a href="#" title="Remove" style="padding: 20px;"><i class="fa-solid fa-trash"></i></a> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                <?php
                }

                if ($noResult) {
                    echo
                    "
                            No Result:
                            
                            &nbsp
                            
                            <p> 
                            
                            Your search [ '$search_input' ] did not match any Word.
                            
                            </p>
                            
                            ";
                }

                ?>

                </div>

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <!-- <span>Copyright &copy; &nbsp; Hello World</span> -->
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="#">Logout</a>
                </div>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>