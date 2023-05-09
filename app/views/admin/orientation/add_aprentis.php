<?php
// get data from niveau_scolar table
$db = new DatabaseController();
$niveau_scolar = $db->getAllRows('niveau_scolar');

$student = new Student();
$matricule = $student->getMatricule();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student->setFirstName($_POST['first_name']);
    $student->setGender($_POST['gender']);
    $student->setLastName($_POST['last_name']);
    $student->setBirthday($_POST['birthday']);
    $student->setBornPlace($_POST['born_place']);

    $student->setEmail($_POST['email']);
    $student->setPhone($_POST['phone']);
    $student->setAddress($_POST['address']);
    $student->setStudyLevel($_POST['study_level']);
    $student->setStudyYear($_POST['study_year']);
    $student->setStudyLastEtablissementName($_POST['study_last_etablissement_name']);
    $student->setFatherName($_POST['father_name']);
    $student->setFatherJob($_POST['father_job']);
    $student->setMotherName($_POST['mother_name']);
    $student->setMotherJob($_POST['mother_job']);
    $student->setBranchId($_POST['branch_id']);
    $student->setSpecialityId($_POST['speciality_id']);
    $checkEmail = $student->checkIfRowExistsByParam($formateur->table, 'email', $_POST['email']);
    if ($checkEmail) {
        $error = $app_lang['email_existe'];
        echo "<script>window.history.back()</script>";

    } else {
        if ($student->create()) {
            $success = $app_lang['ajouter_avec_succes'];
            echo '<script>window.location.href = "view=orientation&sub_view=list_aprentis"</script>';
        } else {
            $error = $app_lang['erreur_ajouter'];
        }
    }
}


?>

<!-- generate fom form aprentis aprentis based on ar -->
<form enctype="multipart/form-data" method="post">
    <!-- bootstrap section divider with title -->
    <div class="row">
        <div class="col-12">
            <h4>
                <?php echo $app_lang['informations_personnelles'] ?>
            </h4>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-12  col-lg-4">
            <label for="prenom">
                <?php echo $app_lang['prenom'] ?>
            </label>
            <input type="text" class="form-control" name="first_name" id="prenom">
        </div>
        <div class="form-group col-sm-12  col-lg-4">
            <label for="nom">
                <?php echo $app_lang['nom'] ?>
            </label>
            <input type="text" class="form-control" name="last_name" id="nom">
        </div>
        <div class="form-group col-sm-12  col-lg-4">
            <label for="telephone">
                <?php echo $app_lang['sex'] ?>
            </label>
            <select type="text" class="form-control" name="gender" id="sex">

                <option value="m">
                    <?php echo $app_lang['homme'] ?>
                </option>
                <option value="f">
                    <?php echo $app_lang['femme'] ?>
                </option>
            </select>

        </div>
    </div>
    <div class="row">

        <div class="form-group col-sm-12  col-lg-4">
            <label for="date_naissance">
                <?php echo $app_lang['date_de_naissance'] ?>
            </label>
            <input type="date" class="form-control" name="birthday" id="date_naissance">
        </div>
        <div class="form-group col-sm-12  col-lg-4">
            <label for="lieu_naissance">
                <?php echo $app_lang['lieu_de_naissance'] ?>
            </label>
            <input type="text" class="form-control" name="born_place" id="lieu_naissance">
        </div>
        <!-- situation fam -->
        <div class="form-group col-sm-12  col-lg-4">
            <label for="situation_familiale">
                <?php echo $app_lang['situation_familiale'] ?>
            </label>
            <select class="form-control" name="situation_familiale" id="situation_familiale">
                <option value="celibataire">
                    <?php echo $app_lang['celibataire'] ?>
                </option>
                <option value="marie">
                    <?php echo $app_lang['marie'] ?>
                </option>
                <option value="divorce">
                    <?php echo $app_lang['divorce'] ?>
                </option>
                <option value="veuf">
                    <?php echo $app_lang['veuf'] ?>
                </option>
            </select>
        </div>
    </div>
    <div class="row">

        <div class="form-group col-sm-12  col-lg-4">
            <label for="telephone">
                <?php echo $app_lang['telephone'] ?>
            </label>
            <input type="text" class="form-control" name="phone" id="telephone">
        </div>
        <div class="form-group col-sm-12  col-lg-4">
            <label for="email">
                <?php echo $app_lang['email'] ?>
            </label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group col-sm-12  col-lg-4">
            <label for="adresse">
                <?php echo $app_lang['adresse'] ?>
            </label>
            <input type="text" class="form-control" name="address" id="adresse">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>
                <!-- معلمات حول المتسوى التعليمي -->
                <?php echo $app_lang['informations_sur_le_niveau_scolaire'] ?>
            </h4>
            <hr>
        </div>
    </div>
    <div class='row'>

        <div class="form-group col-sm-12  col-lg-4">
            <label for="classe">
                <?php echo $app_lang['niveau_d_etude'] ?>
            </label>
            <input type="text" list="niveau_d_etude_list" class="form-control" name="study_level" id="niveau_d_etude">
            <datalist id="niveau_d_etude_list">
                <?php foreach ($niveau_scolar as $niveau) { ?>
                    <option value="<?php echo $niveau['niveau'] ?>">
                        <?php echo $niveau['niveau'] ?>
                    </option>
                <?php } ?>
            </datalist>
        </div>
        <div class="form-group col-sm-12  col-lg-4">
            <label for="annee_scolaire">
                <?php echo $app_lang['annee_scolaire'] ?>
            </label>
            <input type="text" class="form-control" name="study_year" id="annee_scolaire">
        </div>
        <!-- dernier_etablissement -->
        <div class="form-group col-sm-12  col-lg-4">
            <label for="dernier_etablissement">
                <?php echo $app_lang['dernier_etablissement'] ?>
            </label>
            <input type="text" class="form-control" name="study_last_etablissement_name" id="dernier_etablissement">
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h4>
                <!-- معلومات حول العائلة -->
                <?php echo $app_lang['informations_sur_la_famille'] ?>
            </h4>
            <hr>
        </div>

        <div class="row">
            <div class="form-group col-sm-12 col-lg-4">
                <label for="nom_pere">
                    <?php echo $app_lang['nom_du_pere'] ?>
                </label>
                <input type="text" class="form-control" name="father_name" id="nom_du_pere">
            </div>
            <div class="form-group col-sm-12 col-lg-4">
                <label for="profession_du_pere">
                    <?php echo $app_lang['profession_du_pere'] ?>
                </label>
                <input type="text" class="form-control" name="father_job" id="profession_du_pere">
            </div>


        </div>
        <div class="row">
            <div class="form-group col-sm-12 col-lg-4">
                <label for="nom_et_prenom_de_la_mere">
                    <?php echo $app_lang['nom_et_prenom_de_la_mere'] ?>
                </label>
                <input type="text" class="form-control" name="mother_name" id="nom_et_prenom_de_la_mere">

            </div>
            <div class="form-group col-sm-12 col-lg-4">
                <label for="profession_de_la_mere">
                    <?php echo $app_lang['profession_de_la_mere'] ?>
                </label>
                <input type="text" class="form-control" name="mother_job" id="profession_de_la_mere">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <h4>
                    <!-- التكوين -->
                    <?php echo $app_lang['formation'] ?>
                </h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12 col-lg-4">
                <!-- matricule -->
                <label for="matricule">
                    <?php echo $app_lang['matricule'] ?>
                </label>
                <input dir="ltr" value="<?php echo $matricule ?>" disabled type="text" class="form-control"
                    name="matricule" id="matricule">
            </div>
            <div class="form-group col-sm-12 col-lg-4">
                <label for="select_branche">
                    <?php echo $app_lang['branche'] ?>
                </label>
                <select class="form-control" name="branch_id" id="select_branche">
                    <?php
                    $branches = new DataBaseController();
                    $branches = $branches->getAllRows("branches");
                    foreach ($branches as $branche) { ?>
                        <option value="<?php echo $branche['id'] ?>">
                            <?php echo $branche['code'] ?>
                        </option>
                    <?php } ?>
                </select>

            </div>
            <div class="form-group col-sm-12 col-lg-4">
                <label for="select_niveau">
                    <?php echo $app_lang['speciality'] ?>
                </label>
                <select disabled class="form-control" name="speciality_id" id="select_niveau">
                    <option value="">Choisir une spécialité</option>
                </select>
            </div>
        </div>
        <!-- submit form -->
        <div class="row">
            <div class="form-group col-12">
                <button type="submit" class="btn btn-primary btn-block">
                    <?php echo $app_lang['ajouter'] ?>
                </button>
            </div>
        </div>
</form>


<script>
    // select_branche
    let select_branche = document.getElementById("select_branche");
    select_branche.addEventListener("change", function () {
        //    jquery
        $.ajax({
            url: "../api/FilterSpecialtiesByBranch.php",
            type: "POST",
            data: {
                id: select_branche.value
            },
            success: function (data) {
                // console.log(JSON.parse(data));
                let html = `<option value="">Choisir une spécialité</option>`;
                JSON.parse(data).forEach(element => {
                    html += `<option value="${element.id}">${element.code}</option>`;
                });
                document.getElementById("select_niveau").innerHTML = html;
                document.getElementById("select_niveau").disabled = false;
            }
        });
    });
</script>