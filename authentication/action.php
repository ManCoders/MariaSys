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

if ($action === 'register-form') {
	$registration = $crud->registration_form();
	if ($registration) {
		echo $registration;
	}
}

if ($action === 'childForm') {
	$registration = $crud->Enrollment();
	if ($registration) {
		echo $registration;
	}
}

if ($action === 'LinkNewChild') {
	$registration = $crud->LinkNewChild();
	if ($registration) {
		echo $registration;
	}
}
/* if ($action === 'update_enrollment_status') {
    $approval = $crud->approveEnrollment();
    if ($approval) {
        echo $approval;
    }
} */
if ($action === 'getLearner') {
	$getLearner = $crud->getLearner();
	if ($getLearner) {
		echo $getLearner;
	}
}
/* if ($action === 'getSingleLearner') {
    $learner_id = $_GET['learner_id'] ?? '';
    $learner = $crud->getSingleLearner($learner_id);
    if ($learner) {
        echo $learner;
    }
} */
if ($action === 'other_info') {
	$getLearner = $crud->other_info();
	if ($getLearner) {
		echo $getLearner;
	}
}

if ($action === 'get_additional_info') {
	$getLearner = $crud->get_additional_info();
	if ($getLearner) {
		echo $getLearner;
	}
}

if ($action === 'updateLearner') {
	$learner = $crud->updateLearners();
	if ($learner) {
		echo $learner;
	}
}

if($action ==="updateLearnerReg") {
	$learner = $crud->updateLearnerReg();
	if ($learner) {
		echo $learner;
	}
}

if ($action === 'getTeacher') {
	$learner = $crud->getTeacher();
	if ($learner) {
		echo $learner;
	}
}

if ($action === 'NewTeacher') {
	$learner = $crud->NewTeacher();
	if ($learner) {
		echo $learner;
	}
}

/* if($action === 'get_student_by_id'){
	$learner = $crud->get_student_by_section();
	if($learner){
		echo $learner;
	}
} */

if ($action === 'get_parent_student') {
	$learner = $crud->getLearnerByParentId();
	if ($learner) {
		echo $learner;
	}
}
/* if ($action === 'fetch_enrollment_applications') {
    $applications = $crud->fetch_enrollment_applications();
    if ($applications) {
        echo $applications;
    }
} */
?>