<style>
    .sidebar-list a.active {
        background-color: rgb(196, 196, 196);
        font-weight: bold;
        color: snow;
    }

    .sidebar-list a {
        font-weight: 500;
        padding:.5rem;
        border: 1px solid #ddd;
    }
</style>

<nav id="sidebar" class="ms-2" style="border-radius:5px;">
    <div class="container-fluid b-1 " style="padding: 0px;">
        <div class="sidebar-list ">
            <a href="index.php?page=home" class="nav-item nav-home">
                <span class=""><i class=""></i></span> Dashboard
            </a>

            <a href="index.php?page=contents/student" class="nav-item nav-student">
                <span class=""><i class=""></i></span>My Students
            </a>
            <a href="index.php?page=contents/parent" class="nav-item nav-Parent">
                <span class=""><i class=""></i></span> Parents
            </a>
            <a href="index.php?page=contents/view" class="nav-item nav-view">
                <span class=""><i class=""></i></span> Views class
            </a>
            <a href="index.php?page=contents/attendance" class="nav-item nav-attendance">
                <span class=""><i class=""></i></span> Takes attendance
            </a>
            <a href="index.php?page=contents/health" class="nav-item nav-health">
                <span class=""><i class=""></i></span> Medical health
            </a>
            <a href="index.php?page=contents/schedule" class="nav-item nav-schedule">
                <span class=""><i class=""></i></span> My schedule
            </a>
            <a href="index.php?page=contents/enrolled" class="nav-item nav-enrolled">
                <span class=""><i class=""></i></span> Enrollment process
            </a>
            <a href="index.php?page=contents/generate" class="nav-item nav-generate 
            nav-sf1
            nav-sf2 
            nav-sf3
            nav-sf4
            nav-sf5
            nav-sf6
            nav-sf7
            nav-sf8
            nav-sf9
            nav-sf10
            nav-sf11
            nav-sf12">

                <span class=""><i class=""></i></span> Generate Data
            </a>
            <a href="index.php?page=contents/setting" class="nav-item nav-setting">
                <span class=""><i class=""></i></span> Account Settings
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