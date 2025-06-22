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
            <a href="index.php?page=contents/enrollment" class="nav-item nav-enrollment">
                <span class=""><i class=""></i></span> Enrollment
            </a>
            <a href="index.php?page=contents/student" class="nav-item nav-student">
                <span class=""><i class=""></i></span> Students View
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
