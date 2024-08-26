<script src="js/app.js" defer></script>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h3 class="footerheadings">Social Links</h3>
                <ul>
                    <li><a href="#" class="links"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
                    <li><a href="#" class="links"><i class="fa-brands fa-twitter"></i> Twitter</a></li>
                    <li><a href="#" class="links"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
                    <li><a href="#" class="links"><i class="fa-brands fa-linkedin"></i> LinkedIn</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <!-- Removed Extra Links section as requested -->
            </div>
            <div class="col-sm-3">
                <h3 class="footerheadings">Locations</h3>
                <ul>
                    <li><a href="javascript:;" class="links">Pakistan</a></li>
                    <li><a href="javascript:;" class="links">USA</a></li>
                    <li><a href="javascript:;" class="links">Canada</a></li>
                    <li><a href="javascript:;" class="links">China</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h3 class="footerheadings">Contact Info</h3>
                <ul>
                    <li><a href="tel:+201025838394" class="links">+2 010 25 8383 94</a></li>
                    <li><a href="mailto:ahmed.e.elsba3ei@gmail.com" class="links">ahmed.e.elsba3ei@gmail.com</a></li>
                    <li><a href="javascript:;" class="links">Giza - Egypt</a></li>
                </ul>
            </div>
        </div>
        <div class="row copy-right">
            <div class="col-sm-12">
                <p>Created By <span class="clrchange"><a href="https://eg.linkedin.com/in/elsba3ei" target="_blank" style="color: inherit; text-decoration: none;">Ahmed E. El-Sbaei</a></span> | All Rights Reserved</p>
                <div class="topbtn">
                    <div class="cartbtn" style="display: none; margin-bottom: 15px; position: relative;">
                        <a href="cart.php" class="cartbtninner"><i class="fa-solid fa-shopping-cart"></i></a>
                        <span class="cart-count" style="display: none; position: absolute; top: -10px; right: -10px; background: #e15a7f; color: white; border-radius: 50%; padding: 5px 10px; font-size: 12px;">0</span>
                    </div>
                    <a href="#top" class="topbtninner"><i class="fa-solid fa-arrow-up"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- JavaScript imports -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- Bootstrap 5 JavaScript imports -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>
<script>
    function updateCartCount() {
        let cart = <?php echo json_encode($_SESSION['cart'] ?? []); ?>;
        let totalQuantity = cart.reduce((acc, item) => acc + item.quantity, 0);

        if (totalQuantity > 0) {
            document.querySelector('.cartbtn').style.display = 'block';
            document.querySelector('.cart-count').style.display = 'block';
            document.querySelector('.cart-count').textContent = totalQuantity;
        } else {
            document.querySelector('.cartbtn').style.display = 'none';
            document.querySelector('.cart-count').style.display = 'none';
        }
    }

    // Check if there are products in the cart on page load
    document.addEventListener('DOMContentLoaded', updateCartCount);

    // Update cart button and quantity dynamically
    document.addEventListener('cartUpdated', updateCartCount);
</script>
