<?php

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the raw POST data
    $rawData = file_get_contents('php://input');

    // Parse the raw POST data
    parse_str($rawData, $postData);

    // Perform necessary validations and security checks here
    // Validate payment status, merchant ID, integrity hash, etc.

    // Once validated, update your database or perform any other necessary actions
    if ($postData['payment_status'] === 'Success') {
        // Update your database or perform other actions
        // Example: Update the order status to 'Paid'
        $orderId = $postData['order_id'];
        // Update order status in your database
    }
}

// Send a response back to the JazzCash server
$response = [
    'status' => 'OK',
    'message' => 'IPN received and processed successfully',
];
echo json_encode($response);
