
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
            <div class="action" id="SF1"><i class="fa fa-folder-open"></i><p>SF1</p></div>
            <div class="action" id="SF2"><i class="fa fa-folder-open"></i><p>SF2</p></div>
            <div class="action" id="SF3"><i class="fa fa-folder-open"></i><p>SF3</p></div>
            <div class="action" id="SF4"><i class="fa fa-folder-open"></i><p>SF4</p></div>
            <div class="action" id="SF5"><i class="fa fa-folder-open"></i><p>SF5</p><span style="font-size: .8rem;">Promotion and Learning achievement Report</span></div>
            <div class="action" id="SF6"><i class="fa fa-folder-open"></i><p>SF6</p></div>
            <div class="action" id="SF7"><i class="fa fa-folder-open"></i><p>SF7</p></div>
            <div class="action" id="SF8"><i class="fa fa-folder-open"></i><p>SF8</p></div>
            <div class="action" id="SF9"><i class="fa fa-folder-open"></i><p>SF9</p><span style="font-size: .8rem;">School Record Card</span></div>
            <div class="action" id="SF10"><i class="fa fa-folder-open"></i><p>SF10</p><span style="font-size: .8rem;">Learners Permanent record</span></div>
            <div class="action" id="SF11"><i class="fa fa-folder-open"></i><p>SF11</p></div>
            <div class="action" id="SF12"><i class="fa fa-folder-open"></i><p>SF12</p></div>
        </div>
    </section>

    
</div>

<script>
    $(document).ready(function () {
        $('#SF1').click(function () {
             location.href = "index.php?page=contents/sf/sf1";
        });

        $('#SF2').click(function () {
             location.href = "index.php?page=contents/sf/sf2";
        });

        $('#SF3').click(function () {
            location.href = "index.php?page=contents/sf/sf3";
        });

        $('#SF4').click(function () {
            location.href = "index.php?page=contents/sf/sf4";
        });

        $('#SF5').click(function () {
            location.href = "index.php?page=contents/sf/sf5";
        });
        $('#SF6').click(function () {
            location.href = "index.php?page=contents/sf/sf6";
        });

        $('#SF7').click(function () {
             location.href = "index.php?page=contents/sf/sf7";
        });
        $('#SF8').click(function () {
            location.href = "index.php?page=contents/sf/sf8";
        });
        $('#SF9').click(function () {
             location.href = "index.php?page=contents/sf/sf9";
        });
        $('#SF10').click(function () {
            location.href = "index.php?page=contents/sf/sf10";
            //alert("Exporting success!");
        });
        $('#SF11').click(function () {
           location.href = "index.php?page=contents/sf/sf11";
        });
        $('#SF12').click(function () {
            location.href = "index.php?page=contents/sf/sf12";
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
