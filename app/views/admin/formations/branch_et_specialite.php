<h1>
    <?php echo $app_lang['branches_et_specialities'] ?>
</h1>
<div class="card flex-fill bg-white">
    <div class="card-header">
        <ul role="tablist" class="nav nav-tabs nav-tabs-solid">
            <li class="nav-item">
                <a href="#branch-list" data-bs-toggle="tab" class="nav-link active">
                    <?php echo $app_lang['list_of_branches'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#add-branch" data-bs-toggle="tab" class="nav-link">
                    <?php echo $app_lang['add_branch'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#specialities-list" data-bs-toggle="tab" class="nav-link">
                    <?php echo $app_lang['list_of_specialities'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#add-speciality" data-bs-toggle="tab" class="nav-link">
                    <?php echo $app_lang['add_speciality'] ?>
                </a>
            </li>

        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">
            <?php include_once 'branch_et_specialite/branches.php'; ?>
            <?php include_once 'branch_et_specialite/add_branch.php'; ?>
            <?php include_once 'branch_et_specialite/specialities.php'; ?>
            <?php include_once 'branch_et_specialite/add_speciality.php'; ?>
        </div>
    </div>
</div>
</div>