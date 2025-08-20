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
    /* function login()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $username = strtolower(trim($_POST['username'] ?? ''));
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            return json_encode(['status' => 2, 'message' => 'Username and password are required.', 'redirect_url' => 'src/index.php']);
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
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'employeeid', 'email', 'cpno', 'position', 'department', 'rating', 'province', 'city', 'barangay', 'birth', 'gender',  reg_status as status', 'user_role', 'username', 'teacher_id', 'profile_picture', 'created_date']
                ],
                'parent' => [
                    'table' => 'parent',
                    'redirect' => 'src/UI-Parent/index.php',
                    'session_key' => 'parentData',
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'email', 'cpno', 'reference_id', 'position', 'department', 'rating', 'province', 'city', 'barangay', 'dateofbirth', 'gender', 'parent_status as status', 'user_role', 'username', 'parent_id', 'profile_picture as profile_picture', 'created_date']
                ]
            ];

            foreach ($roles as $role => $info) {
                $stmt = $this->db->prepare("SELECT * FROM {$info['table']} WHERE username = ? OR email = ?");
                $stmt->execute([$username, $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    $sessionData = [];
                    foreach ($info['fields'] as $field) {
                        // Handle aliasing (e.g. "as status")
                        if (strpos($field, ' as ') !== false) {
                            [$source, $alias] = explode(' as ', $field);
                            $sessionData[$alias] = $user[trim($source)];
                        } else {
                            $sessionData[$field] = $user[$field];
                        }
                    }

                    $_SESSION[$info['session_key']] = $sessionData;

                    return json_encode([
                        'status' => 1,
                        'message' => 'Login successful.',
                        'redirect_url' => $info['redirect']
                    ]);
                }
            }

            // If no user found
            return json_encode([
                'status' => 3,
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
    } */
    /* function login()
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
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'email', 'parent_id ', 'profile_picture', 'created_date']
                ],
                'parent' => [
                    'table' => 'parent',
                    'redirect' => 'src/UI-Parent/index.php',
                    'session_key' => 'parentData',
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'email', 'teacher_id', 'profile_picture', 'created_date']
                ]
            ];

            foreach ($roles as $role => $info) {
                $stmt = $this->db->prepare("SELECT * FROM {$info['table']} WHERE username = ? OR email = ?");
                $stmt->execute([$username, $username]);
                $user = $stmt->fetch();

                if ($user && password_verify($password, $user['password'])) {
                    if (strtolower($user['user_role']) !== $role) {
                        session_destroy(); 
                        return json_encode([
                            'status' => 2,
                            'message' => 'Unauthorized access. User role mismatch.',
                            'redirect_url' => 'src/index.php'
                        ]);
                    }

                    $sessionData = [];
                    foreach ($info['fields'] as $field) {
                        if (strpos($field, ' as ') !== false) {
                            [$source, $alias] = explode(' as ', $field);
                            $sessionData[$alias] = $user[trim($source)];
                        } else {
                            $sessionData[$field] = $user[$field];
                        }
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
    } */
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
        $user_role = strtolower(trim($_POST['user_role'] ?? ''));
        $firstname = trim($_POST['firstName'] ?? '');
        $middlename = trim($_POST['middleName'] ?? '');
        $lastname = trim($_POST['lastName'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $cpno = trim($_POST['cpnumber'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $dateofbirth = $_POST['dateofbirth'] ?? '';
        

        // Handle profile photo upload
        if (isset($_FILES['register_photo']) && $_FILES['register_photo']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['register_photo'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            $allowed = ['jpg', 'jpeg', 'png'];

            if (!in_array($ext, $allowed)) {
                return json_encode(['status' => 2, 'message' => 'Only JPG and PNG files are allowed.']);
            }

            $uploadDir = '/uploads/';
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

        try {
            // Define user role mappings
            $roleMap = [
                'parent' => [
                    'table' => 'parent',
                    'fields' => '(user_role, firstname, middlename, lastname, email, username, password, cpno, gender, reg_status, dateofbirth, profile_picture)',
                    'placeholders' => 12,
                    'values' => [$user_role, $firstname, $middlename, $lastname, $email, $username, '', $cpno, $gender, 'Pending', $dateofbirth, $profilePicPath]
                ],
                'teacher' => [
                    'table' => 'teacher',
                    'fields' => '(user_role, firstname, middlename, lastname, email, username, password, cpno, gender, reg_status, dateofbirth, profile_picture)',
                    'placeholders' => 12,
                    'values' => [$user_role, $firstname, $middlename, $lastname, $email, $username, '', $cpno, $gender, 'Pending', $dateofbirth, $profilePicPath]
                ],
                'admin' => [
                    'table' => 'admin',
                    'fields' => '(user_role, firstname, middlename, lastname, email, username, password, created_date)',
                    'placeholders' => 8,
                    'values' => [$user_role, $firstname, $middlename, $lastname, $email, $username, '', date('Y-m-d H:i:s')]
                ]
            ];

            if (!array_key_exists($user_role, $roleMap)) {
                return json_encode(['status' => 2, 'message' => 'Invalid user role.']);
            }

            $table = $roleMap[$user_role]['table'];
            $fields = $roleMap[$user_role]['fields'];
            $values = $roleMap[$user_role]['values'];

            // Check duplicates
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

            // Insert hashed password in the correct index
            foreach ($values as $i => $v) {
                if ($v === '') {
                    $values[$i] = password_hash($password, PASSWORD_DEFAULT);
                    break;
                }
            }

            $placeholders = rtrim(str_repeat('?, ', $roleMap[$user_role]['placeholders']), ', ');
            $stmt = $this->db->prepare("INSERT INTO {$table} {$fields} VALUES ({$placeholders})");
            $stmt->execute($values);

            return json_encode([
                'status' => 1,
                'message' => ucfirst($user_role) . ' registration successful.',
                'redirect_url' => 'src/index.php'
            ]);
        } catch (Exception $e) {
            return json_encode([
                'status' => 2,
                'message' => 'An error occurred: ' . $e->getMessage(),
                'redirect_url' => 'src/register.php'
            ]);
        }
    }



    //WORKING
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

    // Parent Link account for learner
    function LinkNewChild()
    {
        try {
            $lrn        = $_POST['lrn'] ?? '';
            $status     = $_POST['status'] ?? '';
            $nickname   = htmlspecialchars(trim($_POST['nickname'] ?? ''));
            $gender     = $_POST['gender'] ?? '';
            $last_name  = htmlspecialchars(trim($_POST['family_name'] ?? ''));
            $middle_name = htmlspecialchars(trim($_POST['middle_name'] ?? ''));
            $given_name = htmlspecialchars(trim($_POST['given_name'] ?? ''));
            $suffix     = $_POST['suffix'] ?? null;
            $religious  = htmlspecialchars(trim($_POST['religious'] ?? ''));
            $birthdate  = $_POST['birthdate'] ?? '';
            $birth_place = htmlspecialchars(trim($_POST['birth_place'] ?? ''));
            $notes      = htmlspecialchars(trim($_POST['notes'] ?? ''));
            $parent_id  = $_POST['parent_id'] ?? '';

            // Validate LRN
            if (!preg_match('/^\d{12}$/', $lrn)) {
                return json_encode(['status' => 2, 'message' => 'Invalid LRN format. It should be 12 digits.']);
            }

            // Check for existing LRN
            $check = $this->db->prepare("SELECT COUNT(*) FROM learners WHERE lrn = ?");
            $check->execute([$lrn]);
            if ($check->fetchColumn() > 0) {
                return json_encode(['status' => 2, 'message' => 'This LRN is already registered.']);
            }

            // Handle profile picture upload
            $profilePicPath = null;
            if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['profile_picture'];
                $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
                $allowed = ['jpg', 'jpeg', 'png'];

                if (!in_array($ext, $allowed)) {
                    return json_encode(['status' => 2, 'message' => 'Only JPG and PNG files are allowed.']);
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

            // Insert new learner
            $stmt1 = $this->db->prepare("
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

            $stmt1->execute([
                $parent_id,
                $lrn,
                $status,
                $nickname,
                $gender,
                $last_name,
                $middle_name,
                $given_name,
                $suffix,
                $religious,
                $birthdate,
                $birth_place,
                $notes,
                $profilePicPath,
                $middle_name,
                $last_name
            ]);

            return json_encode(['status' => 1, 'message' => 'Successfully registered. Please wait for approval!']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database Error: ' . $e->getMessage()]);
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
    //WORKING DONT TOUCH IT DISPLAY TO TABLE THIS
    /* function getTeacher()
    {
        try {
            $stmt = $this->db->prepare("
            SELECT * FROM parent ORDER BY created_date ASC
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
    } */
    function getTeacher()
    {
        try {
            $role = strtolower($_GET['role'] ?? 'all');
            $table = $role === 'teacher' ? 'teacher' : 'parent';

            $stmt = $this->db->prepare("SELECT * FROM {$table} WHERE user_role = ?");
            $stmt->execute([$role]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            echo json_encode([
                'status' => 1,
                'data' => $data
            ]);
        } catch (PDOException $e) {
            echo json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }



    function updateLearnerReg()
    {
        // return json_encode(['status' => 1, 'message' => 'Learner registration updated successfully.']);
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


    /* function get_student_by_section(){
        try {
            $stmt = $this->db->prepare("
            SELECT 
                *,
                CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, 1), '.') AS learner_name
            FROM leaners
            ORDER BY learner.created_date ASC
        ");

            $stmt->execute();
            $teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode([
                'status' => 1,
                'data' => $teacher
            ]);
        } catch (PDOException $e) {
            http_response_code(500);
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    } */
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

    /* function other_info()
    {
        try {
            $learner_id = $_POST['learner_id'];
            $diagnosis = isset($_POST['diagnosis']) ? implode(', ', $_POST['diagnosis']) : 'NA';
            $manifestations = isset($_POST['manifestations']) ? implode(', ', $_POST['manifestations']) : 'NA';
            $has_pwd_id = $_POST['pwd_id'] ?? 'no';
            $last_grade_level = $_POST['last_grade_level'] ?? null;
            $last_sy = $_POST['last_sy'] ?? null;
            $last_school = $_POST['last_school'] ?? null;
            $learning_mode = isset($_POST['learning_mode']) ? implode(', ', $_POST['learning_mode']) : null;
            $is_ip = $_POST['is_ip'] ?? 'No';
            $ip_specify = $_POST['ip_specify'] ?? null;
            $is_4ps = $_POST['is_4ps'] ?? 'No';
            $household_id = $_POST['household_id'] ?? null;

            // Check if data already exists for this learner
            $check = $this->db->prepare("SELECT COUNT(*) FROM enrollment_additional_info WHERE learner_id = ?");
            $check->execute([$learner_id]);

            if ($check->fetchColumn() > 0) {
                $stmt = $this->db->prepare("UPDATE enrollment_additional_info SET 
                diagnosis = ?, manifestations = ?, has_pwd_id = ?, 
                last_grade_level = ?, last_sy = ?, last_school = ?, 
                learning_mode = ?, is_ip = ?, ip_specify = ?, 
                is_4ps = ?, household_id = ?
                WHERE learner_id = ?");
                $stmt->execute([
                    $diagnosis,
                    $manifestations,
                    $has_pwd_id,
                    $last_grade_level,
                    $last_sy,
                    $last_school,
                    $learning_mode,
                    $is_ip,
                    $ip_specify,
                    $is_4ps,
                    $household_id,
                    $learner_id
                ]);
            } else {
                // Insert if new
                $stmt = $this->db->prepare("INSERT INTO enrollment_additional_info (
                learner_id, diagnosis, manifestations, has_pwd_id,
                last_grade_level, last_sy, last_school,
                learning_mode, is_ip, ip_specify, is_4ps, household_id
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([
                    $learner_id,
                    $diagnosis,
                    $manifestations,
                    $has_pwd_id,
                    $last_grade_level,
                    $last_sy,
                    $last_school,
                    $learning_mode,
                    $is_ip,
                    $ip_specify,
                    $is_4ps,
                    $household_id
                ]);
            }

            return json_encode([
                'status' => 1,
                'message' => 'Saved'
            ]); 
        } catch (PDOException $e) {
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    } */
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
                echo json_encode([
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

            echo json_encode([
                'status' => 1,
                'message' => 'Saved successfully.'
            ]);
        } catch (PDOException $e) {
            echo json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }
}
