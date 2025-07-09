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
        <a href="index.php?page=contents/teacher" class="nav-link nav-teacher nav-teacher_view d-flex align-items-center">
            <i class="fas fa-users me-2"></i> Teacher management
        </a>
        <a href="index.php?page=contents/student" class="nav-link nav-student d-flex align-items-center">
            <i class="fas fa-users me-2"></i> Student management
        </a>
        <a href="index.php?page=contents/users" class="nav-link nav-users d-flex align-items-center">
            <i class="fas fa-laptop me-2"></i>Users Accounts
        </a>
        <a href="index.php?page=contents/health" class="nav-link nav-health d-flex align-items-center">
            <i class="fas fa-heartbeat me-2"></i> Medical Health
        </a>
        <a href="index.php?page=contents/Classroom" class="nav-link nav-Classroom d-flex align-items-center">
            <i class="fas fa-building me-2"></i> School Classroom
        </a>
        <a href="index.php?page=contents/enrolled" class="nav-link nav-enrolled d-flex align-items-center">
            <i class="fas fa-user-plus me-2"></i> Enrollment
        </a>
        <a href="index.php?page=contents/record" class="nav-link nav-record  d-flex align-items-center">
            <i class="fas fa-database me-2"></i> Generate Data
        </a>
        <a href="index.php?page=contents/setting" class="nav-link nav-setting d-flex align-items-center">
            <i class="fas fa-cog me-2"></i> Setting Settings
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