<section class="p-2 noScrollBar">
    <div class="noScrollBar">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h4 class="mb-0"><i class="fa fa-users text-primary me-2"></i>Learners Overview</h4>
                <small class="text-muted">View Learner Data Records</small>
            </div>
            <div>
                <button class="btn btn-success btn-sm " id="backPreviewPage" type="button"><i
                        class="fa fa-arrow-left"></i>Back</button>
            </div>
        </div>

        <!-- Student Profile Card -->
        <div id="studentProfileSection" style="display: none;">
            <div class="row mb-4">
                <div class="col-md-4 mb-3">
                    <div class="card h-100" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                            <h6 class="mb-0" style="color: #555;"><i class="fa fa-user me-2"></i>Learner Profile</h6>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="../../assets/image/users.png" id="learner_picture" alt="Student Photo"
                                    class="rounded-circle student-photo" width="120" height="120">
                            </div>
                            <span class="status-badge"
                                style="background-color: #e8f5e8; color: #2d5a2d; border: 1px solid #c3e6c3;"
                                id="studentStatus">Active</span>
                        </div>
                    </div>
                </div>
                <!-- Basic Information Card -->
                <div class="col-md-8 mb-3">
                    <div class="card h-100" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                            <h6 class="mb-0" style="color: #555;"><i class="fa fa-info-circle me-2"></i>Basic
                                Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 overflow-auto mb-3">
                                    <table class="table table-borderless info-table text-sm text-truncate text-nowrap">
                                        <tr>
                                            <td><strong>Full Name:</strong></td>
                                            <td id="infoName">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Date of Birth:</strong></td>
                                            <td id="infoBirthdate">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Age:</strong></td>
                                            <td id="infoAge">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Gender:</strong></td>
                                            <td id="infoGender">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Birth Place:</strong></td>
                                            <td id="infoPlace">-</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6 overflow-auto mb-3">
                                    <table class="table table-borderless info-table text-sm">
                                        <tr>
                                            <td><strong>LRN:</strong></td>
                                            <td id="infoLrn">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Grade:</strong></td>
                                            <td id="infoGrade">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Current Section:</strong></td>
                                            <td id="infoSection">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Teacher Adviser:</strong></td>
                                            <td id="infoAdviser">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Teacher Contact No:</strong></td>
                                            <td id="infoContact">-</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                if (isset($_GET['id'])) {
                    $learner_id = $_GET['id'];
                }
            ?>



            <div class="modal-header bg-danger " style="border-bottom: 1px solid #ddd;">
                <!-- <h5 class="modal-title text-white">BASIC EDUCATION ENROLLMENT FORM</h5> -->
                <div class="m-0"><button type="button" class="btn m-0 btn-sm btn-danger"
                        id="printSectionBtn">Print</button></div>
                <div class="d-flex gap-5">
                    <h6 class="modal-title text-white">
                        Status : <span id="enrollmentStatus" class="status_pending">Pending</span>
                    </h6>
                    <div class="">
                        <button class="btn  btn-sm m-0 btn-close " id="enrollBtn" type="button"> </button>
                    </div>
                </div>

            </div>


            <div id="enrollforms">
                <form id="childForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?php echo $learner_id; ?>" data-id="<?php echo $learner_id; ?>"
                        name="learnerIdInput" id="learnerIdInput">
                    <div
                        class="modal-body d-flex col-md-12 col-12 flex-wrap align-items-satrt justify-content-between gap-2">

                        <div class="d-flex flex-column col-md-3 col-11 ">
                            <label>LRN:</label>
                            <input type="text" name="lrn" id="lrn" placeholder="LRN (12 digits only)" maxlength="12"
                                class="form-control" pattern="\d{12}" required>
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11 ">
                            <label>PSA birth Certificate</label>
                            <input type="text" name="psa" id="psa" placeholder="PSA birth . (if available)"
                                class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ">
                            <label class="m-0 mt-1">Last name</label>
                            <input type="text" id="lname" name="lname" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ">
                            <label class="m-0 mt-1">First name</label>
                            <input type="text" id="fname" name="fname" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ">
                            <label class="m-0 mt-1">Middle name</label>
                            <input type="text" id="mname" name="mname" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11">
                            <label class="m-0 mt-1">name extention</label>
                            <input type="text" id="suffix" name="suffix" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11">
                            <label class="m-0 mt-1">Birth date</label>
                            <input type="date" name="birthdate" id="birthdate" placeholder="Birth date"
                                class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11">
                            <label class="m-0 mt-1">Age</label>
                            <input type="text" name="age" id="age" placeholder="Age" readonly class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11">
                            <label class="m-0 mt-1">Sex</label>
                            <select name="gender" id="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="Male">MALE</option>
                                <option value="Female">FEMALE</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11">
                            <label class="m-0 mt-1">Birth Place</label>
                            <input type="text" name="birth_place" id="birth_place"
                                placeholder="Birth Place (city/Muntinlupa)" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11">
                            <label class="m-0 mt-1">Religion</label>
                            <select name="religion" id="religion" class="form-select">
                                <option value="">Select Religion</option>
                                <option value="Roman Catholic">Roman Catholic</option>
                                <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                <option value="Evangelical">Evangelical</option>
                                <option value="Islam">Islam</option>
                                <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                                <option value="Aglipayan (IFI)">Aglipayan (IFI)</option>
                                <option value="Baptist">Baptist</option>
                                <option value="Born Again Christian">Born Again Christian</option>
                                <option value="Jehovah's Witness">Jehovah's Witness</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="d-flex flex-column col-md-3 col-11 ms-2">
                            <label class="m-0 mt-1">Mother Tongue</label>
                            <select name="tongue" id="tongue" class="form-select">
                                <option value="">Select Mother Tongue</option>
                                <option value="Tagalog">Tagalog</option>
                                <option value="Cebuano">Cebuano</option>
                                <option value="Ilocano">Ilocano</option>
                                <option value="Hiligaynon">Hiligaynon</option>
                                <option value="Bicolano">Bicolano</option>
                                <option value="Kapampangan">Kapampangan</option>
                                <option value="Pangasinan">Pangasinan</option>
                                <option value="Waray">Waray</option>
                                <option value="Maranao">Maranao</option>
                                <option value="Tausug">Tausug</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <h5 class="mt-4">Current Address</h5>
                        <div class="d-flex flex-wrap col-md-12 mb-3">
                            <div class="col-md-3 col-11 pe-2">
                                <label>House No.</label>
                                <input type="text" name="current_house_no" id="current_house_no" class="form-control">
                            </div>
                            <div class="col-md-3 col-11 pe-2">
                                <label>Sitio/Street</label>
                                <input type="text" name="current_street" id="current_street" class="form-control">
                            </div>
                            <div class="col-md-3 col-11 pe-2">
                                <label>Barangay</label>
                                <input type="text" name="current_barangay" id="current_barangay" class="form-control">
                            </div>
                            <div class="col-md-3 col-11 pe-2">
                                <label>Municipality/City</label>
                                <input type="text" name="current_city" id="current_city" class="form-control">
                            </div>
                            <div class="col-md-3 col-11 pe-2 mt-2">
                                <label>Province</label>
                                <input type="text" name="current_province" id="current_province" class="form-control">
                            </div>
                            <div class="col-md-3 col-11 pe-2 mt-2">
                                <label>Country</label>
                                <input type="text" name="current_country" id="current_country" class="form-control"
                                    value="Philippines">
                            </div>
                            <div class="col-md-3 col-11 pe-2 mt-2">
                                <label>Zip Code</label>
                                <input type="text" name="current_zip" id="current_zip" class="form-control">
                            </div>
                        </div>


                </form>
            </div>

            <form id="addition-info" method="POST">
                <input type="hidden" value="<?php echo $learner_id; ?>" data-id="<?php echo $learner_id; ?>"
                    name="learnerIdInput" id="learnerIdInput">
                <div class="row mb-4">
                    <label class="fs-5 mb-2">With diagnosis from Licensed Medical Specialist</label>

                    <!-- First Column -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="ADHD"
                                id="diagnosisADHD">
                            <label class="form-check-label" for="diagnosisADHD">ADHD</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Autism"
                                id="diagnosisAutism">
                            <label class="form-check-label" for="diagnosisAutism">Autism Spectrum Disorder</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Behavior"
                                id="diagnosisBehavior">
                            <label class="form-check-label" for="diagnosisBehavior">Emotional/Behavioral
                                Disorder</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Hearing"
                                id="diagnosisHearing">
                            <label class="form-check-label" for="diagnosisHearing">Hearing Impairment</label>
                        </div>
                    </div>

                    <!-- Second Column -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Learning"
                                id="diagnosisLearning">
                            <label class="form-check-label" for="diagnosisLearning">Learning Disability</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Orthopedic"
                                id="diagnosisOrthopedic">
                            <label class="form-check-label" for="diagnosisOrthopedic">Orthopedic/Physical
                                Handicap</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Speech"
                                id="diagnosisSpeech">
                            <label class="form-check-label" for="diagnosisSpeech">Speech/Language Disorder</label>
                        </div>
                    </div>

                    <!-- Third Column -->
                    <div class="col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Intellectual"
                                id="diagnosisIntellectual">
                            <label class="form-check-label" for="diagnosisIntellectual">Intellectual Disability</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Cancer"
                                id="diagnosisCancer">
                            <label class="form-check-label" for="diagnosisCancer">Non-Cancer</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Health"
                                id="diagnosisHealth">
                            <label class="form-check-label" for="diagnosisHealth">Chronic Health Problem</label>
                        </div>
                    </div>
                </div>


                <!-- With Manifestations -->
                <div class="mt-3 col-md-12">
                    <label class="w-100 fs-5">a.2 With Manifestations</label>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Applying Knowledge"> Difficulty in
                                Applying Knowledge</div>
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Communicating"> Difficulty in
                                Communicating</div>
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Interpersonal Behavior"> Difficulty in
                                Interpersonal Behavior</div>
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Behavior"> Difficulty in Behavior</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Mobility (Walking, Climbing)">
                                Difficulty in Mobility (Walking, Climbing)</div>
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Performing Adaptive Self-Care">
                                Difficulty in Performing Adaptive Self-Care</div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]"
                                    value="Difficulty in Remembering, Concentrating, Playing Attention"> Difficulty in
                                Remembering, Concentrating, Playing Attention</div>
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Seeing"> Difficulty in Seeing</div>
                            <div class="form-check form-check-label"><input class="form-check-input " type="checkbox"
                                    name="manifestations[]" value="Difficulty in Hearing"> Difficulty in Hearing</div>
                        </div>
                    </div>
                </div>

                <!-- PWD ID -->
                <div class="mt-3 col-md-12">
                    <label class="w-100 fs-5">b. Does the learner have a PWD ID?</label><br>
                    <input type="radio" name="has_pwd_id" value="yes" id="pwd_yes">
                    <label for="pwd_yes">Yes</label>

                    <input type="radio" name="has_pwd_id" value="no" id="pwd_no" class="ms-3">
                    <label for="pwd_no">No</label>
                    <input type="text" name="has_pwd_id_specific" placeholder="If Yes, please specify"
                        class="form-control w-90 ms-3">
                </div>



                <!-- BALIK-ARAL -->
                <h5 class="mt-3 col-md-12">6. For Returning Learner (Balik-Aral)</h5>
                <div class="row col-md-12 col-12">
                    <div class="col-md-3">
                        <label>Last Grade Level Completed</label>
                        <input type="text" name="last_grade_level" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Last School Year Completed</label>
                        <input type="text" name="last_sy" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Last School Attended</label>
                        <input type="text" name="last_school" class="form-control">
                    </div>
                </div>


                <!-- Distance Learning -->
                <h5 class="mt-3 col-md-12">7. Distance Learning Preference</h5>
                <label class="w-100 fs-5">Preferred Learning Mode</label>
                <div class="row col-md-12">
                    <div class="col-md-3">
                        <div class="form-check form-check-label"><input class="form-check-input" type="checkbox"
                                name="learning_mode[]" value="Blended"> Blended (Combination)</div>
                        <div class="form-check form-check-label"><input class="form-check-input" type="checkbox"
                                name="learning_mode[]" value="Homeschooling"> Homeschooling</div>
                        <div class="form-check form-check-label"><input class="form-check-input" type="checkbox"
                                name="learning_mode[]" value="ModularPrint"> Modular (Print)</div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check form-check-label"><input class="form-check-input" type="checkbox"
                                name="learning_mode[]" value="Radio"> Radio-Based Instruction</div>
                        <div class="form-check form-check-label"><input class="form-check-input" type="checkbox"
                                name="learning_mode[]" value="TV"> Educational Television</div>
                        <div class="form-check form-check-label"><input class="form-check-input" type="checkbox"
                                name="learning_mode[]" value="ModularDigital"> Modular (Digital)</div>
                    </div>
                </div>
                <div class="d-flex flex-column col-md-12 mt-3">
                    <label class="fs-6">Belonging to any Indigenous Peoples (IP) Community / Indigenous Cultural
                        Community?</label>
                    <div class="d-flex align-items-center gap-2">
                        <input type="radio" name="is_ip" value="Yes" id="ip_yes"> <label for="ip_yes"
                            class="me-2">Yes</label>
                        <input type="radio" name="is_ip" value="No" id="ip_no"> <label for="ip_no">No</label>
                        <input type="text" name="ip_specify" placeholder="If Yes, please specify"
                            class="form-control w-90 ms-3">
                    </div>
                </div>

                <div class="d-flex flex-column col-md-12 mt-2">
                    <label class="fs-6">Is your family a beneficiary of 4Ps?</label>
                    <div class="d-flex align-items-center gap-2">
                        <input type="radio" name="is_4ps" value="Yes" id="4ps_yes"> <label for="4ps_yes"
                            class="me-2">Yes</label>
                        <input type="radio" name="is_4ps" value="No" id="4ps_no"> <label for="4ps_no">No</label>
                        <input type="text" name="household_id" placeholder="If Yes, write the 4Ps Household ID Number"
                            class="form-control w-90 ms-3">
                    </div>
                </div>

            </form>
        </div>

        <!-- No Child Selected Message -->
        <div id="noChildMessage" class="text-center py-5">
            <i class="fa fa-users fa-3x text-muted mb-3"></i>
            <h5 class="text-muted">No child selected</h5>
            <p class="text-muted">Please select a child from the dropdown above to view their information.</p>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    // Get the learner ID from POST data
    const learnerId = '<?php echo $_POST["learner_id"] ?? ""; ?>';

    if (!learnerId) {
        showError("No student ID provided");
        return;
    }

    // Store the ID in a hidden field for future use
    $('#learnerIdInput').val(learnerId);

    // Show the profile section and hide the "no child" message
    $('#studentProfileSection').show();
    $('#noChildMessage').hide();

    // Fetch student data
    $.ajax({
        url: base_url + "authentication/action.php?action=getSingleLearner&learner_id=" + learnerId,
        type: "GET",
        dataType: "json",
        success: function(res) {
            if (res.status === 1) {
                const learner = res.data;

                if (learner) {
                    // Update personal information
                    updatePersonalInfo(learner);

                    // Update academic information
                    updateAcademicInfo(learner);

                    // Update status and image
                    $('#studentStatus').text(learner.reg_status);
                    if (learner.learner_picture) {
                        $('#learner_picture').attr('src', base_url + learner.learner_picture);
                    }

                    // Populate all tabs
                    populateAttendanceTab();
                    populateGradesTab();
                    populateHealthTab();
                    populateBehaviorTab();
                } else {
                    console.error("Learner not found with ID:", learnerId);
                    showError("Student data not found");
                }
            } else {
                console.error("API response error:", res.message || "Unknown error");
                showError(res.message || "Failed to load student data");
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error:", status, error);
            showError("Failed to connect to server");
        }
    });
    $('#backPreviewPage').click(function() {
        window.location.href = 'index.php?page=contents/enrolled';
    });

    // Helper functions
    function updatePersonalInfo(learner) {
        // Format full name safely (handle missing properties)
        const suffix = learner.suffix ? learner.suffix + '. ' : '';
        const middleInitial = learner.middle_name && learner.middle_name.length > 0 ?
            ' ' + learner.middle_name[0] + '.' : '';
        const fullName = `${learner.family_name} ${suffix}${learner.given_name}${middleInitial}`;

        $('#infoName').text(fullName);
        $('#infoBirthdate').text(learner.birthdate || '-');

        // Calculate age safely
        if (learner.birthdate) {
            try {
                const birthDate = new Date(learner.birthdate);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDiff = today.getMonth() - birthDate.getMonth();

                if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                $('#infoAge').text(age);
            } catch (e) {
                console.error("Invalid birthdate format:", learner.birthdate);
                $('#infoAge').text('-');
            }
        } else {
            $('#infoAge').text('-');
        }

        $('#infoGender').text(learner.gender || '-');
        $('#infoPlace').text(learner.birth_place || '-');
    }

    function updateAcademicInfo(learner) {
        $('#infoLrn').text(learner.lrn || '-');
        $('#infoGrade').text(learner.grade_level || '-');
        $('#infoSection').text(learner.section || '-');
        $('#infoAdviser').text(learner.adviser_name || '-');
        $('#infoContact').text(learner.adviser_contact || '-');
    }

    function showError(message) {
        console.error(message);
        $('#studentStatus').text('Error');
        $('.info-table td:nth-child(2)').text('-').css('color', '#dc3545');
    }
});
</script>

<script>
    $('#enrollBtn').off('click').on('click', function() {
        location.href = 'index.php?page=contents/enrollment';
    });
    setTimeout(() => {

        $.ajax({
            url: base_url + "authentication/action.php?action=getLearner",
            type: "GET",
            dataType: "json",
            success: function(res) {
                const dataId = $('#learnerIdInput').data('id');
                if (res.status === 1) {
                    // alert(dataId)
                    res.data.forEach((learner) => {
                        if (learner.learner_id == dataId) {
                            $('#enrollmentStatus').text(learner.reg_status);
                            if(learner.reg_status === 'Approved') {
                                $('#enrollforms').find('input, textarea, select, button').prop('disabled', true);
                            } else {
                                $('#enrollforms').find('input, textarea, select, button').prop('disabled', false);
                            }
                            $('#lrn').val(learner.lrn);
                            $('#psa').val(learner.psa);
                            $('#lname').val(learner.family_name);
                            $('#mname').val(learner.middle_name);
                            $('#fname').val(learner.given_name);
                            $('#suffix').val(learner.suffix);
                            $('#birthdate').val(learner.birthdate);
                            const b = new Date(learner.birthdate);
                            const t = new Date();
                            const age = t.getFullYear() - b.getFullYear() - (t < new Date(t.getFullYear(), b.getMonth(), b.getDate()) ? 1 : 0);
                            $('#age').val(age);
                            $('#gender').val(learner.gender);
                            $('#birth_place').val(learner.birth_place);
                            $('#religion').val(learner.religious);
                            $('#tongue').val(learner.tongue);

                            // Fill current address fields
                            $('#current_house_no').val(learner.current_house_no);
                            $('#current_street').val(learner.current_street);
                            $('#current_barangay').val(learner.current_barangay);
                            $('#current_city').val(learner.current_city);
                            $('#current_province').val(learner.current_province);
                            $('#current_country').val(learner.current_country);
                            $('#current_zip').val(learner.current_zip);



                            $('#father_lname').val(learner.father_lname);
                            $('#father_fname').val(learner.father_fname);
                            $('#father_mname').val(learner.father_mname);
                            $('#father_contact').val(learner.father_contact);

                            $('input[name="mother_lname"]').val(learner.mother_lname);
                            $('input[name="mother_fname"]').val(learner.mother_fname);
                            $('input[name="mother_mname"]').val(learner.mother_mname);
                            $('input[name="mother_contact"]').val(learner.mother_contact);

                            $('input[name="guardian_lname"]').val(learner.guardian_lname);
                            $('input[name="guardian_fname"]').val(learner.guardian_fname);
                            $('input[name="guardian_mname"]').val(learner.guardian_mname);
                            $('input[name="guardian_contact"]').val(learner.guardian_contact);

                        }
                    });
                }
            },
            error: function() {
                console.error("Failed to load learners");
            },
        });
    }, 500);
</script>