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
                admin_status VARCHAR(10) NOT NULL,
                email VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_role VARCHAR(20) NOT NULL,
                admin_picture VARCHAR(255) NOT NULL,
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
                notes VARCHAR(100) NOT NULL,
                tongue VARCHAR(50) NOT NULL,
                city VARCHAR(50) NOT NULL,
                barangay VARCHAR(50) NOT NULL,
                birth VARCHAR(10) NOT NULL,
                gender VARCHAR(10) NOT NULL,
                teacher_status VARCHAR(10) NOT NULL,
                reg_status ENUM('Pending', 'Approved', 'Rejected', 'Invalidation') DEFAULT 'Pending',


                email VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_role VARCHAR(20) NOT NULL,
                teacher_picture VARCHAR(255) NOT NULL,
                birth_place VARCHAR(50) NOT NULL,
                religious VARCHAR(50) NOT NULL,
                grade_level_id INT(11),
                school_year_id INT(11),
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
                parent_status VARCHAR(10) NOT NULL,
                
                reg_status ENUM('Pending', 'Approved', 'Rejected', 'Invalidation') DEFAULT 'Pending',
                email VARCHAR(100) NOT NULL,
                username VARCHAR(50) NOT NULL,
                password VARCHAR(255) NOT NULL,
                user_role VARCHAR(20) NOT NULL,
                parent_picture VARCHAR(255) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
            "CREATE TABLE IF NOT EXISTS learners (
                learner_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                lrn BIGINT UNSIGNED NOT NULL UNIQUE,
                
                family_name VARCHAR(100) NOT NULL,
                given_name VARCHAR(100) NOT NULL,
                middle_name VARCHAR(100),
                nickname VARCHAR(50),
                suffix VARCHAR(10),
                
                birthdate DATE,
                birth_place VARCHAR(100),
                gender ENUM('Male', 'Female', 'Other') DEFAULT NULL,
                tongue VARCHAR(20),
                religious VARCHAR(50),
                notes TEXT,
                
                learner_picture VARCHAR(255),
                learner_status ENUM('Active', 'Inactive', 'Transferred', 'Graduated') DEFAULT 'Active',
                reg_status ENUM('Pending', 'Approved', 'Rejected', 'Invalidation') DEFAULT 'Pending',

                -- Address
                home_street VARCHAR(100) NOT NULL,
                barangay VARCHAR(50) NOT NULL,
                municipality VARCHAR(50) NOT NULL,
                province VARCHAR(50) NOT NULL,
                zipcode VARCHAR(10) NOT NULL,

                -- Parents
                mother_lname VARCHAR(50) NOT NULL,
                mother_fname VARCHAR(50) NOT NULL,
                mother_mname VARCHAR(50),
                mother_contact VARCHAR(15) NOT NULL,

                father_lname VARCHAR(50) NOT NULL,
                father_fname VARCHAR(50) NOT NULL,
                father_mname VARCHAR(50),
                father_contact VARCHAR(15) NOT NULL,

                -- Guardian
                guardian_lname VARCHAR(50) NOT NULL,
                guardian_fname VARCHAR(50) NOT NULL,
                guardian_mname VARCHAR(50),
                guardian_contact VARCHAR(15) NOT NULL,

                -- Foreign Keys
                parent_id INT(11),

                -- Timestamps
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (parent_id) REFERENCES parent(parent_id) ON DELETE SET NULL
            )
            ",
            "CREATE TABLE IF NOT EXISTS school_year (
                school_year_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                school_year_name VARCHAR(50) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",

            "CREATE TABLE IF NOT EXISTS grade_level (
                grade_level_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                grade_level_name VARCHAR(50) NOT NULL,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
            "CREATE TABLE IF NOT EXISTS subject_grades (
                learner_subject_grade_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                learner_id INT(11) NOT NULL,
                grade_level_id INT(11) NOT NULL,
                school_year_id INT(11) NOT NULL,
                teacher_id INT(11) NOT NULL,
                learning_area VARCHAR(50) NOT NULL,
                q1_grade DECIMAL(3,2) NULL,
                q2_grade DECIMAL(3,2) NULL,
                q3_grade DECIMAL(3,2) NULL,
                q4_grade DECIMAL(3,2) NULL,
                q5_finalrating DECIMAL(3,2) NULL,
                q6_remark ENUM('Waited', 'Promoted', 'Passed', 'Failed', 'Retained') DEFAULT 'Waited',
                
                FOREIGN KEY (learner_id) REFERENCES learners(learner_id) ON DELETE CASCADE,
                FOREIGN KEY (grade_level_id) REFERENCES grade_level(grade_level_id) ON DELETE CASCADE,
                FOREIGN KEY (school_year_id) REFERENCES school_year(school_year_id) ON DELETE CASCADE,
                FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id) ON DELETE CASCADE ON UPDATE CASCADE,
                created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                
            )",
            "CREATE TABLE IF NOT EXISTS  learner_observed (
                learner_observed_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                learner_id INT(11) NOT NULL,
                grade_level_id INT(11) NOT NULL,
                school_year_id INT(11) NOT NULL,
                teacher_id INT(11) NOT NULL,
                observed_by VARCHAR(50) NOT NULL,
                observed_description text NOT NULL,
                oq1 ENUM('AO', 'SO','RO','NO') DEFAULT 'NO',
                oq2 ENUM('AO', 'SO','RO','NO') DEFAULT 'NO',
                oq3 ENUM('AO', 'SO','RO','NO') DEFAULT 'NO',
                oq4 ENUM('AO', 'SO','RO','NO') DEFAULT 'NO',

                FOREIGN KEY (grade_level_id) REFERENCES grade_level(grade_level_id) ON DELETE CASCADE,
                FOREIGN KEY (school_year_id) REFERENCES school_year(school_year_id) ON DELETE CASCADE,
                FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id) ON DELETE CASCADE ON UPDATE CASCADE,
                created_data TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            )",
            " CREATE TABLE IF NOT EXISTS  attendance_monthly (
                attendance_monthly_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                learner_id INT(11) NOT NULL,
                grade_level_id INT(11) NOT NULL,
                school_year_id INT(11) NOT NULL,
                teacher_id INT(11) NOT NULL,
                attendance_text VARCHAR(100) NOT NULL,
                july INT(3) NOT NULL DEFAULT 0,
                august INT(3) NOT NULL DEFAULT 0,
                september INT(3) NOT NULL DEFAULT 0,
                october INT(3) NOT NULL DEFAULT 0,
                november INT(3) NOT NULL DEFAULT 0,
                december INT(3) NOT NULL DEFAULT 0,
                january INT(3) NOT NULL DEFAULT 0,
                february INT(3) NOT NULL DEFAULT 0,
                march INT(3) NOT NULL DEFAULT 0,
                april INT(3) NOT NULL DEFAULT 0,
                may INT(3) NOT NULL DEFAULT 0,
                june INT(3) NOT NULL DEFAULT 0,
                total INT(3) NOT NULL DEFAULT 0,

                FOREIGN KEY (grade_level_id) REFERENCES grade_level(grade_level_id) ON DELETE CASCADE,
                FOREIGN KEY (school_year_id) REFERENCES school_year(school_year_id) ON DELETE CASCADE,
                FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id) ON DELETE CASCADE ON UPDATE CASCADE
            )",
            "CREATE TABLE IF NOT EXISTS learner_section (
                section_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                section_name VARCHAR(50) NOT NULL,
                grade_level_id INT(11) NOT NULL,
                school_year_id INT(11) NOT NULL,
                teacher_id INT(11) NOT NULL,
                learner_id INT(11) NOT NULL,

                FOREIGN KEY (grade_level_id) REFERENCES grade_level(grade_level_id) ON DELETE CASCADE,
                FOREIGN KEY (school_year_id) REFERENCES school_year(school_year_id) ON DELETE CASCADE,
                FOREIGN KEY (teacher_id) REFERENCES teacher(teacher_id) ON DELETE CASCADE ON UPDATE CASCADE,
                FOREIGN KEY (learner_id) REFERENCES learners(learner_id) ON DELETE CASCADE ON UPDATE CASCADE,
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

        /* Don't Touch it here it's a Dafault data*/
        $count = $pdo->query("SELECT COUNT(*) FROM admin")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO admin (
                firstname, middlename, lastname, suffix, cpno, position, department, rating,
                province, city, barangay, birth, gender, admin_status,
                email, username, password, user_role, admin_picture
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
                province, city, barangay, birth, gender, teacher_status,
                email, username, password, user_role, teacher_picture
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

        $count = $pdo->query("SELECT COUNT(*) FROM school_year")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO school_year (school_year_name
            ) VALUES (?),(?)");

            $stmt->execute(['2024-2025', '2025-2026']);
        }

        $count = $pdo->query("SELECT COUNT(*) FROM grade_level")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO grade_level (grade_level_name
            ) VALUES (?),(?),(?)");

            $stmt->execute(['Grade 1', 'Grade 2', 'Grade 3']);
        }

        $count = $pdo->query("SELECT COUNT(*) FROM parent")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO parent (
                firstname, middlename, lastname, suffix, cpno, position, department, rating,
                province, city, barangay, birth, gender, parent_status,
                email, username, password, user_role, parent_picture
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

        $count = $pdo->query("SELECT COUNT(*) FROM learners")->fetchColumn();

        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO learners (
        lrn, family_name, given_name, middle_name, nickname, suffix,
        birthdate, birth_place, gender, learner_status,
        home_street, barangay, municipality, province, zipcode,
        mother_lname, mother_fname, mother_mname, mother_contact,
        father_lname, father_fname, father_mname, father_contact,
        guardian_lname, guardian_fname, guardian_mname, guardian_contact,
        parent_id
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $stmt->execute([
                '12345678912',
                'Daligdig',
                'Manuel',
                'Ewayan',
                'Junjun',
                NULL,
                '2025-07-01',
                'Upper Calarian Z.C.',
                'Male',
                'Active',
                'Purok 3',
                'Barangay Uno',
                'Zamboanga City',
                'Zamboanga del Sur',
                '7000',
                'Daligdig',
                'Maria',
                'Ewayan',
                '09181234567',
                'Daligdig',
                'Jose',
                'Ewayan',
                '09181234567',
                'Daligdig',
                'Alicia',
                'Ewayan',
                '09181234567',
                '1',
            ]);
        }

        $count = $pdo->query("SELECT COUNT(*) FROM system")->fetchColumn();
        if ($count == 0) {
            $stmt = $pdo->prepare("INSERT INTO system (system_title, system_description, system_logo) VALUES (?, ?, ?)");
            $stmt->execute([
                'Sta.Maria Elementary School',
                'A modern web-based school portal for admin, teachers, and parents.',
                'logo2.png'
            ]);
        }



        return $pdo;

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
}

// Initialize on load
$pdo = db_connect();
