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
    @media (max-width: 768px) {
        #sidebar{
            position: absolute !important;
            top: 2.7rem !important;
            transform: translateX(-50rem);
            background-color: #fefefe !important;
            z-index: 5 !important;
        }
    }
</style>
<nav id="sidebar" class=" border rounded p-3" style="min-width: 280px; background-color: #fff !important;">
    <div class="sidebar-list d-flex flex-column gap-2">
        <a href="index.php?page=home" class="nav-link nav-home d-flex align-items-center">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="index.php?page=contents/student" class="nav-link nav-student nav-view_learners     d-flex align-items-center">
            <i class="fas fa-chalkboard-teacher me-2"></i> Learners
        </a>
        
        <a href="index.php?page=contents/teacher" class="nav-link nav-teacher nav-profile_view d-flex align-items-center">
            <i class="fas fa-users me-2"></i> Accounts
        </a>
        
        <a href="index.php?page=contents/classroom" class="nav-link nav-classroom d-flex align-items-center">
            <i class="fas fa-school me-2"></i> Management
        </a>
        <!-- note: hindi naman talaga to kailangan meron nang teacher ata student management -->
        <!-- <a href="index.php?page=contents/users" class="nav-link nav-users d-flex align-items-center">
            <i class="fas fa-laptop me-2"></i>Users Accounts
        </a> -->
        <a href="index.php?page=contents/setting" class="nav-link nav-setting d-flex align-items-center">
            <i class="fas fa-cog me-2"></i> Setting
        </a>
        <a href="#" id="logout" class="nav-link d-flex align-items-center">
            <i class="fas fa-door-open me-2"></i> Log out
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