<?php
require_once 'config.php';

if($_SERVER["REQUEST_METHOD"] === "POST"){

    if(isset($_POST["settings"]) && $_POST["settings"] == "true"){
        $userType = $_POST["user_type"] ?? '';
        $user_id = $_POST["user_id"] ?? '';
        $firstname = $_POST["firstname"] ?? '';
        $middlename = $_POST["middlename"] ?? '';
        $lastname = $_POST["lastname"] ?? '';
        $department = $_POST["department"] ?? null;
        $position = $_POST["position"] ?? null;
        $email = $_POST["email"] ?? '';
        $cpno = $_POST["cpno"] ?? '';
        $province = $_POST["province"] ?? '';
        $city = $_POST["city"] ?? '';
        $barangay = $_POST["barangay"] ?? '';
        $birthDay = $_POST["birthDay"] ?? '';
        $occupation = $_POST["occupation"] ?? '';

        try {
            if($userType == "PARENT"){
                if (isset($_FILES["parent_picture"]) && $_FILES["parent_picture"]["error"] === 0) {
                    $upload = $_FILES["parent_picture"];
                    $target_dir = "uploads/";
                    $image_file_name = uniqid() . "-" . basename($upload["name"]);
                    $target_file = $target_dir . $image_file_name;

                    if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                        $profile = $image_file_name;
                    } else {
                        $errors["upload_error"] = "Failed to upload profile image.";
                    }
                } else {
                    $profile = $_POST["current_profile_image"] ?? '';
                }

                $query = "UPDATE parent SET firstname = :firstname, middlename = :middlename, lastname = :lastname, email = :email, cpno=:cpno, 
                province = :province, city = :city, barangay = :barangay, dateofbirth = :dateofbirth, occupation = :occupation,
                parent_picture = :parent_picture WHERE parent_id = :parent_id";
                $stmt = $pdo->prepare($query);
                $stmt->execute(['firstname'=>$firstname, 'middlename'=>$middlename, 'lastname'=>$lastname,
                'email'=>$email, 'cpno'=>$cpno, 'province'=>$province, 'city'=>$city, 'barangay'=>$barangay,
                'dateofbirth'=>$birthDay, 'occupation'=>$occupation, 'parent_picture'=>$profile, 'parent_id' => $user_id]);
                $stmt = null;
                $pdo = null;
                header("Location: ../src/UI-Parent/index.php?page=contents/setting&update=success");
                die();
            }else if($userType == "TEACHER"){
                if (isset($_FILES["teacher_picture"]) && $_FILES["teacher_picture"]["error"] === 0) {
                    $upload = $_FILES["teacher_picture"];
                    $target_dir = "uploads/";
                    $image_file_name = uniqid() . "-" . basename($upload["name"]);
                    $target_file = $target_dir . $image_file_name;

                    if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                        $profile = $image_file_name;
                    } else {
                        $errors["upload_error"] = "Failed to upload profile image.";
                    }
                } else {
                    $profile = $_POST["current_profile_image"] ?? '';
                }

                $query = "UPDATE teacher SET firstname = :firstname, middlename = :middlename, lastname = :lastname,
                department = :department, position = :position, email = :email, cpno=:cpno, 
                province = :province, city = :city, barangay = :barangay, birth = :birth,
                teacher_picture = :teacher_picture WHERE teacher_id = :teacher_id";
                $stmt = $pdo->prepare($query);
                $stmt->execute(['firstname'=>$firstname, 'middlename'=>$middlename, 'lastname'=>$lastname,
                'department'=>$department, 'position'=>$position, 'email'=>$email, 'cpno'=>$cpno, 'province'=>$province, 'city'=>$city, 'barangay'=>$barangay,
                'birth'=>$birthDay, 'teacher_picture'=>$profile, 'teacher_id' => $user_id]);
                $stmt = null;
                $pdo = null;
                header("Location: ../src/UI-teacher/index.php?page=contents/setting&update=success");
                die();
            }else if($userType == "ADMIN"){
                if (isset($_FILES["admin_picture"]) && $_FILES["admin_picture"]["error"] === 0) {
                    $upload = $_FILES["admin_picture"];
                    $target_dir = "uploads/";
                    $image_file_name = uniqid() . "-" . basename($upload["name"]);
                    $target_file = $target_dir . $image_file_name;

                    if (move_uploaded_file($upload["tmp_name"], $target_file)) {
                        $profile = $image_file_name;
                    } else {
                        $errors["upload_error"] = "Failed to upload profile image.";
                    }
                } else {
                    $profile = $_POST["current_profile_image"] ?? '';
                }

                $query = "UPDATE admin SET firstname = :firstname, middlename = :middlename, lastname = :lastname, email = :email, cpno=:cpno,
                admin_picture = :admin_picture WHERE admin_id = :admin_id";
                $stmt = $pdo->prepare($query);
                $stmt->execute(['firstname'=>$firstname, 'middlename'=>$middlename, 'lastname'=>$lastname,
                'email'=>$email, 'cpno'=>$cpno, 'admin_picture'=>$profile, 'admin_id' => $user_id]);
                $stmt = null;
                $pdo = null;
                header("Location: ../src/UI-Admin/index.php?page=contents/setting&update=success");
                die();
            }
           
        } catch (PDOException $e) {
            die("Query Failed: " . $e->getMessage());
        }
    }

    if (isset($_POST["passsword"]) && $_POST["passsword"] === "true") {
        $user_id = $_POST["user_id"] ?? '';
        $user_type = $_POST["user_type"] ?? '';
        $Current_password = $_POST["Current_password"] ?? '';
        $New_password = $_POST["New_password"] ?? '';
        $Confirm_password = $_POST["Confirm_password"] ?? '';

        try {
            if (empty($Current_password) || empty($New_password) || empty($Confirm_password)) {
                echo json_encode(["status" => "error", "message" => "All fields are required."]);
                exit;
            }

            if ($New_password !== $Confirm_password) {
                switch ($user_type) {
                    case "PARENT":
                        header("Location: ../src/UI-Parent/index.php?page=contents/setting&NewPassword=failed");
                        exit;
                        break;
                    case "TEACHER":
                        header("Location: ../src/UI-teacher/index.php?page=contents/setting&NewPassword=failed");
                        exit;
                        break;
                    case "ADMIN":
                        header("Location: ../src/UI-Admin/index.php?page=contents/setting&NewPassword=failed");
                        exit;
                        break;
                    default:
                        echo json_encode(["status" => "error", "message" => "Invalid user type."]);
                        exit;
                }
                
            }

            $table = '';
            $id_column = '';
            $redirect = '';

            switch ($user_type) {
                case "PARENT":
                    $table = "parent";
                    $id_column = "parent_id";
                    $redirect = "../src/UI-Parent/index.php?page=contents/setting";
                    break;
                case "TEACHER":
                    $table = "teacher";
                    $id_column = "teacher_id";
                    $redirect = "../src/UI-teacher/index.php?page=contents/setting";
                    break;
                case "ADMIN":
                    $table = "admin";
                    $id_column = "admin_id";
                    $redirect = "../src/UI-Admin/index.php?page=contents/setting";
                    break;
                default:
                    echo json_encode(["status" => "error", "message" => "Invalid user type."]);
                    exit;
            }

            $stmt = $pdo->prepare("SELECT password FROM $table WHERE $id_column = :user_id");
            $stmt->execute(['user_id' => $user_id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo json_encode(["status" => "error", "message" => "User not found."]);
                exit;
            }

            if (!password_verify($Current_password, $user['password'])) {
                switch ($user_type) {
                    case "PARENT":
                        header("Location: ../src/UI-Parent/index.php?page=contents/setting&incorrectPass=failed");
                        exit;
                        break;
                    case "TEACHER":
                        header("Location: ../src/UI-teacher/index.php?page=contents/setting&incorrectPass=failed");
                        exit;
                        break;
                    case "ADMIN":
                        header("Location: ../src/UI-Admin/index.php?page=contents/setting&incorrectPass=failed");
                        exit;
                        break;
                    default:
                        echo json_encode(["status" => "error", "message" => "Invalid user type."]);
                        exit;
                }
            }

            $newHashed = password_hash($New_password, PASSWORD_DEFAULT);
            $updateStmt = $pdo->prepare("UPDATE $table SET password = :password WHERE $id_column = :user_id");
            $update = $updateStmt->execute([
                'password' => $newHashed,
                'user_id' => $user_id
            ]);

            if ($update) {
                header("Location: $redirect&changePass=success");
                exit;
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to update password."]);
                exit;
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
            exit;
        }
    }


}else{

    function get_user_info(){
        $pdo = db_connect();
        $parentID = $_SESSION["parentData"]["parent_id"] ?? '';
        $TeacherID = $_SESSION["teacherData"]["teacher_id"] ?? '';
        $adminID = $_SESSION['adminData']['admin_id'] ?? '';
        if($parentID){
            $query = "SELECT * FROM parent WHERE parent_id = :parent_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':parent_id' => $parentID]);
            $parentInfo = $stmt->fetch();
            return ['parentInfo' => $parentInfo];
        }else if($TeacherID){
            $query = "SELECT * FROM teacher WHERE teacher_id = :teacher_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':teacher_id' => $TeacherID]);
            $teacherInfo = $stmt->fetch();
            return ['teacherInfo' => $teacherInfo];
        }else if($adminID){
            $query = "SELECT * FROM admin WHERE admin_id = :admin_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute([':admin_id' => $adminID]);
            $adminInfo = $stmt->fetch();
            return ['adminInfo' => $adminInfo];
        }
    }
    
}