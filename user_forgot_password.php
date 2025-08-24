<?php
session_start();
include 'Connection.php';
// Rest of the PHP code
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <style>
        .form-gap {
            padding-top: 70px;
        }
    </style>
</head>

<body>
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="email" name="email" placeholder="email address" class="form-control" type="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="btnF" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- php code  -->

<?php
session_start();
include 'Connection.php';

if (isset($_POST['btnF'])) {

    $inp_forgot = $_POST['email'];

    $select_email = "SELECT * FROM `users` WHERE u_email = '$inp_forgot'";
    $query_email = mysqli_query($con, $select_email);

    if ($query_email && mysqli_num_rows($query_email) > 0) {

        $data_fetch = mysqli_fetch_assoc($query_email);

        if ($data_fetch) {
            $UserName = $data_fetch['u_name'];
            $UserToken = $data_fetch['u_token'];

            $subject = "Changed Password";
            $body = "Hello $UserName, Click Here To Change Your Password: https://spiritual-investiga.000webhostapp.com/Aptech%20Dism%20Project/resetPass.php?TOKENreset=$UserToken";
            $sender = "RESETPASSWORD123@gmail.com";

            $headers = "From: $sender\r\n";
            $headers .= "Reply-To: $sender\r\n";
            $headers .= "Content-type: text/html\r\n";

            if (mail($inp_forgot, $subject, $body, $headers)) {
?>
                <script>
                    alert('Reset Password Link Sent To Your Email');
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Reset Password Link Not Sent');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Data Not Found');
            </script>
        <?php
        }
    } else {
        ?>
        <script>
            alert('No Record Found');
        </script>
<?php
    }
}
?>