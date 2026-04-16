<?php
session_start();
include 'db.php';

if (!isset($_SESSION['customer_id'])) {
    header('Location: login.php');
    exit;
}

$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
$customer_email = $_SESSION['customer_email'];

$message = '';
$message_type = '';

// Get current user data
$stmt = $conn->prepare("SELECT full_name, email, phone FROM customers WHERE id = ?");
$stmt->bind_param("i", $customer_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $full_name = $_POST['full_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    
    if ($full_name && $email && $phone) {
        if ($new_password && $new_password !== $confirm_password) {
            $message = "Passwords do not match.";
            $message_type = 'error';
        } else {
            if ($new_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE customers SET full_name = ?, email = ?, phone = ?, password = ? WHERE id = ?");
                $stmt->bind_param("ssssi", $full_name, $email, $phone, $hashed_password, $customer_id);
            } else {
                $stmt = $conn->prepare("UPDATE customers SET full_name = ?, email = ?, phone = ? WHERE id = ?");
                $stmt->bind_param("sssi", $full_name, $email, $phone, $customer_id);
            }
            
            if ($stmt->execute()) {
                $_SESSION['customer_name'] = $full_name;
                $_SESSION['customer_email'] = $email;
                $message = "Profile updated successfully!";
                $message_type = 'success';
                $user['full_name'] = $full_name;
                $user['email'] = $email;
                $user['phone'] = $phone;
            } else {
                $message = "Error updating profile. Please try again.";
                $message_type = 'error';
            }
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
    <title>Grand Palace Hotel - My Profile</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="header">
        <div class="nav-container">
            <div class="logo">Grand<span>Palace</span></div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li>
                <li><a href="about.php" class="nav-link"><i class="fas fa-info-circle"></i><span>About</span></a></li>
                <li><a href="menu.php" class="nav-link"><i class="fas fa-utensils"></i><span>Menu</span></a></li>
                <li><a href="gallery.php" class="nav-link"><i class="fas fa-images"></i><span>Gallery</span></a></li>
                <li><a href="order.php" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Order</span></a></li>
                <li><a href="contact.php" class="nav-link"><i class="fas fa-envelope"></i><span>Contact</span></a></li>
            </ul>
            <?php if (isset($_SESSION['customer_name'])): ?>
            <div class="user-dropdown">
                <div class="user-dropdown-toggle">
                    <span class="user-name"><?php echo htmlspecialchars($_SESSION['customer_name']); ?></span>
                    <span class="chevron"><i class="fas fa-chevron-down"></i></span>
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
                <h2>My Profile</h2>
                <p>Update your personal information</p>
            </div>
            
            <?php if ($message): ?>
            <div class="form-message <?php echo $message_type; ?>" id="successMessage" style="max-width: 300px; margin: 0 auto 30px;">
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
            
            <div class="login-container" style="max-width: 500px;">
                <div class="login-card">
                    <form method="POST" action="profile.php">
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" name="full_name" class="form-control" value="<?php echo htmlspecialchars($user['full_name']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="tel" name="phone" class="form-control" value="<?php echo htmlspecialchars($user['phone']); ?>" required>
                        </div>
                        
                        <hr style="border-color: var(--border); margin: 20px 0;">
                        
                        <div class="form-group">
                            <label>New Password (leave blank to keep current)</label>
                            <input type="password" name="new_password" class="form-control" placeholder="Enter new password">
                        </div>
                        
                        <div class="form-group">
                            <label>Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm new password">
                        </div>
                        
                        <div class="form-submit">
                            <button type="submit" name="update_profile" class="btn btn-primary">Save Changes</button>
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
                    <h3>Grand Palace Hotel</h3>
                    <p>Experience luxury like never before.</p>
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
                    <p><i class="fas fa-map-marker-alt"></i> KG 123 Street, City</p>
                    <p><i class="fas fa-phone"></i> +250 791 783 308</p>
                    <p><i class="fas fa-envelope"></i> evode@grandpalace.com</p>
                </div>
                <div class="footer-social">
                    <h3>Follow Us</h3>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
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