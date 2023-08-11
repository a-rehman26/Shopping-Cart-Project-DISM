<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changed Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <form method="post">
        <div class="container">
            <div class="modal-header">
                <h3>Change Password <span class="extra-title muted"></span></h3>
            </div>
            <div class="modal-body form-horizontal">

                <div class="control-group">
                    <label class="control-label">New Password</label>
                    <div class="controls">
                        <input type="password" name="pass">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Confirm Password</label>
                    <div class="controls">
                        <input type="password" name="cPass">
                    </div>
                </div>

                <br>

                <div class="control-group">
                    <input type="submit" class="btn btn-primary" name="btn" id="">
                </div>

            </div>

        </div>
    </form>
</body>

</html>

<?php
include 'Connection.php';

if (isset($_POST['btn'])) {

    if (isset($_GET['TOKENreset'])) {

        $token_stored = $_GET['TOKENreset'];

        $pass_new = $_POST['pass'];
        $cPass_new = $_POST['cPass'];

        if ($pass_new == $cPass_new) {

            $update_pass = " UPDATE `users` SET `u_pass` = '$pass_new' , `u_Cpass` = '$cPass_new' WHERE u_token = '$token_stored' ";

            $query_update = mysqli_query($con, $update_pass);

            if ($update_pass) {
?>
                <script>
                    alert("Password Was Changed SuccessFully")
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert("Password Was Not Changed SuccessFully")
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert("Password And Confirm Password Not Match")
            </script>
<?php
        }
    }
}
