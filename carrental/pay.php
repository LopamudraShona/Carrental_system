<?php
session_start();

// Retrieve payment details from GET parameters
$method = isset($_GET['method']) ? htmlspecialchars($_GET['method']) : 'N/A';
$amount = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : '0.00';
$transaction_id = isset($_GET['transaction_id']) ? htmlspecialchars($_GET['transaction_id']) : 'N/A';

// OPTIONAL: You could also store this in session or database if needed
$_SESSION['payment_info'] = ['method' => $method, 'amount' => $amount, 'transaction_id' => $transaction_id];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Processing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e6f0f5;
            padding: 0;
            margin: 0;
        }

        .container {
            max-width: 500px;
            margin: 80px auto;
            padding: 30px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .details {
            margin-top: 20px;
            font-size: 16px;
            color: #555;
        }

        .back-button {
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Processing Payment</h2>
        <div class="details">
            <p><strong>Payment Method:</strong> <?php echo ucfirst($method); ?></p>
            <p><strong>Amount:</strong> ₹ <?php echo $amount; ?></p>
            <p><strong>Transaction ID:</strong> <?php echo $transaction_id; ?></p>
        </div>

        <p>Thank you for choosing a payment method. You will be redirected shortly or click below to continue.</p>

        <!-- You can redirect to actual payment gateway from here -->
        <a class="back-button" href="index.php">Return to Homepage</a>
    </div>
</body>
</html>
