<h1>
    <?php echo $app_lang['branches_et_specialities'] ?>
</h1>
<div style="padding:1rem; width:80vw;" class="card">
    <div class="card-header">
        <ul role="tablist" class="nav nav-tabs nav-tabs-solid">
            <li class="nav-item">
                <a href="#branch-list" data-bs-toggle="tab"
                    class="nav-link <?php echo isset($_GET['edit_branch']) || isset($_GET['edit_speciality']) ? '' : 'active' ?> ">
                    <?php echo $app_lang['list_of_branches'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#add-branch" data-bs-toggle="tab"
                    class="nav-link <?php echo isset($_GET['edit_branch']) ? 'active' : '' ?>">
                    <?php
                    echo isset($_GET['edit_branch']) ? $app_lang['edit_branch'] : $app_lang['add_branch'];
                    ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#specialities-list" data-bs-toggle="tab" class="nav-link">
                    <?php echo $app_lang['list_of_specialities'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#add-speciality" data-bs-toggle="tab"
                    class="nav-link <?php echo isset($_GET['edit_speciality']) ? 'active' : '' ?>">
                    <?php
                    echo isset($_GET['edit_speciality']) ? $app_lang['edit_speciality'] : $app_lang['add_speciality'];
                    ?>
                </a>
            </li>

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <?php include_once 'branch_et_specialite/branches.php'; ?>
            <?php
            if (isset($_GET['edit_branch'])) {
                include_once 'branch_et_specialite/edit_branch.php';
            } else {
                include_once 'branch_et_specialite/add_branch.php';
            } ?>
            <?php include_once 'branch_et_specialite/specialities.php'; ?>
            <?php
            if (isset($_GET['edit_speciality'])) {
                include_once 'branch_et_specialite/edit_speciality.php';
            } else {
                include_once 'branch_et_specialite/add_speciality.php';
            }

            ?>
        </div>
    </div>
</div>
</div>