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

<br>
<h2>
    <?php echo $app_lang['open_section']; ?>
</h2>
<div style="padding: 2rem;" class="card flex-fill bg-white ">
    <div class="card-header">
        <ul role="tablist" class="nav nav-tabs nav-tabs-solid">
            <li class="nav-item">
                <a href="#section" data-bs-toggle="tab" class="nav-link active">
                    <?php echo $app_lang['list_of_branches'] ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="#section-list" data-bs-toggle="tab" class="nav-link ">
                    <?php echo $app_lang['list_of_branches'] ?>
                </a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content">


            <div role="tabpanel" id="section" class="tab-pane fade active show">

                <form action="">
                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-4">
                            <!-- Numéro  -->
                            <label for="numero" class="form-label">
                                <?php echo $app_lang['numero']; ?>
                            </label>
                            <input type="text" class="form-control" id="numero" name="numero">
                        </div>
                        <!-- date -->
                        <div class="form-group col-sm-12  col-lg-4">
                            <label for="date" class="form-label">
                                <?php echo $app_lang['date']; ?>
                            </label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Spécialité  -->
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="speciality" class="form-label">
                                <?php echo $app_lang['speciality']; ?>
                            </label>
                            <select class="form-control" id="speciality" name="speciality">
                                <?php
                                foreach ($specialities as $speciality) {
                                    echo "<option value='" . $speciality['id'] . "'>" . $speciality['name'] . "</option>";
                                }
                                ?>
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="row">
                        <!-- code  -->
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="code" class="form-label">
                                <?php echo $app_lang['code_section']; ?>
                            </label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                        <!-- Niveau de qualification  -->
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="qualification" class="form-label">
                                <?php echo $app_lang['qualification']; ?>
                            </label>
                            <input type="text" class="form-control" id="qualification" name="qualification">
                        </div>
                    </div>
                    <div class="row">
                        <!-- debut -->
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="debut" class="form-label">
                                <?php echo $app_lang['debut_stage']; ?>
                            </label>
                            <input type="date" class="form-control" id="debut" name="debut">
                        </div>
                        <!-- fin -->
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="fin" class="form-label">
                                <?php echo $app_lang['fin_stage']; ?>
                            </label>
                            <input type="date" class="form-control" id="fin" name="fin">
                        </div>
                    </div>
                    <div class="row">
                        <!-- manager -->
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="manager" class="form-label">
                                <?php echo $app_lang['responsable']; ?>
                            </label>
                            <input type="text" class="form-control" id="manager" name="manager">
                        </div>

                        <input type="text" name="trainees" id="trainees" hidden>
                    </div>
                </form>
            </div>


            <div role="tabpanel" id="section-list" class="tab-pane fade ">
                
                <h3>
                    <?php echo $app_lang['trainees']; ?>
                </h3>
                <div class="row">
                    <div class="input-group col-lg-4">
                        <input type="text" class="form-control" id="search" name="search">
                        <span class="input-group-text" id="basic-addon3">
                            <label class="text-success" id="success-alert" style="display: none;">
                                <?php echo $app_lang['trainee_added']; ?>
                            </label>
                            <!-- spinner -->
                            <div class="spinner-border" id="spinner" role="status" style="display: none;"></div>
                        </span>
                    </div>
                </div>
                <br>
                <?php include urlFor(COMPONENTS, 'list_table_head.php'); ?>

                <?php include urlFor(COMPONENTS, 'list_table_footer.php'); ?>


                <script>
                    // get search input
                    let search = document.getElementById('search');
                    // get table body
                    let tableBody = document.querySelector('tbody');
                    // wait for user to end typing to send request
                    let timer = null;
                    search.addEventListener('keydown', function (e) {
                        // spinner
                        document.getElementById('spinner').style.display = 'block';
                        clearTimeout(timer);
                        timer = setTimeout(function () {
                            // send request
                            fetch('../api/?route=students&search=' + search.value)
                                .then(response => response.json())
                                .then(data => {
                                    // clear table body
                                    tableBody.innerHTML = '';
                                    // fill table body
                                    // covnert data obj to array
                                    data = Object.values(data);

                                    data.forEach(trainee => {
                                        tableBody.innerHTML += `
                        <tr id='trainee_${trainee.id}'>
                            <td>
                                <button class="btn btn-primary" onclick="removeTrainee(${trainee.id})">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                            <td>${trainee.id}</td>
                            <td>${trainee.matricule}</td>
                            <td>${trainee.first_name + ' ' + trainee.last_name}</td>
                            <td>${trainee.birthday + ' ' + trainee.born_place}</td>
                            <td>${trainee.father_name}</td>
                            <td>${trainee.mother_name}</td>
                            <td>${trainee.address}</td>
                        </tr>
                        `;
                                    });
                                }).finally(() => {
                                    // show success-alert
                                    document.getElementById('success-alert').style.display = 'block';
                                    // hide spinner
                                    document.getElementById('spinner').style.display = 'none';
                                    e.target.value = '';
                                });


                        }, 1000);
                    });

                    removeTrainee = (id) => {
                        // get trainees row trainee_${id}
                        let trainee = document.getElementById('trainee_' + id);
                        // remove trainee from table
                        trainee.remove();
                    }
                    
                </script>

            </div>
        </div>
    </div>
</div>