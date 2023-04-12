<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATNOS</title>
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
                    <li><a href="blog.php">Work</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
            <!-- reposnive bar open and close -->
        </nav>
        <h1>Data Barang Disita</h1>
    </section>

    <!-- Blog Page Section Start -->

    <section class="blog-content">
        <div class="row">
            <div class="blog-left">
                <h2>We Shape Innovation</h2>
                <h5>Aug 1, 2022</h5>
                <img src="images/post.jpg" alt="">
                <p>Through our constant commitment to research and innovation, we want to develop lighting systems capable of improving the quality of life of people, while helping to reduce the impact on the planet. We want to make cities more environmentally sustainable, but also more liveable and safer for people at night. We work to spread a culture of sustainable light, transmitting our constant commitment to municipalities, institutions, designers and citizens.</p>
                <div class="comment-box">
                    <h3>Leave a Comment</h3>
                    <form class="comment-form">
                        <input type="text" placeholder="Enter Name" required>
                        <input type="email" placeholder="Enter Email" required>
                        <textarea rows="5" placeholder="Your Comment"></textarea>
                        <button type="submit" class="hero_btn btn">POST COMMENT</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer Section start -->
    <section class="footer">
        <hr>
        <h4>About Us</h4>

        <div class="icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-instagram"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-linkedin"></i>
        </div>
        <p>Copyright © 2022 <a href="team.php">SMART PJU TEAM</a> All Rights Reserved</p>
    </section>
    <!-- Footer Section end -->

    <script src="script.js"></script>
</body>

</html>