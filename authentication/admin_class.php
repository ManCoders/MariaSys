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
            // Check admin table
            $stmt = $this->db->prepare("SELECT * FROM admin WHERE username = ?");
            $stmt->execute([$username]);
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
                    return json_encode(['status' => 2, 'message' => 'Invalid username or password.']);
                }
            }

            $stmt = $this->db->prepare("SELECT * FROM teacher WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && $user['user_role'] === 'teacher') {
                if (password_verify($password, $user['password'])) {
                $_SESSION['userData'] = [
                    'firstname' => $user['firstname'],
                    'middlename' => $user['middlename'],
                    'lastname' => $user['lastname'],
                    'suffix' => $user['suffix'],
                    'employeeid' => $user['employeeid'],
                    'email' => $user['email'],
                    'cpno' => $user['cpno'],
                    'position' => $user['position'],
                    'department' => $user['department'],
                    'rating' => $user['rating'],
                    'province' => $user['province'],
                    'city' => $user['city'],
                    'barangay' => $user['barangay'],
                    'birth' => $user['birth'],
                    'gender' => $user['gender'],
                    'status' => $user['status'],
                    'user_role' => $user['user_role'],
                    'username' => $user['username'],
                    'id' => $user['id'],
                    'created_date' => $user['created_date']
                ];
                return json_encode([
                    'status' => 1,
                    'message' => 'Login successful.',
                    'redirect_url' => 'src/UI-Teacher/index.php'
                ]);
                } else {
                    return json_encode(['status' => 2, 'message' => 'Invalid username or password.']);
                }
            }

            if ($user && $user['user_role'] === 'parent') {
                if (password_verify($password, $user['password'])) {
                $_SESSION['userData'] = [
                    'firstname' => $user['firstname'],
                    'middlename' => $user['middlename'],
                    'lastname' => $user['lastname'],
                    'suffix' => $user['suffix'],
                    'employeeid' => $user['employeeid'],
                    'email' => $user['email'],
                    'cpno' => $user['cpno'],
                    'position' => $user['position'],
                    'department' => $user['department'],
                    'rating' => $user['rating'],
                    'province' => $user['province'],
                    'city' => $user['city'],
                    'barangay' => $user['barangay'],
                    'birth' => $user['birth'],
                    'gender' => $user['gender'],
                    'status' => $user['status'],
                    'user_role' => $user['user_role'],
                    'username' => $user['username'],
                    'id' => $user['id'],
                    'created_date' => $user['created_date']
                ];
                return json_encode([
                    'status' => 1,
                    'message' => 'Login successful.',
                    'redirect_url' => 'src/UI-Parent/index.php'
                ]);
                } else {
                    return json_encode(['status' => 2, 'message' => 'Invalid username or password.']);
                }
            }
        } catch (Exception $e) {
            return json_encode([
                'status' => 2,
                'message' => 'An error occurred: ' . $e->getMessage()
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
        $user_role = strtoupper(htmlspecialchars($_POST['user_role'] ?? ''));
        $firstname = strtoupper(htmlspecialchars($_POST['FirstName'] ?? ''));
        $middlename = strtoupper(htmlspecialchars($_POST['MiddleName'] ?? ''));
        $lastname = strtoupper(htmlspecialchars($_POST['LastName'] ?? ''));
        $suffix = strtoupper(htmlspecialchars($_POST['Suffix'] ?? ''));

        $employeeId = strtoupper(htmlspecialchars($_POST['employeeid'] ?? ''));
        $email = strtoupper(htmlspecialchars($_POST['email'] ?? ''));
        $contacts = strtoupper(htmlspecialchars($_POST['cpnumber'] ?? ''));

        $username = strtoupper(htmlspecialchars($_POST['username'] ?? ''));
        $password = strtoupper(htmlspecialchars($_POST['password'] ?? ''));


        $hashPassword = password_hash($password, PASSWORD_DEFAULT);

        $position = strtoupper(htmlspecialchars($_POST['position'] ?? ''));
        $department = strtoupper(htmlspecialchars($_POST['department'] ?? ''));
        $rating = strtoupper(htmlspecialchars($_POST['rating'] ?? ''));

        $province = strtoupper(htmlspecialchars($_POST['province'] ?? ''));
        $city = strtoupper(htmlspecialchars($_POST['city'] ?? ''));
        $barangay = strtoupper(htmlspecialchars($_POST['barangay'] ?? ''));

        $birth = strtoupper(htmlspecialchars($_POST['dateofbirth'] ?? ''));
        $gender = strtoupper(htmlspecialchars($_POST['gender'] ?? ''));
        $status = strtoupper(htmlspecialchars($_POST['status'] ?? ''));

        try {
            $stmt1 = $this->db->prepare("INSERT INTO regular (firstname, middlename, lastname, email, suffix,  username, password, user_role, employeeid, cpno, position, department, rating, province, city, barangay, birth, gender, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $adminInsert = $stmt1->execute([$firstname, $middlename, $lastname, $email, $suffix, $username, $hashPassword, $user_role, $employeeId, $contacts, $position, $department, $rating, $province, $city, $barangay, $birth, $gender, $status]);

            if ($adminInsert) {
                return json_encode(['status' => 1, 'message' => 'Registration successfully.']);
            } else {
                return json_encode(['status' => 2, 'message' => 'Registration Failed.']);
            }
        } catch (Exception $e) {

            return json_encode(['status' => 2, 'message' => 'An error occurred: ' . $e->getMessage()]);
        }

    }

}
