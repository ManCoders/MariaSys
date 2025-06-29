<?php

function db_connect()
{
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'elementaryDB';

    try {
        // Step 1: Initial connection to MySQL (no DB yet)
        $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Step 2: Create the database if it doesn't exist
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

        // Step 3: Reconnect using the newly created database
        $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Step 4: Define table structures
        $tableQueries = [
            // Admin Table
            "CREATE TABLE IF NOT EXISTS admin (
                admin_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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

            // Teacher Table
            "CREATE TABLE IF NOT EXISTS teacher (
                teacher_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
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

            // Parent Table
            "CREATE TABLE IF NOT EXISTS parent (
                parent_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) NOT NULL,
                middlename VARCHAR(50) NOT NULL,
                lastname VARCHAR(50) NOT NULL,
                suffix VARCHAR(5) NOT NULL,
                cpno VARCHAR(15) NOT NULL,
                reference_id VARCHAR(50) NOT NULL,
                position VARCHAR(10) NOT NULL,
                department VARCHAR(10) NOT NULL,
                relationship VARCHAR(30) NOT NULL,
                rating VARCHAR(10) NOT NULL,
                province VARCHAR(50) NOT NULL,
                city VARCHAR(50) NOT NULL,
                barangay VARCHAR(50) NOT NULL,
                occupation VARCHAR(100) NOT NULL,
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
            "CREATE TABLE IF NOT EXISTS learners (
                learner_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                lrn BIGINT(12) NOT NULL UNIQUE,
                family_name VARCHAR(100) NOT NULL,
                given_name VARCHAR(100) NOT NULL,
                middle_name VARCHAR(100),
                nickname VARCHAR(50),
                suffix VARCHAR(10),
                birthdate DATE,
                notes TEXT,
                tongue VARCHAR(20),
                verification_code VARCHAR(50),
                birth_place VARCHAR(100),
                gender VARCHAR(10),
                profile_picture VARCHAR(255),
                status VARCHAR(10),
                grade_level_id INT(11),
                parent_id INT(11),
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (parent_id) REFERENCES parent(parent_id) ON DELETE SET NULL
            )",
            "CREATE TABLE IF NOT EXISTS learner_addresses (
                learner_address_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                learner_id INT(11) NOT NULL,
                home_street VARCHAR(100),
                barangay VARCHAR(50),
                municipality VARCHAR(50),
                province VARCHAR(50),
                zipcode VARCHAR(10),
                FOREIGN KEY (learner_id) REFERENCES learners(learner_id) ON DELETE CASCADE
            )",
            "CREATE TABLE IF NOT EXISTS learner_parents (
                id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                learner_id INT(11) NOT NULL,
                mother_lname VARCHAR(50),
                mother_fname VARCHAR(50),
                mother_mname VARCHAR(50),
                mother_contact VARCHAR(15),
                father_lname VARCHAR(50),
                father_fname VARCHAR(50),
                father_mname VARCHAR(50),
                father_contact VARCHAR(15),
                created_date DATE DEFAULT CURRENT_DATE,
                FOREIGN KEY (learner_id) REFERENCES learners(learner_id) ON DELETE CASCADE
            )",

            "CREATE TABLE IF NOT EXISTS learner_guardians (
                guardian_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                learner_id INT(11) NOT NULL,
                guardian_lname VARCHAR(50),
                guardian_fname VARCHAR(50),
                guardian_mname VARCHAR(50),
                guardian_contact VARCHAR(15),
                FOREIGN KEY (learner_id) REFERENCES learners(learner_id) ON DELETE CASCADE
            )",
            "CREATE TABLE IF NOT EXISTS school_year (
                school_year_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                school_year VARCHAR(10) NOT NULL,
                created_date DATE DEFAULT (CURRENT_DATE)
            )",
            "CREATE TABLE IF NOT EXISTS grading_level (
                grade_level_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                learner_id INT(11),
                parent_id INT(11),
                teacher_id INT(11),
                school_year_id INT(11),
                grade_level VARCHAR(10),
                created_date DATE DEFAULT CURRENT_DATE,
                FOREIGN KEY (learner_id) REFERENCES learners(learner_id) ON DELETE CASCADE,
                FOREIGN KEY (parent_id) REFERENCES parent(parent_id) ON DELETE SET NULL,
                FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id) ON DELETE SET NULL,
                FOREIGN KEY (school_year_id) REFERENCES school_year(school_year_id) ON DELETE SET NULL
            )",

            // System Info Table
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

        /* Don't Touch it here it's a Dafault data*/
        $count = $pdo->query("SELECT COUNT(*) FROM admin")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO admin (
                firstname, middlename, lastname, suffix, cpno, position, department, rating,
                province, city, barangay, birth, gender, status,
                email, username, password, user_role, profile_picture
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                'Juan',
                'Cruz',
                'Dela',
                '',
                '09171234567',
                'Principal',
                'Admin',
                'A+',
                'Metro Manila',
                'Manila',
                'Sampaloc',
                '1970-01-01',
                'Male',
                'Active',
                'admin@school.edu.ph',
                'admin',
                password_hash('admin123', PASSWORD_BCRYPT),
                'admin',
                'default.png'
            ]);
        }

        $count = $pdo->query("SELECT COUNT(*) FROM teacher")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO teacher (
                firstname, middlename, lastname, suffix, employeeid, cpno, position, department, rating,
                province, city, barangay, birth, gender, status,
                email, username, password, user_role, profile_picture
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                'Maria',
                'Luz',
                'Reyes',
                '',
                'TCH2023001',
                '09181234567',
                'Teacher',
                'Math',
                'B+',
                'Laguna',
                'Calamba',
                'Barangay Uno',
                '1985-05-12',
                'Female',
                'Active',
                'teacher@school.edu.ph',
                'teacher',
                password_hash('teacher123', PASSWORD_BCRYPT),
                'teacher',
                'default.png'
            ]);
        }

        $count = $pdo->query("SELECT COUNT(*) FROM parent")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO parent (
                firstname, middlename, lastname, suffix, cpno, position, department, rating,
                province, city, barangay, birth, gender, status,
                email, username, password, user_role, profile_picture
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                'Maria',
                'Luz',
                'Reyes',
                'jr',
                '09181234567',
                'parent',
                'Math',
                'B+',
                'Laguna',
                'Calamba',
                'Barangay Uno',
                '1985-05-12',
                'Female',
                'Active',
                'parent@school.edu.ph',
                'parent',
                password_hash('parent123', PASSWORD_BCRYPT),
                'parent',
                'default.png'
            ]);
        }
        $count = $pdo->query("SELECT COUNT(*) FROM system")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO system (system_title, system_description, system_logo) VALUES (?, ?, ?)");
            $stmt->execute([
                'Sta.Maria Elementary School',
                'A modern web-based school portal for admin, teachers, and parents.',
                'default.jpeg'
            ]);
        }



        return $pdo;

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}

// Initialize on load
$pdo = db_connect();
