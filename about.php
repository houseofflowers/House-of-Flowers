<?php include 'header.php';?>
<style>
    .card {
        margin-bottom: 30px;
        transition: transform 0.2s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card-img-container {
        height: 300px;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .name {
        text-align: center;
        color: #e15a7f;
        transition: color 0.2s ease-in-out;
    }

    .title {
        text-align: center;
        color: #000;
        transition: color 0.2s ease-in-out;
    }

    .name:hover, .title:hover {
        color: #000;
    }

    .title:hover {
        color: #e15a7f;
    }

    .social-icons {
        display: flex;
        justify-content: space-around;
        margin-top: 15px;
    }

    .social-icons a {
        color: #e15a7f;
        font-size: 1.5em;
    }

    .social-icons a:hover {
        color: #000;
    }
</style>

<section class="section4" id="team" style="margin-top: 150px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" data-aos="fade-down">
                <h1>Meet Our <span class="clrchange">Team</span></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4" data-aos="fade-right">
                <div class="card shadow-lg">
                    <div class="card-img-container">
                        <img src="assets/member1.jpg" class="card-img-top" alt="Member 1">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title name">John Doe</h5>
                        <p class="card-text title">CEO</p>
                        <p class="card-text">John is the CEO of the company and has over 5 years of experience in the industry.</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/johndoe" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/in/johndoe" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=1234567890" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-right">
                <div class="card shadow-lg">
                    <div class="card-img-container">
                        <img src="assets/elsba3ei.png" class="card-img-top" alt="Member 2">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title name">Eng. Ahmed E. El-Sbaei</h5>
                        <p class="card-text title">Cyber Security | Software Engineer</p>
                        <p class="card-text">Ahmed is responsible for all technology and product development.</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/elsba3ei/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://eg.linkedin.com/in/elsba3ei" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=201025838394" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-right">
                <div class="card shadow-lg">
                    <div class="card-img-container">
                        <img src="assets/Hendy.png" class="card-img-top" alt="Member 3">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title name">MR. Ashraf Hendy</h5>
                        <p class="card-text title">Accounter and Universal Teller </p>
                        <p class="card-text">Ashraf Hendy, managing the financial actions of the company.</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/Ashrafhendy500" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            <a href="https://eg.linkedin.com/in/ashraf-hendy-7750911a6" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="https://api.whatsapp.com/send?phone=201150028329" target="_blank"><i class="fa-brands fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>
</body>
</html>
