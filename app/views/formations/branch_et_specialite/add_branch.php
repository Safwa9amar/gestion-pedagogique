<div role="tabpanel" id="add-branch" class="tab-pane fade ">
    <form id='add-branch'>
        <!-- code de branche -->
        <div class="form-group">
            <label for="branch-code">
                <?php echo $app_lang['branch_code'] ?>
            </label>
            <input type="text" class="form-control" id="branch-code">
        </div>

        <!-- nom de branch in french -->
        <div class="form-group">
            <label for="branch-fr">
                <?php echo $app_lang['branch_name_fr'] ?>
            </label>
            <input type="text" class="form-control" id="branch-fr">
        </div>
        <!-- nom de branch in arabic -->
        <div class="form-group">
            <label for="branch-ar">
                <?php echo $app_lang['branch_name_ar'] ?>
            </label>
            <input type="text" class="form-control" id="branch-ar">
        </div>
        <button id="submitBtn" type="submit" class="btn btn-primary">
            <?php echo $app_lang['ajouter'] ?>
        </button>

    </form>
</div>

<script>
    // add branch using jquery
    // get form
    let form = document.querySelector('form#add-branch');
    let submitBtn = document.querySelector('#submitBtn');
    form.addEventListener('submit', function (e) {
        // add branch
        e.preventDefault();
        // get values
        var branch_code = $('#branch-code').val();
        var branch = $('#branch').val();
        var branch_fr = $('#branch-fr').val();
        var branch_ar = $('#branch-ar').val();
        // check if values not empty
        if (branch_code != '' && branch != '' && branch_fr != '' && branch_ar != '') {
            // send ajax request
            $.ajax({
                url: '<?php echo '../'. API . 'add_branch.php' ?>',
                method: 'POST',
                data: {
                    branch_code: branch_code,
                    branch: branch,
                    branch_fr: branch_fr,
                    branch_ar: branch_ar
                },
                beforeSend: function () {
                    let html = `<span class="spinner-border spinner-border-sm me-2"role="status"></span>
                    <?php echo $app_lang['loading'] ?>
                    `
                    submitBtn.innerHTML = html;
                },
                success: function (data) {
                    submitBtn.className = '';
                    submitBtn.className = 'btn btn-success';
                    let html = `<i class="fa fa-check" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-check" aria-label="fa fa-check"></i> `

                    submitBtn.innerHTML = html + '<?php echo $app_lang['add_success'] ?>';
                    // reload page
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                },
                error: function (err) {
                    submitBtn.innerHTML = '<?php echo $app_lang['error'] ?>';
                },
                complete: function () {
                    setTimeout(() => {
                        submitBtn.className = '';
                        submitBtn.className = 'btn btn-primary';
                        submitBtn.innerHTML = '<?php echo $app_lang['ajouter'] ?>'
                    }, 2000);
                }
            });
        }
    });
</script>