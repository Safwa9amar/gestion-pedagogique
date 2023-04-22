<?php

$db = new DataBaseController();

// get all specialities from database
$specialities = $db->getAllRows('speciality', 'id', 'ASC');

// create html select element with all specialities
echo '<select class="form-control" name="speciality" id="speciality">';
foreach ($specialities as $speciality) {
    echo '<option value="' . $speciality['id'] . '">' . $speciality['Department code'] . '</option>';
}
echo '</select>';
?>