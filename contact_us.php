<?php include 'header.php'; ?>

<style>
    /* Custom CSS for input fields */
    .form-control {
        background-color: #fff5fa; /* Light gray background */
        border: 1px solid #ddd; /* Light border */
        border-radius: 5px; /* Rounded corners */
        padding: 10px;
        font-size: 16px;
        transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #e15a7f; /* Change border color on focus */
        box-shadow: 0 0 0 0.2rem rgba(225, 90, 127, 0.25); /* Light shadow */
    }
</style>

<section class="section6" id="contact" style="margin-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" data-aos="fade-down">
                <h1 class="mainheading">
                    <span class="clrchange">Contact</span> Us
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6" data-aos="fade-right">
                <form method="POST" id="contactForm">
                    <input type="hidden" name="access_key" value="f7770d25-ec6c-4ff5-9f5a-051aebbcc0a5">
                    <input type="hidden" name="subject" value="New Contact Form Submission">
                    <input type="checkbox" name="botcheck" style="display: none;">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" name="phone" placeholder="Your Phone Number" required>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="message" placeholder="Your Message" cols="30" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="links btn btn-primary">Send Message</button>
                </form>
                <div id="formResult" class="mt-3"></div>
            </div>
            <div class="col-sm-6" data-aos="fade-left">
                <img src="assets/contactimg1.png" alt="Contact img" class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>

<script>
    const contactForm = document.getElementById('contactForm');
    const formResult = document.getElementById('formResult');

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(contactForm);
        const object = {};
        formData.forEach((value, key) => {
            object[key] = value;
        });
        const json = JSON.stringify(object);

        formResult.innerHTML = '<div class="alert alert-info alert-dismissible fade show" role="alert">Sending message...<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';

        fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                body: json
            })
            .then(async(response) => {
                const jsonResponse = await response.json();
                if (response.status === 200) {
                    formResult.innerHTML = '<div class="alert alert-success alert-dismissible fade show" role="alert">We have received your message and will be in touch shortly 📧.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    contactForm.reset(); // Reset the form fields
                } else {
                    formResult.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Something went wrong. Please try again later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                formResult.innerHTML = '<div class="alert alert-danger alert-dismissible fade show" role="alert">Something went wrong. Please try again later.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            });
    });
</script>
