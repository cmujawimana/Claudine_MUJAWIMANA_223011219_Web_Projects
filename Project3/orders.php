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

$stmt = $conn->prepare("SELECT * FROM orders WHERE  customer_id = ? OR email = ? ORDER BY created_at DESC");
$stmt->bind_param("is", $customer_id, $customer_email);
$stmt->execute();
$orders_result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barthos Hotel - My Orders</title>
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
                <li><a href="contact.php" class="nav-link"><span>Contact us</span></a></li>
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

    <section class="orders-container">
        <div class="container">
            <div class="orders-header">
                <h2>My Orders</h2>
                <div>
                    <a href="order.php" class="btn btn-primary" style="margin-right: 10px;">New Order</a>
                    <a href="logout.php" class="logout-link">Logout</a>
                </div>
            </div>
            
            <div class="service-card" style="margin-bottom: 30px; text-align: left;">
                <p style="color: var(--secondary);">Welcome back, <strong><?php echo htmlspecialchars($customer_name); ?></strong>!</p>
            </div>

            <?php if ($orders_result->num_rows > 0): ?>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Item</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($order = $orders_result->fetch_assoc()): ?>
                    <tr>
                        <td data-label="Order ID">#<?php echo $order['id']; ?></td>
                        <td data-label="Item"><?php echo htmlspecialchars($order['menu_item']); ?></td>
                        <td data-label="Email"><?php echo htmlspecialchars($order['email']); ?></td>
                        <td data-label="Phone"><?php echo htmlspecialchars($order['phone']); ?></td>
                        <td data-label="Address"><?php echo htmlspecialchars($order['address']); ?></td>
                        <td data-label="Date"><?php echo date('M d, Y', strtotime($order['order_date'])); ?></td>
                        <td data-label="Status">
                            <span class="status <?php echo strtolower($order['status']); ?>">
                                <?php echo $order['status']; ?>
                            </span>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <?php else: ?>
            <div class="no-orders">
                <i class="fas fa-shopping-bag" style="font-size: 4rem; color: var(--text-muted); margin-bottom: 20px;"></i>
                <h3>No Orders Yet</h3>
                <p>You haven't placed any orders yet.</p>
                <a href="order.php" class="btn btn-primary" style="margin-top: 20px;">Place Your First Order</a>
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
            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Barthos Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>