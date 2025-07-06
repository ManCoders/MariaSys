<style>
    .sidebar-list a.active {
        background-color: rgb(233, 233, 233);
        font-weight: bold;
        color: grey;
    }

    .sidebar-list a {
        font-weight: 500;
        padding:.5rem;
        border: 1px solid #ddd;
    }
</style>
<nav id="sidebar" class="bg-white border rounded p-3" style="min-width: 250px;">
    <div class="sidebar-list d-flex flex-column gap-2">
        <a href="index.php?page=home" class="nav-link nav-home d-flex align-items-center">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="index.php?page=contents/student" class="nav-link nav-student d-flex align-items-center">
            <i class="fas fa-user-graduate me-2"></i> My Students
        </a>
        <!-- <a href="index.php?page=contents/parent" class="nav-link nav-parent d-flex align-items-center">
            <i class="fas fa-users me-2"></i> Parents
        </a> -->
        <a href="index.php?page=contents/view" class="nav-link nav-view d-flex align-items-center">
            <i class="fas fa-eye me-2"></i> View Class
        </a>
        <a href="index.php?page=contents/attendance" class="nav-link nav-attendance d-flex align-items-center">
            <i class="fas fa-clipboard-check me-2"></i> Take Attendance
        </a>
        <a href="index.php?page=contents/health" class="nav-link nav-health d-flex align-items-center">
            <i class="fas fa-heartbeat me-2"></i> Medical Health
        </a>
        <a href="index.php?page=contents/schedule" class="nav-link nav-schedule d-flex align-items-center">
            <i class="fas fa-calendar-alt me-2"></i> My Schedule
        </a>
        <a href="index.php?page=contents/enrolled" class="nav-link nav-enrolled d-flex align-items-center">
            <i class="fas fa-user-plus me-2"></i> Enrollment Process
        </a>
        <a href="index.php?page=contents/generate" class="nav-link nav-generate nav-sf1 nav-sf2 nav-sf3 nav-sf4 nav-sf5 nav-sf6 nav-sf7 nav-sf8 nav-sf9 nav-sf10 nav-sf11 nav-sf12 d-flex align-items-center">
            <i class="fas fa-database me-2"></i> Generate Data
        </a>
        <a href="index.php?page=contents/setting" class="nav-link nav-setting d-flex align-items-center">
            <i class="fas fa-cog me-2"></i> Account Settings
        </a>
    </div>
</nav>

<script>
    const page = '<?php echo isset($_GET["page"]) ? $_GET["page"] : "home"; ?>';
    const slug = page.split('/').pop(); // Get only the last part like 'teacher'
    const navItem = document.querySelector('.nav-' + slug);
    if (navItem) {
        navItem.classList.add('active');
    }
</script>