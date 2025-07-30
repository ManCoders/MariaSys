<style>
    .sidebar-list a.active {
        background-color: rgb(233, 233, 233);
        font-weight: bold;
        color: grey;
    }

    .sidebar-list a {
        font-weight: 500;
        padding: .5rem;
        border: 1px solid #ddd;
    }
     @media (max-width: 768px) {
        #sidebar{
            position: absolute !important;
            top: 2.7rem !important;
            transform: translateX(-50rem);
            background-color: #fefefe !important;
            z-index: 5 !important;
            height: 100% !important;
        }
    }
</style>

<nav id="sidebar" class="bg-white border rounded p-3" style="min-width: 250px;">
    <div class="sidebar-list d-flex flex-column gap-2">
        <a href="index.php?page=home" class="nav-link nav-home d-flex align-items-center">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="index.php?page=contents/enrollment" class="nav-link nav-enrollment d-flex align-items-center">
            <i class="fas fa-user-plus me-2"></i> Enrollment
        </a>
        <a href="index.php?page=contents/feedback" class="nav-link nav-feedback d-flex align-items-center">
            <i class="fas fa-comment-alt me-2"></i> Feedback
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