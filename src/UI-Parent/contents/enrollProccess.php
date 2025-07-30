<form id="childForm" enctype="multipart/form-data">
    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
        <h5 class="modal-title text-white">BASIC EDUCATION ENROLLMENT FORM</h5>
    </div>
    <div class="modal-body d-flex col-md-12 col-12 flex-wrap align-items-satrt justify-content-between gap-2">
        <div class="d-flex flex-column col-md-4">
            <label>School Year</label>
            <div class="d-flex">
                <input type="year" class="mx-2 form-control" placeholder="YYYY" name="schoolYearFrom"> <strong
                    class="m-0 p-0"> - </strong> <input type="year" class="mx-2 form-control" placeholder="YYYY"
                    name="schoolYearTo">
            </div>
        </div>
        <div class="d-flex flex-column col-md-2 col-11">
            <label>School Year</label>
            <select name="" id="" class="form-select">
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
        <div class="d-flex flex-column col-md-3 col-11 ">
            <label>LRN:</label>
            <input type="number" name="lrn" placeholder="LRN 12 digits" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-2 col-11 ">
            <label>PSA birth Certificate</label>
            <input type="text" name="psa" placeholder="PSA birth . (if available)" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11 ">
            <label class="m-0 mt-1">Last name</label>
            <input type="text" name="lname" placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11 ">
            <label class="m-0 mt-1">First name</label>
            <input type="text" name="fname" placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11 ">
            <label class="m-0 mt-1">Middle name</label>
            <input type="text" name="mname" placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-2 col-11">
            <label class="m-0 mt-1">name extention</label>
            <input type="text" name="suffix" placeholder="Last name" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11">
            <label class="m-0 mt-1">Birth date</label>
            <input type="date" name="date" placeholder="Birth date" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11">
            <label class="m-0 mt-1">Age</label>
            <input type="text" name="age" placeholder="Age" class="form-control">
        </div>
        <div class="d-flex flex-column col-md-3 col-11">
            <label class="m-0 mt-1">Sex</label>
            <select name="" id="" class="form-select">
                <option value="">Select Gender</option>
                <option value="">MALE</option>
                <option value="">FEMALE</option>
            </select>
        </div>
        <div class="d-flex flex-column col-md-2 col-11">
            <label class="m-0 mt-1">Birth Place</label>
            <input type="text" name="BirthPLace" placeholder="Birth Place (city/Muntinlupa)" class="form-control">
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
        <div class="d-flex flex-column col-md-12 mt-3">
            <label>Belonging to any Indigenous Peoples (IP) Community / Indigenous Cultural Community?</label>
            <div class="d-flex align-items-center gap-2">
                <input type="radio" name="is_ip" value="Yes" id="ip_yes"> <label for="ip_yes" class="me-2">Yes</label>
                <input type="radio" name="is_ip" value="No" id="ip_no"> <label for="ip_no">No</label>
                <input type="text" name="ip_specify" placeholder="If Yes, please specify"
                    class="form-control w-90 ms-3">
            </div>
        </div>

        <div class="d-flex flex-column col-md-12 mt-2">
            <label>Is your family a beneficiary of 4Ps?</label>
            <div class="d-flex align-items-center gap-2">
                <input type="radio" name="is_4ps" value="Yes" id="4ps_yes"> <label for="4ps_yes"
                    class="me-2">Yes</label>
                <input type="radio" name="is_4ps" value="No" id="4ps_no"> <label for="4ps_no">No</label>
                <input type="text" name="household_id" placeholder="If Yes, write the 4Ps Household ID Number"
                    class="form-control w-90 ms-3">
            </div>
        </div>

        <!-- Address Section -->
        <h5 class="mt-4">Current Address</h5>
        <div class="d-flex flex-wrap col-md-12">
            <div class="col-md-3 col-11 pe-2">
                <label>House No.</label>
                <input type="text" name="current_house_no" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Sitio/Street</label>
                <input type="text" name="current_street" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Barangay</label>
                <input type="text" name="current_barangay" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Municipality/City</label>
                <input type="text" name="current_city" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Province</label>
                <input type="text" name="current_province" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Country</label>
                <input type="text" name="current_country" class="form-control" value="Philippines">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Zip Code</label>
                <input type="text" name="current_zip" class="form-control">
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

        <!-- Parent / Guardian Info -->
        <h5 class="mt-4">Parent's / Guardian's Information</h5>
        <div class="d-flex flex-wrap col-md-12">
            <div class="col-md-3 col-11 pe-2">
                <label>Father's Last Name</label>
                <input type="text" name="father_lname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>First Name</label>
                <input type="text" name="father_fname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Middle Name</label>
                <input type="text" name="father_mname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2">
                <label>Contact Number</label>
                <input type="text" name="father_contact" class="form-control">
            </div>

            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Mother's Maiden Last Name</label>
                <input type="text" name="mother_lname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>First Name</label>
                <input type="text" name="mother_fname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Middle Name</label>
                <input type="text" name="mother_mname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Contact Number</label>
                <input type="text" name="mother_contact" class="form-control">
            </div>

            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Legal Guardian Last Name</label>
                <input type="text" name="guardian_lname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>First Name</label>
                <input type="text" name="guardian_fname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Middle Name</label>
                <input type="text" name="guardian_mname" class="form-control">
            </div>
            <div class="col-md-3 col-11 pe-2 mt-2">
                <label>Contact Number</label>
                <input type="text" name="guardian_contact" class="form-control">
            </div>
        </div>
        <div class="row col-md-12 col-12">
            <div class="col-md-12 col-12">
                <label class="w-100 fs-5">With diagnosis from Licensed Medical Specialist</label>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="ADHD">
                    ADHD</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Autism"> Autism Spectrum Disorder</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Behavior"> Emotional/Behavioral Disorder</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Hearing"> Hearing Impairment</div>
            </div>
            <div class="col-md-3">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Learning"> Learning Disability</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Orthopedic"> Orthopedic/Physical Handicap</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Speech"> Speech/Language Disorder</div>
            </div>
            <div class="col-md-3">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Intellectual"> Intellectual Disability</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Cancer"> Non-Cancer</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]"
                        value="Health"> Chronic Health Problem</div>
            </div>
        </div>

        <!-- With Manifestations -->
        <div class="mt-3 col-md-12">
            <label class="w-100 fs-5">a.2 With Manifestations</label>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="ApplyingKnowledge"> Difficulty in Applying Knowledge</div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="Communicating"> Difficulty in Communicating</div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="Interpersonal"> Difficulty in Interpersonal Behavior</div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="Behavioral"> Difficulty in Behavior</div>
                </div>
                <div class="col-md-4">
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="Mobility"> Difficulty in Mobility (Walking, Climbing)</div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="AdaptiveSelfCare"> Difficulty in Performing Adaptive Self-Care</div>
                </div>
                <div class="col-md-4">
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="Remembering"> Difficulty in Remembering, Concentrating, Playing Attention</div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="Seeing"> Difficulty in Seeing</div>
                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]"
                            value="Hearing"> Difficulty in Hearing</div>
                </div>
            </div>
        </div>

        <!-- PWD ID -->
        <div class="mt-3 col-md-12">
            <label class="w-100 fs-5">b. Does the learner have a PWD ID?</label><br>
            <input class="form-check-input" type="radio" name="pwd_id" value="yes"> Yes
            <input class="form-check-input ms-3" type="radio" name="pwd_id" value="no"> No
        </div>

        <!-- BALIK-ARAL -->
        <h5  class="mt-3 col-md-12">6. For Returning Learner (Balik-Aral)</h5>
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
        <div class="row col-md-12">
            <div class="col-md-12 col-12 d-flex" >
                <label class="fs-5 me-3">Semester</label><br>
                <input type="radio" name="1st" id="1st"> <label for="1st" class="m-0 p-0 d-flex align-items-center ms-1 me-4" style="font-size: 15px;">1st</label>
                 <input type="radio" name="2nd" id="2nd"> <label for="2nd" class="m-0 p-0 d-flex align-items-center ms-1" style="font-size: 15px;">2nd</label>
            </div>
            <div class="d-flex col-md-12 col-12 gap-3">
                 <div class="col-md-3">
                    <label>Track</label>
                    <input type="text" name="shs_track" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Strand</label>
                    <input type="text" name="shs_strand" class="form-control">
                </div>
            </div>
        </div>

        <!-- Distance Learning -->
        <h5 class="mt-3 col-md-12">8. Distance Learning Preference</h5>
        <label class="w-100 fs-5">Preferred Learning Mode</label>
        <div class="row col-md-12">
            <div class="col-md-3">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                        value="Blended"> Blended (Combination)</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                        value="Homeschooling"> Homeschooling</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                        value="ModularPrint"> Modular (Print)</div>
            </div>
            <div class="col-md-3">
                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                        value="Radio"> Radio-Based Instruction</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                        value="TV"> Educational Television</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]"
                        value="ModularDigital"> Modular (Digital)</div>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button class="btn btn-success text-white" type="submit">
            <i class="fa fa-save me-1"></i>Submit Request
        </button>
        <button type="button" class="btn btn-secondary" id="enrollBtn" data-bs-dismiss="modal">Cancel</button>
    </div>
</form>

<script>
    $('#enrollBtn').off('click').on('click', function() {
        const id = $(this).data('id');
        sessionStorage.setItem('learners_id', id);
        location.href = 'index.php?page=contents/enrollment';
    });
</script>