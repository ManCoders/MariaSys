<?php
session_start();
class Action
{
    private $db;

    public function __construct()
    {

        include 'config.php';
        if (!isset($pdo)) {
            die("Database not connected.");
        }
        $this->db = $pdo;
    }

    function __destruct()
    {
        $this->db = null;
    }


    function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        session_destroy();
        session_unset();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        return json_encode([
            'status' => 1,
            'message' => 'Logout successful.',
            'redirect_url' => '../../src/index.php'
        ]);
    }
    function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $username = strtolower(trim($_POST['username'] ?? ''));
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            return json_encode([
                'status' => 2,
                'message' => 'Username and password are required.',
                'redirect_url' => 'src/index.php'
            ]);
        }

        try {
            $roles = [
                'admin' => [
                    'table' => 'admin',
                    'redirect' => 'src/UI-Admin/index.php',
                    'session_key' => 'adminData',
                    'fields' => ['firstname', 'middlename', 'lastname', 'email', 'user_role', 'username', 'admin_id', 'created_date']
                ],
                'teacher' => [
                    'table' => 'teacher',
                    'redirect' => 'src/UI-Teacher/index.php',
                    'session_key' => 'teacherData',
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'email', 'teacher_id', 'profile_picture', 'created_date', 'user_role', 'username']
                ],
                'parent' => [
                    'table' => 'parent',
                    'redirect' => 'src/UI-Parent/index.php',
                    'session_key' => 'parentData',
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'email', 'parent_id', 'profile_picture', 'created_date', 'user_role', 'username']
                ]
            ];

            foreach ($roles as $role => $info) {
                $stmt = $this->db->prepare("SELECT * FROM {$info['table']} WHERE username = ? OR email = ?");
                $stmt->execute([$username, $username]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user && password_verify($password, $user['password'])) {
                    if (strtolower($user['user_role']) !== $role) {
                        session_destroy();
                        return json_encode([
                            'status' => 2,
                            'message' => 'Unauthorized access. User role mismatch.',
                            'redirect_url' => 'src/index.php'
                        ]);
                    }

                    // Set session data
                    $sessionData = [];
                    foreach ($info['fields'] as $field) {
                        $sessionData[$field] = $user[trim($field)] ?? null;
                    }

                    $_SESSION[$info['session_key']] = $sessionData;

                    return json_encode([
                        'status' => 1,
                        'message' => 'Login successful.',
                        'redirect_url' => $info['redirect']
                    ]);
                }
            }

            return json_encode([
                'status' => 2,
                'message' => 'User not found or incorrect credentials.',
                'redirect_url' => 'src/index.php'
            ]);
        } catch (Exception $e) {
            return json_encode([
                'status' => 2,
                'message' => 'System error occurred. Contact administrator.',
                'redirect_url' => 'src/index.php'
            ]);
        }
    }


    function save_installation_data()
    {
        $firstname = htmlspecialchars($_POST['firstname'] ?? '');
        $middlename = htmlspecialchars($_POST['middlename'] ?? '');
        $lastname = htmlspecialchars($_POST['lastname'] ?? '');
        $email = htmlspecialchars($_POST['email'] ?? '');
        $username = htmlspecialchars($_POST['username'] ?? '');
        $password = password_hash($_POST['password'] ?? '', PASSWORD_DEFAULT);
        $system_title = htmlspecialchars($_POST['system_title'] ?? '');
        $system_description = htmlspecialchars($_POST['system_description'] ?? '');

        if (!isset($_FILES['system_logo']) || $_FILES['system_logo']['error'] !== 0) {
            return json_encode(['status' => 2, 'message' => 'Logo file is required.']);
        }

        $logo = $_FILES['system_logo'];
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        if ($logo['size'] > 2 * 1024 * 1024) {
            return json_encode(['status' => 2, 'message' => 'Logo file size exceeds 2MB.']);
        }

        if (!in_array($logo['type'], $allowed_types)) {
            return json_encode(['status' => 2, 'message' => 'Invalid logo file type.']);
        }

        $upload_dir = '../assets/image/system_logo/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $logo_name = uniqid('logo_') . '_' . basename($logo['name']);
        $upload_path = $upload_dir . $logo_name;
        if (!move_uploaded_file($logo['tmp_name'], $upload_path)) {
            return json_encode(['status' => 2, 'message' => 'Failed to upload logo file.']);
        }

        try {
            $stmt1 = $this->db->prepare("INSERT INTO admin (firstname, middlename, lastname, email, username, password, user_role) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $adminInsert = $stmt1->execute([$firstname, $middlename, $lastname, $email, $username, $password, 'administrator']);

            if ($adminInsert) {
                $stmt2 = $this->db->prepare("INSERT INTO system (system_title, system_description, system_logo) VALUES (?, ?, ?)");
                $systemInsert = $stmt2->execute([$system_title, $system_description, $logo_name]);

                if ($systemInsert) {
                    return json_encode(['status' => 1, 'message' => 'Installation data saved successfully.']);
                } else {
                    return json_encode(['status' => 2, 'message' => 'Failed to save system data.']);
                }
            } else {
                return json_encode(['status' => 2, 'message' => 'Failed to save admin data.']);
            }
        } catch (Exception $e) {

            return json_encode(['status' => 2, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }
    }



    function registration_form()
    {
        if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        // Extract user input
        $user_role   = strtolower(trim($_POST['user_role'] ?? ''));
        $firstname   = trim($_POST['firstName'] ?? '');
        $middlename  = trim($_POST['middleName'] ?? '');
        $lastname    = trim($_POST['lastName'] ?? '');
        $email       = trim($_POST['email'] ?? '');
        $username    = trim($_POST['username'] ?? '');
        $password    = $_POST['password'] ?? '';
        $cpno        = trim($_POST['cpnumber'] ?? '');
        $gender      = $_POST['gender'] ?? '';
        $dateofbirth = $_POST['dateofbirth'] ?? '';
        $profilePicPath = null;

        if (isset($_FILES['register_photo']) && $_FILES['register_photo']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['register_photo'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png'];

            if (!in_array($ext, $allowed)) {
                return json_encode(['status' => 2, 'message' => 'Only JPG and PNG files are allowed.']);
            }

            $uploadDir = './uploads/';
            $relativePath = '/uploads/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            if (!is_writable($uploadDir)) {
                return json_encode(['status' => 2, 'message' => 'Upload folder is not writable.']);
            }

            $newName = uniqid('profile_', false) . '.' . $ext;
            $uploadPath = $uploadDir . $newName;

            if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                $profilePicPath = $relativePath . $newName;
            } else {
                error_log('Failed to move uploaded file: ' . print_r($file, true));
                return json_encode(['status' => 2, 'message' => 'Failed to move uploaded file.']);
            }
        }



        // Validate required fields
        if (empty($user_role) || empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password)) {
            return json_encode(['status' => 2, 'message' => 'Required fields are missing.']);
        }

        try {
            // Define user role mappings
            $roleMap = [
                'parent' => [
                    'table' => 'parent',
                    'fields' => '(user_role, firstname, middlename, lastname, email, username, password, cpno, gender, reg_status, dateofbirth, profile_picture)',
                    'placeholders' => 12,
                ],
                'teacher' => [
                    'table' => 'teacher',
                    'fields' => '(user_role, firstname, middlename, lastname, email, username, password, cpno, gender, reg_status, dateofbirth, profile_picture)',
                    'placeholders' => 12,
                ]
            ];

            if (!array_key_exists($user_role, $roleMap)) {
                return json_encode(['status' => 2, 'message' => 'Invalid user role.']);
            }

            $table       = $roleMap[$user_role]['table'];
            $fields      = $roleMap[$user_role]['fields'];
            $placeholders = rtrim(str_repeat('?, ', $roleMap[$user_role]['placeholders']), ', ');
            $reg_status  = 'Pending';

            // Check for duplicates
            foreach (['email' => $email, 'username' => $username, 'cpno' => $cpno] as $field => $val) {
                $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$table} WHERE {$field} = ?");
                $stmt->execute([$val]);
                if ($stmt->fetchColumn() > 0) {
                    return json_encode([
                        'status' => 2,
                        'message' => ucfirst($field) . ' already exists.',
                        'redirect_url' => 'src/register.php'
                    ]);
                }
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Prepare values in correct order
            $values = [
                $user_role,
                $firstname,
                $middlename,
                $lastname,
                $email,
                $username,
                $hashedPassword,
                $cpno,
                $gender,
                $reg_status,
                $dateofbirth,
                $profilePicPath
            ];

            // Insert into DB
            $stmt = $this->db->prepare("INSERT INTO {$table} {$fields} VALUES ({$placeholders})");
            $stmt->execute($values);

            return json_encode([
                'status' => 1,
                'message' => ucfirst($user_role) . ' registration successful.',
                'redirect_url' => 'index.php'
            ]);
        } catch (Exception $e) {
            return json_encode([
                'status' => 2,
                'message' => 'An error occurred: ' . $e->getMessage(),
                'redirect_url' => 'src/register.php'
            ]);
        }
    }


    function Enrollment()
    {
        extract($_POST); // ⚠️ Still recommended to use $_POST['key'] individually for clarity & safety

        try {

            if (empty($lrn) || empty($family_name) || empty($given_name) || empty($middle_name) || empty($birthdate) || empty($religious)) {
                return json_encode(['status' => 2, 'message' => 'Please fill in all required fields.']);
            }

            if (!preg_match('/^\d{12}$/', $lrn)) {
                return json_encode(['status' => 2, 'message' => 'Invalid LRN format. It should be 12 digits.']);
            }


            $check = $this->db->prepare("SELECT COUNT(*) FROM learners WHERE lrn = :lrn");
            $check->execute([':lrn' => $lrn]);
            if ($check->fetchColumn() > 0) {
                return json_encode(['status' => 2, 'message' => 'This LRN is already registered.']);
            }

            $profilePicPath = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['profile_picture'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png', 'gif'];

                if (!in_array($ext, $allowed)) {
                    return json_encode(['status' => 2, 'message' => 'Only JPG, PNG, and GIF files are allowed.']);
                }

                $uploadDir = './uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $newName = uniqid('profile_', false) . '.' . $ext;
                $uploadPath = $uploadDir . $newName;

                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    $profilePicPath = '/uploads/' . $newName;
                } else {
                    return json_encode(['status' => 2, 'message' => 'Failed to save uploaded profile picture.']);
                }
            }

            // 1. INSERT learner main info
            $stmt1 = $this->db->prepare("
                INSERT INTO learners (
                    lrn, nickname, family_name, given_name, middle_name, suffix,
                    birthdate, notes, gender, learner_picture, learner_status, tongue, grade_level_id, parent_id, birth_place, school_year_id, religious
                ) VALUES (
                    :lrn, :nickname, :family_name, :given_name, :middle_name, :suffix,
                    :birthdate, :notes, :gender, :profile_picture, :status, :tongue, :grade_level_id, :parent_id, :birth_place, :school_year_id, 
                    :religious
                )
            ");

            $stmt1->execute([
                ':lrn' => $lrn,
                ':nickname' => $nickname ?? null,
                ':family_name' => $family_name,
                ':given_name' => $given_name,
                ':middle_name' => $middle_name,
                ':suffix' => $suffix ?? null,
                ':birthdate' => $birthdate,
                ':notes' => $notes ?? null,
                ':gender' => $gender ?? null,
                ':profile_picture' => $profilePicPath,
                ':status' => $status,
                ':tongue' => $tongue,
                ':grade_level_id' => $grade_level_id,
                ':parent_id' => $parent_id,
                ':birth_place' => $birth_place,
                ':school_year_id' => $school_year_id,
                ':religious' => $religious
            ]);

            // 2. INSERT learner address & enrollment
            /* $stmt2 = $this->db->prepare("
                INSERT INTO learner_addresses (
                    learner_id, barangay, home_street, municipality, province, zipcode, birth_place
                ) VALUES (
                    :learner_id, :barangay, :home_street, :municipality, :province, :zipcode, :birth_place
                )
            ");
            $stmt2->execute([
                ':learner_id' => $learnerId,
                ':barangay' => $barangay,
                ':home_street' => $home_street,
                ':municipality' => $municipality,
                ':province' => $province,
                ':zipcode' => $zipcode,
                ':birth_place' => $birth_place
            ]);

            // 3. INSERT guardian info
            $stmt3 = $this->db->prepare("
                INSERT INTO learner_guardians (
                    learner_id, lname, fname, mname, contact
                ) VALUES (
                    :learner_id, :lname, :fname, :mname, :contact
                )
            ");
            $stmt3->execute([
                ':learner_id' => $learnerId,
                ':lname' => $guardian_lname,
                ':fname' => $guardian_fname,
                ':mname' => $guardian_mname,
                ':contact' => $guardian_contact
            ]);

            // 4. INSERT parent info
            $stmt4 = $this->db->prepare("
                INSERT INTO learner_parents (
                    learner_id,
                    mother_lname, mother_fname, mother_mname, mother_contact,
                    father_lname, father_fname, father_mname, father_contact
                ) VALUES (
                    :learner_id,
                    :mother_lname, :mother_fname, :mother_mname, :mother_contact,
                    :father_lname, :father_fname, :father_mname, :father_contact
                )
            ");
            $stmt4->execute([
                ':learner_id' => $learnerId,
                ':mother_lname' => $mother_lname,
                ':mother_fname' => $mother_fname,
                ':mother_mname' => $mother_mname,
                ':mother_contact' => $mother_contact,
                ':father_lname' => $father_lname,
                ':father_fname' => $father_fname,
                ':father_mname' => $father_mname,
                ':father_contact' => $father_contact
            ]); */

            return json_encode(['status' => 1, 'message' => 'Successfully registered. Please wait for approval!']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }

    function schoolYear()
    {
        try {
            $school_year = htmlspecialchars(trim($_POST['sy_name'] ?? ''));
            $status = $_POST['sy_status'] ?? 'inactive';

            if (empty($school_year)) {
                return json_encode(['status' => 2, 'message' => 'School Year is required.']);
            }

            // Insert school year
            $stmt = $this->db->prepare("
                INSERT INTO school_year (school_year_name, school_year_status)
                VALUES (?, ?)
            ");
            $stmt->execute([$school_year, $status]);

            return json_encode(['status' => 1, 'message' => 'School Year added successfully.']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }

    function sections()
    {
        try {
            $section = htmlspecialchars(trim($_POST['section_name'] ?? ''));
            $section_des = $_POST['section_desc'] ?? '';

            if (empty($section)) {
                return json_encode(['status' => 2, 'message' => 'Section Name is required.']);
            }

            $stmt = $this->db->prepare("
                INSERT INTO sections (section_name, section_description)
                VALUES (?, ?)
            ");
            $stmt->execute([$section, $section_des]);

            return json_encode(['status' => 1, 'message' => 'Section added successfully.']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }

    // Parent Link account for learner
    function LinkNewChild()
    {
        try {
            $lrn         = $_POST['lrn'] ?? '';
            $status      = $_POST['status'] ?? 'New'; // Default to 'New' if missing
            $nickname    = htmlspecialchars(trim($_POST['nickname'] ?? ''));
            $gender      = $_POST['gender'] ?? '';
            $last_name   = htmlspecialchars(trim($_POST['family_name'] ?? ''));
            $middle_name = htmlspecialchars(trim($_POST['middle_name'] ?? ''));
            $given_name  = htmlspecialchars(trim($_POST['given_name'] ?? ''));
            $suffix      = $_POST['suffix'] ?? null;
            $religious   = htmlspecialchars(trim($_POST['religious'] ?? ''));
            $birthdate   = $_POST['birthdate'] ?? '';
            $birth_place = htmlspecialchars(trim($_POST['birth_place'] ?? ''));
            $notes       = htmlspecialchars(trim($_POST['notes'] ?? ''));
            $parent_id   = $_POST['parent_id'] ?? '';

            if (!preg_match('/^\d{12}$/', $lrn)) {
                return json_encode(['status' => 2, 'message' => 'LRN must be exactly 12 digits.']);
            }

            // Check if LRN exists
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM learners WHERE lrn = ?");
            $stmt->execute([$lrn]);
            if ($stmt->fetchColumn() > 0) {
                return json_encode(['status' => 2, 'message' => 'This LRN is already registered.']);
            }

            // Handle profile picture
            $profilePicPath = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['profile_picture'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (!in_array($ext, $allowed)) {
                    return json_encode(['status' => 2, 'message' => 'Only JPG and PNG images are allowed.']);
                }

                $uploadDir = __DIR__ . '/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $newName = uniqid('profile_', false) . '.' . $ext;
                $uploadPath = $uploadDir . $newName;

                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    $profilePicPath = 'authentication/uploads/' . $newName;
                } else {
                    return json_encode(['status' => 2, 'message' => 'Failed to save uploaded profile picture.']);
                }
            }

            // Insert learner
            $stmt = $this->db->prepare("
            INSERT INTO learners (
                parent_id,
                lrn,
                learner_status,
                nickname,
                gender,
                family_name,
                middle_name,
                given_name,
                suffix,
                religious,
                birthdate,
                birth_place,
                notes,
                learner_picture,
                mother_lname,
                father_lname
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");

            $stmt->execute([
                $parent_id,
                $lrn,
                $status,
                $nickname,
                $gender,
                $last_name,
                $middle_name,
                $given_name,
                $suffix ?: null,
                $religious,
                $birthdate,
                $birth_place,
                $notes,
                $profilePicPath,
                $middle_name,
                $last_name
            ]);

            return json_encode(['status' => 1, 'message' => 'Successfully registered. Please wait for approval.']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }


    function NewTeacher()
    {
        extract($_POST);

        try {

            if (empty($employee_id) || empty($family_name) || empty($contact) || empty($given_name) || empty($middle_name) || empty($birthdate) || empty($religious)) {
                return json_encode(['status' => 2, 'message' => 'Please fill in all required fields.']);
            }

            $profilePicPath = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['profile_picture'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (!in_array($ext, $allowed)) {
                    return json_encode(['status' => 2, 'message' => 'Only JPG, PNG, and GIF files are allowed.']);
                }

                $uploadDir = __DIR__ . '/uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                $newName = uniqid('profile_', false) . '.' . $ext;
                $uploadPath = $uploadDir . $newName;

                if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
                    $profilePicPath = 'uploads/' . $newName;
                } else {
                    return json_encode(['status' => 2, 'message' => 'Failed to save uploaded profile picture.']);
                }
            }

            // 1. INSERT learner main info
            $stmt1 = $this->db->prepare("
                INSERT INTO teacher (
                    employeeid, lastname, firstname, middlename, suffix,
                    dateofbirth, notes, gender, profile_picture, reg_status, tongue, grade_level_id, birth_place, school_year_id, religious, cpno
                ) VALUES (
                    :employee_id, :family_name, :given_name, :middle_name, :suffix,
                    :birthdate, :notes, :gender, :profile_picture, :status, :tongue, :grade_level_id, :birth_place, :school_year_id, 
                    :religious, :contact
                )
            ");

            $stmt1->execute([
                ':employee_id' => $employee_id,
                ':family_name' => $family_name,
                ':given_name' => $given_name,
                ':middle_name' => $middle_name,
                ':suffix' => $suffix ?? null,
                ':birthdate' => $birthdate,
                ':notes' => $notes ?? null,
                ':gender' => $gender ?? null,
                ':profile_picture' => $profilePicPath,
                ':status' => $status,
                ':tongue' => $tongue,
                ':grade_level_id' => $grade_level_id,
                ':birth_place' => $birth_place,
                ':school_year_id' => $school_year_id,
                ':religious' => $religious,
                ':contact' => $contact
            ]);
            /* location.href = base_url + "/src/UI-admin/index.php?page=contents/teacher"; */
            return json_encode(['status' => 1, 'message' => 'Successfully registered!']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }

    /* function reg_status_parent()
    {
        try {
            $parent_id = $_POST['parent_id'];
            $reg_status = $_POST['reg_status_parent'];

            $stmt = $this->db->prepare("UPDATE parent SET reg_status = ? WHERE parent_id = ?");
            $stmt->execute([$reg_status, $parent_id]);

            return json_encode(['status' => 1, 'message' => 'Account registration status updated successfully.']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } */
    function reg_status_user()
    {
        try {
            $user_id = $_POST['id'] ?? null;
            $reg_status = $_POST['reg_status_parent'] ?? null;
            $user_type = strtolower($_POST['user_role'] ?? '');

            if (!$user_id || !$reg_status || !in_array($user_type, ['parent', 'teacher'])) {
                return json_encode([
                    'status' => 0,
                    'message' => 'Missing or invalid input.'
                ]);
            }

            // Set table and field info
            $tableMap = [
                'parent' => ['table' => 'parent', 'id_field' => 'parent_id', 'status_field' => 'reg_status'],
                'teacher' => ['table' => 'teacher', 'id_field' => 'teacher_id', 'status_field' => 'reg_status']
            ];

            $info = $tableMap[$user_type];
            $sql = "UPDATE {$info['table']} SET {$info['status_field']} = ? WHERE {$info['id_field']} = ?";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([$reg_status, $user_id]);


            return json_encode([
                'status' => 1,
                'message' => ucfirst($user_type) . " registration status updated successfully."
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }

    function setRoomStatus(){
        try {
            $room_id = $_POST['room_id'] ?? null;
            $data = $_POST['data'] ?? null;

            if (!$room_id || !$data) {
                return json_encode(['status' => 0, 'message' => 'Missing room ID or data.']);
            }

            $stmt = $this->db->prepare("UPDATE classrooms SET room_status = ? WHERE room_id = ?");
            $stmt->execute([$data, $room_id]);

            return json_encode(['status' => 1, 'message' => 'Room status updated successfully.']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }

    function getDatas()
{
    try {
        $type = $_REQUEST['type'] ?? '';

        // ✅ Whitelisted table names to prevent SQL injection
         $validTypes = [
            'school_year' => 'school_year',
            'sections'    => 'sections',
            'grade_level' => 'grade_level',
            'classrooms'  => 'classrooms'
        ];

        // ✅ Check if valid
        if (!array_key_exists($type, $validTypes)) {
            return json_encode(['status' => 0, 'message' => 'Invalid type']);
        }

        $table = $validTypes[$type];

        // ✅ Only allow fetching from safe, known tables
        $stmt = $this->db->prepare("SELECT * FROM {$table}");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cards = '';

        foreach ($results as $row) {
            if ($type === 'school_year') {
                $yearName = htmlspecialchars($row['school_year_name'], ENT_QUOTES, 'UTF-8');
                $status = htmlspecialchars($row['school_year_status'], ENT_QUOTES, 'UTF-8');

                $cards .= '
                
                <div class="col-md-4">  
                
                    <div class="card shadow-sm border position-relative">
                        <button type="button" class="btn btn-close text-black position-absolute top-0 end-0 m-2" aria-label="Close"></button>
                        <div class="card-body text-center">
                            <h5 class="card-title">School Year</h5>
                            <h5>' . $yearName . '</h5>
                            <p class="card-text text-center">
                                <strong>Set to Default:</strong>
                                <form id="setDefaultFormSy" data-id="' . $row['school_year_id'] . '">
                                    <select class="form-select mt-1 w-50 mx-auto text-center" name="sy_default">
                                        <option value="Active" ' . ($status === 'Active' ? 'selected' : '') . '>Default</option>
                                        <option value="Inactive" ' . ($status === 'Inactive' ? 'selected' : '') . '>Inactive</option>
                                    </select>
                                </form>
                            </p>
                        </div>
                    </div>
                </div>';
            } elseif ($type === 'sections') {
                $selectName = htmlspecialchars($row['section_name'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
                $selectOptions = htmlspecialchars($row['section_description'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
                $section_id = htmlspecialchars($row['section_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8');

                $cards .= '
                <div class="col-md-4">
                
                    <div class="card shadow-sm border">
                        <div class="card-body">
                            <h5 class="card-title">Section: ' . $selectName . '</h5>
                            <p class="card-text">
                                <strong>Description:</strong> ' . $selectOptions . '<br />
                            </p>
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-sm btn-outline-success" id="editSection" data-id="'. $section_id .'"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-outline-danger" id="deleteSection" data-id="'. $section_id .'"><i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>';
            } elseif ($type === 'grade_level') {
                $gradeLevel = htmlspecialchars($row['grade_level_name'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
                $created_at = htmlspecialchars($row['created_date'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
                $gredeLevel_id = htmlspecialchars($row['grade_level_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8');

                $cards .= '
                <div class="col-md-4">
                    <div class="card shadow-sm border">
                        <div class="card-body ">
                            <h5 class="card-title">' . $gradeLevel . '</h5>
                            <p class="card-text">
                                created at: <strong>' . $created_at . '</strong><br />
                            </p>
                            <div class="d-flex col-md-12 gap-1">
                                <button class="btn m-0 btn-outline-success" type="button" id="editGradeLevel" data-id="'. $gredeLevel_id .'"><i class="fa fa-edit"></i></button>
                                <button class="btn m-0 btn-outline-danger" type="button" id="deleteGradeLevel" data-id="'. $gredeLevel_id .'"><i class="fa fa-trash"></i></button>
                                <select class="form-select  mx-auto text-center" name="levelstatus" id="levelstatus">
                                    <option value="Active">Active</option>
                                    <option value="InActive">In Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>';
            }elseif ($type === 'classrooms') {
                $room_name = htmlspecialchars($row['room_name'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
                $room_type = htmlspecialchars($row['room_type'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
                $created_date = htmlspecialchars($row['created_date'] ?? 'N/A', ENT_QUOTES, 'UTF-8');
                $classroom_id = htmlspecialchars($row['room_id'] ?? 'N/A', ENT_QUOTES, 'UTF-8'); 

                $cards .= '
                <div class="col-md-4">
                    <div class="card shadow-sm border">
                        <div class="card-body ">
                            <h5 class="card-title">Room name: ' . $room_name . '</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Room Type: ' . $room_type . '</h6>
                            <p class="card-text">
                                created at: <strong>' . $created_date . '</strong><br />
                            </p>
                            <div class="d-flex col-md-12 gap-1">
                                <button class="btn m-0 btn-outline-success" type="button" id="editClassroom" data-id="'. $classroom_id .'">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn m-0 btn-outline-danger" type="button" id="deleteClassroom" data-id="'. $classroom_id .'">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <form id="setRoomFormStatus" data-id="' . $classroom_id . '">
                                    <select class="form-select mx-auto text-center" name="roomstatus" id="roomstatus">
                                        <option value="Occupied">Occupied</option>
                                        <option value="Available">Available</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } 

        return json_encode(['status' => 1, 'data' => $cards]);

    } catch (PDOException $e) {
        return json_encode([
            'status' => 0,
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
}


    function setDefaultSchoolYear(){

        try {
            $stmt = $this->db->prepare("UPDATE school_year SET school_year_status = 'Inactive'");
            $stmt->execute();


            $stmt = $this->db->prepare("UPDATE school_year SET school_year_status = ? WHERE school_year_id = ?");
            $stmt->execute([$_POST['data'], $_POST['school_year_id']]);

            return json_encode(['status' => 1, 'message' => 'Default school year set successfully.']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }



    //WORKING DONT TOUCH IT DISPLAY TO TABLE THIS
    function getLearner()
    {
        try {
            $stmt = $this->db->prepare("
            SELECT  * FROM learners ORDER BY created_at
            ");

            $stmt->execute();
            $learners = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode([
                'status' => 1,
                'data' => $learners
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }

    function getTeacher()
    {
        try {
            $role = strtolower($_GET['role'] ?? 'all');
            $table = $role === 'teacher' ? 'teacher' : 'parent';

            $stmt = $this->db->prepare("SELECT * FROM {$table} WHERE user_role = ?");
            $stmt->execute([$role]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode([
                'status' => 1,
                'data' => $data
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }



    function updateLearnerReg()
    {
       try {
            $learner_id = $_POST['learner_id'];
            $reg_status = $_POST['reg_status'];

            $stmt = $this->db->prepare("UPDATE learners SET reg_status = ? WHERE learner_id = ?");
            $stmt->execute([$reg_status, $learner_id]);

            return json_encode(['status' => 1, 'message' => 'Learner registration updated successfully.']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }


    function getLearnerByParentId()
    {
        try {
            $stmt = $this->db->prepare("
            SELECT * FROM learners
        ");

            $stmt->execute();
            $teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode([
                'status' => 1,
                'data' => $teacher
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }

    function other_info()
    {
        try {
            $learner_id = $_POST['learner_id'] ?? null;
            $field = $_POST['name'] ?? null;
            $value = $_POST['value'] ?? null;

            if (!$learner_id || !$field) {
                return json_encode([
                    'status' => 2,
                    'message' => 'Missing required fields'
                ]);
            }

            $check = $this->db->prepare("SELECT COUNT(*) FROM enrollment_additional_info WHERE learner_id = ?");
            $check->execute([$learner_id]);

            if ($check->fetchColumn() > 0) {
                $stmt = $this->db->prepare("UPDATE enrollment_additional_info SET `$field` = ? WHERE learner_id = ?");
                $stmt->execute([$value, $learner_id]);
            } else {
                // INSERT new row with only this one field and learner_id
                $stmt = $this->db->prepare("INSERT INTO enrollment_additional_info (`learner_id`, `$field`) VALUES (?, ?)");
                $stmt->execute([$learner_id, $value]);
            }

            return json_encode([
                'status' => 1,
                'message' => "Saved"
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }

    function get_additional_info()
    {
        try {
            $learner_id = $_POST['learner_id'] ?? null;
            if (!$learner_id) {
                return json_encode(['status' => 0, 'message' => 'Missing learner_id']);
            }

            $stmt = $this->db->prepare("SELECT * FROM enrollment_additional_info WHERE learner_id = ?");
            $stmt->execute([$learner_id]);

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                return json_encode(['status' => 1, 'message' => 'Saved Data', 'data' => $row]);
            }

            return json_encode(['status' => 2, 'message' => 'No data found']);
        } catch (PDOException $e) {
            return json_encode(['status' => 2, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }

    function updateLearners()
    {
        try {
            $learner_id = $_POST['learner_id'] ?? null;
            $field = $_POST['field'] ?? null;
            $value = $_POST['value'] ?? null;

            if (!$learner_id || !$field) {

                return json_encode(['status' => 2, 'message' => 'Missing required fields']);
            }

            // Ensure field name is valid to prevent SQL injection
            $allowed_fields = [
                'grade_level',
                'school_year',
                'lrn',
                'psa',
                'lname',
                'fname',
                'mname',
                'suffix',
                'birthdate',
                'age',
                'gender',
                'birth_place',
                'religion',
                'tongue',
                'current_house_no',
                'current_street',
                'current_barangay',
                'current_city',
                'current_province',
                'current_country',
                'current_zip'

            ];

            if (!in_array($field, $allowed_fields)) {
                return json_encode([
                    'status' => 0,
                    'message' => 'Invalid field.'
                ]);
                return;
            }

            // Check if learner exists
            $check = $this->db->prepare("SELECT COUNT(*) FROM learners WHERE learner_id = ?");
            $check->execute([$learner_id]);

            if ($check->fetchColumn() > 0) {
                // Update field
                $stmt = $this->db->prepare("UPDATE learners SET `$field` = ? WHERE learner_id = ?");
                $stmt->execute([$value, $learner_id]);
            } else {
                // Insert new record (optional: normally learner should already exist)
                $stmt = $this->db->prepare("INSERT INTO learners (`learner_id`, `$field`) VALUES (?, ?)");
                $stmt->execute([$learner_id, $value]);
            }

            return json_encode([
                'status' => 1,
                'message' => 'Saved successfully.'
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }

    public function getGradeLevel()
    {
        if (empty($_POST['id'])) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID is required']);
        }

        $id = (int)$_POST['id'];

        try {
            $stmt = $this->db->prepare("SELECT * FROM grade_level WHERE grade_level_id = ?");
            $stmt->execute([$id]);
            
            $gradeLevel = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($gradeLevel) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Grade level retrieved successfully',
                    'data' => $gradeLevel
                ]);
            } else {
                return json_encode(['status' => 0, 'message' => 'Grade level not found']);
            }
        } catch (Exception $e) {
            error_log("getGradeLevel Error: " . $e->getMessage());
            return json_encode(['status' => 0, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    public function updateGradeLevel()
    {
        if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        $grade_level_id = trim($_POST['grade_LevelID'] ?? '');
        $grade_level_name = trim($_POST['gradeLevel'] ?? '');

        if (empty($grade_level_id) || empty($grade_level_name)) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID and name are required.']);
        }

        if (!is_numeric($grade_level_id)) {
            return json_encode(['status' => 0, 'message' => 'Invalid grade level ID.']);
        }

        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM grade_level WHERE grade_level_name = ? AND grade_level_id != ?");
            $stmt->execute([$grade_level_name, $grade_level_id]);
            
            if ($stmt->fetchColumn() > 0) {
                return json_encode([
                    'status' => 0, 
                    'message' => 'Grade level name already exists.'
                ]);
            }

            $stmt = $this->db->prepare("UPDATE grade_level SET grade_level_name = ? WHERE grade_level_id = ?");
            $result = $stmt->execute([$grade_level_name, $grade_level_id]);

            if ($result) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Grade level updated successfully.',
                    'redirect_url' => 'index.php?page=contents/classroom'
                ]);
            } else {
                return json_encode([
                    'status' => 0,
                    'message' => 'Failed to update grade level. No changes made.'
                ]);
            }
        } catch (Exception $e) {
            error_log("updateGradeLevel Error: " . $e->getMessage());
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
    public function deleteGradeLevel()
    {
        if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        // FIX: Changed from 'gradeLevelID' to 'grade_LevelID' to match the form field name
        $grade_level_id = $_POST['gradeLevelID'] ?? '';

        if (empty($grade_level_id)) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID is required.']);
        }

        if (!is_numeric($grade_level_id)) {
            return json_encode(['status' => 0, 'message' => 'Invalid grade level ID.' . $grade_level_id]);
        }

        try {
            $checkStmt = $this->db->prepare("SELECT * FROM grade_level WHERE grade_level_id = ?");
            $checkStmt->execute([$grade_level_id]);
            
            if ($checkStmt->rowCount() === 0) {
                return json_encode([
                    'status' => 0, 
                    'message' => 'Grade level not found.'
                ]);
            }
            $stmt = $this->db->prepare("DELETE FROM grade_level WHERE grade_level_id = ?");
            $result = $stmt->execute([$grade_level_id]);

            if ($result) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Grade level deleted successfully.',
                    'redirect_url' => 'index.php?page=contents/classroom'
                ]);
            } else {
                return json_encode([
                    'status' => 0,
                    'message' => 'Failed to delete grade level.'
                ]);
            }
        } catch (Exception $e) {
            error_log("deleteGradeLevel Error: " . $e->getMessage());
            
            if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
                return json_encode([
                    'status' => 0,
                    'message' => 'Cannot delete grade level. It is being used by other records in the system.'
                ]);
            }
            
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    public function getSection()
    {
        if (empty($_POST['id'])) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID is required']);
        }

        $id = (int)$_POST['id'];

        try {
            $stmt = $this->db->prepare("SELECT * FROM sections WHERE section_id = ?");
            $stmt->execute([$id]);
            
            $sections = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($sections) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Sectiions retrieved successfully',
                    'data' => $sections
                ]);
            } else {
                return json_encode(['status' => 0, 'message' => 'Grade level not found']);
            }
        } catch (Exception $e) {
            error_log("getGradeLevel Error: " . $e->getMessage());
            return json_encode(['status' => 0, 'message' => 'Database error: ' . $e->getMessage()]);
        }
    }
    public function updateSection()
    {
        if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        $section_id = $_POST['sectionID'] ?? '';
        $sectionName = $_POST['sectionName'];
        $sectionDescription = $_POST['sectionDescription'];

        if (empty($section_id) || empty($sectionName)) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID and name are required.']);
        }

        if (!is_numeric($section_id)) {
            return json_encode(['status' => 0, 'message' => 'Invalid grade level ID.']);
        }

        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM sections WHERE section_name = ? AND section_description = ? AND section_id != ?");
            $stmt->execute([$sectionName, $sectionDescription, $section_id]);
            
            if ($stmt->fetchColumn() > 0) {
                return json_encode([
                    'status' => 0, 
                    'message' => 'Grade level name already exists.'
                ]);
            }

            $stmt = $this->db->prepare("UPDATE sections SET section_name = ?, section_description = ? WHERE section_id = ?");
            $result = $stmt->execute([$sectionName, $sectionDescription, $section_id]);

            if ($result) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Grade level updated successfully.',
                    'redirect_url' => 'index.php?page=contents/classroom'
                ]);
            } else {
                return json_encode([
                    'status' => 0,
                    'message' => 'Failed to update grade level. No changes made.'
                ]);
            }
        } catch (Exception $e) {
            error_log("updateGradeLevel Error: " . $e->getMessage());
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
    public function deleteSection()
    {
        if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        // FIX: Changed from 'gradeLevelID' to 'grade_LevelID' to match the form field name
        $section_id = $_POST['sectionID'] ?? '';

        if (empty($section_id)) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID is required.']);
        }

        if (!is_numeric($section_id)) {
            return json_encode(['status' => 0, 'message' => 'Invalid grade level ID.' . $section_id]);
        }

        try {
            $checkStmt = $this->db->prepare("SELECT * FROM sections WHERE section_id = ?");
            $checkStmt->execute([$section_id]);
            
            if ($checkStmt->rowCount() === 0) {
                return json_encode([
                    'status' => 0, 
                    'message' => 'Section not found.'
                ]);
            }
            $stmt = $this->db->prepare("DELETE FROM sections WHERE section_id = ?");
            $result = $stmt->execute([$section_id]);

            if ($result) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Section deleted successfully.',
                    'redirect_url' => 'index.php?page=contents/classroom'
                ]);
            } else {
                return json_encode([
                    'status' => 0,
                    'message' => 'Failed to delete Section.'
                ]);
            }
        } catch (Exception $e) {
            error_log("deleteSection Error: " . $e->getMessage());
            
            if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
                return json_encode([
                    'status' => 0,
                    'message' => 'Cannot delete Section. It is being used by other records in the system.'
                ]);
            }
            
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }

    function create_classroom() {
        
        try {
            $room_name = $_POST["room_number"];
            $room_type = $_POST["room_type"];
            
            $stmt = $this->db->prepare("SELECT room_name FROM classrooms WHERE room_name = :room_name");
            $stmt->bindParam(':room_name', $room_name);
            $stmt->execute();

            if (empty($room_name) || empty($room_type)) {
                return json_encode([
                    'status' => 2,
                    'message' => 'Room name and type are required'
                ]);
            }
            $stmt = $this->db->prepare("INSERT INTO classrooms (room_name, room_type) VALUES (:room_name, :room_type)");
            $stmt->bindParam(':room_name', $room_name);
            $stmt->bindParam(':room_type', $room_type);
            $stmt->execute();

            return json_encode([
                'status' => 1,
                'message' => 'Room created successfully',
                'redirect_url' => 'index.php?page=contents/classroom'
            ]);
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
    function fetch_classroom(){
        try {
            $room_id = $_POST["id"] ?? '';
            if($room_id == ''){
                return json_encode([
                    'status' => 0,
                    'message' => 'Room Id not found'
                ]);
            }
            $stmt = $this->db->prepare("SELECT * FROM classrooms WHERE room_id = ?");
            $stmt->execute([$room_id]);
            
            $classrooms = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($classrooms) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Grade level retrieved successfully',
                    'data' => $classrooms
                ]);
            } else {
                return json_encode(['status' => 0, 'message' => 'Grade level not found']);
            }
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
    function edit_classroom(){
        if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        $classroomsID = trim($_POST['classroomsID'] ?? '');
        $classroomName = trim($_POST['classroomName'] ?? '');
        $classroomType = trim($_POST['classroomType'] ?? '');

        if (empty($classroomName) || empty($classroomType)) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID and name are required.']);
        }

        if (!is_numeric($classroomsID)) {
            return json_encode(['status' => 0, 'message' => 'Invalid grade level ID.']);
        }

        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM classrooms WHERE room_name = ? AND room_type = ? AND room_id != ?");
            $stmt->execute([$classroomName, $classroomType, $classroomsID]);
            
            if ($stmt->fetchColumn() > 0) {
                return json_encode([
                    'status' => 0, 
                    'message' => 'Classrooms name already exists.'
                ]);
            }

            $stmt = $this->db->prepare("UPDATE classrooms SET room_name = ?, room_type = ?  WHERE room_id = ?");
            $result = $stmt->execute([$classroomName, $classroomType, $classroomsID]);

            if ($result) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Class rooms updated successfully.',
                    'redirect_url' => 'index.php?page=contents/classroom'
                ]);
            } else {
                return json_encode([
                    'status' => 0,
                    'message' => 'Failed to update grade level. No changes made.'
                ]);
            }
        } catch (Exception $e) {
            error_log("updateGradeLevel Error: " . $e->getMessage());
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
    function delete_classroom(){
          if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        // FIX: Changed from 'gradeLevelID' to 'grade_LevelID' to match the form field name
        $room_id = $_POST['classroomID'] ?? '';

        if (empty($room_id)) {
            return json_encode(['status' => 0, 'message' => 'Grade level ID is required.']);
        }

        if (!is_numeric($room_id)) {
            return json_encode(['status' => 0, 'message' => 'Invalid grade level ID.' . $room_id]);
        }

        try {
            $checkStmt = $this->db->prepare("SELECT * FROM classrooms WHERE room_id = ?");
            $checkStmt->execute([$room_id]);
            
            if ($checkStmt->rowCount() === 0) {
                return json_encode([
                    'status' => 0, 
                    'message' => 'Section not found.'
                ]);
            }
            $stmt = $this->db->prepare("DELETE FROM classrooms WHERE room_id = ?");
            $result = $stmt->execute([$room_id]);

            if ($result) {
                return json_encode([
                    'status' => 1,
                    'message' => 'Classroom deleted successfully.',
                    'redirect_url' => 'index.php?page=contents/classroom'
                ]);
            } else {
                return json_encode([
                    'status' => 0,
                    'message' => 'Failed to delete Section.'
                ]);
            }
        } catch (Exception $e) {
            error_log("deleteSection Error: " . $e->getMessage());
            
            if (strpos($e->getMessage(), 'foreign key constraint') !== false) {
                return json_encode([
                    'status' => 0,
                    'message' => 'Cannot delete Section. It is being used by other records in the system.'
                ]);
            }
            
            return json_encode([
                'status' => 0,
                'message' => 'An error occurred: ' . $e->getMessage()
            ]);
        }
    }
}
