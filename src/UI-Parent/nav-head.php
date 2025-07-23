<?php
session_start();
if (!isset($_SESSION['parentData'])) {
    include 'eror.php';
    exit;
}

$parentData = $_SESSION['parentData']['lastname'];
?>

<style>
  :root {
    --primary-color: #2c3e50;
    --primary-dark: #1a252f;
    --white: #ffffff;
    --light-gray: #f8f9fa;
    --gray-border: #e9ecef;
    --success-color: #28a745;
    --danger-color: #dc3545;
  }

  .navbar {
    background: var(--white);
    border-bottom: 1px solid var(--gray-border);
    padding: 12px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    position: sticky;
    top: 0;
    z-index: 1000;

    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

  }

  .nav-brand {
    font-size: 1.2rem;
    color: var(--primary-color);
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
  }

  .nav-brand i {
    color: var(--success-color);
  }

  .nav-menu {
    list-style: none;
    display: flex;
    gap: 12px;
    margin: 0;
    padding: 0;
    align-items: center;
  }

  .admin-info {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--primary-dark);
    font-weight: 500;
    padding: 6px 12px;
    border-radius: 8px;
    background: var(--light-gray);
  }

  .admin-info:hover {
    background: #e8f4f8;
    transform: translateY(-1px);
  }

  .nav-menu li a {
    text-decoration: none;
    color: var(--primary-dark);
    background: var(--light-gray);
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 0.95rem;
    font-weight: 500;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .nav-menu li a:hover {
    background: #e8f5e9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
  }

  .nav-menu li a.profile {
    background: #e3f2fd;
    color: #1976d2;
  }

  .nav-menu li a.profile:hover {
    background: #bbdefb;
  }

  .nav-menu li a.logout {
    background: #ffebee;
    color: #c62828;
  }

  .nav-menu li a.logout:hover {
    background: #ffcdd2;
    transform: translateY(-2px);
  }

  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    right: 0;
    background-color: var(--white);
    min-width: 200px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
    z-index: 1001;
    border: 1px solid var(--gray-border);
  }



  .dropdown-content a {
    color: var(--primary-dark);
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }

  .dropdown-content a:hover {
    background-color: var(--light-gray);
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  /* Responsive design */
  @media (max-width: 768px) {
    .navbar {
      padding: 8px 16px;
    }

    .nav-brand {
      font-size: 1rem;
    }

    .nav-menu {
      flex-direction: row;
      gap: 8px;
    }

    .admin-info {
      display: none;
    }

    .nav-menu li a {
      padding: 6px 10px;
      font-size: 0.85rem;
    }
    .mediaFlex{
        display: flex !important;
    }
    .mediaNone{
        display: none !important;
    }
    .mediaMargin{
      margin: 0 !important;
      padding: .5rem !important;
    }
    .mediaPadding{
      padding: .2rem !important;
    }
  }

  @media (max-width: 480px) {
    .nav-menu {
      flex-direction: column;
      gap: 4px;
      align-items: flex-end;
    }
  }
</style>

<nav class="navbar mx-2 mediaMargin">
 <div class="nav-brand col-md-7 col-7">
    <i class="fa-solid fa-bars mediaFlex" style="display: none; font-size: 17px !important;" id="burgerButton"></i>
    <i class="fas fa-graduation-cap mediaNone"></i>
    <strong class="mediaNone">Sta. Maria Elementary School - Parent Panel</strong>
    <strong class="mediaFlex p-0 m-0" style="display: none; font-size: 13px !important;">Sta. Maria Elementary School</strong>
  </div>

  <div class="d-flex align-items-center gap-3 col-md-5 col-5">
    <!-- Navigation Menu -->
    <ul class="nav-menu mediaPadding col-md-12 col-12 d-flex flex-row justify-content-end">
       <div class="admin-info mediaPadding">
        <i class="fas fa-user-shield"></i>
        <span><?php echo htmlspecialchars($parentData); ?></span>
      </div>
      <li class="dropdown">
        <a href="#" class="profile mediaPadding col-md-12 col-12">
          <i class="fas fa-user-cog"></i>
          <span>Profile</span>
        </a>
        <div class="dropdown-content">
          <a href="index.php?page=contents/setting">
            <i class="fas fa-cog"></i> Settings
          </a>
          <a href="#">
            <i class="fas fa-user-edit"></i> Edit Profile
          </a>
          <a href="#">
            <i class="fas fa-key"></i> Change Password
          </a>
        </div>
      </li>

      <li>
        <a id="logout" class="logout mediaPadding col-md-12 col-12" style="cursor: pointer;">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>
  </div>
</nav>

<script>
  $(document).ready(function () {
    $('html').css('scroll-behavior', 'smooth');
  });
</script>