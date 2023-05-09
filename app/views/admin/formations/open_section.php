<?php
$db = new dataBaseController();
$specialities = $db->getAllRows('specialities');

$table_head = '<tr>
            <th>' . $app_lang['options'] . '</th>
            <th>' . $app_lang['numero_seriel'] . '</th>
            <th>' . $app_lang['matricule'] . '</th>
            <th>' . $app_lang['nom_prenom'] . '</th>
            <th>' . $app_lang['date_et_lieu_de_naissance'] . '</th>
            <th>' . $app_lang['nom_du_pere'] . '</th>
            <th>' . $app_lang['nom_et_prenom_de_la_mere'] . '</th>
            <th>' . $app_lang['adresse'] . '</th>

</tr>'
    ?>
<div style="padding:1rem; width:80vw;" class="card">

<h2>
    <?php echo $app_lang['open_section']; ?>
</h2>
    <div class="card-header">
        <ul role="tablist" class="nav nav-tabs nav-tabs-solid">
            <li class="nav-item">
                <a href="#section" data-bs-toggle="tab" class="nav-link active">
                    (1)
                    <?php echo $app_lang['section_info'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#section-list" data-bs-toggle="tab" class="nav-link ">
                    (2)
                    <?php echo $app_lang['trainees'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#save-section" data-bs-toggle="tab" class="nav-link ">
                    (3)
                    <?php echo $app_lang['save'] ?>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <?php include_once 'open_section/section_info.php'; ?>
            <?php include_once 'open_section/students_list.php'; ?>
            <?php include_once 'open_section/save.php'; ?>
        </div>
    </div>
</div>
</div>