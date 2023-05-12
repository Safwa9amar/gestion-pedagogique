<div role="tabpanel" id="save-section" class="tab-pane fade ">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary" id="save_students">
                <!-- spinner -->
                <span id="section_spinner" class="spinner-border spinner-border-sm me-2" role="status"
                    style='display:none;'></span>
                <?php echo $app_lang['save']; ?>
            </button>

        </div>
    </div>
    <br>
    <div class="row" id="responseResult">

    </div>
</div>


<script>
    // responseResult
    let responseResult = document.getElementById('responseResult');
    // section-students-list table
    let students_table = document.getElementById('section-students-list');
    // save_students btn
    let save_students_btn = document.getElementById('save_students');
    // extract function students id list from table
    function get_students_id_list(table) {
        let students_id_list = [];
        for (let i = 1; i < table.rows.length; i++) {
            students_id_list.push(table.rows[i].cells[1].innerHTML);
        }
        return students_id_list;
    }
    // get data from section_info form 
    let section_info_form = document.getElementById('section_info');
    let section_info_form_data = {};
    section_info_form.querySelectorAll('.form-control').forEach((input) => {
        input.addEventListener('change', () => {
            section_info_form_data[input.name] = input.value;
            console.log(input);
        })
    })
    let successHtml = `
                    <div class="col-lg-12">
                        <div class="alert alert-success">
                            <?php echo $app_lang['section_created']; ?>
                        </div>
                    </div>
                `;
    let errorHtml = `
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <?php echo $app_lang['all_fields_required'] ?>
                        </div>
                    </div>
                `;

    save_students_btn.addEventListener('click', () => {
        document.querySelector('#section_spinner').style.display = 'inline-block';
        let section = section_info_form_data;
        section.students = get_students_id_list(students_table);
        console.log(section);
        // send data to server
        $.ajax({
            url: "<?php echo '../' . API . 'open_section.php'; ?>",
            type: "POST",
            data: section,
            success: function (response) {
                responseResult.innerHTML = successHtml

            },
            error: function (jqXHR, textStatus, errorThrown) {
                responseResult.innerHTML = errorHtml;
            },
            complete: function () {
                document.querySelector('#section_spinner').style.display = 'none';
                // clean section_info_form_data
                section_info_form_data = {};
            }
        });
    })
</script>