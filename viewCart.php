<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .modal-header {
            background-color: #bff7ec;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }
        .modal-header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
<?php
// Reading database credentials from .env file
$env      = parse_ini_file(".env");
$HOST     = $env['HOST'];
$USERNAME = $env['USERNAME'];
$PASSWORD = $env['PASSWORD'];
$DATABASE = $env['DATABASE'];

try {
    $con = new PDO("mysql:host=$HOST;dbname=$DATABASE", $USERNAME, $PASSWORD);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch medicine IDs from cart
    $SQL = "SELECT medicine_id FROM cart WHERE user_id = :user_id";
    $stmt = $con->prepare($SQL);
    $stmt->execute([':user_id' => $_SESSION['USER-ID']]);
    $medicineIds = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Fetch cart items details
    $cartItems = [];
    foreach ($medicineIds as $medicineId) {
        $SQL2 = "SELECT * FROM medicine WHERE medicine_id = :mid";
        $stmt2 = $con->prepare($SQL2);
        $stmt2->execute([':mid' => $medicineId]);
        $cartItems[] = $stmt2->fetch(PDO::FETCH_ASSOC);
    }

} catch (PDOException $ex) {
    die($ex->getMessage());
} finally {
    $con = null;
}

// Initial total price calculation
$totalPrice = 0;
foreach ($cartItems as $item) {
    $totalPrice += $item['price']; // Default price without quantity adjustment
}
?>

<div class="container">
    <div class="card m-3 p-3">
        <header class="modal-header">
            <h4><i class="fas fa-shopping-cart"></i> View Cart Items:</h4>
            <div class="float-right">
                Welcome <?php echo htmlspecialchars($_SESSION['USER']); ?>
                <a href="logout">Logout</a>
            </div>
        </header>
        <form method="POST" action="">
            <div class='card-body'>
                <table class="table table-hover table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Medicine</th>
                        <th>Price</th>
                        <th>QTY</th>
                    </tr>
                    <?php foreach ($cartItems as $key => $mitem): ?>
                    <tr>
                        <td>
                            <a onclick="return confirm('Do you want this item to be removed from the wishlist?');" href="removeCart.php?mid=<?php echo $mitem['medicine_id']; ?>">
                                <span class='badge badge-pills badge-danger'>X</span>
                            </a>
                        </td>
                        <td><?php echo ($mitem['medicine_name']); ?></td>
                        <td class="price"><?php echo ($mitem['price']); ?></td>
                        <td>
                            <select name="qty[]" class="form-control qty" onchange="updateTotal()">
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                <option value="<?php echo $i; ?>" <?php echo (isset($_POST['qty'][$key]) && $_POST['qty'][$key] == $i) ? 'selected' : ''; ?>>
                                    <?php echo $i; ?>
                                </option>
                                <?php endfor; ?>
                            </select>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="2" align="right"><strong>Total Price:</strong></td>
                        <td colspan="2"><strong id="totalPrice"><?php echo ($totalPrice); ?></strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="center">
                            <a href="dashboard.php" class="btn btn-sm btn-outline-success">Back to Cart</a> |
                            <a href="order.php" class='btn btn-sm btn-outline-info'>Order NOW</a>
                        </td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
</div>

<script>
function updateTotal() {
    let total = 0;
    const prices = document.querySelectorAll('.price');
    const quantities = document.querySelectorAll('.qty');

    quantities.forEach((select, index) => {
        const quantity = parseInt(select.value);
        const price = parseFloat(prices[index].innerText);
        total += quantity * price;
    });

    document.getElementById('totalPrice').innerText = total.toFixed(2);
}
</script>

</body>
</html>
