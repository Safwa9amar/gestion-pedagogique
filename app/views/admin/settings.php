<?php
$lang = new LanguageController();
$all_lang_rows = $lang->getAllRows($lang->table);
$app_lang = $lang->app_lang;
$table_head = '
        <tr>    
            <th scope="col">' . $app_lang['key'] . '</th>
            <th scope="col">' . $app_lang['french'] . '</th>
            <th scope="col">' . $app_lang['arabic'] . '</th>
        </tr>
    '
    ?>

<div class="card bg-white">

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
            <li class="nav-item "><a class="nav-link active" href="#solid-justified-tab1" data-bs-toggle="tab">
                    <?php echo $app_lang['language_settings']; ?>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="solid-justified-tab1">
                <?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>

                <?php foreach ($all_lang_rows as $row): ?>
                    <tr>
                        <td>
                            <?php echo $row['key']; ?>
                        </td>
                        <td>
                            <input data-type="french" value="<?php echo $row['french']; ?>" type="text" class="form-control"
                                id="<?php echo $row['id']; ?>" aria-describedby="helpId">
                        </td>
                        <td>
                            <input data-type="arabic" dir="rtl" value="<?php echo $row['arabic']; ?>" type="text"
                                class="form-control" id="<?php echo $row['id']; ?>" aria-describedby="helpId">
                        </td>

                    </tr>
                <?php endforeach; ?>
                <?php include urlFor(COMPONENTS, 'list_table_footer.php'); ?>
            </div>

        </div>
    </div>
</div>
<script>
    // datanew
    let table = document.querySelector('.datanew');
    table.querySelectorAll('input').forEach(input => {
        input.addEventListener('keyup', function(e) {
            // return if key is not number or char
            if (e.keyCode < 48 || e.keyCode > 90) return;
            // wait until user stop typing
            clearTimeout(timer);
            timer = setTimeout(() => {
                let id = e.target.id;
                let value = e.target.value;
                let type = e.target.dataset.type;
                let data = {
                    id,
                    value,
                    type
                }
                $.ajax({
                    type: "POST",
                    url: "./api/update_key_lang.php",
                    data: data,
                    success: function(response) {
                        console.log(response);
                    }
                });
            }, 1000);

        })
    })
</script>