<?php
include('Connection.php');

$query = "CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    nickname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    hashpassword VARCHAR(255) NOT NULL,
    date_of_birth DATE NOT NULL,
    location VARCHAR(100),
    phone VARCHAR(20),
    gender ENUM('Male', 'Female', 'Other'),
    bio TEXT,
    role ENUM('member', 'admin') DEFAULT 'member',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    bgcol VARCHAR(10) DEFAULT 1,
    profilepic VARCHAR(255),
    bannerpic VARCHAR(255),
    status VARCHAR(255) DEFAULT 'ready'
);";

$result = mysqli_query($connection,$query);
?>
