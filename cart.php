<?php
session_start();

// Ensure $_SESSION['cart'] is always an array
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Assuming customer data is captured when placing an order, and this is just a placeholder array
$customerData = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'address' => ''
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Shopping Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- AOS Library for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .cart-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }
        .table thead {
            color: #FFFFFF;
        }
        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<section class="main-section centered-content py-5">
    <div class="container cart-container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Your Shopping Cart</h1>
                <?php if (!empty($_SESSION['cart'])): ?>
                    <form action="cart/checkout.php" method="post" id="cart-form">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total = 0;
                                    foreach ($_SESSION['cart'] as $key => $product):
                                        $productTotal = $product['price'] * $product['quantity'];
                                        $total += $productTotal;
                                    ?>
                                        <tr>
                                            <td><img src="assets/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="cart-product-image img-fluid" style="max-width: 100px;"></td>
                                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                                            <td>
                                                <input type="hidden" name="product_id[]" value="<?php echo htmlspecialchars($product['id']); ?>">
                                                <div class="input-group justify-content-center">
                                                    <input type="number" name="quantity[]" value="<?php echo htmlspecialchars($product['quantity']); ?>" min="1" class="form-control cart-product-quantity" style="max-width: 80px;">
                                                    <button type="button" class="btn btn-outline-secondary update-quantity-btn" data-product-id="<?php echo htmlspecialchars($product['id']); ?>"><i class="fas fa-sync"></i></button>
                                                </div>
                                            </td>
                                            <td>$<?php echo number_format($productTotal, 2); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-from-cart-btn" data-product-id="<?php echo htmlspecialchars($product['id']); ?>"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                                        <td>$<?php echo number_format($total, 2); ?></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg mt-4" style="background-color: #e15a7f; border: none;">Proceed to Checkout</button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        <p style="font-size: 20px;">Your cart is empty.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<!-- Custom Script -->
<script>
$(document).ready(function() {
    $('.update-quantity-btn').click(function() {
        var productId = $(this).data('product-id');
        var newQuantity = $(this).closest('.input-group').find('.cart-product-quantity').val();
        
        // Update quantity via AJAX
        $.ajax({
            url: 'cart/update_cart.php',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: newQuantity
            },
            success: function(response) {
                location.reload(); // Reload the page for simplicity in this example
            },
            error: function() {
                alert('Failed to update the quantity. Please try again.');
            }
        });
    });

    $('.remove-from-cart-btn').click(function() {
        var productId = $(this).data('product-id');

        // Remove item via AJAX
        $.ajax({
            url: 'cart/remove_from_cart.php',
            method: 'POST',
            data: {
                product_id: productId
            },
            success: function(response) {
                var result = JSON.parse(response);
                if (result.status === 'success') {
                    location.reload(); // Reload the page for simplicity in this example
                } else {
                    alert('Failed to remove the item. Please try again.');
                }
            },
            error: function() {
                alert('Failed to remove the item. Please try again.');
            }
        });
    });
});
</script>
</body>
</html>
