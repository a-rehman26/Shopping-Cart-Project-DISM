<?php
session_start();
// Include configuration file 
include 'config.php';

// Include database connection file 
include 'Connection.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <title>EShopper - Cart Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'navbar2.php';
    ?>

</body>

</html>


<?php

//echo '<pre>';
//print_r($_POST);
//echo '</pre>';



// If transaction data is available in the URL 
if (
    !empty($_POST['pp_Amount']) && !empty($_POST['pp_AuthCode']) && !empty($_POST['pp_ResponseCode']) && !empty($_POST['pp_MerchantID']) &&
    !empty($_POST['pp_SecureHash']) && !empty($_POST['pp_TxnRefNo']) && !empty($_POST['pp_RetreivalReferenceNo'])
) {
    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
    //Get transaction information from URL 
    $Transaction_id     = $_POST['pp_TxnRefNo'];
    $Amount             = $_POST['pp_Amount'];
    $AuthCode             = $_POST['pp_AuthCode'];
    $ResponseCode         = $_POST['pp_ResponseCode'];
    $ResponseMessage     = $_POST['pp_ResponseMessage'];
    $MerchantID         = $_POST['pp_MerchantID'];
    $SecureHash         = $_POST['pp_SecureHash'];
    $RetreivalReferenceNo = $_POST['pp_RetreivalReferenceNo'];

    //add period(.) before the last two digits of $Amount
    $Amount = substr($Amount, 0, -2) . '.00';
    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN



    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
    //Insert tansaction data into the database
    if ($ResponseCode == '000') {
        $payment_status = 1;
    } else {
        $payment_status = 0;
    }

    $sql = "INSERT INTO payments(transaction_id,product_price,total,created_date,status) 
		VALUES('" . $Transaction_id . "','" . $Amount . "','" . $Amount . "','" . date("Y-m-d H:i:s") . "','" . $payment_status . "')";

    if ($db->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    $payment_id = $db->insert_id;
    //NNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNNN
} else {
    $ResponseCode = 'error';
    $ResponseMessage = 'Some Serious error occurs please check transaction logs for more detail';
}
?>

<div class="container">
    <div class="status">
        <?php if ($ResponseCode == '000') { ?>
            <!-- --------------------------------------------------------------------------- -->
            <!-- Payment successful -->
            <h1 class="success">Your Payment has been Successful</h1>
            <h4>Payment Information</h4>
            <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
            <p><b>Transaction ID:</b> <?php echo $Transaction_id; ?></p>
            <p><b>Paid Amount:</b> <?php echo $Amount; ?></p>
            <p><b>Payment Status:</b> Success</p>
            <!-- --------------------------------------------------------------------------- -->


            <!-- --------------------------------------------------------------------------- -->
            <!-- Payment not successful -->
        <?php } else { ?>
            <h1 class="error">Your Payment has Failed</h1>
            <p><b>Message: </b><?php echo $ResponseMessage; ?></p>
        <?php } ?>
        <!-- --------------------------------------------------------------------------- -->


    </div>
    <a href="index.php" class="btn-link">Back to Products</a>
</div>


<?php
include 'footer.php';
?>