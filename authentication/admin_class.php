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
            'redirect_url' => './src/index.php'
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
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'employeeid', 'email', 'cpno', 'position', 'department', 'rating', 'province', 'city', 'barangay', 'birth', 'gender', 'teacher_status as status', 'user_role', 'username', 'teacher_id', 'teacher_picture', 'created_date']
                ],
                'parent' => [
                    'table' => 'parent',
                    'redirect' => 'src/UI-Parent/index.php',
                    'session_key' => 'parentData',
                    'fields' => ['firstname', 'middlename', 'lastname', 'suffix', 'email', 'cpno', 'reference_id', 'position', 'department', 'rating', 'province', 'city', 'barangay', 'dateofbirth', 'gender', 'parent_status as status', 'user_role', 'username', 'parent_id', 'parent_picture as profile_picture', 'created_date']
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

    //WORKING
    function registration_form()
    {
        // Validate if $_POST is set
        if (empty($_POST)) {
            return json_encode(['status' => 0, 'message' => 'No form data submitted.']);
        }

        // Extract variables safely
        $user_role = $_POST['user_role'] ?? '';
        $firstname = trim($_POST['firstName'] ?? '');
        $middlename = trim($_POST['middleName'] ?? '');
        $lastname = trim($_POST['lastName'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $cpno = trim($_POST['cpnumber'] ?? '');
        $gender = $_POST['gender'] ?? '';
        $dateofbirth = $_POST['dateofbirth'] ?? '';



        try {
            // Check if email or username already exists
            $checkStmt = $this->db->prepare("SELECT COUNT(*) FROM parent WHERE email = ? OR username = ? OR cpno = ?");
            $checkStmt->execute([$email, $username, $cpno]);
            if ($checkStmt->fetchColumn() > 0) {
                return json_encode(['status' => 0, 'message' => 'Email or username already exists.', 'redirect_url' => 'src/register.php']);
            }

            // Hash password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $reg_status = 'Pending';

            // Insert into database
            $stmt = $this->db->prepare("
            INSERT INTO parent 
            (user_role, firstname, middlename, lastname, email, username, password, cpno, gender, reg_status, dateofbirth)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
            $stmt->execute([
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
                $dateofbirth
            ]);

            return json_encode([
                'status' => 1,
                'message' => 'Registration successful.',
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
                    birth, notes, gender, teacher_picture, teacher_status, tongue, grade_level_id, birth_place, school_year_id, religious, cpno
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
    function getTeacher()
    {
        try {
            $stmt = $this->db->prepare("
            SELECT 
                *,
                CONCAT(lastname, ', ', firstname, ' ', LEFT(middlename, 1), '.') AS teacher_name
            FROM teacher
            ORDER BY teacher.created_date ASC
        ");

            $stmt->execute();
            $teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode([
                'status' => 1,
                'data' => $teacher
            ]);
        } catch (PDOException $e) {
            /* http_response_code(500); */
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
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
            SELECT * FROM learner
        ");

            $stmt->execute();
            $teacher = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return json_encode([
                'status' => 1,
                'data' => $teacher
            ]);
        } catch (PDOException $e) {
            /* http_response_code(500); */
            return json_encode([
                'status' => 0,
                'message' => 'Database error: ' . $e->getMessage()
            ]);
        }
    }
}
