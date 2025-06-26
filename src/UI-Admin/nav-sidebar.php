<style>
    .sidebar-list a.active {
        background-color: rgb(196, 196, 196);
        font-weight: bold;
        color: snow;
    }
    .sidebar-list a{
        font-weight: 500;
    }
</style>

<nav id="sidebar" style="border-radius:5px;">
    <div class="container-fluid b-1 " style="padding: 0px;">
        <div class="sidebar-list ">
            <a href="index.php?page=home" class="nav-item nav-home">
                <span class=""><i class=""></i></span> Dashboard
            </a>
            <a href="index.php?page=contents/teacher" class="nav-item nav-teacher">
                <span class=""><i class=""></i></span> Teachers Management
            </a>
            <a href="index.php?page=contents/student" class="nav-item nav-student nav-student_view">
                <span class=""><i class=""></i></span> Students Management
            </a>
            <a href="index.php?page=contents/parents" class="nav-item nav-parents">
                <span class=""><i class=""></i></span> Parents Management
            </a>
            <a href="index.php?page=contents/classroom" class="nav-item nav-classroom">
                <span class=""><i class=""></i></span> ClassRoom
            </a>
            <a href="index.php?page=contents/Subject" class="nav-item nav-Subject">
                <span class=""><i class=""></i></span> Subjects
            </a>
            <a href="index.php?page=contents/record" class="nav-item nav-record">
                <span class=""><i class=""></i></span>Documents report
            </a>
            <a href="index.php?page=contents/setting" class="nav-item nav-setting">
                <span class=""><i class=""></i></span> System Settings
            </a>
        </div>
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
