<?php
header('Content-Type: application/json');
/* header('x-powered-by : PHP/8.0.30'); */
$action = isset($_GET['action']) ? htmlspecialchars($_GET['action']) : '';

include 'admin_class.php';

$crud = new Action();

if ($action === 'save_installation_data') {
	$installer = $crud->save_installation_data();

	if ($installer) {
		echo $installer;
	}
}

if ($action === 'login') {
	
	$login = $crud->login();
	
	if ($login) {
		echo $login;
	}
}

if ($action === 'logout') {
	$logout = $crud->logout();

	if ($logout) {
		echo $logout;
	}
}

if($action === 'register-form') {
	$registration = $crud->registration_form();
	if ($registration) {
		echo $registration;
	}
}

if($action === 'childForm') {
	$registration = $crud->Enrollment();
	if ($registration) {
		echo $registration;
	}
}


if($action === 'getLearner'){
	$learner = $crud->getLearner();
	if ($learner) {
		echo $learner;
		}
}
?>