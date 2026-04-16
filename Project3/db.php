<?php
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    $conn->select_db($dbname);
} else {
    die("Error creating database: " . $conn->error);
}

$conn->query("CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$conn->query("CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT DEFAULT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    menu_item VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    order_date DATE NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

$conn->query("CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    location VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)");

function getMenuItems() {
    return [
        ['name' => 'Grilled chips', 'desc' => 'Chips made from fried irish potatoes', 'price' => '4000 RWF', 'category' => 'Local Food'],
        ['name' => 'Fried Tilapia', 'desc' => 'Crispy fried tilapia with special spices', 'price' => ' 20000 RWF', 'category' => 'Local Food'],
        ['name' => 'Pirawu', 'desc' => 'Rice mixed with meat which is mostly known as Islamic uniqueness', 'price' => '12 000 RWF', 'category' => 'Local Food'],
        ['name' => 'Isombe and Ugali', 'desc' => 'Cassava leaves and cassava flour', 'price' => '10 000 RWF', 'category' => 'Local Food'],
        ['name' => 'Sea food', 'desc' => 'sea food with garlic butter', 'price' => '20 000 RWF', 'category' => 'International Food'],
        ['name' => 'Sushi', 'desc' => 'Sushi ', 'price' => '10 000 RWF', 'category' => 'International Food'],
        ['name' => 'Schnitzel', 'desc' => 'Breaded and fried meat  served with potatoes or salad.', 'price' => ' 6 000 RWF', 'category' => 'International Food'],
        ['name' => 'Croissant', 'desc' => 'A buttery, flaky pastry usually eaten for breakfast.', 'price' => '6 000 RWF', 'category' => 'International Food'],
        ['name' => 'Jollof Rice', 'desc' => 'Ghananian Rice Dish', 'price' => '9 000 RWF', 'category' => 'International Food'],
        ['name' => 'Red Wine', 'desc' => 'Premium French red wine', 'price' => '40 000 RWF', 'category' => 'Drinks'],
        ['name' => 'White Wine', 'desc' => 'Crisp Italian white wine', 'price' => '47 000 RWF', 'category' => 'Drinks'],
        ['name' => 'Whiskey Premium', 'desc' => ' 12-aged whiskey', 'price' => '68 000 RWF', 'category' => 'Drinks'],
        ['name' => 'Cocktail Special', 'desc' => 'Signature hotel cocktail', 'price' => '15 000 RWF', 'category' => 'Drinks'],
        ['name' => 'Beer Selection', 'desc' => 'Assorted international beers', 'price' => '8 000 RWF', 'category' => 'Drinks'],
        ['name' => 'Coffee Latte', 'desc' => 'Rich espresso with steamed milk', 'price' => '8 000 RWF', 'category' => 'Drinks'],
        ['name' => 'Orange Juice', 'desc' => 'Freshly squeezed', 'price' => '6 000 RWF', 'category' => 'Drinks'],
        ['name' => 'Mango Juice', 'desc' => 'Sweet tropical mango', 'price' => '7 000 RWF', 'category' => 'Drinks'],
    
    ];
}
?>