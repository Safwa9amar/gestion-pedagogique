<?php
$page = $_GET['page'] ?? '';
$sub_page = $_GET['sub_page'] ?? '';
?>
<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="active">
          <a href="./"><img src="assets/img/icons/dashboard.svg" alt="img" /><span>
              <?php echo $lang['dashboard'] ?>
            </span>
          </a>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);">

            <!-- <img src="assets/img/icons/product.svg" alt="img" /> -->

            <span>
              <?php echo $lang['orientation'] ?>
            </span>
            <span class="menu-arrow"></span></a>
          <ul>

            <li>
              <a href="?page=produits&sub_page=add_product" class="<?php echo $sub_page == 'add_product' ? 'active' : '' ?>">
                <?php echo $lang['inscriptions_des_demandeurs'] ?>
              </a>
            </li>

          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);">

            <!-- <img src="assets/img/icons/product.svg" alt="img" /> -->

            <span>
              <?php echo $lang['formations'] ?>
            </span>
            <span class="menu-arrow"></span></a>
          <ul>

            <li>
              <a href="?page=produits&sub_page=add_product" class="<?php echo $sub_page == 'add_product' ? 'active' : '' ?>">Ajouter un produit</a>
            </li>

          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);">

            <!-- <img src="assets/img/icons/product.svg" alt="img" /> -->

            <span>
              <?php echo $lang['recherche'] ?>
            </span>
            <span class="menu-arrow"></span></a>
          <ul>

            <li>
              <a href="?page=produits&sub_page=add_product" class="<?php echo $sub_page == 'add_product' ? 'active' : '' ?>">Ajouter un produit</a>
            </li>

          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);">

            <!-- <img src="assets/img/icons/product.svg" alt="img" /> -->

            <span>
              <?php echo $lang['techniques'] ?>
            </span>
            <span class="menu-arrow"></span></a>
          <ul>

            <li>
              <a href="?page=produits&sub_page=add_product" class="<?php echo $sub_page == 'add_product' ? 'active' : '' ?>">Ajouter un produit</a>
            </li>

          </ul>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);">

            <!-- <img src="assets/img/icons/product.svg" alt="img" /> -->

            <span>
              <?php echo $lang['manifestations'] ?>
            </span>
            <span class="menu-arrow"></span></a>
          <ul>

            <li>
              <a href="?page=produits&sub_page=add_product" class="<?php echo $sub_page == 'add_product' ? 'active' : '' ?>">Ajouter un produit</a>
            </li>

          </ul>
        </li>

      </ul>
    </div>
  </div>
</div>