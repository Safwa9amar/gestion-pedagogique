<?php
$view = $_GET['view'] ?? '';
$sub_view = $_GET['sub_view'] ?? '';

$side_menu = array(

  'orientation' =>
  array(
    'title' => $app_lang['orientation'],
    'icon' => 'product.svg',
    'link' => '#',
    'sub_menu' => array(
      'list_aprentis' => array(
        'title' =>
        $app_lang['list_aprentis'],
        'link' =>
        '?view=orientation&sub_view=list_aprentis'
      ),
      'add_aprentis' => array(
        'title' =>
        $app_lang['add_aprentis'],
        'link' =>
        '?view=orientation&sub_view=add_aprentis'
      ),
      'add_formateur' => array(
        'title' =>
        $app_lang['add_formateur'],
        'link' =>
        '?view=orientation&sub_view=add_formateur'
      ),
      'list_formateur' => array(
        'title' =>
        $app_lang['list_formateur'],
        'link' =>
        '?view=orientation&sub_view=list_formateur'
      ),

    )
  ),
  'formations' =>
  array(
    'title' => $app_lang['formations'],
    'icon' => 'product.svg',
    'link' => '#',
    'sub_menu' => array(
      // branch et specialite
      'branch_et_specialite' => array(
        'title' =>
        $app_lang['branch_et_specialite'],
        'link' =>
        '?view=formations&sub_view=branch_et_specialite'
      ),
      // 'impression_des_formulaires' => array(
      //   'title' =>
      //   $app_lang['impression_des_formulaires'],
      //   'link' =>
      //   '?view=formations&sub_view=impression_des_formulaires'
      // ),
      // open section
      'open_section' => array(
        'title' =>
        $app_lang['open_section'],
        'link' =>
        '?view=formations&sub_view=open_section'
      ),
      'show_section' => array(
        'title' =>
        $app_lang['show_section'],
        'link' =>
        '?view=formations&sub_view=show_section'
      ),

    )
  ),
  // 'settings' =>
  // array(
  //   'title' => $app_lang['settings'],
  //   'icon' => 'product.svg',
  //   'link' => '#',
  //   'sub_menu' => array(

  //     'settings' => array(
  //       'title' =>
  //       $app_lang['settings'],
  //       'link' =>
  //       '?view=settings&sub_view=settings'
  //     ),
  //   )
  // ),

); ?>

<nav class="navbar sidebar bg-white  <?php echo $_SESSION['lang'] == 'ar' ? 'fixed-right' : 'fixed-left' ?>">
  <div id="sidebar-menu" class="sidebar-menu">
    <div class="">
      <a href="./" class="logo">
        <img src="<?php echo ICONS . '/MFEP.gif' ?>" alt="" />
      </a>


    </div>
    <ul class="navbar-nav">
      <li>
        <a class="<?php echo $view == '' ? 'active' : '' ?>" href="./"><img src="<?php echo ICONS ?>/dashboard.svg"
            alt="img" /><span>
            <?php echo $app_lang['dashboard'] ?>
          </span>
        </a>
      </li>
      <?php
      foreach ($side_menu as $key => $value) {
        if (count($value['sub_menu']) > 0) { ?>
          <li class="submenu">
            <a class=" <?php echo $view == $key ? 'active' : '' ?>" href="<?php echo $value['link'] ?>">
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
            <ul>
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
      <li>
        <a href="../app/components/guide.xlsm" download>

          <span>
            <?php echo $app_lang['guide_nom'] ?>
          </span>
        </a>
      </li>
    </ul>

  </div>


</nav>