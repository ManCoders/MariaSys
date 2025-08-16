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