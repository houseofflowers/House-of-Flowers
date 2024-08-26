<?php include 'header.php';?>

<style>
    .custom-btn {
        background-color: #e15a7f;
        border: none;
    }

    .custom-btn:hover {
        background-color: #000;
        color: #fff;
    }
</style>

<section class="section4" id="product" style="margin-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" data-aos="fade-down">
                <h1>Our <span class="clrchange">Products</span></h1>
            </div>
        </div>
        <div class="row">
            <form method="GET" class="col-sm-12" style="margin-bottom: 20px;">
                <div class="input-group">
                    <select class="form-control" name="category">
                        <option value="">All Categories</option>
                        <?php
                        include 'admin/db.php';
                        $categories = $conn->query("SELECT DISTINCT category FROM products");
                        while ($cat = $categories->fetch_assoc()) {
                            echo '<option value="' . $cat['category'] . '">' . $cat['category'] . '</option>';
                        }
                        ?>
                    </select>
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success btn-lg custom-btn">Filter</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <?php
            include 'admin/db.php';
            $category = isset($_GET['category']) ? $_GET['category'] : '';
            $query = "SELECT * FROM products";
            if ($category) {
                $query .= " WHERE category = '" . $conn->real_escape_string($category) . "'";
            }
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) {
                $salePrice = $row['price'] - ($row['price'] * ($row['sale'] / 100));
                $hasSale = $row['sale'] > 0;
                echo '<div class="col-sm-4" data-aos="fade-right">
                    <div class="innerproductsection">
                        ' . ($hasSale ? '<span class="discount">' . $row['sale'] . '% Off</span>' : '') . '
                        <img src="assets/' . $row['image'] . '" alt="' . $row['name'] . '" />
                        <div class="cartcontainer">
                            <button class="wishlist"><i class="fa-solid fa-heart"></i></button>
                            <button class="btn add-to-cart" data-id="' . $row['id'] . '" data-name="' . $row['name'] . '" data-price="' . $salePrice . '" data-image="' . $row['image'] . '">Add To Cart <i class="fa-solid fa-cart-plus"></i></button>
                            <button class="share"><i class="fa-solid fa-share"></i></button>
                        </div>
                        <h2>' . $row['name'] . '</h2>
                        <h1 class="price text-center"><span class="clrchange">$' . number_format($salePrice, 2) . '</span>' . 
                        ($hasSale ? ' <del>$' . number_format($row['price'], 2) . '</del>' : '') . '</h1>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<script src="js/app.js" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.add-to-cart');
        buttons.forEach(button => {
            button.addEventListener('click', function () {
                const productId = this.getAttribute('data-id');
                const productName = this.getAttribute('data-name');
                const productPrice = this.getAttribute('data-price');
                const productImage = this.getAttribute('data-image');

                const data = new FormData();
                data.append('product_id', productId);
                data.append('product_name', productName);
                data.append('product_price', productPrice);
                data.append('product_image', productImage);

                fetch('cart/add_to_cart.php', {
                    method: 'POST',
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert('Product added to cart');
                        document.querySelector('.cartbtn').style.display = 'block';
                    } else {
                        alert('Error adding product to cart');
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>
</body>
</html>
