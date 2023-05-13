<?php
$db = new DataBaseController();
$stagaire = $db->getAllRows("stagaires");
$formateurs = $db->getAllRows("formateurs");
$branches = $db->getAllRows("branches");
$specialities = $db->getAllRows("specialities");
$formulaires = $db->getAllRows("formulaires");
$sections = $db->getAllRows("sections");
$lang = new LanguageController();
$app_lang = $lang->app_lang;


?>

<div style="width:75vw;" class="content">
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget">
                <div class="dash-widgetimg">
                    <span><img src="<?php echo ICONS . '/student.png' ?>" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="<?php echo count($stagaire) ?>.0">1000</span></h5>
                    <h6>
                        <?php echo $app_lang['total_stagaire'] ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                    <span><img src="<?php echo ICONS . '/doctor.png' ?>" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="<?php echo count($formateurs) ?>">1000</span></h5>
                    <h6>
                        <?php echo $app_lang['total_formateur'] ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span><img src="<?php echo ICONS . '/branch.png' ?>" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="<?php echo count($sections) ?>">1000</span></h5>
                    <h6>
                        <?php echo $app_lang['total_section'] ?>
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash3">
                <div class="dash-widgetimg">
                    <span><img src="<?php echo ICONS . '/books.png' ?>" alt="img"></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters"
                            data-count="<?php echo count($specialities) + count($branches) ?>">1000</span></h5>
                    <h6>
                        <?php echo $app_lang['total_specialite'] ?>
                    </h6>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">
                        <?php echo $app_lang['recently_added_students'] ?>
                    </h4>
                    <div class="dropdown">
                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="dropset">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="?view=orientation&sub_view=list_aprentis" class="dropdown-item">
                                    <?php echo $app_lang['list_aprentis'] ?>
                                </a>
                            </li>
                            <li>
                                <a href="?view=orientation&sub_view=add_aprentis" class="dropdown-item">
                                    <?php echo $app_lang['add_aprentis'] ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive dataview">
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>
                                        <?php echo $app_lang['matricule'] ?>
                                    </th>
                                    <th>
                                        <?php echo $app_lang['nom_et_prenom'] ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stagaire = array_slice($stagaire, 0, 5);
                                foreach ($stagaire as $stagaire) { ?>
                                    <tr>
                                        <td>
                                            <?php echo $stagaire['matricule'] ?>
                                        </td>
                                        <td>
                                            <?php echo $stagaire['first_name'] . ' ' . $stagaire['last_name'] ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>