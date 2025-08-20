<?php
session_start();
if (!isset($_SESSION['parentData'])) {
  include 'eror.php';
  exit;
}



$parentData = $_SESSION['parentData']['firstname'] . ', ' . $_SESSION['parentData']['lastname'];
$parent_id = $_SESSION['parentData']['parent_id'];
?>
<style>
  .buttonHide{
    display: none;
    border: none !important;
    background: none !important;
    width: fit-content !important;
  }
    @media(max-width:576px) {
      .mediaNone{
        display: none !important;
      }
      .logoMedia{
        width: 45px !important; height: 45px !important;
      }
      .buttonHide{
        display: flex !important;
      }
      #logout{
        padding: 10px !important;
      }
      .navbar {
        padding: 10px !important;
      }
      /* #sidebar{
        transform: translateY(1rem) !important;
      } */
  }
</style>

<nav class="navbar mb-1 navbar-light bg-white m-0 w-100">
  <div class="container-fluid d-flex justify-content-between align-items-center p-0 m-0">

    <div class="d-flex align-items-center gap-1">
      <button class="buttonHide" id="burgerButton"><i class="burger fa-solid fa-bars fs-5"></i></button>
      <div class="avatar">
        <img src="../../assets/image/system_logo/<?php echo get_option('system_logo'); ?>" class="logoMedia" alt="logo">
      </div>
      <strong class="d-none text-danger d-lg-inline">Sta. Maria Elementary School - Parent Panel</strong>
      <strong class="d-lg-none" style="font-size: 13px;">Sta. Maria Elementary School</strong>
    </div>

    <ul class="navbar-nav d-flex flex-row align-items-center gap-3 mb-0">
      <li class="nav-item d-flex align-items-center gap-1 mediaNone">
        <i class="fas fa-user-shield"></i>
        <span><?php echo htmlspecialchars($parentData); ?></span>
      </li>
      <li class="nav-item">
        
      </li>
    </ul>

  </div>
</nav>


<script>
  var parent_id = '<?php echo $_SESSION['parentData']['parent_id']; ?>';
  $(document).ready(function () {
    $('html').css('scroll-behavior', 'smooth');
  });
</script>