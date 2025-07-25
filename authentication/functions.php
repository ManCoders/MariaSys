<?php
include "config.php";

$pdo = db_connect();

/* function initInstaller()
{
    $pdo = db_connect();

    try {
        $stmt = $pdo->prepare("SELECT * FROM admin WHERE user_role = :user_role");
        $stmt->execute(['user_role' => 'admin']);
        $admins = $stmt->fetch();

        $currentUrl = $_SERVER['REQUEST_URI'];
        $installerPath = "installation";

        if (empty($admins)) {
            if ($currentUrl !== $installerPath) {
                header("Location: " . base_url() . "installation/");
                exit;
            }
        } else {
            if ($currentUrl === $installerPath) {
                header("Location: " . base_url() . "src/");
                exit;
            }
        }

    } catch (PDOException $e) {
        die("Installer check failed: " . $e->getMessage());
    }

    $pdo = null;
} */

function initInstaller()
{
    $pdo = db_connect();

    try {
        // Check if admin exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM admin WHERE user_role = :user_role");
        $stmt->execute(['user_role' => 'admin']);
        $adminCount = $stmt->fetchColumn();

        // Get clean current path
        $currentPath = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $installerPath = '/installation';

        if ($adminCount > 0) {
            if (strpos($currentPath, $installerPath) === 0) {
                header("Location: " . base_url() . "src/");
                exit;
            }
        } else {
            if (strpos($currentPath, $installerPath) !== 0) {
                header("Location: " . base_url() . "installation/");
                exit;
            }
        }

    } catch (PDOException $e) {
        die("Installer check failed: " . $e->getMessage());
    }
    $pdo = null;
}



function base_url()
{
    $pdo = db_connect();


    if (isset($_SERVER['HTTPS'])) {
        $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    } else {
        $protocol = 'http';
    }

    $whitelist = array(
        '127.0.0.1',
        '::1'
    );

    if (in_array($_SERVER['REMOTE_ADDR'], $whitelist)) {
        return $base_url = $protocol . "://" . $_SERVER['SERVER_NAME'] . '/mariasys/';
    }
    return $base_url = $protocol . "://" . $_SERVER['SERVER_NAME'] . '/';

}


function get_current_page()
{
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];

    return $protocol . '://' . $host . $uri;
}

function render_styles()
{

    $styles = [
        base_url() . 'assets/css/all.min.css',
        base_url() . 'assets/css/custom-bs.min.css',
        base_url() . 'assets/css/icons.min.css',
        base_url() . 'assets/css/morris.css',
        base_url() . 'assets/css/dataTables.dataTables.min.css'
    ];

    foreach ($styles as $style) {
        echo '<link rel="stylesheet" href="' . $style . '">';
    }

}

function render_json()
{

    $json = [base_url() . '../templates/manifest.json'];

    foreach ($json as $jsons) {
        echo '<link rel="manifest" href="' . $jsons . '">';
    }

}

function render_scripts()
{

    $scripts = [
        base_url() . 'assets/js/jquery.min.js',
        base_url() . 'assets/js/perfect-scrollbar.min.js',
        base_url() . 'assets/js/smooth-scrollbar.min.js',
        base_url() . 'assets/js/sweetalert.min.js',
        base_url() . 'assets/js/all.min.js',
        base_url() . 'assets/js/bootstrap.min.js',
        base_url() . 'assets/js/custom-bs.js',
        base_url() . 'assets/js/main.js',
        base_url() . 'assets/js/nav.js',
        base_url() . 'assets/js/raphael.min.js',
        base_url() . 'assets/js/morris.min.js',
        base_url() . 'assets/js/jquery-3.7.1.min.js',
        base_url() . 'assets/js/dataTables.min.js',
        base_url() . 'assets/js/teacher_doc.js',
        base_url() . 'assets/js/student_doc.js'
    ];

    foreach ($scripts as $script) {
        echo '<script type="text/javascript" src="' . $script . '"></script>';
    }

}

function get_option($key)
{
    try {
        $pdo = db_connect();

        $stmt = $pdo->prepare("SELECT system_title, system_description, system_logo FROM system ");
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row['' . $key . ''];
        }
        return '';

    } catch (PDOException $e) {
        error_log("Database error in get_option(): " . $e->getMessage());
        return '';
    }
}

function getSchoolYear($school_year)
{
    try {
        $pdo = db_connect();

        $stmt = $pdo->prepare("SELECT * FROM school_year WHERE school_year_status = 'Active' LIMIT 1");
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return $row['' . $school_year . ''];
        }
        return '';

    } catch (PDOException $e) {
        error_log("Database error in get_option(): " . $e->getMessage());
        return '';
    }
}


function get_section($id, $key)
{
    try {
        $pdo = db_connect();

        $stmt = $pdo->prepare("SELECT * FROM learner_section WHERE teacher_id = ?");
        $stmt->execute([$id]);

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row && isset($row[$key])) {
            return $row[$key];
        }

        return '';
    } catch (PDOException $e) {
        error_log("Database error in get_section(): " . $e->getMessage());
        return '';
    }
}



?>