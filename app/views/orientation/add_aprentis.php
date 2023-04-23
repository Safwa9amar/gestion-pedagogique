<?php
// get data from niveau_scolar table
$db = new DatabaseController();
$niveau_scolar = $db->getAllRows('niveau_scolar');
?>

    <!-- generate fom form aprentis aprentis based on ar -->
    <form enctype="multipart/form-data" method="post">
        <!-- bootstrap section divider with title -->
        <div class="row">
            <div class="col-12">
                <h4>
                    <?php echo $lang['informations_personnelles'] ?>
                </h4>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-12  col-lg-4">
                <label for="prenom">
                    <?php echo $lang['prenom'] ?>
                </label>
                <input type="text" class="form-control" name="prenom" id="prenom">
            </div>
            <div class="form-group col-sm-12  col-lg-4">
                <label for="nom">
                    <?php echo $lang['nom'] ?>
                </label>
                <input type="text" class="form-control" name="nom" id="nom">
            </div>
            <!-- situation fam -->
            <div class="form-group col-sm-12  col-lg-4">
                <label for="situation_familiale">
                    <?php echo $lang['situation_familiale'] ?>
                </label>
                <select class="form-control" name="situation_familiale" id="situation_familiale">
                    <option value="celibataire">
                        <?php echo $lang['celibataire'] ?>
                    </option>
                    <option value="marie">
                        <?php echo $lang['marie'] ?>
                    </option>
                    <option value="divorce">
                        <?php echo $lang['divorce'] ?>
                    </option>
                    <option value="veuf">
                        <?php echo $lang['veuf'] ?>
                    </option>
                </select>
            </div>
        </div>
        <div class="row">

            <div class="form-group col-sm-12  col-lg-4">
                <label for="date_naissance">
                    <?php echo $lang['date_de_naissance'] ?>
                </label>
                <input type="date" class="form-control" name="date_naissance" id="date_naissance">
            </div>
            <div class="form-group col-sm-12  col-lg-4">
                <label for="lieu_naissance">
                    <?php echo $lang['lieu_de_naissance'] ?>
                </label>
                <input type="text" class="form-control" name="lieu_naissance" id="lieu_naissance">
            </div>
            <div class="form-group col-sm-12  col-lg-4">
                <label for="adresse">
                    <?php echo $lang['adresse'] ?>
                </label>
                <input type="text" class="form-control" name="adresse" id="adresse">
            </div>
        </div>
        <div class="row">

            <div class="form-group col-sm-12  col-lg-4">
                <label for="telephone">
                    <?php echo $lang['telephone'] ?>
                </label>
                <input type="text" class="form-control" name="telephone" id="telephone">
            </div>
            <div class="form-group col-sm-12  col-lg-4">
                <label for="email">
                    <?php echo $lang['email'] ?>
                </label>
                <input type="text" class="form-control" name="email" id="email">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>
                    <!-- معلمات حول المتسوى التعليمي -->
                    <?php echo $lang['informations_sur_le_niveau_scolaire'] ?>
                </h4>
                <hr>
            </div>
        </div>
        <div class='row'>

            <div class="form-group col-sm-12  col-lg-4">
                <label for="classe">
                    <?php echo $lang['niveau_d_etude'] ?>
                </label>
                <input type="text" list="niveau_d_etude_list" class="form-control" name="classe" id="niveau_d_etude">
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
                    <?php echo $lang['annee_scolaire'] ?>
                </label>
                <input type="text" class="form-control" name="annee_scolaire" id="annee_scolaire">
            </div>
            <!-- dernier_etablissement -->
            <div class="form-group col-sm-12  col-lg-4">
                <label for="dernier_etablissement">
                    <?php echo $lang['dernier_etablissement'] ?>
                </label>
                <input type="text" class="form-control" name="dernier_etablissement" id="dernier_etablissement">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h4>
                    <!-- معلومات حول العائلة -->
                    <?php echo $lang['informations_sur_la_famille'] ?>
                </h4>
                <hr>
            </div>

            <div class="row">
                <div class="form-group col-sm-12 col-lg-4">
                    <label for="nom_pere">
                        <?php echo $lang['nom_du_pere'] ?>
                    </label>
                    <input type="text" class="form-control" name="nom_du_pere" id="nom_du_pere">
                </div>
                <div class="form-group col-sm-12 col-lg-4">
                    <label for="profession_du_pere">
                        <?php echo $lang['profession_du_pere'] ?>
                    </label>
                    <input type="text" class="form-control" name="profession_du_pere" id="profession_du_pere">
                </div>


            </div>
            <div class="row">
                <div class="form-group col-sm-12 col-lg-4">
                    <label for="nom_et_prenom_de_la_mere">
                        <?php echo $lang['nom_et_prenom_de_la_mere'] ?>
                    </label>
                    <input type="text" class="form-control" name="nom_et_prenom_de_la_mere"
                        id="nom_et_prenom_de_la_mere">

                </div>
                <div class="form-group col-sm-12 col-lg-4">
                    <label for="profession_de_la_mere">
                        <?php echo $lang['profession_de_la_mere'] ?>
                    </label>
                    <input type="text" class="form-control" name="profession_de_la_mere" id="profession_de_la_mere">
                </div>
            </div>

            <div class="row">
            <div class="col-12">
                <h4>
                    <!-- التكوين -->
                    <?php echo $lang['formation'] ?>
                </h4>
                <hr>
            </div>
            
    </form>