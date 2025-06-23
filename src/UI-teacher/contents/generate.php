
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
            font-size: 30px;
            margin-bottom: 10px;
        }
    </style>

<div class="dashboard-admin">
    <header>
        <h3>Exporting Data Form</h3>
        <p>Welcome to Sta. Maria Central School - SY:2025-2026</p>
    </header>

    <section class="quick-actions">
        <h4>Quick Actions</h4>
        <div class="action-grid">
            <div class="action" id="student"><i class="fa fa-folder-open"></i><p>SF1</p></div>
            <div class="action" id="teacher"><i class="fa fa-folder-open"></i><p>SF2</p></div>
            <div class="action" id="parent"><i class="fa fa-folder-open"></i><p>SF3</p></div>
            <div class="action" id="classroom"><i class="fa fa-folder-open"></i><p>SF4</p></div>
            <div class="action" id="subject"><i class="fa fa-folder-open"></i><p>SF5</p></div>
            <div class="action" id="record"><i class="fa fa-folder-open"></i><p>SF6</p></div>
            
        </div>
    </section>
</div>

<script>
    $(document).ready(function () {
        $('#student').click(function () {
            //location.href = "index.php?page=contents/student";
            alert("Exporting success!");
        });

        $('#parent').click(function () {
            //location.href = "index.php?page=contents/parents";
            alert("Exporting success!");
        });

        $('#classroom').click(function () {
            //location.href = "index.php?page=contents/classroom";
            alert("Exporting success!");
        });

        $('#record').click(function () {
            //location.href = "index.php?page=contents/record";
            alert("Exporting success!");
        });

        $('#subject').click(function () {
            //location.href = "index.php?page=contents/subject";
            alert("Exporting success!");
        });

        $('#teacher').click(function () {
            //location.href = "index.php?page=contents/teacher";
            alert("Exporting success!");
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
