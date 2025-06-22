<style>
    /* Sidebar Styling */
    #sidebar {
        border-radius: 20px 20px 20px 20px;
        color: #fff;
        min-height: 100vh;
        width: 230px;
        transition: all 0.3s ease-in-out;
        border-radius: 5px;

    }

    /* Sidebar for Small Screens */
    @media (max-width: 768px) {
        #sidebar {
            width: 100%;
            position: fixed;
            z-index: 1050;
            transform: translateX(-100%);
        }

        #sidebar.active {
            transform: translateX(0);
        }
    }

    .sidebar-list a {
        display: flex;
        align-items: left;
        padding: 8px 15px;
        color: #fff;
        text-decoration: none;
        font-weight: 300;
        transition: all 0.3s ease-in-out;
    }

    #sidebarToggleLeft,
    .sidebar-list a:hover {
        background-color:rgb(177, 177, 177);
        color: #fff;
        text-decoration: none;
    }

    .sidebar-list a.active {
        background-color:rgb(255, 255, 255);
        font-weight: bold;
        color: snow;
    }

    .sidebar-list {
        background-color:rgb(201, 200, 200);
        height: 100vh;
         border-radius: 2px;
    }

    .sidebar-list .icon-field {
        font-size: 1.2rem;
    }

    .collapse a {
        font-size: 0.9rem;
    }

    .collapse a:hover {
        background-color: rgb(177, 177, 177);
    }

    #sidebar::-webkit-scrollbar {
        width: 6px;
    }

</style>

<nav id="sidebar">
    <div class="container-fluid" style="padding: 0;">
        <div class="sidebar-list">
            <a href="index.php?page=home" class="nav-item nav-home">
                <span class="icon-field"><i class="fa fa-tachometer-alt"></i></span> Dashboard
            </a>
            <a href="index.php?page=management" class="nav-item nav-management">
                <span class="icon-field"><i class="fa fa-users"></i></span> Teacher Management
            </a>
            <a href="index.php?page=partnership" class="nav-item nav-partnership">
                <span class="icon-field"><i class="fa fa-building"></i></span>Students Management   
            </a>
            <a href="index.php?page=home" class="nav-item nav-home">
                <span class="icon-field"><i class="fa fa-tachometer-alt"></i></span> ClassRoom
            </a>
            <a href="index.php?page=management" class="nav-item nav-management">
                <span class="icon-field"><i class="fa fa-users"></i></span> Subjects 
            </a>
            <a href="index.php?page=partnership" class="nav-item nav-partnership">
                <span class="icon-field"><i class="fa fa-building"></i></span>Record   
            </a>
            <a href="index.php?page=site_settings" class="nav-item nav-site_settings">
                <span class="icon-field"><i class="fa fa-cogs"></i></span> System Settings
            </a>
        </div>
    </div>
</nav>

