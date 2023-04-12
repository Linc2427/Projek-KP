<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart PJU</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap">
</head>

<body>
    <section class="Sub-header">
        <nav>
            <a href="index.html" class="logo">
               Baggage Service
            </a>
            <div class="nav-links" id="navLinks">
                <!-- reposnive bar open and close -->
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                <li><a href="index.php">Home</a></li>
                    <li><a href="blog.php">Data</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
            <!-- reposnive bar open and close -->
        </nav>
        <h1>Contact Us</h1>
    </section>

    <!-- Contact Us Section Start -->

    <section class="loacation">
    </section>

    <section class="contact-us">
        <div class="row">
            <div class="content-col">
                <div>
                    <i class="fa fa-home"></i>
                    <span>
                        <h5>Airport Technology Network of Service</h5>
                        <p>Jl. Ir. H. Juanda, Betro, Kec. Sedati, Kabupaten Sidoarjo, Jawa Timur 61253</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-phone"></i>
                    <span>
                        <h5>+62 85850410115</h5>
                        <p>Monday To Sunday, 24 Hours</p>
                    </span>
                </div>
                <div>
                    <i class="fa fa-envelope"></i>
                    <span>
                        <h5>sorayapasyadh@email.com</h5>
                        <p>Email Us Yor Query</p>
                    </span>
                </div>
            </div>
            <div class="content-col">
                <form>
                    <input type="text" placeholder="Enter Name" required>
                    <input type="email" placeholder="Enter Email" required>
                    <input type="text" placeholder="Enter Subject" required>
                    <textarea rows="8" placeholder="Message" required></textarea>
                    <button type="submit" class="hero_btn btn">Send Message</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer Section Start -->
    <section class="footer">
        <hr>
        <div class="icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-linkedin"></i>
        </div>
        <p>Copyright © 2022 <a href="contact.php">PT. Angkasa Pura I</a> All Rights Reserved</p>
    </section>
    <!-- Footer Section End -->

    <script src="script.js"></script>
</body>

</html>