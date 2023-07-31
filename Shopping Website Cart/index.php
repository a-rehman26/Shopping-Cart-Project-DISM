<?php

// Start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Shopping Website</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="Free HTML Templates" name="keywords" />
  <meta content="Free HTML Templates" name="description" />

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon" />

  <!-- main css modal  -->
  <link rel="stylesheet" href="css/main.css" />
  <link rel="stylesheet" href="css/style.min.css" />
  <link rel="stylesheet" href="css/util.css" />

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />

  <!-- font awesome cdn  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>

  <!-- TopBar & Navbar page also carousel-->
  <?php
  include 'navbar.php';

  ?>

  <!-- Featured Start -->
  <div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px">
          <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px">
          <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
          <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px">
          <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
        <div class="d-flex align-items-center border mb-4" style="padding: 30px">
          <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
          <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- Featured End -->

  <!-- Products Start -->
  <div class="container-fluid pt-5">
    <div class="text-center mb-4">
      <h2 class="section-title px-5">
        <span class="px-2">Stationery Products</span>
      </h2>
    </div>

    <div class="row px-xl-5 pb-3">
      <!-- card  -->

      <!-- Product Fetch then Echo  -->
      <?php
      include 'Connection.php';

      $select_product_stationery = mysqli_query($con, " SELECT * FROM `product` WHERE p_cat NOT IN (1) ");

      while ($fetch_product_stationery = mysqli_fetch_assoc($select_product_stationery)) {

      ?>

        <form action="add_to _cart_code.php" method="post">

          <div class="col-lg-12 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
              <div class="text-center card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                <img class="img-fluid" style="width: 200px; height: 250px;" src="Pimages/<?php echo $fetch_product_stationery['p_image'] ?>" alt="" />
              </div>
              <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h4 class="text-truncate mt-4" style="color: #222; text-shadow: 0 0 blue;">
                  <?php echo $fetch_product_stationery['p_name'] ?> </h4>
                <div class="d-flex justify-content-center">
                  <h6 class="mt-1">RS: <?php echo $fetch_product_stationery['p_price'] ?> </h6>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-between bg-light border">
                <a href="detail.php?BeautyPRODUCTid=<?php echo $fetch_product_stationery['p_id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                <a href="" style="text-decoration: none;" class=""><i class="fas fa-shopping-cart text-primary"></i> <input type="submit" class="btn btn-sm text-dark" value="Add To Cart" name="addToCart" id=""> </a>
              </div>
            </div>
          </div>

          <input type="hidden" value="<?php echo $fetch_product_stationery['p_id'] ?>" name="cart_ID" id="">
          <input type="hidden" name="cart_pImage" value="<?php echo $fetch_product_stationery['p_image'] ?>" id="">
          <input type="hidden" name="cart_pName" value="<?php echo $fetch_product_stationery['p_name'] ?>" id="">
          <input type="hidden" name="cart_pPrice" value="<?php echo $fetch_product_stationery['p_price'] ?>" id="">

        </form>

      <?php

      }

      ?>

    </div>

  </div>
  <!-- Products End -->

  <!-- Products Start -->
  <div class="container-fluid pt-5">
    <div class="text-center mb-4">
      <h2 class="section-title px-5">
        <span class="px-2">Beauty Products</span>
      </h2>

    </div>

    <div class="row px-xl-5 pb-3">

      <!-- Product Fetch then Echo  -->
      <?php
      include 'Connection.php';

      $select_product_beauty = mysqli_query($con, " SELECT * FROM `product` WHERE p_cat = 1 ");

      while ($fetch_product_beauty = mysqli_fetch_assoc($select_product_beauty)) {

      ?>

        <form action="add_to _cart_code.php" method="post">

          <div class="col-lg-12 col-md-6 col-sm-12 pb-1">
            <div class="card product-item border-0 mb-4">
              <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                <img class="img-fluid w-100" style="width: 200px; height: 350px;" src="Pimages/<?php echo $fetch_product_beauty['p_image'] ?>" alt="" />
              </div>
              <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                <h6 class="text-truncate mb-3"> <?php echo $fetch_product_beauty['p_name'] ?> </h6>
                <div class="d-flex justify-content-center">
                  <h6>RS: <?php echo $fetch_product_beauty['p_price'] ?> </h6>
                </div>
              </div>
              <div class="card-footer d-flex justify-content-between bg-light border">
                <a href="detail.php?BeautyPRODUCTid=<?php echo $fetch_product_beauty['p_id'] ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                <a href="" style="text-decoration: none;" class=""><i class="fas fa-shopping-cart text-primary"></i> <input type="submit" class="btn btn-sm text-dark" value="Add To Cart" name="addToCart" id=""> </a>
              </div>
            </div>
          </div>

          <input type="hidden" value="<?php echo $fetch_product_beauty['p_id'] ?>" name="cart_ID" id="">
          <input type="hidden" name="cart_pImage" value="<?php echo $fetch_product_beauty['p_image'] ?>" id="">
          <input type="hidden" name="cart_pName" value="<?php echo $fetch_product_beauty['p_name'] ?>" id="">
          <input type="hidden" name="cart_pPrice" value="<?php echo $fetch_product_beauty['p_price'] ?>" id="">

        </form>

      <?php

      }

      ?>
    </div>

  </div>
  <!-- Products End -->

  <!-- Footer Start -->

  <?php
  include 'footer.php';

  ?>

  <!-- Footer End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Javascript File -->
  <script src="mail/jqBootstrapValidation.min.js"></script>
  <script src="mail/contact.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>
</body>

</html>