<style>
    .stats-card {
        background: white;
        padding: 15px;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        border: 1px solid #ddd;
        margin-bottom: 10px;
    }
    .noScrollBar {
        overflow: auto; /* or scroll */
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none;  /* Internet Explorer 10+ */
    }
    .noScrollBar::-webkit-scrollbar{
        display: none !important;
    }
    .stats-card h4 {
        margin: 5px 0;
        color: #333;
        font-size: 20px;
    }

    .stats-card small {
        color: #777;
        font-size: 12px;
    }

    .info-table td {
        padding: 5px 8px;
        border: none;
        color: #555;
    }

    .info-table td:first-child {
        font-weight: 500;
        color: #333;
    }

    .status-badge {
        padding: 3px 8px;
        border-radius: 4px;
        font-size: 11px;
        font-weight: 500;
    }

    .status-present {
        background-color: #e8f5e8;
        color: #2d5a2d;
        border: 1px solid #c3e6c3;
    }

    .status-absent {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .status-late {
        background-color: #fff3cd;
        color: #664d03;
        border: 1px solid #ffda6a;
    }

    .grade-cell {
        text-align: center;
        font-weight: 500;
        color: #555;
    }

    .student-photo {
        border: 3px solid #f8f9fa;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .nav-tabs .nav-link {
        color: #666;
        border: 1px solid transparent;
    }

    .nav-tabs .nav-link.active {
        color: #333;
        background-color: #f8f9fa;
        border-color: #ddd #ddd #f8f9fa;
    }

    .nav-tabs .nav-link:hover {
        border-color: #e9ecef #e9ecef #f8f9fa;
        background-color: #f8f9fa;
    }
</style>

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
                <div class="col-md-4">
                    <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                            <h6 class="mb-0" style="color: #555;"><i class="fa fa-user me-2"></i>Students Profile</h6>
                        </div>
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="../../assets/image/users.png" alt="Student Photo"
                                    class="rounded-circle student-photo" width="120" height="120">
                            </div>
                            <h5 id="studentName" style="color: #333;">Student Name</h5>
                            <p class="text-muted mb-1" id="studentLRN">LRN: 000000000000</p>
                            <p class="text-muted mb-1" id="studentGrade">Grade & Section</p>
                            <span class="status-badge"
                                style="background-color: #e8f5e8; color: #2d5a2d; border: 1px solid #c3e6c3;"
                                id="studentStatus">Active</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #ddd;">
                            <h6 class="mb-0" style="color: #555;"><i class="fa fa-info-circle me-2"></i>Basic
                                Information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 overflow-scroll mb-3 noScrollBar">
                                    <table class="table table-borderless info-table text-sm text-truncate text-nowrap overflow-hidden ">
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
                                        
                                    </table>
                                </div>
                                <div class="col-md-6  overflow-scroll mb-3 noScrollBar">
                                    <table class="table table-borderless info-table text-sm ">
                                        <tr>
                                            <td><strong>Place of Birth:</strong></td>
                                            <td id="infoAddress">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Contact Number:</strong></td>
                                            <td id="infoResponse">-</td>
                                        </tr>
                                        <tr>
                                            <td><strong>School Year:</strong></td>
                                            <td id="infoSchoolYear">2024-2025</td>
                                        </tr>
                                        
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs for detailed information -->
            <div class="card" style="box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);">
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
                        <!-- Attendance Tab -->
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
                                    <!-- Will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Grades Tab -->
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
                                    <!-- Will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>

                        <!-- Health Records Tab -->
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
                                                    <!-- Will be populated by JavaScript -->
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
                                            <!-- Will be populated by JavaScript -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Behavior Tab -->
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
                                    <!-- Will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
    const attendanceData = [
        { date: "2024-11-25", status: "Present", timeIn: "7:30 AM", timeOut: "4:00 PM", remarks: "" },
        { date: "2024-11-24", status: "Present", timeIn: "7:35 AM", timeOut: "4:00 PM", remarks: "Late arrival" },
        { date: "2024-11-23", status: "Absent", timeIn: "-", timeOut: "-", remarks: "Sick" },
        { date: "2024-11-22", status: "Present", timeIn: "7:30 AM", timeOut: "4:00 PM", remarks: "" },
        { date: "2024-11-21", status: "Present", timeIn: "7:25 AM", timeOut: "4:00 PM", remarks: "" }
    ];

    const gradesData = [
        { subject: "Mathematics", q1: 88, q2: 90, q3: 85, q4: 92, final: 89, remarks: "Passed" },
        { subject: "English", q1: 90, q2: 88, q3: 92, q4: 89, final: 90, remarks: "Passed" },
        { subject: "Science", q1: 85, q2: 87, q3: 88, q4: 90, final: 88, remarks: "Passed" },
        { subject: "Filipino", q1: 89, q2: 91, q3: 87, q4: 88, final: 89, remarks: "Passed" },
        { subject: "Social Studies", q1: 92, q2: 89, q3: 90, q4: 91, final: 91, remarks: "Passed" }
    ];

    const immunizationData = [
        { vaccine: "BCG", dateGiven: "2014-04-01", nextDue: "Complete", status: "Complete" },
        { vaccine: "DPT", dateGiven: "2024-08-15", nextDue: "2025-08-15", status: "Up to date" },
        { vaccine: "Measles", dateGiven: "2024-07-10", nextDue: "Complete", status: "Complete" },
        { vaccine: "Polio", dateGiven: "2024-06-05", nextDue: "Complete", status: "Complete" }
    ];

    const healthRecordsData = [
        {
            date: "2024-09-15",
            type: "Annual Physical",
            findings: "Normal growth and development",
            recommendations: "Continue healthy diet and exercise",
            officer: "Dr. Jane Smith"
        },
        {
            date: "2024-06-10",
            type: "Dental Check-up",
            findings: "Good oral health",
            recommendations: "Regular brushing and flossing",
            officer: "Dr. Mark Johnson"
        }
    ];

    const behaviorRecordsData = [
        {
            date: "2024-11-20",
            type: "Commendation",
            description: "Helped classmate with homework",
            action: "Recognized in class",
            reportedBy: "Ms. Garcia"
        },
        {
            date: "2024-11-15",
            type: "Warning",
            description: "Talking during class",
            action: "Verbal warning given",
            reportedBy: "Ms. Garcia"
        }
    ];


    

     const data = sessionStorage.getItem('teacher_id');
    function displayStudentInfo() {
       
 

        $.ajax({
            url: base_url + "/authentication/action.php?action=getTeacher",
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 1) {
                    const datas = response.data;

                    datas.forEach(emp => {
                        if (emp.teacher_id == data) {
                            if (emp.teacher_picture) {
                                $('img[alt="Student Photo"]').attr('src', '../../authentication/'+ emp.teacher_picture);
                            } else {
                                $('img[alt="Student Photo"]').attr('src', '../../assets/image/users.jpg');
                            }

                            $('#studentName').text(emp.teacher_name);
                            $('#studentLRN').text(`Employee ID: ${emp.employeeid}`);
                            $('#infoName').text(emp.teacher_name);
                            $('#infoBirthdate').text(formatDate(emp.birth));
                            $('#infoAge').text(calculateAge(emp.birth) + ' years old');
                            $('#infoGender').text(emp.gender ?? 'N/A');
                            $('#infoAddress').text(emp.birth_place ?? 'Not Provided');
                            $('#infoResponse').text(emp.cpno ?? 'Not Provided' );
                            $('#infoEmergency').text(emp.parent_contact ?? 'Not Available');
                            $('#studentStatus').text(emp.teacher_status) ?? 'Not Available';
                            
                        }
                    });


                } else {
                    Swal.fire("Error", response.message, "error");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                Swal.fire("Error", "Unable to fetch data from server.", "error");
            }
        });


        populateAttendanceTab();
        populateGradesTab();
        populateHealthTab();
        populateBehaviorTab();

        $('#studentProfileSection').show();
        $('#noChildMessage').hide();
    }
    
    
    
    $('#backPreviewPage').click(function () {
        sessionStorage.clear();
        sessionStorage.removeItem('teacher_id');
        location.href = 'index.php?page=contents/classroom';
    });


    function calculateAge(birthdate) {
        const today = new Date();
        const birth = new Date(birthdate);
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();

        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }

        return age;
    }

    function formatDate(dateStr) {
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
    }

    function populateAttendanceTab() {
        const tbody = $('#attendanceRecords');
        tbody.html('');

        attendanceData.forEach(record => {
            const statusBadge = record.status === 'Present' ?
                '<span class="status-badge status-present">Present</span>' :
                '<span class="status-badge status-absent">Absent</span>';

            tbody.append(`
                <tr>
                    <td>${formatDate(record.date)}</td>
                    <td>${statusBadge}</td>
                    <td>${record.timeIn}</td>
                    <td>${record.timeOut}</td>
                    <td>${record.remarks}</td>
                </tr>
            `);
        });
    }

    function populateGradesTab() {
        const tbody = $('#gradesRecords');
        tbody.html('');

        gradesData.forEach(grade => {
            const remarksBadge = grade.final >= 75 ?
                '<span class="status-badge status-present">Passed</span>' :
                '<span class="status-badge status-absent">Failed</span>';

            tbody.append(`
                <tr>
                    <td>${grade.subject}</td>
                    <td class="grade-cell">${grade.q1}</td>
                    <td class="grade-cell">${grade.q2}</td>
                    <td class="grade-cell">${grade.q3}</td>
                    <td class="grade-cell">${grade.q4}</td>
                    <td class="grade-cell"><strong>${grade.final}</strong></td>
                    <td class="text-center">${remarksBadge}</td>
                </tr>
            `);
        });
    }

    function populateHealthTab() {
        // Immunization records
        const immunizationTbody = $('#immunizationRecords');
        immunizationTbody.html('');

        immunizationData.forEach(record => {
            const statusBadge = record.status === 'Complete' ?
                '<span class="status-badge status-present">Complete</span>' :
                '<span class="status-badge" style="background-color: #e8f4fd; color: #0c5460; border: 1px solid #b3d7ff;">Up to date</span>';

            immunizationTbody.append(`
                <tr>
                    <td>${record.vaccine}</td>
                    <td>${formatDate(record.dateGiven)}</td>
                    <td>${record.nextDue}</td>
                    <td>${statusBadge}</td>
                </tr>
            `);
        });

        // Health records
        const healthTbody = $('#healthRecords');
        healthTbody.html('');

        healthRecordsData.forEach(record => {
            healthTbody.append(`
                <tr>
                    <td>${formatDate(record.date)}</td>
                    <td>${record.type}</td>
                    <td>${record.findings}</td>
                    <td>${record.recommendations}</td>
                    <td>${record.officer}</td>
                </tr>
            `);
        });
    }

    function populateBehaviorTab() {
        const tbody = $('#behaviorRecords');
        tbody.html('');

        behaviorRecordsData.forEach(record => {
            const typeBadge = record.type === 'Commendation' ?
                '<span class="status-badge status-present">Commendation</span>' :
                '<span class="status-badge status-late">Warning</span>';

            tbody.append(`
                <tr>
                    <td>${formatDate(record.date)}</td>
                    <td>${typeBadge}</td>
                    <td>${record.description}</td>
                    <td>${record.action}</td>
                    <td>${record.reportedBy}</td>
                </tr>
            `);
        });
    }
    
    
    $(document).ready(function () {
        displayStudentInfo();
    });
</script>