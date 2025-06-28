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
        session_unset();
        session_destroy();
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            return json_encode(['status' => 2, 'message' => 'Username and password are required.']);
        }

        try {
            // ==== Admin Login ====
            $stmt = $this->db->prepare("SELECT * FROM admin WHERE username = ? OR email = ?");
            $stmt->execute([$username, $username]);
            $admin = $stmt->fetch();

            if ($admin && $admin['user_role'] === 'admin') {
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['adminData'] = [
                        'firstname' => $admin['firstname'],
                        'middlename' => $admin['middlename'],
                        'lastname' => $admin['lastname'],
                        'email' => $admin['email'],
                        'user_role' => $admin['user_role'],
                        'username' => $admin['username'],
                        'id' => $admin['id'],
                        'created_date' => $admin['created_date']
                    ];
                    return json_encode([
                        'status' => 1,
                        'message' => 'Login successful.',
                        'redirect_url' => 'src/UI-Admin/index.php'
                    ]);
                } else {
                    return json_encode(['status' => 2, 'message' => 'Incorrect password.']);
                }
            }

            // ==== Teacher Login ====
            $stmt = $this->db->prepare("SELECT * FROM teacher WHERE username = ? OR email = ?");
            $stmt->execute([$username, $username]);
            $teacher = $stmt->fetch();

            if ($teacher && $teacher['user_role'] === 'teacher') {
                if (password_verify($password, $teacher['password'])) {
                    $_SESSION['userData'] = [
                        'firstname' => $teacher['firstname'],
                        'middlename' => $teacher['middlename'],
                        'lastname' => $teacher['lastname'],
                        'suffix' => $teacher['suffix'],
                        'employeeid' => $teacher['employeeid'],
                        'email' => $teacher['email'],
                        'cpno' => $teacher['cpno'],
                        'position' => $teacher['position'],
                        'department' => $teacher['department'],
                        'rating' => $teacher['rating'],
                        'province' => $teacher['province'],
                        'city' => $teacher['city'],
                        'barangay' => $teacher['barangay'],
                        'birth' => $teacher['birth'],
                        'gender' => $teacher['gender'],
                        'status' => $teacher['status'],
                        'user_role' => $teacher['user_role'],
                        'username' => $teacher['username'],
                        'id' => $teacher['id'],
                        'created_date' => $teacher['created_date']
                    ];
                    return json_encode([
                        'status' => 1,
                        'message' => 'Login successful.',
                        'redirect_url' => 'src/UI-Teacher/index.php'
                    ]);
                } else {
                    return json_encode(['status' => 2, 'message' => 'Incorrect password.']);
                }
            }

            // ==== Parent Login ====
            $stmt = $this->db->prepare("SELECT * FROM parent WHERE username = ? OR email = ?");
            $stmt->execute([$username, $username]);
            $parent = $stmt->fetch();

            if ($parent && $parent['user_role'] === 'parent') {
                if (password_verify($password, $parent['password'])) {
                    $_SESSION['userData'] = [
                        'firstname' => $parent['firstname'],
                        'middlename' => $parent['middlename'],
                        'lastname' => $parent['lastname'],
                        'suffix' => $parent['suffix'],
                        'email' => $parent['email'],
                        'cpno' => $parent['cpno'],
                        'reference_id' => $parent['reference_id'],
                        'position' => $parent['position'],
                        'department' => $parent['department'],
                        'rating' => $parent['rating'],
                        'province' => $parent['province'],
                        'city' => $parent['city'],
                        'barangay' => $parent['barangay'],
                        'birth' => $parent['birth'],
                        'gender' => $parent['gender'],
                        'status' => $parent['status'],
                        'user_role' => $parent['user_role'],
                        'username' => $parent['username'],
                        'profile_picture' => $parent['profile_picture'],
                        'id' => $parent['id'],
                        'created_date' => $parent['created_date']
                    ];
                    return json_encode([
                        'status' => 1,
                        'message' => 'Login successful.',
                        'redirect_url' => 'src/UI-Parent/index.php'
                    ]);
                } else {
                    return json_encode(['status' => 2, 'message' => 'Incorrect password.']);
                }
            }

            // ==== Not Found ====
            return json_encode([
                'status' => 3,
                'message' => 'User not found. Please check your username/email.'
            ]);

        } catch (Exception $e) {
            return json_encode([
                'status' => 2,
                'message' => 'System error occurred. Contact the administrator.'
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


    //ERROR PA //fix na
    function registration_form()
    {
        $user_role = htmlspecialchars($_POST['user_role'] ?? '');
        $firstname = strtoupper(htmlspecialchars($_POST['FirstName'] ?? ''));
        $middlename = strtoupper(htmlspecialchars($_POST['MiddleName'] ?? ''));
        $lastname = strtoupper(htmlspecialchars($_POST['LastName'] ?? ''));
        $suffix = strtoupper(htmlspecialchars($_POST['Suffix'] ?? ''));

        $email = htmlspecialchars($_POST['email'] ?? ''); // Email is usually lowercase
        $cpno = htmlspecialchars($_POST['cpnumber'] ?? ''); // cellphone number (contact number)

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        // These fields must exist in the HTML form

        $province = strtoupper(htmlspecialchars($_POST['province'] ?? ''));
        $city = strtoupper(htmlspecialchars($_POST['city'] ?? ''));
        $barangay = strtoupper(htmlspecialchars($_POST['barangay'] ?? ''));

        $birth = htmlspecialchars($_POST['dateofbirth'] ?? '');
        $gender = strtoupper(htmlspecialchars($_POST['gender'] ?? ''));
        $status = strtoupper(htmlspecialchars($_POST['status'] ?? ''));

        try {
            $stmt1 = $this->db->prepare("
            INSERT INTO parent 
            (firstname, middlename, lastname, email, suffix, username, password, user_role, cpno, province, city, barangay, birth, gender, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?)
        ");

            $adminInsert = $stmt1->execute([
                $firstname,     // 1
                $middlename,    // 2
                $lastname,      // 3
                $email,         // 4
                $suffix,        // 5
                $username,      // 6
                $hashPassword,  // 7
                $user_role,     // 8
                $cpno,          // 9
                $province,      // 13
                $city,          // 14
                $barangay,      // 15
                $birth,         // 16
                $gender,        // 17
                $status         // 18
            ]);

            if ($adminInsert) {
                return json_encode(['status' => 1, 'message' => 'Registration successfully.', 'redirect_url' => 'src/index.php']);
            } else {
                return json_encode(['status' => 2, 'message' => 'Registration Failed.']);
            }
        } catch (Exception $e) {

            return json_encode(['status' => 2, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }

    }

    function Enrollment()
    {
        extract($_POST); // ⚠️ Still recommended to use $_POST['key'] individually for clarity & safety

        try {
            if (
                empty($lrn) || empty($family_name) || empty($given_name) ||
                empty($middle_name) || empty($birthdate) ||
                empty($relationship) || empty($emergency_contact)
            ) {
                return json_encode(['status' => 2, 'message' => 'Please fill in all required fields.']);
            }

            if (!preg_match('/^\d{12}$/', $lrn)) {
                return json_encode(['status' => 2, 'message' => 'Invalid LRN format. It should be 12 digits.']);
            }

            if (!preg_match('/^09\d{9}$/', $emergency_contact)) {
                return json_encode(['status' => 2, 'message' => 'Invalid emergency contact number.']);
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

            $stmt = $this->db->prepare("
            INSERT INTO learners (
                lrn, nickname, family_name, given_name, middle_name, suffix,
                birthdate, relationship, verification_code, emergency_contact, 
                notes, gender, profile_picture, status
            ) VALUES (
                :lrn, :nickname, :family_name, :given_name, :middle_name, :suffix,
                :birthdate, :relationship, :verification_code, :emergency_contact, 
                :notes, :gender, :profile_picture, :status
            )
        ");

            $stmt->execute([
                ':lrn' => $lrn,
                ':nickname' => $nickname ?? null,
                ':family_name' => $family_name,
                ':given_name' => $given_name,
                ':middle_name' => $middle_name,
                ':suffix' => $suffix ?? null,
                ':birthdate' => $birthdate,
                ':relationship' => $relationship,
                ':verification_code' => $verification_code ?? null,
                ':emergency_contact' => $emergency_contact,
                ':notes' => $notes ?? null,
                ':gender' => $gender ?? null,
                ':profile_picture' => $profilePicPath,
                ':status' => $status
            ]);

            return json_encode(['status' => 1, 'message' => 'Successfully registered. Please wait for approval!']);
        } catch (PDOException $e) {
            return json_encode(['status' => 0, 'message' => 'Database Error: ' . $e->getMessage()]);
        }
    }


    public function getLearner()
{
    try {
        $stmt = $this->db->prepare("
            SELECT *,
                id, 
                CONCAT(family_name, ', ', given_name, ' ', LEFT(middle_name, 1), '.') AS name, 
                lrn, 
                created_date AS date, 
                emergency_contact AS contact, 
                relationship, 
                status 
            FROM learners 
            ORDER BY created_date DESC
        ");

        $stmt->execute();
        $learners = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return json_encode([
            'status' => 1,
            'data' => $learners
        ]);
    } catch (PDOException $e) {
        http_response_code(500); // optional for error tracking
        return json_encode([
            'status' => 0,
            'message' => 'Database error: ' . $e->getMessage()
        ]);
    }
}





}
