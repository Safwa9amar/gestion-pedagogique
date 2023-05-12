<?php $branches = $db->getAllRows('branches'); ?>
<div role="tabpanel" id="add-speciality" class="tab-pane fade">
  <form action="" id="add-speciality">
    <div class="row">
      <!-- رمز الشعبة -->
      <div class="form-group col-md-6 col-sm-12 col-xs-12">
        <!-- view all branch in select input -->
        <label for="spec_branch-code">
          <?php echo $app_lang['branch_code'] ?>
        </label>
        <select class="form-control" id="spec_branch-code">
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
        <input type="text" class="form-control" id="speciality-code" />
      </div>
      <!-- اسم التخصص -->
      <div class="form-group col-md-6 col-sm-12 col-xs-12">
        <label for="speciality">
          <?php echo $app_lang['speciality_name'] ?>
        </label>
        <input type="text" class="form-control" id="speciality" />
      </div>
    </div>
    <div class="row">
      <!-- مستوى التأهيل -->
      <div class="form-group col-md-6 col-sm-12 col-xs-12">
        <label for="speciality_level">
          <?php echo $app_lang['speciality_level'] ?>
        </label>
        <input type="text" class="form-control" id="speciality_level" />
      </div>
      <!-- speciality_certificate -->
      <div class="form-group col-md-6 col-sm-12 col-xs-12">
        <label for="speciality_certificate">
          <?php echo $app_lang['speciality_certificate'] ?>
        </label>
        <input type="text" class="form-control" id="speciality_certificate" />
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6 col-sm-12 col-xs-12">
        <label for="speciality_duration">
          <?php echo $app_lang['speciality_duration'] ?>
        </label>
        <input type="text" class="form-control" id="speciality_duration" />
      </div>
      <div class="form-group col-md-6 col-sm-12 col-xs-12">
        <label for="speciality_conditions">
          <?php echo $app_lang['speciality_conditions'] ?>
        </label>
        <textarea  class="form-control" id="speciality_conditions" ></textarea>
      </div>
      <div class="form-group col-md-6 col-sm-12 col-xs-12">
        <label for="speciality_training_mode">
          <?php echo $app_lang['speciality_training_mode'] ?>
        </label>
        <input type="text" class="form-control" id="speciality_training_mode" />
      </div>
    </div>
    <!-- submit -->
    <button type="submit" id="specialitySubmitBtn" class="btn btn-primary">
      <?php echo $app_lang['ajouter'] ?>
    </button>
  </form>
</div>
<script>
  // FORM
  let specialityForm = document.querySelector('form#add-speciality');
  let specialitySubmitBtn = document.querySelector('#specialitySubmitBtn');
  console.log(form);
  specialityForm.addEventListener('submit', function (e) {

          // add speciality
          e.preventDefault();
          var branch_id = $('#spec_branch-code').val();
          var speciality_code = $('#speciality-code').val();
          var speciality_name = $('#speciality').val();
          var speciality_level = $('#speciality_level').val();
          var speciality_certificate = $('#speciality_certificate').val();
          var speciality_duration = $('#speciality_duration').val();
          var speciality_conditions = $('#speciality_conditions').val();
          var speciality_training_mode = $('#speciality_training_mode').val();
          $.ajax({
                  type: "POST",
                  url: '<?php echo '../' . API . 'add_speciality.php' ?>',

                  data: {
                          branch_id: branch_id,
                          code: speciality_code,
                          name: speciality_name,
                          level: speciality_level,
                          certificate: speciality_certificate,
                          duration: speciality_duration,
                          conditions: speciality_conditions,
                          training_mode: speciality_training_mode
                  },
                  beforeSend: function () {
                          let html = `<span class="spinner-border spinner-border-sm me-2"role="status"></span>
                              <?php echo $app_lang['loading'] ?>
                          `
                          specialitySubmitBtn.innerHTML = html;
                  },
                  success: function (data) {
                          specialitySubmitBtn.className = '';
                          specialitySubmitBtn.className = 'btn btn-success';
                          let html = `<i class="fa fa-check" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-check" aria-label="fa fa-check"></i> `

                          specialitySubmitBtn.innerHTML = html + '<?php echo $app_lang['add_success'] ?>';
                          // reload page
                          setTimeout(() => {
                                  // window.location.reload();
                          }, 2000);
                  },
                  error: function (err) {
                          specialitySubmitBtn.innerHTML = '<?php echo $app_lang['error'] ?>';
                  },
                  complete: function () {
                          setTimeout(() => {
                                  specialitySubmitBtn.className = '';
                                  specialitySubmitBtn.className = 'btn btn-primary';
                                  specialitySubmitBtn.innerHTML = '<?php echo $app_lang['ajouter'] ?>'
                          }, 2000);
                  }
          });
  });
</script>
