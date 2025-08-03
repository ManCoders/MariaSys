<section class=" w-100 mediaMarginRight pe-0 ps-0 p-0 m-0">
    <div class="w-100">
        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
            <div class="col-md-8 col-11">
                <h4 class="mb-0 mediaSize"><i class="fa fa-user-plus text-primary me-2"></i>Child Enrollment </h4>
                <small class="text-muted mediaSizeP">Register and link your child to your parent account</small>
            </div>
            <div class="col-md-4 col-11 d-flex justify-content-end">
                <button
                    class="btn btn-success btn-sm p-2 m-0"
                    data-bs-toggle="modal"
                    data-bs-target="#childModal"
                    id="addChildBtn">
                    <i class="fa fa-plus"></i> Link New Child
                </button>

            </div>

        </div>


        <style>
            @media(max-width:576px) {
                .mediaSizeP {
                    font-size: 11px !important;
                }

                .paddingSize {
                    padding: 7px !important;
                }
            }
        </style>
        <!-- Children List Table -->
        <div class="container">
            <div class="row g-3" id="learners-container">
                <div class="col-12 text-center text-danger">
                    No records Found!
                </div>
            </div>
        </div>



    </div>
    <div class="modal fade" id="enrollModal" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">BASIC EDUCATION ENROLLMENT FORM</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body d-flex col-md-12 col-12 flex-wrap align-items-center justify-content-center gap-2">
                        <div class="d-flex flex-column col-md-3">
                            <label>School Year</label>
                            <div class="d-flex">
                                <input type="year" class="mx-2 form-control" placeholder="YYYY" name="schoolYearFrom"> <strong class="m-0 p-0"> - </strong> <input type="year" class="mx-2 form-control" placeholder="YYYY" name="schoolYearTo">
                            </div>
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11">
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
                        <div class="d-flex flex-column col-md-2 col-11 ">
                            <label>LRN:</label>
                            <input type="number" name="lrn" placeholder="LRN 12 digits" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11 ">
                            <label>PSA birth Certificate</label>
                            <input type="text" name="psa" placeholder="PSA birth . (if available)" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11 ">
                            <label class="m-0 mt-1">Last name</label>
                            <input type="text" name="lname" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11 ">
                            <label class="m-0 mt-1">First name</label>
                            <input type="text" name="fname" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11 ">
                            <label class="m-0 mt-1">Middle name</label>
                            <input type="text" name="mname" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-2 col-11 ms-2">
                            <label class="m-0 mt-1">name extention</label>
                            <input type="text" name="suffix" placeholder="Last name" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ms-2">
                            <label class="m-0 mt-1">Birth date</label>
                            <input type="date" name="date" placeholder="Birth date" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ms-2">
                            <label class="m-0 mt-1">Age</label>
                            <input type="text" name="age" placeholder="Age" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ms-2">
                            <label class="m-0 mt-1">Sex</label>
                            <select name="" id="" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="">MALE</option>
                                <option value="">FEMALE</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ms-2">
                            <label class="m-0 mt-1">Birth Place</label>
                            <input type="text" name="BirthPLace" placeholder="Birth Place (city/Muntinlupa)" class="form-control">
                        </div>
                        <div class="d-flex flex-column col-md-3 col-11 ms-2">
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
                        <!-- Indigenous & 4Ps Section -->
                        <div class="d-flex flex-column col-md-12 mt-3">
                            <label>Belonging to any Indigenous Peoples (IP) Community / Indigenous Cultural Community?</label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="radio" name="is_ip" value="Yes" id="ip_yes"> <label for="ip_yes" class="me-2">Yes</label>
                                <input type="radio" name="is_ip" value="No" id="ip_no"> <label for="ip_no">No</label>
                                <input type="text" name="ip_specify" placeholder="If Yes, please specify" class="form-control w-75 ms-3">
                            </div>
                        </div>

                        <div class="d-flex flex-column col-md-12 mt-2">
                            <label>Is your family a beneficiary of 4Ps?</label>
                            <div class="d-flex align-items-center gap-2">
                                <input type="radio" name="is_4ps" value="Yes" id="4ps_yes"> <label for="4ps_yes" class="me-2">Yes</label>
                                <input type="radio" name="is_4ps" value="No" id="4ps_no"> <label for="4ps_no">No</label>
                                <input type="text" name="household_id" placeholder="If Yes, write the 4Ps Household ID Number" class="form-control w-75 ms-3">
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
                        <div class="row">
                            <div class="col-md-3">
                                <label>With diagnosis from Licensed Medical Specialist</label>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="ADHD"> ADHD</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Autism"> Autism Spectrum Disorder</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Behavior"> Emotional/Behavioral Disorder</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Hearing"> Hearing Impairment</div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Learning"> Learning Disability</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Orthopedic"> Orthopedic/Physical Handicap</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Speech"> Speech/Language Disorder</div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Intellectual"> Intellectual Disability</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Cancer"> Non-Cancer</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="diagnosis[]" value="Health"> Chronic Health Problem</div>
                            </div>
                        </div>

                        <!-- With Manifestations -->
                        <div class="mt-3">
                            <label>a.2 With Manifestations</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="ApplyingKnowledge"> Difficulty in Applying Knowledge</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="Communicating"> Difficulty in Communicating</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="Interpersonal"> Difficulty in Interpersonal Behavior</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="Behavioral"> Difficulty in Behavior</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="Mobility"> Difficulty in Mobility (Walking, Climbing)</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="AdaptiveSelfCare"> Difficulty in Performing Adaptive Self-Care</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="Remembering"> Difficulty in Remembering, Concentrating, Playing Attention</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="Seeing"> Difficulty in Seeing</div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" name="manifestations[]" value="Hearing"> Difficulty in Hearing</div>
                                </div>
                            </div>
                        </div>

                        <!-- PWD ID -->
                        <div class="mt-3">
                            <label>b. Does the learner have a PWD ID?</label><br>
                            <input class="form-check-input" type="radio" name="pwd_id" value="yes"> Yes
                            <input class="form-check-input ms-3" type="radio" name="pwd_id" value="no"> No
                        </div>

                        <!-- BALIK-ARAL -->
                        <h5 class="mt-4">6. For Returning Learner (Balik-Aral)</h5>
                        <div class="row">
                            <div class="col-md-4">
                                <label>Last Grade Level Completed</label>
                                <input type="text" name="last_grade_level" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Last School Year Completed</label>
                                <input type="text" name="last_sy" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label>Last School Attended</label>
                                <input type="text" name="last_school" class="form-control">
                            </div>
                            <div class="col-md-4 mt-2">
                                <label>School ID</label>
                                <input type="text" name="school_id" class="form-control">
                            </div>
                        </div>

                        <!-- SHS Learner -->
                        <h5 class="mt-4">7. For Learner in Senior High School</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Semester</label><br>
                                <input class="form-check-input" type="radio" name="shs_semester" value="1st"> 1st
                                <input class="form-check-input ms-3" type="radio" name="shs_semester" value="2nd"> 2nd
                            </div>
                            <div class="col-md-3">
                                <label>Track</label>
                                <input type="text" name="shs_track" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Strand</label>
                                <input type="text" name="shs_strand" class="form-control">
                            </div>
                        </div>

                        <!-- Distance Learning -->
                        <h5 class="mt-4">8. Distance Learning Preference</h5>
                        <label>Preferred Learning Mode</label>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]" value="Blended"> Blended (Combination)</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]" value="Homeschooling"> Homeschooling</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]" value="ModularPrint"> Modular (Print)</div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]" value="Radio"> Radio-Based Instruction</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]" value="TV"> Educational Television</div>
                                <div class="form-check"><input class="form-check-input" type="checkbox" name="learning_mode[]" value="ModularDigital"> Modular (Digital)</div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="submit">
                            <i class="fa fa-save me-1"></i>Submit Request
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="childModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="linkNewChild" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Child Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center justify-content-center">


                        <input type="hidden" name="parent_id" id="parentId"
                            value="<?php echo isset($_SESSION['parentData']) ? $_SESSION['parentData']['parent_id'] : ''; ?>">

                        <div class="row gap-1 col-md-12 d-flex justify-content-between">
                            <div class="col-md-5 p-0">
                                <div class="mb-2">
                                    <label class="m-0" class="form-label">Student LRN <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lrn" id="studentLRN" maxlength="12"
                                        placeholder="Enter 12-digit LRN">
                                </div>
                            </div>
                            <div class="col-md-3 p-0">
                                <div class="mb-2">
                                    <label class="form-label m-0">Nickname</label>
                                    <input type="text" class="form-control" name="nickname" id="nickname"
                                        placeholder="Enter nickname (optional)">
                                </div>
                            </div>
                            <div class="col-md-3 p-0">
                                <div class="mb-2">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12 col-12 gap-2 d-flex justify-content-between">
                            <div class="col-md-3  p-0 ">
                                <div class="mb-2 p-0 m-0">
                                    <label class="form-label">Family Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="family_name" id="familyName"
                                        placeholder="Enter family name">
                                </div>
                            </div>
                            <div class="col-md-3  p-0 ">
                                <div class="mb-3 p-0 m-0">
                                    <label class="form-label">Given Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="given_name" id="givenName"
                                        placeholder="Enter given name">
                                </div>
                            </div>
                            <div class="col-md-3  p-0 ">
                                <div class="mb-3 p-0 m-0">
                                    <label class="form-label">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="middle_name" id="middleName"
                                        placeholder="Enter middle name">
                                </div>
                            </div>
                            <div class="col-md-2 p-0">
                                <div class="mb-3 m-0 p-0">
                                    <label for="suffix" class="form-label">Suffix</label>
                                    <select class="form-select" name="suffix" id="suffix">
                                        <option value="" selected>None</option>
                                        <option value="Jr.">Jr.</option>
                                        <option value="Sr.">Sr.</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                        <option value="IV">IV</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                        </div>



                        <div class="row col-md-12 gap-2 d-flex justify-content-between">
                            <div class="col-md-4 p-0">
                                <div class="mb-3">
                                    <label for="religious" class="form-label">Religious Affiliation <span class="text-danger">*</span></label>
                                    <select class="form-select" name="religious" id="religious">
                                        <option value="" disabled selected>Select religion</option>
                                        <option value="Roman Catholic">Roman Catholic</option>
                                        <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                                        <option value="Evangelical">Evangelical</option>
                                        <option value="Seventh-day Adventist">Seventh-day Adventist</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Baptist">Baptist</option>
                                        <option value="Protestant">Protestant</option>
                                        <option value="Born Again">Born Again</option>
                                        <option value="Jehovah's Witness">Jehovah's Witness</option>
                                        <option value="None">None</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 m-0 p-0">
                                <div class="m-0">
                                    <label class="form-label">Birthdate <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="birthdate" id="birthdate">
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="mb-2">
                                    <label class="form-label">Birth Place</label>
                                    <input type="text" class="form-control" name="birth_place" id="birthPlace"
                                        placeholder="Enter birth place">
                                </div>
                            </div>
                        </div>

                        <div class="row col-md-12 gap-2 d-flex justify-content-between">
                            <div class="col-md-6 p-0">
                                <div class="mb-2">
                                    <label class="form-label">Additional Notes</label>
                                    <textarea class="form-control" name="notes" id="notes" rows="3"
                                        placeholder="Any special instructions or information..."></textarea>
                                </div>
                                <div class="alert alert-light" style="border: 1px solid #d1ecf1; background-color: #e8f4fd; color: #0c5460;">
                                    <i class="fa fa-info-circle me-2"></i>
                                    <strong>Note:</strong> Your enrollment request will be verified by the school administration.
                                    You will receive a notification once the verification is complete.
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="mb-2">
                                    <label class="form-label">Profile Picture</label>
                                    <div class="text-center mb-2 w-100">
                                        <img id="profilePreview" src="../../assets/image/users.png" alt="Profile Preview"
                                            class="img-thumbnail" style="height: 100px; width: 100px; border-radius: 50%;">
                                    </div>
                                    <input type="file" class="form-control" id="profilePicInput" name="profile_picture"
                                        accept="image/*">
                                    <small class="text-muted">Upload a clear image (JPG, PNG)</small>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success text-white" type="submit">
                            <i class="fa fa-save me-1"></i>Submit Request
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="viewStudentModal" tabindex="-1" aria-labelledby="viewStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-landscape">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="viewStudentModalLabel">
                        <i class="fa fa-eye me-2"></i>Student Details
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Student Profile Section -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                                <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                    <h6 class="mb-0" style="color: #555;"><i class="fa fa-user me-2"></i>Student Profile</h6>
                                </div>
                                <div class="card-body text-center">
                                    <div class="mb-3">
                                        <img id="studentProfilePhoto" src="../assets/image/users.png" alt="Student Photo"
                                            class="rounded-circle student-photo" width="120" height="120">
                                    </div>
                                    <h5 id="modalStudentName" style="color: #333;">Student Name</h5>
                                    <p class="text-muted mb-1" id="modalStudentLRN">LRN: 000000000000</p>
                                    <p class="text-muted mb-1" id="modalStudentGrade">Grade & Section</p>
                                    <span class="status-badge" style="background-color: #e8f5e8; color: #2d5a2d; border: 1px solid #c3e6cb;"
                                        id="modalStudentStatus">Active</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                                <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                    <h6 class="mb-0" style="color: #555;"><i class="fa fa-info-circle me-2"></i>Basic Information</h6>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <table class="table table-borderless info-table">
                                                <tr>
                                                    <td><strong>Full Name:</strong></td>
                                                    <td id="infoFullName">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Family Name:</strong></td>
                                                    <td id="infoFamilyName">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Given Name:</strong></td>
                                                    <td id="infoGivenName">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Middle Name:</strong></td>
                                                    <td id="infoMiddleName">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Suffix:</strong></td>
                                                    <td id="infoSuffix">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Nickname:</strong></td>
                                                    <td id="infoNickname">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date of Birth:</strong></td>
                                                    <td id="infoBirthdate">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Age:</strong></td>
                                                    <td id="infoAge">-</td>
                                                </tr>
                                            </table> -->
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-borderless info-table">
                                                <tr>
                                                    <td><strong>Gender:</strong></td>
                                                    <td id="infoGender">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Religious Affiliation:</strong></td>
                                                    <td id="infoReligious">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Birth Place:</strong></td>
                                                    <td id="infoBirthPlace">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Mother Tongue:</strong></td>
                                                    <td id="infoTongue">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Grade Level:</strong></td>
                                                    <td id="infoGradeLevel">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>School Year:</strong></td>
                                                    <td id="infoSchoolYear">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Date Submitted:</strong></td>
                                                    <td id="infoDateSubmitted">-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status:</strong></td>
                                                    <td id="infoStatus">-</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" id="notesSection" style="display: none;">
                                        <div class="col-12">
                                            <hr>
                                            <h6><strong>Additional Notes:</strong></h6>
                                            <p id="infoNotes" class="text-muted">-</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" id="editFromViewBtn">
                        <i class="fa fa-edit me-1"></i>Edit Student
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="editStudentForm" enctype="multipart/form-data">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="editStudentModalLabel">
                            <i class="fa fa-edit me-2"></i>Edit Student Information
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Hidden field for student ID -->
                        <input type="hidden" name="student_id" id="editStudentId">
                        <div class="row mb-3">
                            <div class="col-md-12 text-center">
                                <div class="mb-2">
                                    <img id="editProfilePreview" src="../assets/image/users.png" alt="Student Photo"
                                        class="rounded-circle" width="100" height="100" style="border: 3px solid #ddd;">
                                </div>
                                <input type="file" class="form-control d-inline-block" id="editProfilePicInput"
                                    name="profile_picture" accept="image/*" style="width: auto;">
                                <small class="text-muted d-block">Upload new profile picture (optional)</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Student LRN <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lrn" id="editLRN" maxlength="12"
                                        placeholder="Enter 12-digit LRN">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Nickname</label>
                                    <input type="text" class="form-control" name="nickname" id="editNickname"
                                        placeholder="Enter nickname">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label">Family Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="family_name" id="editFamilyName"
                                        placeholder="Enter family name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label">Given Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="given_name" id="editGivenName"
                                        placeholder="Enter given name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="middle_name" id="editMiddleName"
                                        placeholder="Enter middle name">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Suffix</label>
                                    <input type="text" class="form-control" name="suffix" id="editSuffix"
                                        placeholder="e.g. Jr., Sr., III">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Gender</label>
                                    <select class="form-select" name="gender" id="editGender">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Birthdate <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="birthdate" id="editBirthdate">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Religious Affiliation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="religious" id="editReligious"
                                        placeholder="Enter religion">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Birth Place</label>
                                    <input type="text" class="form-control" name="birth_place" id="editBirthPlace"
                                        placeholder="Enter birth place">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Mother Tongue</label>
                                    <input type="text" class="form-control" name="tongue" id="editTongue"
                                        placeholder="Enter mother tongue">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Grade Level <span class="text-danger">*</span></label>
                                    <select class="form-select" name="grade_level_id" id="editGradeLevelId">
                                        <option value="">Select Grade Level</option>
                                        <?php
                                        $qry = $pdo->query("SELECT * FROM grade_level");
                                        if ($qry && $qry->rowCount() > 0):
                                            while ($row = $qry->fetch(PDO::FETCH_ASSOC)):
                                        ?>
                                                <option value="<?= htmlspecialchars($row['grade_level_id']) ?>">
                                                    <?= htmlspecialchars($row['grade_level_name']) ?>
                                                </option>
                                        <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">School Year <span class="text-danger">*</span></label>
                                    <select class="form-select" name="school_year_id" id="editSchoolYearId">
                                        <option value="">Select School Year</option>
                                        <?php
                                        $qry = $pdo->query("SELECT * FROM school_year");
                                        if ($qry && $qry->rowCount() > 0):
                                            while ($row = $qry->fetch(PDO::FETCH_ASSOC)):
                                        ?>
                                                <option value="<?= htmlspecialchars($row['school_year_id']) ?>">
                                                    <?= htmlspecialchars($row['school_year_name']) ?>
                                                </option>
                                        <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="learner_status" id="editStatus">
                                        <option value="Pending">Pending</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mb-2">
                                    <label class="form-label">Additional Notes</label>
                                    <textarea class="form-control" name="notes" id="editNotes" rows="3"
                                        placeholder="Any special instructions or information..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            <strong>Note:</strong> Changes will be saved and require approval if status is changed.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-save me-1"></i>Save Changes
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



</section>

<script>
    setTimeout(() => {
        $.ajax({
            url: base_url + "authentication/action.php?action=getLearner",
            type: "GET",
            dataType: "json",
            success: function(res) {
                if (res.status === 1) {
                    let html = "";
                    res.data.forEach((learner) => {
                        if (learner.parent_id == parent_id) {
                            html += `<div class=" col-md-6 col-12 d-flex flex-wrap h-auto">
                                <div class=" d-flex p-0 m-0 shadow p-2 m-2 rounded-3 w-100">
                                    <div class="img col-md-4 col-4 d-flex align-items-center justify-content-center flex-column">
                                        <img src="${
                                        base_url + learner.learner_picture
                                        }" style="width: 90px; height: 90px; border-radius: 50%;">
                                        <label class="mediaSizeP">LRN: <strong>${
                                        learner.lrn
                                        }</strong></label>
                                    </div>
                                    <div class="information col-md-8 col-8 d-flex flex-column">
                                        <div class="m-0 d-flex">
                                            <label class="m-0 p-0 d-flex align-items-center" style="width: 4rem;">NAME:</label>
                                            <span class="mediaSizeP">
                                                ${
                                                learner.given_name
                                                    .charAt(0)
                                                    .toUpperCase() +
                                                learner.given_name
                                                    .slice(1)
                                                    .toLowerCase()
                                                }
                                                ${
                                                learner.family_name
                                                    .charAt(0)
                                                    .toUpperCase() +
                                                learner.family_name
                                                    .slice(1)
                                                    .toLowerCase()
                                                }
                                                ${learner.middle_name
                                                .charAt(0)
                                                .toUpperCase()}.
                                            </span>
                                        </div>
                                        <div class="m-0 d-flex">
                                            <label class="m-0 p-0 d-flex mediaSizeP align-items-center" style="width: 4rem;">GRADE:</label>
                                            <span class="mediaSizeP">${
                                            learner.grade
                                            }</span>
                                        </div>
                                        <div class="m-0 d-flex">
                                            <label class="m-0 p-0 d-flex mediaSizeP align-items-center" style="width: 4rem;">STATUS:</label>
                                            <span class="mediaSizeP">${
                                            learner.reg_status
                                            }</span>
                                        </div>
                                        <div class="buttonDomains col-md-12 d-flex align-items-center justify-content-end mt-3">
                                            <button 
                                                class="me-2 btn btn-success p-2 px-3 paddingSize updateBtn" 
                                                id="update-btn-${learner.learner_id}"
                                                data-id="${learner.learner_id}">
                                                Enroll
                                            </button>
                                            <button 
                                                class="me-2 btn btn-secondary p-2 px-3 paddingSize profileBtn" 
                                                id="profile-btn-${learner.learner_id}" 
                                                data-id="${learner.learner_id}">
                                                Records
                                            </button>
                                            <form id="learnerForm" method="POST" action="" style="display: none;">
                                                <input type="hidden" name="id" id="learnerIdInput">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        }
                    });

                    $("#learners-container").html(html);
                }
            },
            error: function() {
                console.error("Failed to load learners");
            },
        });
    }, 500);



    $(document).on('click', '.updateBtn', function() {
        const id = $(this).data('id');
        $('#learnerIdInput').val(id);
        $('#learnerForm').attr('action', 'index.php?page=contents/enrollProccess');
        $('#learnerForm').submit();
    });

    $(document).on('click', '.profileBtn', function() {
        const id = $(this).data('id');
        $('#learnerIdInput').val(id);
        $('#learnerForm').attr('action', 'index.php?page=contents/users/view_learners');
        $('#learnerForm').submit();
    });
</script>