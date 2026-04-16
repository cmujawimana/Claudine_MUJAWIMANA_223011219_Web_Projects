<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grand Palace Hotel - About Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="nav-container">
            <div class="logo">Barthos<span>Hotel</span></div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link"><span>Home</span></a></li>
                <li><a href="about.php" class="nav-link"><span>About</span></a></li>
                <li><a href="menu.php" class="nav-link"><span>Menu</span></a></li>
                <li><a href="gallery.php" class="nav-link"><span>Gallery</span></a></li>
                <li><a href="order.php" class="nav-link"><span>Order</span></a></li>
                <li><a href="contact.php" class="nav-link"><span>Contact</span></a></li>
            </ul>
        </div>
    </div>
    <section class="section" style="padding-top: 80px;">
        <div class="container">
            <div class="section-title">
                <h2>About Barthos Hotel</h2>
                <p>Legend of feeling yourself since 2000</p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <h2>Our Story</h2>
                    <p>Barthos Hotel was founded in 2000 with the dream of offering a unique and comfortable hospitality experience in the heart of the city. 
                        What started as a modest establishment has steadily grown into a well-known destination recognized for its quality service and welcoming atmosphere..
                    </p>
                    <p>Over the years, the hotel has continuously improved its services and facilities to match the evolving expectations of its guests. 
                        Through dedication, hard work, and a passion for hospitality, Barthos Hotel has built a strong reputation and gained the trust of many visitors from different places.
                    </p>
                    <p>Today, Barthos Hotel represents a perfect balance between classic charm and modern convenience. With a focus on customer satisfaction and attention to detail, the hotel continues to provide a relaxing and memorable experience for every guest who walks through its doors.
                    </p>
                </div>
                <div class="about-image">
                    <img src="Hotel.jpg" alt="Barthos Hotel">
                </div>
            </div>
        </div>
    </section>

    <section class="section" style="background-color: var(--primary);">
        <div class="container">
            <div class="section-title">
                <h2>Our Mission & Vision</h2>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <h3>Our Mission</h3>
                    <p>Our mission at Barthos Hotel is to provide exceptional hospitality through high-quality services, comfortable accommodation and a welcoming environment. We are committed to meeting the needs of our guests with professionalism, attention to detail and continuous improvement, ensuring every stay is enjoyable and memorable.</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-eye"></i></div>
                    <h3>Our Vision</h3>
                    <p>To become a leading hospitality destination known for excellence, comfort and unforgettable guest experiences, while setting the standard for quality service and innovation in the hotel industry</p>
                </div>
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-heart"></i></div>
                    <h3>Our Values</h3>
                    <p>We believe in integrity, excellence and innovation. Every guest is family and every interaction is an opportunity to create lasting impressions and build lasting relationships.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-title">
                <h2>Our Amenities</h2>
                <p>Everything you need for a perfect stay</p>
            </div>
            <div class="features-grid" style="max-width: 800px; margin: 0 auto;">
                <div class="feature-item">
                    <p>High-Speed WiFi</p>
                </div>
                <div class="feature-item">
                    <p>Free Parking</p>
                </div>
                <div class="feature-item">
                    <p>swimming Pool</p>
                </div>
                <div class="feature-item">
                    <p> Meeting hall</p>
                </div>
                <div class="feature-item">
                    <span><i class="fas fa-utensils"></i></span>
                    <p>Multiple Restaurants</p>
                </div>
                <div class="feature-item">
                    <span><i class="fas fa-coffee"></i></span>
                    <p>Coffee Shop</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>Barthos Hotel</h3>
                    <p>Come and Feel the real you. You deserve care with much of relaxation you can't find anywhere than at Barthos hotel.</p>
                </div>
                <div class="footer-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="order.php">Order</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-contact">
                    <h3>Contact Us</h3>
                    <p>Huye near University of Rwanda </p>
                    <p> +250 790 085 871</p>
                    <p>emmahclaudine@gmail.com</p>
                </div>
                
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y') ;?> Barthos Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>