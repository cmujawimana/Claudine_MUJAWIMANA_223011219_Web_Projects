<?php
session_start();
include 'db.php';

$customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
$customer_name = isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : null;
$customer_email = isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : null;

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $menu_item = $_POST['menu_item'] ?? '';
    $address = $_POST['address'] ?? '';
    $order_date = $_POST['order_date'] ?? '';
    $customer_id = isset($_SESSION['customer_id']) ? $_SESSION['customer_id'] : null;
    
    if ($full_name && $email && $phone && $menu_item && $address && $order_date) {
        if ($customer_id) {
            $stmt = $conn->prepare("INSERT INTO orders (customer_id, full_name, email, phone, menu_item, address, order_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issssss", $customer_id, $full_name, $email, $phone, $menu_item, $address, $order_date);
        } else {
            $stmt = $conn->prepare("INSERT INTO orders (full_name, email, phone, menu_item, address, order_date) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $full_name, $email, $phone, $menu_item, $address, $order_date);
        }
        
        if ($stmt->execute()) {
            $message = "Order placed successfully! We will contact you shortly.";
            $message_type = 'success';
        } else {
            $message = "Error placing order. Please try again. " . $stmt->error;
            $message_type = 'error';
        }
    } else {
        $message = "Please fill in all required fields.";
        $message_type = 'error';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barthos Hotel - Order</title>
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
            <?php if (isset($_SESSION['customer_name'])): ?>
            <div class="user-dropdown">
                <div class="user-dropdown-toggle">
                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
                </div>
                <div class="user-dropdown-menu">
                    <div class="dropdown-header">
                        <span class="user-name-display"><?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
                        <span class="user-email-display"><?php echo htmlspecialchars($_SESSION['customer_email']); ?></span>
                    </div>
                    <a href="profile.php" class="dropdown-item">Edit Profile</a>
                    <a href="orders.php" class="dropdown-item">My Orders</a>
                    <a href="logout.php" class="dropdown-item logout">Logout</a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <section class="section" style="padding-top: 80px;">
        <div class="container">
            <div class="section-title">
                <h2>Order Online</h2>
                <p>Place your order for delivery or pickup</p>
            </div>
            
            <?php if ($message): ?>
            <div class="form-message <?php echo $message_type; ?>" id="successMessage">
                <?php echo $message; ?>
            </div>
            <?php if ($message_type === 'success'): ?>
            <script>
                setTimeout(function() {
                    var msg = document.getElementById('successMessage');
                    if (msg) msg.style.display = 'none';
                }, 5000);
            </script>
            <?php endif; ?>
            <?php endif; ?>
            
            <?php if (!$customer_id): ?>
            <div class="login-container">
                <div class="login-card">
                    <h2>Login to Place your Order</h2>
                    
                    <?php if ($message): ?>
                    <div class="form-message <?php echo $message_type; ?>" style="margin-bottom: 15px;">
                        <?php echo $message; ?>
                    </div>
                    <?php if ($redirect): ?>
                    <script>
                        setTimeout(function() {
                            window.location.href = 'orders.php';
                        }, 2000);
                    </script>
                    <?php endif; ?>
                    <?php endif; ?>
                    
                    <form method="POST" action="login.php" id="loginForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-submit">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Don't have an account? <a href="register.php">Register here</a></p>
                        <span class="forgot-password">Forgot password? <a href="forgot_password.php">Click here</a></span>
                    </div>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="order-container">
                <div style="text-align: center; margin-bottom: 20px;">
                    <a href="orders.php" class="btn" style="margin-right: 10px;">View My Orders</a>
                </div>
                
                <form method="POST" action="order.php" id="orderForm">
                    <div class="service-card" style="border: 1px solid var(--border);">
                        <h3 style="color: var(--secondary); margin-bottom: 15px; text-align: center;">Order Form</h3>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Full Name *</label>
                                <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($customer_name); ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Email *</label>
                                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($customer_email); ?>" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="tel" name="phone" class="form-control"  required>
                            </div>
                            
                            <div class="form-group">
                                <label>Select Menu Item *</label>
                                <select name="menu_item" class="form-control" required>
                                    <option value="">-- Select --</option>
                                    <optgroup label="Local Food">
                                        <option value="Grilled chips - 4000 RWF">Grilled chips - 4000 RWF </option>
                                        <option value="Fried Tilapia - 20 000 RWF">Fried Tilapia - 20 000 RWF</option>
                                        <option value="Pirawu - 12 000 RWF">Pirawu - 12 000 RWF</option>
                                        <option value="Isombe and Ugali - 10 000 RWF">Isombe and Ugali - 10 000 RWF</option>
                                    </optgroup>
                                    <optgroup label="Interational Food">
                                        <option value="Sea food - 20 000 RWF">Sea food - 20 000 RWF</option>
                                        <option value="Sushi - 10 000 RWF">Sushi - 10 000 RWF</option>
                                        <option value="Schnitzel - 6000 RWF">Schnitzel - 6000 RWF</option>
                                        <option value="Croissant - 6000 RWF">Croissant - 6000 RWF</option>
                                        <option value="Jollof Rice - 9 000 RWF">Jollof Rice - 9 000 RWF</option>
                                    </optgroup>
                                    <optgroup label="Drinks(cocktails and Liqour)">
                                        <option value="Red Wine - 40 000 RWF">Red Wine - 40 000 RWF</option>
                                        <option value="White Wine - 47 000 RWF">White Wine - 47 000 RWF</option>
                                        <option value="Whiskey Premium - 68 000 RWF">Whiskey Premium - 68 000 RWF</option>
                                        <option value="Cocktail Special - 15 000 RWF">Cocktail Special - 15 000 RWF</option>
                                        <option value="Beer Selection - 8 000 RWF">Beer Selection - 8 000 RWF</option>
                                        <option value="Orange Juice- 6 000 RWF">Orange Juice - 6 000 RWF</option>
                                        <option value="Mango Juice - 7 000 RWF">Mango Juice - 7 000 RWF</option>
                                        
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label>Delivery Address *</label>
                                <textarea name="address" class="form-control" rows="1" required></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label>Order Date *</label>
                                <input type="date" name="order_date" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" name="place_order" class="btn btn-primary">Place Order</button>
                        </div>
                    </div>
                </form>
            </div>
            <?php endif; ?>
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
                    <p> Huye near University of Rwanda</p>
                    <p>+250 790 085 871</p>
                    <p> emmahclaudine@gmail.com</p>
                </div>
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