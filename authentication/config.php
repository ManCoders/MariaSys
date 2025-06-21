<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'elementaryDB';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

    $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tableQueries = [
        "CREATE TABLE IF NOT EXISTS teacher (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) NOT NULL,
                middlename VARCHAR(50) NOT NULL,
                lastname VARCHAR(50) NOT NULL,
                suffix VARCHAR(5) NOT NULL,
                employeeid VARCHAR(20) NOT NULL,
                cpno VARCHAR(15) NOT NULL,
                position VARCHAR(10) NOT NULL,
                department VARCHAR(10) NOT NULL,
                rating VARCHAR(10) NOT NULL,
                province VARCHAR(50) NOT NULL,
                city VARCHAR(50) NOT NULL,
                barangay VARCHAR(50) NOT NULL,
                birth VARCHAR(10) NOT NULL,
                gender VARCHAR(10) NOT NULL,
                status VARCHAR(10) NOT NULL,
                email VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_role VARCHAR(20) NOT NULL,
                profile_picture VARCHAR(255) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
        "CREATE TABLE IF NOT EXISTS parent (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) NOT NULL,
                middlename VARCHAR(50) NOT NULL,
                lastname VARCHAR(50) NOT NULL,
                suffix VARCHAR(5) NOT NULL,
                cpno VARCHAR(15) NOT NULL,
                position VARCHAR(10) NOT NULL,
                department VARCHAR(10) NOT NULL,
                rating VARCHAR(10) NOT NULL,
                province VARCHAR(50) NOT NULL,
                city VARCHAR(50) NOT NULL,
                barangay VARCHAR(50) NOT NULL,
                birth VARCHAR(10) NOT NULL,
                gender VARCHAR(10) NOT NULL,
                status VARCHAR(10) NOT NULL,
                email VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_role VARCHAR(20) NOT NULL,
                profile_picture VARCHAR(255) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
        "CREATE TABLE IF NOT EXISTS admin (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) NOT NULL,
                middlename VARCHAR(50) NOT NULL,
                lastname VARCHAR(50) NOT NULL,
                suffix VARCHAR(5) NOT NULL,
                cpno VARCHAR(15) NOT NULL,
                position VARCHAR(10) NOT NULL,
                department VARCHAR(10) NOT NULL,
                rating VARCHAR(10) NOT NULL,
                province VARCHAR(50) NOT NULL,
                city VARCHAR(50) NOT NULL,
                barangay VARCHAR(50) NOT NULL,
                birth VARCHAR(10) NOT NULL,
                gender VARCHAR(10) NOT NULL,
                status VARCHAR(10) NOT NULL,
                email VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_role VARCHAR(20) NOT NULL,
                profile_picture VARCHAR(255) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
        "CREATE TABLE IF NOT EXISTS system (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                system_title VARCHAR(50) NOT NULL,
                system_description VARCHAR(255) NOT NULL,
                system_logo VARCHAR(20) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )"
    ];

    foreach ($tableQueries as $sql) {
        $pdo->exec($sql);
    }

    return $pdo;

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}

