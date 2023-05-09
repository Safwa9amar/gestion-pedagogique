<?php
// check if language is set and back referer is set
if (isset($_GET['lang']) && isset($_SERVER['HTTP_REFERER']) && $_SESSION['lang'] != $_GET['lang']) {
  // remove lang from url
  header('Location: ' . $_SERVER['HTTP_REFERER']);}
  ?>
<div style="display: flex; width: 100%; justify-content: space-between;" class="header ">
  <div class="header-left active">
    <a href="./" class="logo">
      <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/7a3ec529632909.55fc107b84b8c.png" alt="" />
    </a>
    <a href="index.html" class="logo-small">
      <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/7a3ec529632909.55fc107b84b8c.png" alt="" />

    </a>
  
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
          <img src="<?php echo IMG ?>/flags/ar.ico" alt="" height="20">
        <?php else: ?>
          <img src="<?php echo IMG ?>/flags/fr.ico" alt="" height="20">
        <?php endif; ?>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="?lang=ar" class="dropdown-item">
          <img src="<?php echo IMG ?>/flags/ar.ico" alt="" height="16"> Arabe
        </a>
        <a href="?lang=fr" class="dropdown-item">
          <img src="<?php echo IMG ?>/flags/fr.ico" alt="" height="16">Français</a>
      </div>
    </li>
    <li class="nav-item dropdown has-arrow main-drop">
      <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
        <span class="user-img">
          <img src="https://cdn-icons-png.flaticon.com/512/666/666201.png" alt="" />
          <span class="status online"></span></span>
      </a>


      <div class="dropdown-menu menu-drop-user">
        <div class="profilename">
       
          <hr class="m-0" />
          <a class="dropdown-item" href="?page=profile">
            <i class="me-2" data-feather="user"></i> My Profile</a>
          <!-- <a class="dropdown-item" href="?page=settings"
            ><i class="me-2" data-feather="settings"></i>Settings</a
          > -->
          <hr class="m-0" />
          <a class="dropdown-item logout pb-0" href="?logout"><img src="<?php echo ICONS ?>/log-out.svg" class="me-2"
              alt="img" />
            <?php echo $app_lang['logout'] ?>
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