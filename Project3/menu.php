<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barthos Hotel - Menu</title>
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
                <h2>Our Menu</h2>
                <p>Explore our exquisite selection of dishes and beverages</p>
            </div>

            <div class="menu-categories">
                <button class="category-btn active" data-category="all">All</button>
                <button class="category-btn" data-category="Local food">Local food</button>
                <button class="category-btn" data-category="Drinks(cocktails and Liqour)">Drinks(cocktails and Liqour)</button>
                <button class="category-btn" data-category="International Food">International Food</button>
            </div>

            <table class="menu-table">
                <thead>
                    <tr>
                        <th>Item Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="menu-item-row" data-category="Local food">
                        <td>Grilled chips</td>
                        <td>Chips made from fried irish potatoes </td>
                        <td>Local Food</td>
                        <td class="price">4000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Local Food">
                        <td>Fried Tilapia</td>
                        <td>Crispy fried tilapia with special spices</td>
                        <td>Local food</td>
                        <td class="price">20 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Local Food">
                        <td>Pirawu</td>
                        <td>Rice mixed with meat which is mostly known as Islamic uniqueness</td>
                        <td>Local Food</td>
                        <td class="price">12 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Local Food">
                        <td>Isombe and Ugali</td>
                        <td>Cassava leaves and cassava flour</td>
                        <td>Local Food</td>
                        <td class="price">10 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="International Food">
                        <td>Sea food</td>
                        <td>sea food with garlic butter</td>
                        <td>International Food</td>
                        <td class="price">20 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="International Food">
                        <td>Sushi</td>
                        <td>Sushi </td>
                        <td>International Food</td>
                        <td class="price">10 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>Red Wine</td>
                        <td>Premium French red wine</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">40 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>White Wine</td>
                        <td>Crisp Italian white wine</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">47 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>Whiskey Premium</td>
                        <td>12-year aged whiskey</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">68 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>Cocktail Special</td>
                        <td>Signature hotel cocktail</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">15 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>Beer Selection</td>
                        <td>Assorted international beers</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">8 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>Coffee Latte</td>
                        <td>Rich espresso with steamed milk</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">8 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>Orange Juice</td>
                        <td>Freshly squeezed oranges</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">6 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="Drinks(cocktails and Liqour)">
                        <td>Mango Juice</td>
                        <td>Sweet tropical mango blend</td>
                        <td>Drinks(cocktails and Liqour)</td>
                        <td class="price">7 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="International Food">
                        <td>Schnitzel</td>
                        <td>Breaded and fried meat  served with potatoes or salad.</td>
                        <td>International Food</td>
                        <td class="price">6 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="International Food">
                        <td>Croissant</td>
                        <td>A buttery, flaky pastry usually eaten for breakfast.</td>
                        <td>International Food</td>
                        <td class="price">6 000 RWF</td>
                    </tr>
                    <tr class="menu-item-row" data-category="International Food">
                        <td>Jollof Rice</td>
                        <td>Ghananian Rice Dish</td>
                        <td>International Food</td>
                        <td class="price">9 000 RWF</td>
                    </tr>
                </tbody>
            </table>

            <div style="text-align: center; margin-top: 40px;">
                <a href="order.php" class="btn btn-primary">Order Now</a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>Barthos Hotel</h3>
                    <p>Come and Feel the real you. You deserve care with much of relaxation you can't find anywhere than at Barthos hotel</p>
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
                    <p> Huye near University of Rwanda</p>
                    <p>+250 790 085 871</p>
                    <p> emmahclaudine@gmail.com</p>
                </div>
                
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Barthos Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>