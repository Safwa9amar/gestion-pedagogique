<?php
// check if language is set and back referer is set
if (isset($_GET['lang']) && isset($_SERVER['HTTP_REFERER'])) {
  // set language
  $_SESSION['lang'] = $_GET['lang'];
  // redirect to back referer
  header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>

<div style="
    display: flex;
    width: 100%;
    justify-content: space-between;
" class="header">
  <div class="header-left active">
    <a href="./" class="logo">
      <img src="https://via.placeholder.com/350x150" alt="" />
    </a>
    <a href="index.html" class="logo-small">
      <img src="https://via.placeholder.com/350x150" alt="" />

    </a>
    <a id="toggle_btn" href="javascript:void(0);"> </a>
  </div>
  <a id="mobile_btn" class="mobile_btn" href="#sidebar">
    <span class="bar-icon">
      <span></span>
      <span></span>
      <span></span>
    </span>
  </a>
  <ul class="nav user-menu">
    <li class="nav-item dropdown has-arrow flag-nav">
      <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="javascript:void(0);" role="button"
        aria-expanded="false">
        <?php if ($_SESSION['lang'] == 'ar'): ?>
          <img src="assets/img/flags/ar.ico" alt="" height="20">
        <?php else: ?>
          <img src="assets/img/flags/fr.ico" alt="" height="20">
        <?php endif; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="?lang=ar" class="dropdown-item">
          <img src="assets/img/flags/ar.ico" alt="" height="16"> Arabe
        </a>
        <a href="?lang=fr" class="dropdown-item">
          <img src="assets/img/flags/fr.ico" alt="" height="16"> Français
        </a>
      </div>
    </li>
    <li class="nav-item dropdown has-arrow main-drop">
      <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-img">
          <img src="https://via.placeholder.com/100x100" alt="" />
          <span class="status online"></span></span>
      </a>


      <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
          <div class="profileset">
            <span class="user-img">
              <img src="https://via.placeholder.com/35x15" alt="" />

              <span class="status online"></span></span>
            <div class="profilesets">
              <h6>John Doe</h6>
              <h5>Admin</h5>
            </div>
          </div>
          <hr class="m-0" />
          <a class="dropdown-item" href="?page=profile">
            <i class="me-2" data-feather="user"></i> My Profile</a>
          <!-- <a class="dropdown-item" href="?page=settings"
            ><i class="me-2" data-feather="settings"></i>Settings</a
          > -->
          <hr class="m-0" />
          <a class="dropdown-item logout pb-0" href="?logout"><img src="assets/img/icons/log-out.svg" class="me-2"
              alt="img" />
            <?php echo $lang['logout'] ?>
          </a>
        </div>
      </div>
    </li>

  </ul>
  <!-- lang -->

  <div class="dropdown mobile-user-menu">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i
        class="fa fa-ellipsis-v"></i></a>
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="?page=profile">My Profile</a>
      <a class="dropdown-item" href="?page=settings">Settings</a>
      <a class="dropdown-item" href="?logout">Logout</a>
    </div>
  </div>
</div>
<?php
ob_start(); // Turn on output buffering