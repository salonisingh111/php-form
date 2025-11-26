<?php
$firstName = $_POST['firstName'];
$lastName  = $_POST['lastName'];
$gender    = $_POST['gender'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$number    = $_POST['number'];

// database connection
$conn = new mysqli('localhost:3307', 'root', '', 'test2');

if($conn->connect_error){
    die('Connection failed: '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration(firstName,lastName,gender,email,password,number) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("sssssi", $firstName, $lastName, $gender, $email, $password, $number);
    $stmt->execute();

    echo "Registration successfully!";
    $stmt->close();
    $conn->close();
}
?>
