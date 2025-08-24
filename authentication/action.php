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
if ($action === 'schoolYear') {
    $approval = $crud->schoolYear();
    if ($approval) {
        echo $approval;
    }
}
if ($action === 'getLearner') {
	$getLearner = $crud->getLearner();
	if ($getLearner) {
		echo $getLearner;
	}
}

if ($action === 'sections') {
    $sections = $crud->sections();
    if ($sections) {
        echo $sections;
    }
}

if ($action === 'reg_status_parent') {
	$getLearner = $crud->reg_status_user();
	if ($getLearner) {
		echo $getLearner;
	}
}

if ($action === 'getDatas') {
    $learner = $crud->getDatas();
    if ($learner) {
        echo $learner;
    }
}
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
if ($action === 'getGradeLevel') {
    $gradeLevel = $crud->getGradeLevel();
    if ($gradeLevel) {
        echo $gradeLevel;
    }
    exit;
}
if ($action === 'updateGradeLevel') {
    $gradeLevel = $crud->updateGradeLevel();
    if ($gradeLevel) {
        echo $gradeLevel;
    }
    exit;
}
if ($action === 'deleteGradeLevel') {
    $gradeLevel = $crud->deleteGradeLevel();
    if ($gradeLevel) {
        echo $gradeLevel;
    }
    exit;
}

if ($action === 'getSection') {
    $gradeLevel = $crud->getSection();
    if ($gradeLevel) {
        echo $gradeLevel;
    }
    exit;
}
if ($action === 'updateSection') {
    $gradeLevel = $crud->updateSection();
    if ($gradeLevel) {
        echo $gradeLevel;
    }
    exit;
}
if ($action === 'deleteSection') {
    $gradeLevel = $crud->deleteSection();
    if ($gradeLevel) {
        echo $gradeLevel;
    }
    exit;
}
if($action === 'create_classroom'){
	$classroom = $crud->create_classroom();
	if($classroom){
		echo $classroom;
	}
	exit;
}
if($action === 'fetch_classroom'){
	$classroom = $crud->fetch_classroom();
	if($classroom){
		echo $classroom;
	}
	exit;
}
if($action === 'edit_classroom'){
	$classroom = $crud->edit_classroom();
	if($classroom){
		echo $classroom;
	}
	exit;
}
if($action === 'delete_classroom'){
	$classroom = $crud->delete_classroom();
	if($classroom){
		echo $classroom;
	}
	exit;
}
?>