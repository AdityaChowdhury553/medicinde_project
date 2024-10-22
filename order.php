
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        .thank-you-message {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="thank-you-message">
        <h1>Thank You for Your Order!</h1>
        <p>Your order has been successfully placed.</p>
        
        <?php
        // Calculate estimated delivery date
        $deliveryDate = new DateTime();
        $deliveryDate->modify('+5 days'); // Assuming 5 days for delivery

        echo "<p>Estimated Delivery Date: <strong>" . $deliveryDate->format('F j, Y') . "</strong></p>";
        ?>

        <p>We appreciate your business and look forward to serving you again!</p>
        <a href="dashboard.php" class="btn btn-primary">Return to Dashboard</a>
    </div>
</div>

</body>
</html>
?>