<?php
$formateur = new Formateur();
$formateur->getRowByParam($formateur->table, "email", $_SESSION['user']['email']);
$section = $formateur->getRowByParam($formateur->table, "manager", $_SESSION['user']['id']);
?>

<div style="
    display: flex;
    width: 100vw;
    height: 100vh;
    justify-content: center;
    align-items: center;
    padding:3rem;
">

    <div class="card">
        <div class="card-header">

            <h1>الاطلاع على جدول التوزيع الزمني</h1>
        </div>
        <div class="card-body">


            <div class='row'>

                <a href="./calendrie.doc" download="calendrie.doc" target="_blank" class=" btn btn-primary">
                    اضغط هنا لتحميل الى جدول التوزيع الزمني
                </a>
                <a href="<?php echo '../' . API . 'print_section.php?print_section=' . $section['id']; ?>" class="btn">
                    <i class="fa fa-download "></i>
                    اضغط هنا للأطلاع على الفرع
                    <?php echo $app_lang['telecharger'] ?>
                </a>
            </div>
        </div>

        <div class="card-footer">
            <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['user']['name'] ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <li>
                        <a href="?logout" class="btn dropdown-item"><img src="<?php echo ICONS ?>/log-out.svg" class="me-2" alt="img" />
                            تسجيل الخروج
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</div>