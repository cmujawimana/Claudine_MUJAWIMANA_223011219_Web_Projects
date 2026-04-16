<?php

$conn = new mysqli("localhost", "root", "", "student_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$city = $_POST['city'];
$pin = $_POST['pin'];
$state = $_POST['state'];
$country = $_POST['country'];

$hobbies = "";
if(isset($_POST['hobby'])){
    $hobbies = implode(", ", $_POST['hobby']);
}

$board1 = $_POST['board1'];
$per1 = $_POST['per1'];
$year1 = $_POST['year1'];

$board2 = $_POST['board2'];
$per2 = $_POST['per2'];
$year2 = $_POST['year2'];

$board3 = $_POST['board3'];
$per3 = $_POST['per3'];
$year3 = $_POST['year3'];

$board4 = $_POST['board4'];
$per4 = $_POST['per4'];
$year4 = $_POST['year4'];

$course = $_POST['course'];

$sql = "INSERT INTO students 
(first_name, last_name, day, month, year, email, mobile, gender, address, city, pin, state, country, hobbies,
board1, per1, year1, board2, per2, year2, board3, per3, year3, board4, per4, year4, course)

VALUES
('$first_name','$last_name','$day','$month','$year','$email','$mobile','$gender','$address','$city','$pin','$state','$country','$hobbies',
'$board1','$per1','$year1','$board2','$per2','$year2','$board3','$per3','$year3','$board4','$per4','$year4','$course')";

if ($conn->query($sql) === TRUE) {
    echo "Registration Successful!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>