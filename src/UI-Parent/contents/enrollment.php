
<section class=" w-100 mediaMarginRight pe-0 ps-0 p-0 m-0">
    <div class="w-100">
        <div class="d-flex justify-content-between align-items-center mb-2 flex-wrap">
            <div class="col-md-8 col-11">
                <h4 class="mb-0 mediaSize"><i class="fa fa-user-plus text-primary me-2"></i>Child Enrollment </h4>
                <small class="text-muted mediaSizeP">Register and link your child to your parent account</small>
            </div>
                <div class="col-md-4 col-11 d-flex justify-content-end">
                    <button class="btn btn-success btn-sm p-2 m-0" id="addChildBtn">
                    <i class="fa fa-plus"></i> Link New Child
                </button>
            </div>
            
        </div>

        <!-- Enrollment Status Cards -->
        <div class="row mb-3 d-flex flex-wrap align-items-center col-md-12 col-12 m-0 p-0 justify-content-center h-auto">
            <div class="col-md-3 col-11 p-0 m-0">
                <div class="stats-card p-2 m-1">
                    <i class="fa fa-users"></i>
                    <h5 id="totalChildren">2</h5>
                    <small>Linked Children</small>
                </div>
            </div>
            <div class="col-md-3 col-11 p-0 m-0">
                <div class="stats-card p-2 m-1">
                    <i class="fa fa-clock"></i>
                    <h5 id="pendingEnrollments">1</h5>
                    <small>Pending Requests</small>
                </div>
            </div>
            <div class="col-md-3 col-11 p-0 m-0">
                <div class="stats-card p-2 m-1">
                    <i class="fa fa-check-circle"></i>
                    <h5 id="approvedEnrollments">2</h5>
                    <small>Approved</small>
                </div>
            </div>
            <div class="col-md-3 col-11 p-0 m-0">
                <div class="stats-card p-2 m-1">
                    <i class="fa fa-times-circle"></i>
                    <h5 id="rejectedEnrollments">0</h5>
                    <small>Rejected</small>
                </div>
            </div>
        </div>

        <!-- Children List Table -->
         <div class="col-md-12 col-12 d-flex  flex-wrap h-auto">
            <!-- <div class="card col-md-5 col-11 d-flex" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);"> -->
                <div class="card-body col-md-5 col-10 d-flex p-0 m-0 shadow p-2 m-2 rounded-3">
                    <div class="img col-md-4 col-4 d-flex align-items-center justify-content-center flex-column">
                        <img src="../../assets/image/users.png" alt="" style="width: 90px; height: 90px; border-radius: 50%;">
                        <label for="">LRN: 9384590343</label>
                    </div>
                    <div class="information col-md-8 col-8 d-flex flex-column">
                        <div class="m-0 d-flex">
                            <label class="m-0 p-0 d-flex align-items-center" style="width: 4rem !important;">NAME:</label>
                            <span>PAGOTAISIDRO, NARCO JEAN F.</span>
                        </div>
                        <div class="m-0 d-flex">
                            <label class="m-0 p-0 d-flex align-items-center" style="width: 4rem !important;">GRADE: </label>
                            <span class="h-100 d-flex align-items-center">6</span>
                        </div>
                        <div class="m-0 d-flex">
                            <label class="m-0 p-0 d-flex align-items-center" style="width: 4rem !important;">STATUS: </label>
                            <span>ENROLLED</span>
                        </div>
                        <div class="buttonDomains col-md-12 d-flex align-items-center justify-content-end">
                            <button class="me-2 btn btn-success" type="button" id="enrollBtn">Enroll</button>
                            <button class="me-2 btn btn-secondary">Edit</button>
                        </div>
                    </div>
                </div>
                <div class="card-body col-md-5 col-10 d-flex p-0 m-0 shadow p-2 m-2 rounded-3">
                    <div class="img col-md-4 col-4 d-flex align-items-center justify-content-center flex-column">
                        <img src="../../assets/image/users.png" alt="" style="width: 90px; height: 90px; border-radius: 50%;">
                        <label for="">LRN: 9384590343</label>
                    </div>
                    <div class="information col-md-8 col-8 d-flex flex-column">
                        <div class="m-0 d-flex">
                            <label class="m-0 p-0 d-flex align-items-center" style="width: 4rem !important;">NAME:</label>
                            <span>PAGOTAISIDRO, NARCO JEAN F.</span>
                        </div>
                        <div class="m-0 d-flex">
                            <label class="m-0 p-0 d-flex align-items-center" style="width: 4rem !important;">GRADE: </label>
                            <span class="h-100 d-flex align-items-center">6</span>
                        </div>
                        <div class="m-0 d-flex">
                            <label class="m-0 p-0 d-flex align-items-center" style="width: 4rem !important;">STATUS: </label>
                            <span>UNENROLLED</span>
                        </div>
                        <div class="buttonDomains col-md-12 d-flex align-items-center justify-content-end">
                            <button class="me-2 btn btn-success" type="button" id="enrollBtn">Enroll</button>
                            <button class="me-2 btn btn-secondary" type="button">Edit</button>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
         </div>
        
    </div>
    <!-- ENROLLMENT MODAL WAG NATO WAG TO E DELETE -->
    <div class="modal fade" id="enrollModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ms-2">
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
    <!-- END OF ENROLLMENT MODAL -->
    <!-- Add/Edit Child Modal -->
    <div class="modal fade" id="childModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="childForm" enctype="multipart/form-data">
                    <div class="modal-header bg-success " style="border-bottom: 1px solid #ddd;">
                        <h5 class="modal-title text-white">Link Child Account</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center justify-content-center">
                        <input type="hidden" name="child_id" id="childId">
                        <input type="hidden" name="status" value="Pending">
                        <input type="hidden" name="parent_id" id="parentId"
                            value="<?php echo isset($_SESSION['parentData']) ? $_SESSION['parentData']['parent_id'] : ''; ?>">

                        <!-- LRN -->
                        <div class="row gap-1 col-md-12 d-flex justify-content-between">
                            <div class="col-md-5 p-0">
                                <div class="mb-2">
                                    <label class="m-0" class="form-label">Student LRN <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="lrn" id="studentLRN" required maxlength="12"
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

                        <!-- Separate Name Fields -->
                        <div class="row col-md-12 col-12 gap-2 d-flex justify-content-between">
                            <div class="col-md-3  p-0 ">
                                <div class="mb-2 p-0 m-0">
                                    <label class="form-label">Family Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="family_name" id="familyName" required
                                        placeholder="Enter family name">
                                </div>
                            </div>
                            <div class="col-md-3  p-0 ">
                                <div class="mb-3 p-0 m-0">
                                    <label class="form-label">Given Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="given_name" id="givenName" required
                                        placeholder="Enter given name">
                                </div>
                            </div>
                            <div class="col-md-3  p-0 ">
                                <div class="mb-3 p-0 m-0">
                                    <label class="form-label">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="middle_name" id="middleName" required
                                        placeholder="Enter middle name">
                                </div>
                            </div>
                            <div class="col-md-2 p-0 ">
                                <div class="mb-2 m-0 p-0">
                                    <label class="form-label">Suffix</label>
                                    <input type="text" class="form-control" name="suffix" id="suffix"
                                        placeholder="e.g. Jr., Sr., III (optional)">
                                </div>
                            </div>
                        </div>

                        <!-- Database IDs -->
                        <div class="row col-md-12 gap-2 d-flex justify-content-between">
                            <div class="col-md-4 p-0">
                                <div class="mb-2">
                                    <label class="form-label">Grade Level <span class="text-danger">*</span></label>
                                    <select class="form-select" name="grade_level_id" id="gradeLevelId" required>
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
                                        else:
                                            echo '<option value="1">Grade 1</option>';
                                            echo '<option value="2">Grade 2</option>';
                                            echo '<option value="3">Grade 3</option>';
                                            echo '<option value="4">Grade 4</option>';
                                            echo '<option value="5">Grade 5</option>';
                                            echo '<option value="6">Grade 6</option>';
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div class="mb-2">
                                    <label class="form-label">School Year <span class="text-danger">*</span></label>
                                    <select class="form-select" name="school_year_id" id="schoolYearId" required>
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
                                        else:
                                            echo '<option value="1">2024-2025</option>';
                                            echo '<option value="2">2025-2026</option>';
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 p-0">
                                <div class="mb-2">
                                    <label class="form-label">Mother Tongue</label>
                                    <input type="text" class="form-control" name="tongue" id="tongue"
                                        placeholder="Enter mother tongue">
                                </div>
                            </div>
                        </div>

                        <!-- Required Fields -->
                        <div class="row col-md-12 gap-2 d-flex justify-content-between">
                            <div class="col-md-4 p-0">
                                <div class="mb-2">
                                    <label class="form-label">Religious Affiliation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="religious" id="religious" required
                                        placeholder="Enter religion">
                                </div>
                            </div>
                            <div class="col-md-3 m-0 p-0">
                                <div class="m-0">
                                    <label class="form-label">Birthdate <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="birthdate" id="birthdate" required>
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
                        
                        <!-- Profile Picture Upload -->
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
                                            class="img-thumbnail" style="height: 100px; width: 100px; border-radius: 50%;" >
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

    <!-- STUDENT VIEW MODAL -->
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

    <!-- EDIT STUDENT MODAL - UI ONLY (Backend Developer to implement) -->
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
                                    <input type="text" class="form-control" name="lrn" id="editLRN" required maxlength="12"
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
                                    <input type="text" class="form-control" name="family_name" id="editFamilyName" required
                                        placeholder="Enter family name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label">Given Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="given_name" id="editGivenName" required
                                        placeholder="Enter given name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-2">
                                    <label class="form-label">Middle Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="middle_name" id="editMiddleName" required
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
                                    <input type="date" class="form-control" name="birthdate" id="editBirthdate" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label class="form-label">Religious Affiliation <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="religious" id="editReligious" required
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
                                    <select class="form-select" name="grade_level_id" id="editGradeLevelId" required>
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
                                    <select class="form-select" name="school_year_id" id="editSchoolYearId" required>
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
<!-- ============== MARCO JAVASCRIPT FOR MODAL ENROLMENT =================== -->
<script>
    $(document).ready(function () {
        renderTable();

        $('#enrollBtn').click(function () {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#enrollModal').modal('show');
        });
    });
</script>

<!-- ============== STATIC BACKEND =================== -->
<script>
    let dataTable;
    let currentStudentData = null; // Store current student data

    function renderTable() {
        let tbody = $('#tb_data_body');
        tbody.html('');
        let i = 1;

        $.ajax({
            url: base_url + "/authentication/action.php?action=getLearner",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 1) {
                    const data = response.data;

                    data.forEach(emp => {
                        // Create full name from separate fields
                        const fullName = [emp.given_name, emp.middle_name, emp.family_name, emp.suffix]
                            .filter(part => part && part.trim() !== '')
                            .join(' ') || emp.name || emp.learner_name || 'Unknown';

                        let tr = $('<tr></tr>');
                        tr.append(`<td class="text-center">${i++}</td>`);
                        tr.append(`<td class="name-cell" title="${fullName}">${fullName}</td>`);
                        tr.append(`<td>${emp.lrn}</td>`);
                        tr.append(`<td>${formatDate(emp.date_submitted || emp.date || emp.created_date)}</td>`);
                        tr.append(`<td>${emp.grade_level_name || emp.grade_level || emp.grade}</td>`);
                        tr.append(`<td>${emp.school_year_name || emp.school_year || '2024-2025'}</td>`);
                        tr.append(`<td class="text-center"><span class="status-badge status-${(emp.learner_status || emp.status || 'pending').toLowerCase()}">${emp.learner_status || emp.status || 'Pending'}</span></td>`);
                        tr.append(`
                            <td class="text-center">
                                <button class="btn btn-sm btn-success editBtn" data-id="${emp.learner_id || emp.id}"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-sm btn-danger trashBtn" data-id="${emp.learner_id || emp.id}"><i class="fa fa-trash"></i></button>
                                <button class="btn btn-sm btn-primary viewBtn" data-id="${emp.learner_id || emp.id}"><i class="fa fa-eye"></i></button>
                            </td>
                        `);
                        tbody.append(tr);
                    });

                    // Destroy existing DataTable if it exists
                    if ($.fn.DataTable.isDataTable('#student-tbl')) {
                        $('#student-tbl').DataTable().destroy();
                    }

                    // Initialize new DataTable
                    dataTable = $('#student-tbl').DataTable({
                        pageLength: 5,
                        lengthMenu: [5, 10, 25],
                        columnDefs: [{ orderable: false, targets: 7 }]
                    });

                    // Update stats cards
                    updateStatsCards(data);

                    // Bind event handlers AFTER table is rendered
                    bindEventHandlers();

                } else {
                    tbody.append('<tr><td colspan="8" class="text-center text-muted">No children enrolled yet</td></tr>');
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                Swal.fire("Error", "Unable to fetch data from server.", "error");
            }
        });
    }

    function bindEventHandlers() {
        // Edit Button Handler
        $('.editBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            console.log('Edit student with ID:', id);
            $('#editStudentId').val(id);
            $('#editStudentModal').modal('show');
        });

        // Delete Button Handler
        $('.trashBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('Delete student with ID:', id);
                    Swal.fire({
                        title: "Deleted!",
                        text: "Student record has been deleted.",
                        icon: "success",
                        toast: true,
                        position: "top-end",
                        timer: 3000,
                        showConfirmButton: false,
                    });
                }
            });
        });

        $('.viewBtn').off('click').on('click', function () {
            const id = $(this).data('id');
            const studentData = findStudentDataById(id);
            if (studentData) {
                currentStudentData = studentData;
                currentStudentData.learner_id = id;
                showStudentViewModal(studentData);
            }
        });
    }

    function findStudentDataById(id) {
        const rows = $('#student-tbl tbody tr');
        for (let i = 0; i < rows.length; i++) {
            const row = $(rows[i]);
            const viewBtn = row.find('.viewBtn');
            if (viewBtn.data('id') == id) {
                const cells = row.find('td');
                return {
                    learner_id: id,
                    name: cells.eq(1).text().trim(),
                    lrn: cells.eq(2).text().trim(),
                    date_submitted: cells.eq(3).text().trim(),
                    grade_level: cells.eq(4).text().trim(),
                    school_year: cells.eq(5).text().trim(),
                    status: cells.eq(6).find('.status-badge').text().trim()
                };
            }
        }
        return null;
    }

    function showStudentViewModal(student) {
        let age = '-';
        if (student.birthdate) {
            const birthDate = new Date(student.birthdate);
            const today = new Date();
            age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
        }

        const photoSrc = student.learner_picture && student.learner_picture !== 'default.png' 
            ? `../authentication/uploads/${student.learner_picture}` 
            : '../assets/image/users.png';
        
        $('#studentProfilePhoto').attr('src', photoSrc);

        const fullName = [student.given_name, student.middle_name, student.family_name, student.suffix]
            .filter(part => part && part.trim() !== '')
            .join(' ') || student.name || 'Unknown Student';

        $('#modalStudentName').text(fullName);
        $('#modalStudentLRN').text(`LRN: ${student.lrn || '000000000000'}`);
        $('#modalStudentGrade').text(`${student.grade_level || 'N/A'} - ${student.school_year || '2024-2025'}`);
        
        const status = student.learner_status || student.status || 'Pending';
        const statusClass = status.toLowerCase() === 'approved' ? 'status-approved' : 
                           status.toLowerCase() === 'pending' ? 'status-pending' : 'status-rejected';
        $('#modalStudentStatus').removeClass().addClass(`status-badge ${statusClass}`).text(status);

        $('#infoFullName').text(fullName);
        $('#infoFamilyName').text(student.family_name || '-');
        $('#infoGivenName').text(student.given_name || '-');
        $('#infoMiddleName').text(student.middle_name || '-');
        $('#infoSuffix').text(student.suffix || '-');
        $('#infoNickname').text(student.nickname || '-');
        $('#infoBirthdate').text(formatDate(student.birthdate) || '-');
        $('#infoAge').text(age);
        $('#infoGender').text(student.gender || '-');
        $('#infoReligious').text(student.religious || '-');
        $('#infoBirthPlace').text(student.birth_place || '-');
        $('#infoTongue').text(student.tongue || '-');
        $('#infoGradeLevel').text(student.grade_level_name || student.grade_level || '-');
        $('#infoSchoolYear').text(student.school_year_name || student.school_year || '-');
        $('#infoDateSubmitted').text(formatDate(student.date_submitted || student.created_date) || '-');
        $('#infoStatus').html(`<span class="status-badge ${statusClass}">${status}</span>`);

        if (student.notes && student.notes.trim() !== '') {
            $('#infoNotes').text(student.notes);
            $('#notesSection').show();
        } else {
            $('#notesSection').hide();
        }

        $('#viewStudentModalLabel').html(`<i class="fa fa-eye me-2"></i>Student Details - ${fullName}`);
        $('#viewStudentModal').modal('show');
    }

    function populateEditForm(student) {
        $('#editStudentId').val(student.learner_id);
        $('#editLRN').val(student.lrn);
        $('#editNickname').val(student.nickname);
        $('#editFamilyName').val(student.family_name);
        $('#editGivenName').val(student.given_name);
        $('#editMiddleName').val(student.middle_name);
        $('#editSuffix').val(student.suffix);
        $('#editGender').val(student.gender);
        $('#editBirthdate').val(student.birthdate);
        $('#editReligious').val(student.religious);
        $('#editBirthPlace').val(student.birth_place);
        $('#editTongue').val(student.tongue);
        $('#editGradeLevelId').val(student.grade_level_id);
        $('#editSchoolYearId').val(student.school_year_id);
        $('#editStatus').val(student.learner_status);
        $('#editNotes').val(student.notes);

        if (student.learner_picture && student.learner_picture !== 'default.png') {
            $('#editProfilePreview').attr('src', `../authentication/uploads/${student.learner_picture}`);
        }
    }

    function updateStatsCards(data) {
        const total = data.length;
        const pending = data.filter(c => (c.learner_status || c.status || 'pending').toLowerCase() === 'pending').length;
        const approved = data.filter(c => (c.learner_status || c.status || '').toLowerCase() === 'approved').length;
        const rejected = data.filter(c => (c.learner_status || c.status || '').toLowerCase() === 'rejected').length;

        $('#totalChildren').text(total);
        $('#pendingEnrollments').text(pending);
        $('#approvedEnrollments').text(approved);
        $('#rejectedEnrollments').text(rejected);
    }

    function formatDate(dateStr) {
        if (!dateStr || dateStr === 'N/A') return 'N/A';
        
        try {
            const date = new Date(dateStr);
            return date.toLocaleDateString('en-US', {
                year: 'numeric',
                month: 'short',
                day: 'numeric'
            });
        } catch (e) {
            return dateStr;
        }
    }

    $(document).ready(function () {
        renderTable();

        $('#addChildBtn').click(function () {
            $('#childForm')[0].reset();
            $('#childId').val('');
            $('#childModal').modal('show');
        });

        $('#editFromViewBtn').click(function() {
            if (currentStudentData) {
                $('#viewStudentModal').modal('hide');
                setTimeout(() => {
                    populateEditForm(currentStudentData);
                    $('#editStudentModal').modal('show');
                }, 300);
            }
        });

        $('#childForm').submit(function (e) {
            e.preventDefault();

            const $form = $(this);
            const formData = new FormData(this);

            $.ajax({
                url: base_url + "/authentication/action.php?action=childForm",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function () {
                    $form.find("button[type='submit']").html("Submitting...");
                },
                success: function (response) {
                    Swal.fire({
                        title: response.status === 1 ? "Success!" : "Error",
                        text: response.message,
                        icon: response.status === 1 ? "success" : "error",
                        toast: true,
                        position: "top-end",
                        timer: 3000,
                        showConfirmButton: false,
                    }).then(() => {
                        $('#childModal').modal('hide');
                        $form[0].reset();
                        renderTable();
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error("AJAX error:", textStatus, errorThrown);
                    Swal.fire({
                        title: "Technical Error",
                        text: "Please contact the administration!",
                        icon: "error",
                        toast: true,
                        position: "top-end",
                        timer: 2000,
                        showConfirmButton: false,
                    });
                },
                complete: function () {
                    $form.find("button[type='submit']").html('<i class="fa fa-save me-1"></i>Submit Request');
                }
            });
        });

        $('#editStudentForm').submit(function (e) {
            e.preventDefault();

            const $form = $(this);
            const formData = new FormData(this);

            // BACKEND: Add updateStudent endpoint here - action=updateStudent
            
            setTimeout(() => {
                Swal.fire({
                    title: "Success!",
                    text: "Student information updated successfully!",
                    icon: "success",
                    toast: true,
                    position: "top-end",
                    timer: 3000,
                    showConfirmButton: false,
                }).then(() => {
                    $('#editStudentModal').modal('hide');
                });
            }, 1000);
        });

        document.getElementById('profilePicInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const preview = document.getElementById('profilePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "../assets/image/users.png";
            }
        });

        document.getElementById('editProfilePicInput').addEventListener('change', function (e) {
            const file = e.target.files[0];
            const preview = document.getElementById('editProfilePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        $('#studentLRN, #editLRN').on('input', function () {
            let value = $(this).val().replace(/\D/g, '');
            if (value.length > 12) value = value.substring(0, 12);
            $(this).val(value);
        });
    });
</script>