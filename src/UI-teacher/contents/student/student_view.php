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

    function populateAttendanceTab() {
        const tbody = $('#attendanceRecords');
        tbody.html('');

        // Sample data - replace with actual API call
        const attendanceData = [
            { date: "2024-11-25", status: "Present", timeIn: "7:30 AM", timeOut: "4:00 PM", remarks: "" },
            { date: "2024-11-24", status: "Present", timeIn: "7:35 AM", timeOut: "4:00 PM", remarks: "Late arrival" },
            { date: "2024-11-23", status: "Absent", timeIn: "-", timeOut: "-", remarks: "Sick" }
        ];

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

        // Update stats cards
        $('#attendancePresent').text(attendanceData.filter(a => a.status === 'Present').length);
        $('#attendanceAbsent').text(attendanceData.filter(a => a.status === 'Absent').length);
        $('#attendanceLate').text(attendanceData.filter(a => a.remarks.includes('Late')).length);
        $('#attendanceRate').text('94%');
    }

    function populateGradesTab() {
        const tbody = $('#gradesRecords');
        tbody.html('');

        // Sample data - replace with actual API call
        const gradesData = [
            { subject: "Mathematics", q1: 88, q2: 90, q3: 85, q4: 92, final: 89, remarks: "Passed" },
            { subject: "English", q1: 90, q2: 88, q3: 92, q4: 89, final: 90, remarks: "Passed" }
        ];

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

        // Update stats cards
        $('#overallGrade').text('88.5');
        $('#classRank').text('5');
        $('#totalSubjects').text(gradesData.length);
        $('#failingSubjects').text(gradesData.filter(g => g.final < 75).length);
    }

    function populateHealthTab() {
        // Immunization records
        const immunizationTbody = $('#immunizationRecords');
        immunizationTbody.html('');

        // Sample data - replace with actual API call
        const immunizationData = [
            { vaccine: "BCG", dateGiven: "2014-04-01", nextDue: "Complete", status: "Complete" },
            { vaccine: "DPT", dateGiven: "2024-08-15", nextDue: "2025-08-15", status: "Up to date" }
        ];

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

        // Sample data - replace with actual API call
        const healthRecordsData = [
            { date: "2024-09-15", type: "Annual Physical", findings: "Normal growth", recommendations: "Continue healthy diet", officer: "Dr. Smith" }
        ];

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

        // Sample data - replace with actual API call
        const behaviorRecordsData = [
            { date: "2024-11-20", type: "Commendation", description: "Helped classmate", action: "Recognized", reportedBy: "Ms. Garcia" },
            { date: "2024-11-15", type: "Warning", description: "Talking during class", action: "Verbal warning", reportedBy: "Ms. Garcia" }
        ];

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

        // Update stats cards
        $('#behaviorGood').text(behaviorRecordsData.filter(b => b.type === 'Commendation').length);
        $('#behaviorWarning').text(behaviorRecordsData.filter(b => b.type === 'Warning').length);
        $('#behaviorIncidents').text('0');
        $('#behaviorScore').text('95%');
    }

    function formatDate(dateStr) {
        if (!dateStr) return '-';
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    function showError(message) {
        console.error(message);
        $('#studentStatus').text('Error');
        $('.info-table td:nth-child(2)').text('-').css('color', '#dc3545');
    }
});
</script>