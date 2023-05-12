<?php
    // managers
    $managers = $db->getAllRows('formateurs');
?>
<div role="tabpanel" id="section" class="tab-pane fade active show">

<form id="section_info" action="">
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
                <option>
                    choisissez une spécialité
                </option>
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
            <select  class="form-control" id="manager" name="manager">
                <option value="0">
                    ...
                </option>
                <?php
                foreach ($managers as $manager) {
                    echo "<option value='" . $manager['id'] . "'>" . $manager['nom'] . " " . $manager['prenom'] . "</option>";
                }
                ?>
            </select>
        </div>

        <input type="text" name="trainees" id="trainees" hidden>
    </div>
</form>
</div>