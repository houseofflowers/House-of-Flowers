<?php include 'header.php'; ?>

<section class="section1" id="top">
    <div class="container">
        <div class="row" data-aos="fade-right">
            <div class="col-sm-12">
                <h1>Fresh Flowers</h1>
                <h2>Natural & Beautiful Flowers</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="#" class="links">Shop Now</a>
            </div>
        </div>
    </div>
</section>

<section class="section2" id="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" data-aos="fade-down">
                <h1 class="mainheading"><span class="clrchange">About</span> Us</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" data-aos="fade-right">
                <img src="assets/section2img1.jpg" alt="Intro Image" id="img-1">
                <div class="clrchangeback">
                    <h3>Best Flower Sellers</h3>
                </div>
            </div>
            <div class="col-sm-6" data-aos="fade-left">
                <h2>Why Choose Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua. </p>
                <a href="#" class="links">Learn More</a>
            </div>
        </div>
    </div>
</section>

<section class="section3">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" data-aos="fade-right">
                <div class="innercol">
                    <div class="txtwithicon">
                        <div class="iconcol">
                            <i class="fa-solid fa-cart-flatbed"></i>
                        </div>
                        <div class="txtcol">
                            <h4>Free Shipping</h4>
                            <p>On All Orders</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" data-aos="fade-down">
                <div class="innercol">
                    <div class="txtwithicon">
                        <div class="iconcol">
                            <i class="fa-solid fa-sack-dollar"></i>
                        </div>
                        <div class="txtcol">
                            <h4>10 Days Returns</h4>
                            <p>Moneyback Guarantee</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" data-aos="fade-up">
                <div class="innercol">
                    <div class="txtwithicon">
                        <div class="iconcol">
                            <i class="fa-solid fa-gift"></i>
                        </div>
                        <div class="txtcol">
                            <h4>Offer & Gift</h4>
                            <p>On All Orders</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3" data-aos="fade-left">
                <div class="innercol">
                    <div class="txtwithicon">
                        <div class="iconcol">
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                        <div class="txtcol">
                            <h4>Secure Payment</h4>
                            <p>Protected By Paypal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section4" id="product">
    <div class="container">
            <div class="row">
                <div class="col-sm-12" data-aos="fade-down">
                    <h1>Latest <span class="clrchange">Products</span></h1>
                </div>
            </div>
            <div class="row">
            <?php
            include 'admin/db.php';
            $result = $conn->query("SELECT * FROM products WHERE sale > 0");
            while ($row = $result->fetch_assoc()) {
                $salePrice = $row['price'] - ($row['price'] * ($row['sale'] / 100));
                echo '<div class="col-sm-4" data-aos="fade-right">
                    <div class="innerproductsection">
                        <span class="discount">' . $row['sale'] . '% Off</span>
                        <img src="assets/' . $row['image'] . '" alt="' . $row['name'] . '" />
                        <div class="cartcontainer">
                            <button class="wishlist"><i class="fa-solid fa-heart"></i></button>
                            <button class="btn add-to-cart" data-id="' . $row['id'] . '" data-name="' . $row['name'] . '" data-price="' . $salePrice . '" data-image="' . $row['image'] . '">Add To Cart <i class="fa-solid fa-cart-plus"></i></button>
                            <button class="share"><i class="fa-solid fa-share"></i></button>
                        </div>
                        <h2>' . $row['name'] . '</h2>
                        <h1 class="price"><span class="clrchange">$' . number_format($salePrice, 2) . '</span> <del>$' . number_format($row['price'], 2) . '</del></h1>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</section>

<section class="section5" id="review">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" data-aos="fade-down">
                <h1 class="mainheading">Customer's <span class="clrchange">Review</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="owl-carousel client-testimonial-carousel">
                    <?php
                    include 'admin/db.php';
                    $result = $conn->query("SELECT * FROM reviews");
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="single-testimonial-item">
                            <div class="reviewinner">
                                <ul class="ratings">';
                                for ($i = 0; $i < 5; $i++) {
                                    if ($i < $row['rating']) {
                                        echo '<li><i class="fa-solid fa-star"></i></li>';
                                    } else {
                                        echo '<li><i class="fa-regular fa-star"></i></li>';
                                    }
                                }
                                echo '</ul>
                                <p>' . $row['review_text'] . '</p>
                                <div class="txtwithicon">
                                    <div class="iconcol">
                                        <img src="assets/' . $row['image'] . '" alt="' . $row['customer_name'] . '" class="testimg1">
                                    </div>
                                    <div class="txtcol">
                                        <h1>' . $row['customer_name'] . '</h1>
                                        <p>' . $row['role'] . '</p>
                                    </div>
                                </div>
                            </div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

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

<?php include 'footer.php'; ?>
