<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barthos Hotel - Gallery</title>
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

    <section class="section" style="padding-top: 120px;">
        <div class="container">
            <div class="section-title">
                <h2>Our Gallery</h2>
                <p>Explore our hotel facilities, delicious dishes and beverages. Click on image to order!</p>
            </div>

            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="foods">Foods</button>
                <button class="filter-btn" data-filter="drinks">Drinks</button>
                <button class="filter-btn" data-filter="housing">Housing</button>
                <button class="filter-btn" data-filter="facilities">Facilities</button>
            </div>

            <div class="gallery-grid">
                <!-- Foods -->
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="sea food.avif" alt="Sea Food">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Sea Food</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Food 3.avif" alt="Fried Tilapia">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Fried Tilapia</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Food 2.jpg" alt="Sushi">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Sushi</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Pirawu.jpg" alt="Pirawu">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Pirawu</h3>
                    </div>
                </a>
                 <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Isombe and Ugali.jpg" alt="Isombe and Ugali">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Isombe and Ugali</h3>
                    </div>
                </a>
                 <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Pirawu.jpg" alt="Pirawu">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Pirawu</h3>
                    </div>
                </a>
                 <a href="order.php" class="gallery-item" data-category="foods">
                    <img src="Grilled chips.png" alt="Grilled Chips">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Foods</span>
                        <h3>Grilled Chips</h3>
                    </div>
                <!-- Drinks -->
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="whiskey premium.webp" alt="Premium Drinks">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Premium Drinks</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="White wine.webp" alt="White Wine">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>White Wine</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Red wine.jpg" alt="Drinks">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Red Wine</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="Wine selection.webp" alt="Wine Selection">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Wine Selection</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="coffee latte.jpg" alt="Coffee & Beverages">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Coffee & Beverages</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="drinks">
                    <img src="beer selection.webp" alt="Beer & More">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Drinks</span>
                        <h3>Beer Selection</h3>
                    </div>
                </a>
                
                <!-- Housing -->
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Luxury room.webp" alt="Luxury Room">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Luxury room</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Deluxe room.jpg" alt="Deluxe Room">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Deluxe Room</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Excutive.jpg" alt="Executive Suite">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Executive Suite</h3>
                    </div>
                </a>
                <a href="order.php" class="gallery-item" data-category="housing">
                    <img src="Excutive" alt="Executive Suite">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Housing</span>
                        <h3>Deluxe Suite</h3>
                    </div>
                </a>
                
                <!-- Facilities -->
                <a href="order.php" class="gallery-item" data-category="facilities">
                    <img src="swimming pool.avif" alt="Swimming Pool">
                    <div class="gallery-overlay">
                        <span class="gallery-category">Facilities</span>
                        <h3>Swimming Pool</h3>                    </div>
                </a>
            </div>

            <div style="text-align: center; margin-top: 40px;">
                <p style="color: var(--text-muted);">Click on any image to place your order</p>
                <a href="order.php" class="btn btn-primary" style="margin-top: 20px;">Order Now</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>Grand Palace Hotel</h3>
                    <p>Experience luxury like never before. Our hotel offers world-class amenities and exceptional service.</p>
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
                <p>&copy; <?php echo date('Y'); ?> Grand Palace Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>