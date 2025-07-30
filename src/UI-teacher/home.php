    <style>
        .dashboard-admin {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            border-radius: 10px !important;
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
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
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
            margin-top: 20px;
            margin-bottom: 8px;
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
            gap: 5px;
            display: flex;
            justify-content: space-around;
            background: white;
            border-radius: 10px;
            padding: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            font-size: 18px;
        }

        .recent-activities ul {
            list-style: none;
            padding: 0;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
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

<div class="dashboard-admin rounded-2">
    <header>
        <h3>Teacher Dashboard</h3>
        <p>Welcome to Sta. Maria Central School - SY:2025-2026</p>
    </header>

    <section class="stats-admin">
        <div class="card-admin"><i class="fa fa-users"></i> 29 <span>Total Students</span></div>
        <div class="card-admin"><i class="fa fa-check"></i> 20 <span>Present today</span></div>
        <div class="card-admin"><i class="fa fa-x"></i> 9 <span>Absence Today</span></div>
        <div class="card-admin">70% <span>Attendance Rate</span></div>
    </section>

    <section class="quick-actions">
        <h4>Quick Actions</h4>
        <div class="action-grid">
            <div class="action" id="attendance"><i class="fa fa-user-tie"></i>
                <p>Take Attendance</p>
            </div>
            <div class="action" id="health"><i class="fa fa-notes-medical"></i>
                <p>Health Records</p>
            </div>
            <div class="action" id="enrolled"><i class="fa fa-chart-line"></i>
                <p>Enrollment</p>
            </div>
        </div>
    </section>

    <section class="attendance-overview">
        <h4>Class Overview</h4>
        <div class="overview-grid row g-3">

            <!-- Attendance Card with Tabs -->
            <div class="col-md-12">
                <div class="w-100">
                    <!-- Section Tabs -->
                    <ul class="nav nav-tabs nav-justified w-100" id="sectionTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="tab-sec1" data-bs-toggle="tab" data-bs-target="#sec1"
                                type="button" role="tab">Section 1</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-sec2" data-bs-toggle="tab" data-bs-target="#sec2"
                                type="button" role="tab">Section 2</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="tab-sec3" data-bs-toggle="tab" data-bs-target="#sec3"
                                type="button" role="tab">Section 3</button>
                        </li>
                    </ul>

                    <!-- Tab Content Per Section -->
                    <div class="tab-content pt-3" id="sectionTabsContent">
                        <!-- Section 1 -->
                        <div class="tab-pane fade show active" id="sec1" role="tabpanel" aria-labelledby="tab-sec1">
                            <div class="card p-3">
                                <p class="text-success">Present: 12 students</p>
                                <p class="text-danger">Absent: 3 students</p>
                            </div>
                        </div>

                        <!-- Section 2 -->
                        <div class="tab-pane fade" id="sec2" role="tabpanel" aria-labelledby="tab-sec2">
                            <div class="card p-3">
                                <p class="text-success">Present: 15 students</p>
                                <p class="text-danger">Absent: 2 students</p>
                            </div>
                        </div>

                        <!-- Section 3 -->
                        <div class="tab-pane fade" id="sec3" role="tabpanel" aria-labelledby="tab-sec3">
                            <div class="card p-3 d-flex">
                                <p class="text-success">Present: 10 students</p>
                                <p class="text-danger">Absent: 5 students</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>

<script>
    $(document).ready(function () {
        $('#student').click(function () {
            location.href = "index.php?page=contents/student";
        });

        $('#classroom').click(function () {
            location.href = "index.php?page=contents/classroom";
        });

        $('#attendance').click(function () {
            location.href = "index.php?page=contents/attendance";
        });

        $('#schedule').click(function () {
            location.href = "index.php?page=contents/schedule";
        });

        $('#health').click(function () {
            location.href = "index.php?page=contents/health";
        });

        $('#enrolled').click(function () {
            location.href = "index.php?page=contents/enrolled";
        });
    });
</script>
