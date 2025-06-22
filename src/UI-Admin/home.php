
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
        <div class="card-admin"><i class="fa fa-users"></i> 249 <span>Total Students</span></div>
        <div class="card-admin"><i class="fa fa-chalkboard-teacher"></i> 15 <span>Total Teachers</span></div>
        <div class="card-admin"><i class="fa fa-calendar-check"></i> 498 <span>Attendance Today</span></div>
        <div class="card-admin"><i class="fa fa-user-friends"></i> 402 <span>Total Parents</span></div>
    </section>

    <section class="quick-actions">
        <h4>Quick Actions</h4>
        <div class="action-grid">
            <div class="action"><i class="fa fa-user-graduate"></i><p>Students</p></div>
            <div class="action"><i class="fa fa-user-tie"></i><p>Teachers</p></div>
            <div class="action"><i class="fa fa-calendar-alt"></i><p>Attendance</p></div>
            <div class="action"><i class="fa fa-notes-medical"></i><p>Health Records</p></div>
            <div class="action"><i class="fa fa-chart-line"></i><p>Reports</p></div>
            <div class="action"><i class="fa fa-users"></i><p>Parents</p></div>
        </div>
    </section>

    <section class="attendance-overview">
        <h4>Today's Attendance Overview</h4>
        <div class="overview-grid">
            <div>Present<br><strong>498</strong></div>
            <div>Absent<br><strong>25</strong></div>
            <div>Attendance Rate<br><strong>95.2%</strong></div>
        </div>
    </section>

    <!-- <section class="recent-activities">
        <h2>Recent Activities</h2>
        <ul>
            <li><strong>New Student Enrolled</strong><br>John Doe enrolled in Grade 3-A <span>10 minutes ago</span></li>
            <li><strong>Attendance Updated</strong><br>Teacher Maria updated attendance for Grade 5-B <span>25 minutes ago</span></li>
            <li><strong>Health Records Updated</strong><br>Medical records updated for 15 students in Grade 2 <span>1 hour ago</span></li>
            <li><strong>System Maintenance</strong><br><span>2 hours ago</span></li>
        </ul>
    </section> -->
</div>
