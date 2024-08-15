<?php

$name = $_POST["name"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$area = $_POST["area"];
$purpose = $_POST["purpose"];
$message = $_POST["message"];


// Check connection
$host = "localhost";
$dbname = "test";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect(hostname: $host,
                        database: $dbname,
                        username: $username,
                        password: $password);

if (mysqli_connect_errno()){
  die("Connection failed: " . mysqli_connect_error());
}

// data to mysql
$sql = "INSERT INTO customer(name, phone, email, area, purpose, message)
        VALUES (?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sissss",
                        $name,
                        $phone,
                        $email,
                        $area,
                        $purpose,
                        $message);

mysqli_stmt_execute($stmt);

echo "Record saved.";
