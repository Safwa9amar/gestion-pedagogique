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
    //   speciality change
    let speciality = document.getElementById('speciality');
    speciality.addEventListener('change', function () {
        let speciality_id = speciality.value;
        let url = "<?php echo '../' . API . '?route=specialities&search='; ?>" + speciality_id;
        fetch(url)
            .then(response => response.json())
            .then(data => {
                let speciality = data[0];
                console.log(data);
                let code = document.getElementById('code');
                let qualification = document.getElementById('qualification');
                code.value = speciality.code;
                qualification.value = speciality.conditions;
                // debut
                let debut = document.getElementById('debut');
                let fin = document.getElementById('fin');
                debut.onchange = function () {
                    let date = new Date(debut.value);
                    // get number from speciality.duration string 
                    let duration = speciality.duration.match(/\d+/)[0];
                    // add duration to debut date with month as unit
                    date.setMonth(date.getMonth() + parseInt(duration));
                    // set fin date
                    fin.value = date.toISOString().slice(0, 10);

                }
                // FilterStudentsBySpeciality
                let url = "<?php echo '../' . API . 'FilterStudentsBySpeciality.php?id='; ?>" + speciality.id;
                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        let students = data;
                        // clean table body
                        tableBody.innerHTML = '';
                        data.forEach(el => tableBody.innerHTML += generateTr(el))

                    })

            })

    });

    // responseResult
    let responseResult = document.getElementById('responseResult');
    // save_students btn
    let save_students_btn = document.getElementById('save_students');


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

        // get data from section_info form 
        let section_info_form = document.getElementById('section_info');
        let section_info_form_data = {};
        section_info_form.querySelectorAll('.form-control').forEach((input) => {
            section_info_form_data[input.name] = input.value;
        })

        // section-students-list table
        let students_table = document.getElementById('section-students-list');
        // extract function students id list from table
        function get_students_id_list(table) {
            let students_id_list = [];
            for (let i = 1; i < table.rows.length; i++) {
                students_id_list.push(table.rows[i].cells[1].innerHTML);
            }
            return students_id_list;
        }
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
                setTimeout(() => {
                    location.href = '?view=formations&sub_view=show_section';
                }, 2000);

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