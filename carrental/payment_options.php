<?php
// Ensure the amount and transaction_id are set via GET
$amount = isset($_GET['amount']) ? $_GET['amount'] : '0.00';
$transaction_id = isset($_SESSION['transaction_id']) ? $_SESSION['transaction_id'] : ''; // Get the transaction_id from session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Payment Method</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .amount {
            text-align: center;
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }

        .payment-option {
            padding: 15px;
            margin: 15px 0;
            background-color:rgb(207, 216, 232);
            border: 1px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .payment-option img {
            max-width: 50px;
            margin-right: 10px;
        }

        .payment-option:hover {
            background-color:rgb(124, 118, 164);
        }

        .payment-option span {
            font-size: 16px;
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                margin: 20px;
                padding: 15px;
            }
            h2 {
                font-size: 24px;
            }
            .payment-option span {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .payment-option img {
                max-width: 40px;
            }
            .payment-option span {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Select Payment Method</h2>
        <p class="amount">Amount: ₹ <?php echo htmlspecialchars($amount); ?></p>
        
        <div class="payment-option" onclick="redirectToPay('netbanking')">
            <img src="assets/images/NetBanking.png" alt="Net Banking"> <span>Net Banking</span>
        </div>
        <div class="payment-option" onclick="redirectToPay('upipay')">
            <img src="assets/images/upi.jpeg" alt="upiay"> <span>UPI pay</span>
        </div>
        <div class="payment-option" onclick="redirectToPay('debit/credit card')">
            <img src="assets/images/card.png" alt="debit/credit card"> <span>Debit/Credit Card</span>
        </div>
        <div class="payment-option" onclick="redirectToPay('Cash on delivery')">
            <img src="assets/images/COD.png" alt="Cash on delivery"> <span>COD/Pay at Pickup</span>
        </div>
    </div>

    <script>
        // Redirect function to pass selected payment method, amount, and transaction_id to pay.php
        function redirectToPay(method) {
            const amount = "<?php echo htmlspecialchars($amount); ?>";
            const transaction_id = "<?php echo htmlspecialchars($transaction_id); ?>";
            window.location.href = 'pay.php?method=' + method + '&amount=' + amount + '&transaction_id=' + transaction_id;
        }
    </script>
</body>
</html>