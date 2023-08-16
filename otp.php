<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <section class="vh-100" style="background-color: #eee;">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">OTP Verification</p>
                                        <form class="mx-1 mx-md-4" method="post">
                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div class="form-outline flex-fill mb-0">
                                                    <label class="form-label">Enter OTP Code</label>
                                                    <input type="text" name="otp" id="form3Example4c" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                <input type="submit" name="btnSubmit" class="btn btn-primary btn-lg" id="" value="Verify">
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
    </div>
</body>

</html>

<!-- php code  -->

<?php
include 'Connection.php';

if (isset($_POST['btnSubmit'])) {

    $email_fetch = $_SESSION['otp_email'];

    $inp_otp = $_POST['otp'];

    $select_otp = " SELECT * FROM `users` WHERE u_email = '$email_fetch' AND OTP = '$inp_otp' ";

    $query_select = mysqli_query($con, $select_otp);

    $select_rows = mysqli_num_rows($query_select);

    if ($select_rows == 1) {

        $update_status = " UPDATE `users` SET u_status = 'Active' WHERE u_email = '$email_fetch' ";

        $query_update = mysqli_query($con, $update_status);

        if ($query_update) {
?>
            <script>
                alert('OTP verification successful. Account activated!');

                location.replace('index.php');
            </script>
        <?php
        } else {
        ?>
            <script>
                alert('Error ... Please try again later.');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('Invalid OTP code. Please try again.');
        </script>
<?php
    }
}
