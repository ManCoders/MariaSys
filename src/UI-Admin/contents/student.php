<section class="p-2">
    <div class="sub-section">
        <div class="d-flex justify-content-between align-items-center mb-0">
            <div>
                <h4 class="fs-5 "><i class="fa fa-folder-open text-primary me-2"></i>Learner Request</h4>
                <span>Manage and process Learner registration application</span>
            </div>
            <!--<button class="btn btn-success btn-sm" id="addNewBtn"
                data-bs-toggle="modal" data-bs-target="#childModal">
                <i class="fa fa-user-plus me-2"></i> Add New Teacher
            </button> -->
        </div>
        <table class="table table-bordered table-hover text-center mb-0" id="student-tbl-1">
            <thead class="table-light text-sm p-0 text-dark">
                <tr>
                    <th class="text-center" style="width:4%">#</th>
                    <th>Enrollee Name</th>
                    <th>LRN</th>
                    <th>Gender</th>
                    <th>Date Enrolled</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody id="tb_data_body-1"></tbody>
        </table>
    </div>
    <form id="postidform" method="POST" action="" style="display: none;">
        <input type="hidden" name="postid" id="postid">
    </form>

    <style>
        .modal-lg {
            width: 60%;
        }
    </style>

    <div class="modal" class="modal-dialog modal-lg">

    </div>
    <!--     <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
            <ul class="nav nav-tabs card-header-tabs" id="studentInfoTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="attendance-tab" data-bs-toggle="tab"
                        data-bs-target="#attendance" type="button" role="tab">
                        <i class="fa fa-calendar-check me-1"></i>Attendance
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="grades-tab" data-bs-toggle="tab" data-bs-target="#grades"
                        type="button" role="tab">
                        <i class="fa fa-chart-line me-1"></i>Grades
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="health-tab" data-bs-toggle="tab" data-bs-target="#health"
                        type="button" role="tab">
                        <i class="fa fa-heartbeat me-1"></i>Health Records
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="behavior-tab" data-bs-toggle="tab" data-bs-target="#behavior"
                        type="button" role="tab">
                        <i class="fa fa-star me-1"></i>Behavior
                    </button>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content" id="studentInfoTabContent">
                
                <div class="tab-pane fade show active" id="attendance" role="tabpanel">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #e8f5e8; border-color: #c3e6c3;">
                                <h4 id="attendancePresent">85</h4>
                                <small>Present Days</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #fff3cd; border-color: #ffda6a;">
                                <h4 id="attendanceAbsent">5</h4>
                                <small>Absent Days</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #e8f4fd; border-color: #b3d7ff;">
                                <h4 id="attendanceLate">3</h4>
                                <small>Late Arrivals</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #f8f9fa; border-color: #ddd;">
                                <h4 id="attendanceRate">94%</h4>
                                <small>Attendance Rate</small>
                            </div>
                        </div>
                    </div>
                    <h6 style="color: #555;">Recent Attendance (Last 10 Days)</h6>
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr style="color: #555;">
                                <th>Date</th>
                                <th>Status</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody id="attendanceRecords" style="color: #666;">
                           
                        
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="grades" role="tabpanel">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #e8f5e8; border-color: #c3e6c3;">
                                <h4 id="overallGrade">88.5</h4>
                                <small>Overall Average</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #f8f9fa; border-color: #ddd;">
                                <h4 id="classRank">5</h4>
                                <small>Class Rank</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #e8f4fd; border-color: #b3d7ff;">
                                <h4 id="totalSubjects">8</h4>
                                <small>Total Subjects</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #fff3cd; border-color: #ffda6a;">
                                <h4 id="failingSubjects">0</h4>
                                <small>Failing Subjects</small>
                            </div>
                        </div>
                    </div>
                    <h6 style="color: #555;">Subject Grades</h6>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr style="color: #555;">
                                <th>Subject</th>
                                <th>1st Quarter</th>
                                <th>2nd Quarter</th>
                                <th>3rd Quarter</th>
                                <th>4th Quarter</th>
                                <th>Final Grade</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody id="gradesRecords" style="color: #666;">
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="health" role="tabpanel">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                    <h6 class="mb-0" style="color: #555;">Physical Information</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless info-table">
                                        <tr>
                                            <td><strong>Height:</strong></td>
                                            <td id="healthHeight">125 cm</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Weight:</strong></td>
                                            <td id="healthWeight">28 kg</td>
                                        </tr>
                                        <tr>
                                            <td><strong>BMI:</strong></td>
                                            <td id="healthBMI">17.9 (Normal)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Blood Type:</strong></td>
                                            <td id="healthBloodType">O+</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                                    <h6 class="mb-0" style="color: #555;">Medical History</h6>
                                </div>
                                <div class="card-body">
                                    <h6 style="color: #555;">Immunization Records</h6>
                                    <table class="table table-sm table-bordered">
                                        <thead class="table-light">
                                            <tr style="color: #555;">
                                                <th>Vaccine</th>
                                                <th>Date Given</th>
                                                <th>Next Due</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="immunizationRecords" style="color: #666;">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card" style="box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        <div class="card-header"
                            style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                            <h6 class="mb-0" style="color: #555;">Health Check-ups & Medical Notes</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr style="color: #555;">
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Findings</th>
                                        <th>Recommendations</th>
                                        <th>Medical Officer</th>
                                    </tr>
                                </thead>
                                <tbody id="healthRecords" style="color: #666;">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="behavior" role="tabpanel">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #e8f5e8; border-color: #c3e6c3;">
                                <h4 id="behaviorGood">25</h4>
                                <small>Good Behavior</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #fff3cd; border-color: #ffda6a;">
                                <h4 id="behaviorWarning">2</h4>
                                <small>Warnings</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #f8d7da; border-color: #f5c6cb;">
                                <h4 id="behaviorIncidents">0</h4>
                                <small>Incidents</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card" style="background-color: #f8f9fa; border-color: #ddd;">
                                <h4 id="behaviorScore">95%</h4>
                                <small>Behavior Score</small>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr style="color: #555;">
                                <th>Date</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Action Taken</th>
                                <th>Reported By</th>
                            </tr>
                        </thead>
                        <tbody id="behaviorRecords" style="color: #666;">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Modal -->
    <!--     <div class="modal fade" id="childModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

                <form id="register-form" method="post">
                    <div class="modal-header bg-danger ">
                        <h4 class="text-white modal-title">Register Access</h4>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Account Type</label>
                                <select class="form-select" name="user_role" required>
                                    <option value="" disabled selected>Select Account Type</option>
                                    <option value="Teacher">Teachers</option>
                                    <option selected value="Parent">Parents</option>
                                </select>
                            </div>

                            <div class="col-md-3 ">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="firstName" required>
                            </div>
                            <div class="col-md-3 ">
                                <label class="form-label">Middle Name</label>
                                <input type="text" class="form-control" name="middleName" required>
                            </div>
                            <div class="col-md-3 ">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lastName" required>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6 ">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" name="dateofbirth" required>
                            </div>
                            <div class="col-md-6 ">
                                <label class="form-label">Gender</label>
                                <select class="form-select" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 ">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-md-6 ">
                                <label class="form-label">Contact Number</label>
                                <input type="text" maxlength="12" pattern="\d{12}" class="form-control" name="cpnumber" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 ">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                            <div class="col-md-4 ">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="col-md-4 ">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="cpassword" required>
                            </div>
                        </div>
                        <div class="form-check form-check mx-auto mt-3">
                            <input class="" type="checkbox" id="agree" name="agree" required>
                            <label class="form-check-label" for="agree">
                                I agree to the
                                <a href="#" class="text-danger text-decoration-none">Terms and
                                    Conditions</a>
                            </label>
                        </div>
                    </div>


                    <div class="modal-footer m-0 text-danger">
                        <button type="submit" class="btn btn-danger ">
                            <i class="fas fa-user-plus me-1"></i> Register
                        </button>
                        <button type="button" data-bs-dismiss="modal" class="btn btn-danger ">
                            <i class="fas fa-cancel me-1"></i> Close
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->
</section>