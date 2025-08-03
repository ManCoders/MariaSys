<?php
if (isset($_POST['id'])) {
    $learner_id = $_POST['id'];
}
?>


<input type="hidden" value="<?php echo $learner_id; ?>" data-id="<?php echo $learner_id; ?>" name="learnerIdInput" id="learnerIdInput">
<div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
    <h5 class="modal-title text-white">BASIC EDUCATION ENROLLMENT FORM</h5>
    <h5 class="modal-title text-white">Status : <span id="enrollmentStatus">Pending</span></h5>
    <button class="btn btn-sm m-0 text-white " id="enrollBtn" type="button"> <i
            class="fa fa-arrow-left me-3 "></i>Back </button>
</div>
<form id="childForm" enctype="multipart/form-data">
    <div class="modal-body d-flex col-md-12 col-12 flex-wrap align-items-satrt justify-content-between gap-2">
        <div class="d-flex flex-column col-md-3">
            <label>Grade Level</label>
            <select name="grade_level" id="grade_level" class="form-select">
                <option value="">Select grade level</option>
                <option value="">Kinder 1</option>
                <option value="">Kinder 2</option>
                <option value="">Grade 1</option>
                <option value="">Grade 2</option>
                <option value="">Grade 3</option>
                <option value="">Grade 4</option>
                <option value="">Grade 5</option>
                <option value="">Grade 6</option>
            </select>
        </div>
        <div class="d-flex flex-column col-md-3">
            <label>School Year</label>
            <div class="d-flex col-md-12 col-11">
                <input type="text" name="school_year" class="form-control" value="<?= date('Y') . '-' . (date('Y') + 1) ?>" readonly>
            </div>
        </div>

        <div class="d-flex flex-column col-md-3 col-11 ">
            <label>LRN:</label>
            <input type="number" name="lrn" id="lrn" readonly placeholder="LRN 12 digits" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-2 col-11 ">
            <label>PSA birth Certificate</label>
            <input type="text" name="psa" id="psa" placeholder="PSA birth . (if available)" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11 ">
            <label class="m-0 mt-1">Last name</label>
            <input type="text" id="lname" name="lname" readonly placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11 ">
            <label class="m-0 mt-1">First name</label>
            <input type="text" id="fname" name="fname" readonly placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11 ">
            <label class="m-0 mt-1">Middle name</label>
            <input type="text" id="mname" name="mname" readonly placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-2 col-11">
            <label class="m-0 mt-1">name extention</label>
            <input type="text" id="suffix" name="suffix" readonly placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11">
            <label class="m-0 mt-1">Birth date</label>
            <input type="date" name="birthdate" readonly id="birthdate" placeholder="Birth date" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11">
            <label class="m-0 mt-1">Age</label>
            <input type="text" name="age" id="age" readonly placeholder="Age" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11">
            <label class="m-0 mt-1">Sex</label>
            <select name="learner_gender" id="learner_gender" disabled class="form-select">
                <option value="">Select Gender</option>
                <option value="Male">MALE</option>
                <option value="Female">FEMALE</option>
            </select>
        </div>
        <div class="d-flex flex-column col-md-2 col-11">
            <label class="m-0 mt-1">Birth Place</label>
            <input type="text" readonly name="birth_place" id="birth_place" placeholder="Birth Place (city/Muntinlupa)" class="form-control">
        </div>
        <div class="col-md-12 col-12 d-flex justify-content-start gap-4">
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
                <select name="mother_tongue" id="mother_tongue" class="form-select">
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
        </div>

        <!-- Indigenous & 4Ps Section -->


        <!-- Address Section -->
        <h5 class="mt-4">Current Address</h5>
        <div class="d-flex flex-wrap col-md-12">
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
                <input type="text" name="current_country" id="current_country" class="form-control" value="Philippines">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Zip Code</label>
                <input type="text" name="current_zip" id="current_zip" class="form-control">
            </div>
        </div>

        <!-- Permanent Address -->
        <h5 class="mt-4">Permanent Address</h5>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="same" id="sameAddress" name="same_address">
            <label class="form-check-label" for="sameAddress">
                Same with your Current Address?
            </label>
        </div>
        <div class="d-flex flex-wrap col-md-12">
            <div class="col-md-3 col-11 pe-2">
                <label>House No.</label>
                <input type="text" name="permanent_house_no" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Sitio/Street</label>
                <input type="text" name="permanent_street" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Barangay</label>
                <input type="text" name="permanent_barangay" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Municipality/City</label>
                <input type="text" name="permanent_city" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Province</label>
                <input type="text" name="permanent_province" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Country</label>
                <input type="text" name="permanent_country" class="form-control" value="Philippines">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Zip Code</label>
                <input type="text" name="permanent_zip" class="form-control">
            </div>
        </div>
</form>
<!-- Parent / Guardian Info -->



<form id="addition-info">
    <div class="row mb-4">
        <label class="fs-5 mb-2">With diagnosis from Licensed Medical Specialist</label>

        <!-- First Column -->
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="ADHD" id="diagnosisADHD">
                <label class="form-check-label" for="diagnosisADHD">ADHD</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Autism" id="diagnosisAutism">
                <label class="form-check-label" for="diagnosisAutism">Autism Spectrum Disorder</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Behavior" id="diagnosisBehavior">
                <label class="form-check-label" for="diagnosisBehavior">Emotional/Behavioral Disorder</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Hearing" id="diagnosisHearing">
                <label class="form-check-label" for="diagnosisHearing">Hearing Impairment</label>
            </div>
        </div>

        <!-- Second Column -->
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Learning" id="diagnosisLearning">
                <label class="form-check-label" for="diagnosisLearning">Learning Disability</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Orthopedic" id="diagnosisOrthopedic">
                <label class="form-check-label" for="diagnosisOrthopedic">Orthopedic/Physical Handicap</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Speech" id="diagnosisSpeech">
                <label class="form-check-label" for="diagnosisSpeech">Speech/Language Disorder</label>
            </div>
        </div>

        <!-- Third Column -->
        <div class="col-md-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Intellectual" id="diagnosisIntellectual">
                <label class="form-check-label" for="diagnosisIntellectual">Intellectual Disability</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Cancer" id="diagnosisCancer">
                <label class="form-check-label" for="diagnosisCancer">Non-Cancer</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="diagnosis[]" value="Health" id="diagnosisHealth">
                <label class="form-check-label" for="diagnosisHealth">Chronic Health Problem</label>
            </div>
        </div>
    </div>


    <!-- With Manifestations -->
    <div class="mt-3 col-md-12">
        <label class="w-100 fs-5">a.2 With Manifestations</label>
        <div class="row">
            <div class="col-md-4">
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="ApplyingKnowledge"> Difficulty in Applying Knowledge</div>
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="Communicating"> Difficulty in Communicating</div>
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="Interpersonal"> Difficulty in Interpersonal Behavior</div>
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="Behavioral"> Difficulty in Behavior</div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="Mobility"> Difficulty in Mobility (Walking, Climbing)</div>
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="AdaptiveSelfCare"> Difficulty in Performing Adaptive Self-Care</div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="Remembering"> Difficulty in Remembering, Concentrating, Playing Attention</div>
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="Seeing"> Difficulty in Seeing</div>
                <div class="form-check form-check-label"><input class="form-check-input " type="checkbox" name="manifestations[]"
                        value="Hearing"> Difficulty in Hearing</div>
            </div>
        </div>
    </div>

    <!-- PWD ID -->
    <div class="mt-3 col-md-12">
        <label class="w-100 fs-5">b. Does the learner have a PWD ID?</label><br>
        <input class="" type="radio" name="pwd_id" value="yes"> Yes
        <input class=" ms-3" type="radio" name="pwd_id" value="no"> No
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
        <div class="col-md-3 mt-2">
            <label>School ID</label>
            <input type="text" name="school_id" class="form-control">
        </div>
    </div>

    <!-- SHS Learner -->
    <h5 class="mt-3 col-md-12">7. For Learner in Senior High School</h5>
    <div class="row mb-4">

        <div class="col-md-3 ">
            <label for="shs_semester" class="">Semester</label>
            <select name="shs_semester" id="shs_semester" class="form-select">
                <option value="" selected disabled>Select Semester</option>
                <option value="1st Semester">1st Semester</option>
                <option value="2nd Semester">2nd Semester</option>
            </select>
        </div>

        <div class="col-md-4 ">
            <label for="shs_track">Track</label>
            <select name="shs_track" id="shs_track" class="form-select">
                <option value="" selected disabled>Select Track</option>
                <option value="Academic">Academic</option>
                <option value="Technical-Vocational-Livelihood">Technical-Vocational-Livelihood</option>
                <option value="Sports">Sports</option>
                <option value="Arts and Design">Arts and Design</option>
            </select>
        </div>

        <div class="col-md-5 ">
            <label for="shs_strand">Strand</label>
            <select name="shs_strand" id="shs_strand" class="form-select">
                <option value="" selected disabled>Select Strand</option>
                <option value="STEM">STEM (Science, Technology, Engineering & Mathematics)</option>
                <option value="ABM">ABM (Accountancy, Business and Management)</option>
                <option value="HUMSS">HUMSS (Humanities and Social Sciences)</option>
                <option value="GAS">GAS (General Academic Strand)</option>
                <option value="ICT">ICT (Information and Communications Technology)</option>
                <option value="HE">HE (Home Economics)</option>
                <option value="IA">IA (Industrial Arts)</option>
                <option value="Agri-Fishery">Agri-Fishery</option>
                <option value="Sports">Sports</option>
                <option value="Arts and Design">Arts and Design</option>
            </select>
        </div>
    </div>


    <!-- Distance Learning -->
    <h5 class="mt-3 col-md-12">8. Distance Learning Preference</h5>
    <label class="w-100 fs-5">Preferred Learning Mode</label>
    <div class="row col-md-12">
        <div class="col-md-3">
            <div class="form-check form-check-label"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                    value="Blended"> Blended (Combination)</div>
            <div class="form-check form-check-label"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                    value="Homeschooling"> Homeschooling</div>
            <div class="form-check form-check-label"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                    value="ModularPrint"> Modular (Print)</div>
        </div>
        <div class="col-md-3">
            <div class="form-check form-check-label"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                    value="Radio"> Radio-Based Instruction</div>
            <div class="form-check form-check-label"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                    value="TV"> Educational Television</div>
            <div class="form-check form-check-label"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                    value="ModularDigital"> Modular (Digital)</div>
        </div>
    </div>
    <div class="d-flex flex-column col-md-12 mt-3">
        <label class="fs-6">Belonging to any Indigenous Peoples (IP) Community / Indigenous Cultural Community?</label>
        <div class="d-flex align-items-center gap-2">
            <input type="radio" name="is_ip" value="Yes" id="ip_yes"> <label for="ip_yes" class="me-2">Yes</label>
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
                            $('#learner_gender').val(learner.gender);
                            $('#birth_place').val(learner.birth_place);
                            $('#religion').val(learner.religious);
                            $('#mother_tongue').val(learner.tongue);

                            $('#current_street').val(learner.home_street);
                            $('#current_barangay').val(learner.barangay);
                            $('#current_city').val(learner.municipality);
                            $('#current_province').val(learner.province);
                            $('#current_country').val(learner.country);
                            $('#current_zip').val(learner.zipcode);
                            $('#current_house_no').val(learner.house_hold);
                            $('#sameAddress').on('change', function() {
                                if ($(this).is(':checked')) {
                                    $('input[name="permanent_house_no"]').val($('#current_house_no').val());
                                    $('input[name="permanent_street"]').val($('#current_street').val());
                                    $('input[name="permanent_barangay"]').val($('#current_barangay').val());
                                    $('input[name="permanent_city"]').val($('#current_city').val());
                                    $('input[name="permanent_province"]').val($('#current_province').val());
                                    $('input[name="permanent_country"]').val($('#current_country').val());
                                    $('input[name="permanent_zip"]').val($('#current_zip').val());
                                } else {
                                    // Clear the permanent fields if unchecked
                                    $('input[name^="permanent_"]').val('');
                                }
                            });

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