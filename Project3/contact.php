<?php
include 'db.php';

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send_message'])) {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $location = $_POST['location'] ?? '';
    $message_text = $_POST['message'] ?? '';
    
    if ($full_name && $email && $phone && $location && $message_text) {
        $stmt = $conn->prepare("INSERT INTO messages (full_name, email, phone, location, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $full_name, $email, $phone, $location, $message_text);
        
        if ($stmt->execute()) {
            $message = "Message sent successfully! We will get back to you soon.";
            $message_type = 'success';
        } else {
            $message = "Error sending message. Please try again. " . $stmt->error;
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
    <title>Barthos Hotel - Contact Us</title>
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
                <h2>Contact Us</h2>
                <p>We'd love to hear from you. Send us a message!</p>
            </div>
            
            <?php if ($message): ?>
            <div class="form-message <?php echo $message_type; ?>" id="successMessage" style="max-width: 600px; margin: 0 auto 30px;">
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
            
            <div class="contact-grid">
                <div class="contact-info">
                    <h2>Get in Touch</h2>
                    <p style="color: var(--text-muted); margin-bottom: 30px;">Have a question or feedback? Reach out to us through any of the following channels.</p>
                    
                    <div class="contact-item">
                        <div>
                            <h4>Location</h4>
                            <p>Huye near University of Rwanda </p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div>
                            <h4>Phone</h4>
                            <p>+250 790 085 871</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div>
                            <h4>Email</h4>
                            <p>emmahclaudine@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div>
                            <h4>Hours</h4>
                            <p>24/7 Customer Support</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form">
                    <h3>Send us a Message</h3>
                    <form method="POST" action="contact.php" id="contactForm">
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" name="full_name" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="tel" name="phone" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Location *</label>
                            <input type="text" name="location" class="form-control" placeholder="Your city or area" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" name="send_message" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
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
                    <p><i class="fas fa-map-marker-alt"></i> Huye near University of Rwanda</p>
                    <p><i class="fas fa-phone"></i> +250 790 085 871</p>
                    <p><i class="fas fa-envelope"></i> emmahclaudine@gmail.com</p>
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