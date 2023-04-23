<?php
$view = $_GET['view'] ?? '';
$sub_view = $_GET['sub_view'] ?? '';

$side_menu = array(

  'orientation' =>
  array(
    'title' => $lang['orientation'],
    'icon' => 'product.svg',
    'link' => '#',
    'sub_menu' => array(
      'add_aprentis' => array(
        'title' =>
        $lang['add_aprentis'],
        'link' =>
        '?view=orientation&sub_view=add_aprentis'
      ),
      'impression_des_formulaires' => array(
        'title' =>
        $lang['impression_des_formulaires'],
        'link' =>
        '?view=orientation&sub_view=impression_des_formulaires'
      ),
    )
  ),
  'formations' =>
  array(
    'title' => $lang['formations'],
    'icon' => 'product.svg',
    'link' => '#',
    'sub_menu' => array(
      'inscriptions_des_demandeurs' => array(
        'title' =>
        $lang['inscriptions_des_demandeurs'],
        'link' =>
        '?view=produits&sub_view=add_product'
      ),
     
    )
  ),
  
); ?>
<div style="<?php
if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'ar') {
  echo 'right: 0;';
} ?>
" class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li>
          <a href="./"><img src="<?php echo ICONS ?>/dashboard.svg" alt="img" /><span>
              <?php echo $lang['dashboard'] ?>
            </span>
          </a>
        </li>
        <?php
        foreach ($side_menu as $key => $value) {
          if (count($value['sub_menu']) > 0) { ?>
            <li class="submenu">
              <a class="<?php echo $view == $key ? 'active' : '' ?>" href="<?php echo $value['link'] ?>">
                <img style="margin-left: 10px;" src="<?php echo ICONS ?>/<?php echo $value['icon'] ?>" alt="img" />
                <span>
                  <?php echo $value['title'] ?>
                </span>
                <?php
                // check lang
                if (isset($_SESSION['lang']) && $_SESSION['lang'] == 'fr') {
                  echo '<span class="menu-arrow"></span>';
                }
                ?>
              </a>
              <ul style="display: none">
                <?php
                foreach ($value['sub_menu'] as $sub_key => $sub_value) { ?>
                  <li>
                    <a class="<?php echo $sub_view == $sub_key ? 'active' : '' ?>" href="<?php echo $sub_value['link'] ?>">
                      <?php echo $sub_value['title'] ?>
                    </a>
                  </li>
                  <?php
                }
                ?>
              </ul>
            </li>
            <?php
          }
        }
        ?>
      </ul>
    </div>
  </div>
</div>