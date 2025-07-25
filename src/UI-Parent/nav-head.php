<?php
session_start();
if (!isset($_SESSION['parentData'])) {
  include 'eror.php';
  exit;
}

$parentData = $_SESSION['parentData']['lastname'];
?>


<nav class="navbar mb-1 navbar-light bg-white m-0 w-100">
  <div class="container-fluid d-flex justify-content-between align-items-center p-0 m-0">

    <div class="d-flex align-items-center gap-2">
      <div class="avatar">
        <img src="../../assets/image/system_logo/<?php echo get_option('system_logo'); ?>" alt="logo">
      </div>
      <strong class="d-none text-danger d-lg-inline">Sta. Maria Elementary School - Parent Panel</strong>
      <strong class="d-lg-none" style="font-size: 13px;">Sta. Maria Elementary School</strong>
    </div>

    <ul class="navbar-nav d-flex flex-row align-items-center gap-3 mb-0">
      <li class="nav-item d-flex align-items-center gap-1">
        <i class="fas fa-user-shield"></i>
        <span><?php echo htmlspecialchars($parentData); ?></span>
      </li>
      <li class="nav-item">
        <a id="logout" class="nav-link text-danger" style="cursor: pointer;">
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