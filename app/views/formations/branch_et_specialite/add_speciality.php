<?php $branches = $db->getAllRows('branches'); ?>
<div role="tabpanel" id="add-speciality" class="tab-pane fade ">
        <form action="">
                <div class="row">
                        <!-- رمز الشعبة -->
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <!-- view all branch in select input -->
                                <label for="branch-code">
                                        <?php echo $app_lang['branch_code'] ?>
                                </label>
                                <select class="form-control" id="branch-code">
                                        <?php foreach ($branches as $branch) { ?>
                                                <option value="<?php echo $branch['id']; ?>">
                                                        <?php echo $branch['code']; ?>
                                                </option>
                                        <?php } ?>
                                </select>
                        </div>
                        <!-- رمز التخصص -->
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <label for="speciality-code">
                                        <?php echo $app_lang['speciality_code'] ?>
                                </label>
                                <input type="text" class="form-control" id="speciality-code">
                        </div>
                        <!-- اسم التخصص -->
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <label for="speciality">
                                        <?php echo $app_lang['speciality_name'] ?>
                                </label>
                                <input type="text" class="form-control" id="speciality">
                        </div>
                </div>
                <div class="row">
                        <!-- مستوى التأهيل -->
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <label for="speciality_level">
                                        <?php echo $app_lang['speciality_level'] ?>
                                </label>
                                <input type="text" class="form-control" id="speciality_level">
                        </div>
                        <!-- speciality_certificate -->
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <label for="speciality_certificate">
                                        <?php echo $app_lang['speciality_certificate'] ?>
                                </label>
                                <input type="text" class="form-control" id="speciality_certificate">
                        </div>
                </div>
                <div class="row">
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <label for="speciality_duration">
                                        <?php echo $app_lang['speciality_duration'] ?>
                                </label>
                                <input type="text" class="form-control" id="speciality_duration">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <label for="speciality_conditions">
                                        <?php echo $app_lang['speciality_conditions'] ?>
                                </label>
                                <input type="text" class="form-control" id="speciality_conditions">
                        </div>
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                                <label for="speciality_training_mode">
                                        <?php echo $app_lang['speciality_training_mode'] ?>
                                </label>
                                <input type="text" class="form-control" id="speciality_training_mode">
                        </div>
                </div>
                <!-- submit -->
                <button type="submit" class="btn btn-primary">
                        <?php echo $app_lang['ajouter'] ?>
                </button>
                
        </form>
</div>