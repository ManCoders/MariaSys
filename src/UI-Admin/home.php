
    <style>
        
        .dashboard-admin {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        header {
            text-align: center;
            margin-bottom: 30px;
        }

        .stats-admin {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-admin {
            background: white;
            padding: 20px;
            flex: 2;
            text-align: center;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            min-width: 150px;
            font-size: 20px;
        }

        .card-admin i {
            font-size: 20px;
            display: block;
            margin-bottom: 10px;
        }

        .card-admin span {
            display: block;
            margin-top: 5px;
            font-size: 14px;
            color: #555;
        }

        .quick-actions h4,
        .attendance-overview h4 {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        .action-grid {
            display: flex;
            justify-content: space-around;
            gap: 15px;
            flex-wrap: wrap;
        }

        .action {
            background: white;
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            flex: 1 1 150px;
            cursor: pointer;
            transition: 0.3s;
            border: 1px solid #888;
        }

        .action:hover {
            background-color: #eef;
        }

        .action i {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .overview-grid {
            display: flex;
            justify-content: space-around;
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            font-size: 18px;
        }

        .recent-activities ul {
            list-style: none;
            padding: 0;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .recent-activities li {
            border-bottom: 1px solid #eee;
            padding: 10px 0;
        }

        .recent-activities span {
            float: right;
            font-size: 12px;
            color: #888;
        }
    </style>

<div class="dashboard-admin">
    <header>
        <h3>Admin Dashboard</h3>
        <p>Welcome to Sta. Maria Central School - SY:2025-2026</p>
    </header>

    <section class="stats-admin">
        <div class="card-admin"><i class="fa fa-users"></i><span id="totalStudents">0</span><span>Total Students</span></div>
        <div class="card-admin"><i class="fa fa-chalkboard-teacher"></i><span id="totalTeachers">0</span><span>Total Teachers</span></div>
        <div class="card-admin"><i class="fa fa-calendar-check"></i><span id="attendanceToday">0</span><span>Attendance Today</span></div>
        <div class="card-admin"><i class="fa fa-user-friends"></i><span id="totalParents">0</span><span>Total Parents</span></div>
    </section>
    <section class="attendance-overview">
        <h4>Today's Attendance Overview</h4>
        <div class="overview-grid">
            <div>Present<br><strong id="presentToday">0</strong></div>
            <div>Absent<br><strong id="absentToday">0</strong></div>
            <div>Attendance Rate<br><strong id="attendanceRate">0%</strong></div>

        </div>
    </section>

    <section class="quick-actions">
        <h4>Quick Actions</h4>
        <div class="action-grid">
            <div class="action" id="student"><i class="fa fa-user-graduate"></i><p>Students</p></div>
            <div class="action" id="teacher"><i class="fa fa-user-tie"></i><p>Teachers</p></div>
            <div class="action" id="parent"><i class="fa fa-users"></i><p>Parents</p></div>
            <div class="action" id="classroom"><i class="fa fa-school"></i><p>Classroom</p></div>
            <div class="action" id="subject"><i class="fa fa-notes-medical"></i><p>Subjects</p></div>
            <div class="action" id="record"><i class="fa fa-chart-line"></i><p>Documents</p></div>
            
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $('#student').click(function () {
            location.href = "index.php?page=contents/student";
        });

        $('#parent').click(function () {
            location.href = "index.php?page=contents/parents";
        });

        $('#classroom').click(function () {
            location.href = "index.php?page=contents/classroom";
        });

        $('#record').click(function () {
            location.href = "index.php?page=contents/record";
        });

        $('#subject').click(function () {
            location.href = "index.php?page=contents/subject";
        });

        $('#teacher').click(function () {
            location.href = "index.php?page=contents/teacher";
        });
    });
</script>

<script>
    // Sample Data
    const dashboardData = {
        totalStudents: 249,
        totalTeachers: 15,
        totalParents: 402,
        attendanceToday: 498,
        presentToday: 498,
        absentToday: 25
    };

    function updateDashboard() {
        document.getElementById("totalStudents").textContent = dashboardData.totalStudents;
        document.getElementById("totalTeachers").textContent = dashboardData.totalTeachers;
        document.getElementById("attendanceToday").textContent = dashboardData.attendanceToday;
        document.getElementById("totalParents").textContent = dashboardData.totalParents;

        document.getElementById("presentToday").textContent = dashboardData.presentToday;
        document.getElementById("absentToday").textContent = dashboardData.absentToday;

        const rate = ((dashboardData.presentToday / (dashboardData.presentToday + dashboardData.absentToday)) * 100).toFixed(1);
        document.getElementById("attendanceRate").textContent = `${rate}%`;
    }

    document.addEventListener("DOMContentLoaded", updateDashboard);
</script>
